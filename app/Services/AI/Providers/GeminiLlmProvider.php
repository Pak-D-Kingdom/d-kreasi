<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\LlmProviderInterface;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiLlmProvider implements LlmProviderInterface
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
        $apiKey = (string) ($this->config['api_key'] ?? '');
        if (empty($apiKey)) {
            throw new Exception('GEMINI_API_KEY is not configured.');
        }

        $model = (string) ($options['model'] ?? $this->config['model'] ?? 'gemini-1.5-flash');
        $baseUrl = rtrim((string) ($this->config['base_url'] ?? 'https://generativelanguage.googleapis.com/v1beta'), '/');
        $timeout = (int) ($this->config['timeout'] ?? 30);
        $temperature = (float) ($options['temperature'] ?? 0.7);

        $url = "{$baseUrl}/models/{$model}:generateContent?key={$apiKey}";

        // Format contents and extract system prompt
        $contents = [];
        $systemInstruction = null;

        if (! empty($options['system_prompt'])) {
            $systemInstruction = [
                'parts' => [
                    ['text' => (string) $options['system_prompt']],
                ],
            ];
        }

        foreach ($messages as $msg) {
            $role = ($msg['role'] ?? '') === 'assistant' ? 'model' : 'user';

            if (($msg['role'] ?? '') === 'system' && ! $systemInstruction) {
                $systemInstruction = [
                    'parts' => [
                        ['text' => (string) ($msg['content'] ?? '')],
                    ],
                ];

                continue;
            }

            $contents[] = [
                'role' => $role,
                'parts' => [
                    ['text' => (string) ($msg['content'] ?? '')],
                ],
            ];
        }

        $payload = [
            'contents' => $contents,
            'generationConfig' => [
                'temperature' => $temperature,
            ],
        ];

        if ($systemInstruction) {
            $payload['system_instruction'] = $systemInstruction;
        }

        $response = Http::timeout($timeout)
            ->acceptJson()
            ->asJson()
            ->post($url, $payload);

        if (! $response->successful()) {
            Log::error('Gemini API call failed', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            throw new Exception('Gemini API error: '.$response->body());
        }

        $data = $response->json();
        $responseText = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
        $usage = $data['usageMetadata'] ?? [];

        return [
            'content' => trim((string) $responseText),
            'provider' => $this->getName(),
            'model' => $model,
            'usage' => [
                'prompt_tokens' => $usage['promptTokenCount'] ?? 0,
                'completion_tokens' => $usage['candidatesTokenCount'] ?? 0,
                'total_tokens' => $usage['totalTokenCount'] ?? 0,
            ],
            'metadata' => [
                'finish_reason' => $data['candidates'][0]['finishReason'] ?? 'STOP',
            ],
        ];
    }

    public function getName(): string
    {
        return 'gemini';
    }
}
