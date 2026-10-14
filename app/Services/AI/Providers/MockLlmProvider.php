<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\LlmProviderInterface;

class MockLlmProvider implements LlmProviderInterface
{
    /**
     * @param  array<string, mixed>  $config
     */
    public function __construct(protected array $config = []) {}

    /**
     * @param  array<int, array{role: string, content: string}>  $messages
     * @param  array<string, mixed>  $options
     * @return array{content: string, provider: string, model: string, usage: array<string, mixed>, metadata: array<string, mixed>}
     */
    public function chat(array $messages, array $options = []): array
    {
        $lastUserMessage = '';
        foreach (array_reverse($messages) as $msg) {
            if (($msg['role'] ?? '') === 'user') {
                $lastUserMessage = strtolower((string) ($msg['content'] ?? ''));
                break;
            }
        }

        $layer = (string) ($options['layer'] ?? 'l1');
        $reply = $this->determineMockReply($layer, $lastUserMessage);

        return [
            'content' => $reply,
            'provider' => $this->getName(),
            'model' => 'mock-model-v1',
            'usage' => [
                'prompt_tokens' => 50,
                'completion_tokens' => 40,
                'total_tokens' => 90,
            ],
            'metadata' => [
                'layer' => $layer,
                'timestamp' => now()->toISOString(),
            ],
        ];
    }

    protected function determineMockReply(string $layer, string $message): string
    {
        if (str_contains($message, 'undangan') || str_contains($message, 'nikah') || str_contains($message, 'wedding') || str_contains($message, 'acara')) {
            return 'Untuk kebutuhan undangan pernikahan atau acara spesial Anda, D-KREASI menyediakan layanan Undangan Digital interaktif dengan berbagai tema modern, RSVP, dan peta lokasi. Anda dapat mengeksplorasi tema undangan kami sekarang!';
        }

        if (str_contains($message, 'website') || str_contains($message, 'bengkel') || str_contains($message, 'toko') || str_contains($message, 'bisnis') || str_contains($message, 'usaha')) {
            return 'Untuk kebutuhan bisnis Anda, kami merekomendasikan layanan Website Bisnis (WEBIA). Setiap website dilengkapi dengan AI Chatbot bisnis dan optimasi SEO agar siap menjangkau pelanggan baru!';
        }

        if ($layer === 'l2') {
            return 'Halo! Saya asisten Undangan Digital D-KREASI. Apakah Anda ingin membuat undangan untuk pernikahan, khitanan, ulang tahun, atau acara lainnya?';
        }

        if ($layer === 'l3') {
            return 'Halo! Saya Sales AI Consultant WEBIA. Ceritakan tentang usaha Anda, dan saya akan merekomendasikan paket website bisnis serta modul yang paling efisien.';
        }

        return (string) ($this->config['default_response'] ?? 'Halo! Saya AI Assistant D-KREASI. Ada yang bisa saya bantu terkait Undangan Digital atau Website Bisnis?');
    }

    public function getName(): string
    {
        return 'mock';
    }
}
