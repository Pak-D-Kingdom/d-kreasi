<?php

namespace App\Services\AI;

use App\Models\AiChatLog;
use App\Services\AI\Contracts\LlmProviderInterface;
use App\Services\AI\Providers\GeminiLlmProvider;
use App\Services\AI\Providers\MockLlmProvider;
use App\Services\AI\Providers\StandardLlmProvider;
use Exception;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class LlmGateway
{
    public function __construct(
        protected PersonaManager $personaManager,
        protected KnowledgeRetrievalService $retrievalService,
        protected GuardrailService $guardrailService
    ) {}

    /**
     * Send chat request through the LLM Gateway with RAG, Guardrails, and Logging.
     *
     * @param  string  $layer  l1, l2, l3, or l4
     * @param  array<int, array{role: string, content: string}>  $messages
     * @param  array<string, mixed>  $options
     * @return array{content: string, provider: string, model: string, usage: array<string, mixed>, metadata: array<string, mixed>, is_fallback: bool}
     */
    public function chat(string $layer, array $messages, array $options = []): array
    {
        $startTime = microtime(true);
        $layer = strtolower($layer);
        $layerConfig = config("ai.layers.{$layer}", []);
        $tenantId = $options['tenant_id'] ?? null;
        $sessionId = $options['session_id'] ?? null;

        // Extract latest user message
        $latestUserMessage = '';
        foreach (array_reverse($messages) as $msg) {
            if (($msg['role'] ?? '') === 'user') {
                $latestUserMessage = (string) ($msg['content'] ?? '');
                break;
            }
        }

        // 1. CORE-S3-01: Input Guardrail Check
        $inputCheck = $this->guardrailService->inspectInput($latestUserMessage);
        if (! $inputCheck['safe']) {
            $deniedMessage = 'Maaf, saya tidak dapat memproses permintaan ini karena terindikasi melanggar batasan keamanan sistem.';
            $this->logChat([
                'session_id' => $sessionId,
                'layer' => $layer,
                'tenant_id' => $tenantId,
                'user_message' => $latestUserMessage,
                'assistant_message' => $deniedMessage,
                'provider' => 'guardrail',
                'model' => 'guardrail-v1',
                'latency_ms' => (int) round((microtime(true) - $startTime) * 1000),
                'is_fallback' => true,
                'error_message' => $inputCheck['reason'],
            ]);

            return [
                'content' => $deniedMessage,
                'provider' => 'guardrail',
                'model' => 'guardrail-v1',
                'usage' => ['prompt_tokens' => 0, 'completion_tokens' => 0, 'total_tokens' => 0],
                'metadata' => ['guardrail_flagged' => true],
                'is_fallback' => true,
            ];
        }

        // 2. CORE-S2: Knowledge Retrieval (RAG)
        $retrievedChunks = $this->retrievalService->retrieve($layer, $latestUserMessage, $tenantId);
        $ragContext = $this->retrievalService->formatContextForPrompt($retrievedChunks);

        // 3. CORE-S1-04: Construct Prompt with Persona and RAG
        $basePrompt = $options['system_prompt'] ?? $this->personaManager->getSystemPrompt($layer, $options['context'] ?? []);
        $finalSystemPrompt = empty($ragContext)
            ? $basePrompt
            : "{$basePrompt}\n\n{$ragContext}";

        // 4. Resolve Provider
        $providerOptions = array_merge([
            'layer' => $layer,
            'temperature' => $layerConfig['temperature'] ?? 0.7,
            'system_prompt' => $finalSystemPrompt,
        ], $options);

        $providerName = (string) ($options['provider'] ?? config('ai.default', 'mock'));
        $provider = $this->resolveProvider($providerName);

        try {
            $result = $provider->chat($messages, $providerOptions);
            $result['is_fallback'] = false;

            // 5. CORE-S3-02: Output Guardrail Check
            $result['content'] = $this->guardrailService->inspectOutput($layer, $result['content']);

            $latencyMs = (int) round((microtime(true) - $startTime) * 1000);

            // 6. CORE-S1-06: Database Logging
            $this->logChat([
                'session_id' => $sessionId,
                'layer' => $layer,
                'tenant_id' => $tenantId,
                'user_message' => $latestUserMessage,
                'assistant_message' => $result['content'],
                'provider' => $result['provider'],
                'model' => $result['model'],
                'prompt_tokens' => $result['usage']['prompt_tokens'] ?? 0,
                'completion_tokens' => $result['usage']['completion_tokens'] ?? 0,
                'total_tokens' => $result['usage']['total_tokens'] ?? 0,
                'latency_ms' => $latencyMs,
                'is_fallback' => false,
                'context_metadata' => [
                    'retrieved_chunks_count' => $retrievedChunks->count(),
                ],
            ]);

            return $result;
        } catch (Exception $e) {
            $latencyMs = (int) round((microtime(true) - $startTime) * 1000);

            Log::error("LLM Gateway failed for layer [{$layer}] with provider [{$providerName}]: ".$e->getMessage(), [
                'exception' => $e,
                'layer' => $layer,
            ]);

            $fallback = $this->buildFallbackResponse($layer, $providerName);

            $this->logChat([
                'session_id' => $sessionId,
                'layer' => $layer,
                'tenant_id' => $tenantId,
                'user_message' => $latestUserMessage,
                'assistant_message' => $fallback['content'],
                'provider' => $providerName,
                'model' => 'fallback',
                'latency_ms' => $latencyMs,
                'is_fallback' => true,
                'error_message' => $e->getMessage(),
            ]);

            return $fallback;
        }
    }

    /**
     * Resolve LLM Provider instance.
     */
    public function resolveProvider(string $name): LlmProviderInterface
    {
        $providersConfig = config('ai.providers', []);

        return match (strtolower($name)) {
            'llm' => new StandardLlmProvider($providersConfig['llm'] ?? []),
            'gemini' => new GeminiLlmProvider($providersConfig['gemini'] ?? []),
            'mock' => new MockLlmProvider($providersConfig['mock'] ?? []),
            default => throw new InvalidArgumentException("Unsupported AI provider: {$name}"),
        };
    }

    /**
     * Build fallback message when LLM call encounters an error or timeout.
     *
     * @return array{content: string, provider: string, model: string, usage: array<string, mixed>, metadata: array<string, mixed>, is_fallback: bool}
     */
    protected function buildFallbackResponse(string $layer, string $providerName): array
    {
        $fallbackMessage = match ($layer) {
            'l1' => 'Mohon maaf, sistem asisten kami sedang mengalami gangguan sejenak. Anda tetap dapat langsung memilih layanan Undangan Digital atau Website Bisnis di menu, atau hubungi kami via WhatsApp.',
            'l2' => 'Mohon maaf, saat ini asisten Undangan Digital sedang mengalami antrean. Silakan jelajahi katalog tema kami atau hubungi admin via WhatsApp untuk bantuan langsung.',
            'l3' => 'Mohon maaf, konsultan AI kami sedang sibuk. Silakan pilih paket website bisnis yang Anda butuhkan atau konsultasikan langsung dengan tim kami via WhatsApp.',
            default => 'Mohon maaf, saat ini sistem kami sedang dalam pemeliharaan. Silakan hubungi kami melalui kontak WhatsApp yang tersedia.',
        };

        return [
            'content' => $fallbackMessage,
            'provider' => $providerName,
            'model' => 'fallback',
            'usage' => [
                'prompt_tokens' => 0,
                'completion_tokens' => 0,
                'total_tokens' => 0,
            ],
            'metadata' => [
                'layer' => $layer,
                'fallback' => true,
            ],
            'is_fallback' => true,
        ];
    }

    /**
     * Helper to write chat log into database.
     *
     * @param  array<string, mixed>  $data
     */
    protected function logChat(array $data): void
    {
        try {
            AiChatLog::create($data);
        } catch (Exception $e) {
            Log::warning('Failed to persist AiChatLog: '.$e->getMessage());
        }
    }
}
