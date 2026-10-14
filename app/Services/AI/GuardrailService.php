<?php

namespace App\Services\AI;

class GuardrailService
{
    /**
     * Patterns commonly used for prompt injection, jailbreaking, or attempting to leak system prompts.
     *
     * @var array<int, string>
     */
    protected array $injectionPatterns = [
        'ignore previous instructions',
        'ignore all previous',
        'bypass instructions',
        'show system prompt',
        'print system prompt',
        'tampilkan system prompt',
        'bocorkan prompt',
        'abaikan instruksi sebelumnya',
        'forget rules',
        'jailbreak',
        'dan mode',
        'developer mode on',
        'override instructions',
    ];

    /**
     * Validate user input against prompt injection and security risks.
     *
     * @return array{safe: bool, reason: ?string, sanitized: string}
     */
    public function inspectInput(string $userInput): array
    {
        $normalized = mb_strtolower($userInput);

        foreach ($this->injectionPatterns as $pattern) {
            if (str_contains($normalized, $pattern)) {
                return [
                    'safe' => false,
                    'reason' => 'Permintaan terdeteksi melanggar kebijakan keamanan sistem (prompt injection attempt).',
                    'sanitized' => $userInput,
                ];
            }
        }

        return [
            'safe' => true,
            'reason' => null,
            'sanitized' => trim($userInput),
        ];
    }

    /**
     * Inspect and sanitize output before delivering to user (CORE-S3-02).
     *
     * @param  string  $layer  l1, l2, l3, l4
     */
    public function inspectOutput(string $layer, string $output): string
    {
        // Enforce anti-false SEO promise guardrail for L3
        if ($layer === 'l3') {
            $output = preg_replace(
                '/(dijamin|pasti|menjamin)\s+(masuk|dapat|ada di)?\s*ranking\s*(#?1|satu|pertama)\s*(di)?\s*google/ui',
                'membantu meningkatkan visibilitas website di mesin pencari Google',
                $output
            ) ?? $output;
        }

        return $output;
    }
}
