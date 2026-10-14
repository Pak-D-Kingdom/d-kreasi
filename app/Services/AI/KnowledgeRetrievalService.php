<?php

namespace App\Services\AI;

use App\Models\AiKnowledgeChunk;
use Illuminate\Support\Collection;

class KnowledgeRetrievalService
{
    /**
     * Retrieve relevant knowledge chunks for a given layer and query.
     *
     * @param  string  $layer  l1, l2, l3, or l4
     * @return Collection<int, AiKnowledgeChunk>
     */
    public function retrieve(string $layer, string $query, ?string $tenantId = null, int $limit = 5): Collection
    {
        $layer = strtolower($layer);

        // CORE-S2-04: Default Deny enforcement
        if ($layer === 'l4' && empty($tenantId)) {
            return collect();
        }

        // Fetch approved knowledge chunks within layer & tenant boundary
        $chunks = AiKnowledgeChunk::query()
            ->approved()
            ->forLayerAndTenant($layer, $tenantId)
            ->get();

        if ($chunks->isEmpty()) {
            return collect();
        }

        $queryTerms = $this->tokenize($query);

        // Score relevance based on keyword match, title match, and priority
        $scored = $chunks->map(function (AiKnowledgeChunk $chunk) use ($queryTerms) {
            $score = $this->calculateRelevanceScore($chunk, $queryTerms);

            return [
                'chunk' => $chunk,
                'score' => $score,
            ];
        })
            ->filter(fn (array $item) => $item['score'] > 0)
            ->sortByDesc('score')
            ->take($limit)
            ->pluck('chunk');

        return $scored;
    }

    /**
     * Format retrieved chunks into a system context string.
     *
     * @param  Collection<int, AiKnowledgeChunk>  $chunks
     */
    public function formatContextForPrompt(Collection $chunks): string
    {
        if ($chunks->isEmpty()) {
            return '';
        }

        $sections = [];
        foreach ($chunks as $chunk) {
            $sections[] = "### [{$chunk->category}] {$chunk->title}\n{$chunk->content}";
        }

        return "INFORMASI RESMI TERVERIFIKASI (Gunakan ini sebagai sumber utama jawaban):\n\n".implode("\n\n", $sections);
    }

    /**
     * Tokenize query string into searchable terms.
     *
     * @return array<int, string>
     */
    protected function tokenize(string $text): array
    {
        $cleaned = mb_strtolower(preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text) ?? '');
        $words = array_filter(explode(' ', $cleaned), fn ($w) => mb_strlen($w) >= 3);

        return array_values(array_unique($words));
    }

    /**
     * Calculate score between query tokens and knowledge chunk.
     *
     * @param  array<int, string>  $queryTerms
     */
    protected function calculateRelevanceScore(AiKnowledgeChunk $chunk, array $queryTerms): float
    {
        if (empty($queryTerms)) {
            return (float) ($chunk->priority);
        }

        $score = (float) ($chunk->priority);
        $titleLower = mb_strtolower($chunk->title);
        $contentLower = mb_strtolower($chunk->content);
        $keywords = array_map('mb_strtolower', $chunk->keywords ?? []);

        foreach ($queryTerms as $term) {
            // Title match
            if (str_contains($titleLower, $term)) {
                $score += 5.0;
            }

            // Explicit keywords match
            if (in_array($term, $keywords, true)) {
                $score += 4.0;
            }

            // Body content match
            if (str_contains($contentLower, $term)) {
                $score += 1.5;
            }
        }

        return $score;
    }
}
