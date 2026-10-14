<?php

namespace App\Services\AI\Contracts;

interface LlmProviderInterface
{
    /**
     * Send messages to LLM and get completion response.
     *
     * @param  array<int, array{role: string, content: string}>  $messages
     * @param  array<string, mixed>  $options
     * @return array{content: string, provider: string, model: string, usage: array<string, mixed>, metadata: array<string, mixed>}
     */
    public function chat(array $messages, array $options = []): array;

    /**
     * Get provider name.
     */
    public function getName(): string;
}
