<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\LlmProviderInterface;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StandardLlmProvider implements LlmProviderInterface
{
    /**
     * @param  array<string, mixed>  $config
     */
    public function __construct(protected array $config = []) {}

    /**
     * @param  array<int, array{role: string, content: string}>  $messages
     * @param  array<string, mixed>  $options
     * @return array{content: string, provider: string, model: string, usage: array<string, mixed>, metadata: array<string, mixed>}
     *
     * @throws Exception
     */
    public function chat(array $messages, array $options = []): array
    {
        $baseUrl = rtrim((string) ($this->config['base_url'] ?? ''), '/');
        $apiKey = (string) ($this->config['api_key'] ?? '');
        $model = (string) ($options['model'] ?? $this->config['model'] ?? 'default-model');
        $temperature = (float) ($options['temperature'] ?? $this->config['temperature'] ?? 0.2);
        $maxTokens = (int) ($options['max_tokens'] ?? $this->config['max_tokens'] ?? 2048);
        $retries = (int) ($this->config['max_retries'] ?? 3);
        $timeout = (int) ($this->config['timeout'] ?? 30);

        if (empty($baseUrl)) {
            throw new Exception('LLM_BASE_URL is not configured.');
        }

        // Format standard OpenAI-compatible messages array
        $payloadMessages = [];

        // If system prompt is passed in options, prepend it
        if (! empty($options['system_prompt'])) {
            $payloadMessages[] = [
                'role' => 'system',
                'content' => (string) $options['system_prompt'],
            ];
        }

        foreach ($messages as $msg) {
            $payloadMessages[] = [
                'role' => (string) ($msg['role'] ?? 'user'),
                'content' => (string) ($msg['content'] ?? ''),
            ];
        }

        $payload = [
            'model' => $model,
            'messages' => $payloadMessages,
            'temperature' => $temperature,
            'max_tokens' => $maxTokens,
        ];

        $endpoint = "{$baseUrl}/chat/completions";

        $response = Http::timeout($timeout)
            ->retry($retries, 500, throw: false)
            ->withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Accept' => 'application/json',
            ])
            ->asJson()
            ->post($endpoint, $payload);

        if (! $response->successful()) {
            Log::error('Standard LLM API request failed', [
                'endpoint' => $endpoint,
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            throw new Exception('LLM Gateway Error ['.$response->status().']: '.$response->body());
        }

        $data = $response->json();
        $content = $data['choices'][0]['message']['content'] ?? '';
        $usage = $data['usage'] ?? [];

        return [
            'content' => trim((string) $content),
            'provider' => $this->getName(),
            'model' => $model,
            'usage' => [
                'prompt_tokens' => (int) ($usage['prompt_tokens'] ?? 0),
                'completion_tokens' => (int) ($usage['completion_tokens'] ?? 0),
                'total_tokens' => (int) ($usage['total_tokens'] ?? 0),
            ],
            'metadata' => [
                'finish_reason' => $data['choices'][0]['finish_reason'] ?? 'stop',
            ],
        ];
    }

    public function getName(): string
    {
        return 'llm';
    }
}
