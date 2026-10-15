<?php

namespace Tests\Feature;

use App\Services\AI\KnowledgeRetrievalService;
use App\Services\AI\PersonaManager;
use Database\Seeders\AiKnowledgeChunkSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeAssistantKnowledgeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AiKnowledgeChunkSeeder::class);
    }

    public function test_home_assistant_system_prompt_contains_identity_and_guardrails(): void
    {
        $personaManager = app(PersonaManager::class);
        $prompt = $personaManager->getSystemPrompt('l1');

        $this->assertStringContainsString('D-KREASI', $prompt);
        $this->assertStringContainsString('PakDe Group', $prompt);
        $this->assertStringContainsString('Undangan Digital', $prompt);
        $this->assertStringContainsString('Website Bisnis', $prompt);
        $this->assertStringContainsString('Coming Soon', $prompt);
        $this->assertStringContainsString('Dilarang keras menjanjikan tanggal peluncuran', $prompt);
    }

    public function test_knowledge_retrieval_retrieves_undangan_digital_for_event_queries(): void
    {
        $retrievalService = app(KnowledgeRetrievalService::class);
        $chunks = $retrievalService->retrieve('l1', 'bagaimana fitur undangan nikah online?');

        $this->assertNotEmpty($chunks);
        $titles = $chunks->pluck('title')->toArray();
        $this->assertContains('Layanan Undangan Digital D-KREASI', $titles);
    }

    public function test_knowledge_retrieval_retrieves_website_bisnis_for_business_queries(): void
    {
        $retrievalService = app(KnowledgeRetrievalService::class);
        $chunks = $retrievalService->retrieve('l1', 'saya mau buat web toko dan bengkel');

        $this->assertNotEmpty($chunks);
        $titles = $chunks->pluck('title')->toArray();
        $this->assertContains('Layanan Website Bisnis WEBIA D-KREASI', $titles);
    }

    public function test_knowledge_retrieval_retrieves_pakde_group_faq(): void
    {
        $retrievalService = app(KnowledgeRetrievalService::class);
        $chunks = $retrievalService->retrieve('l1', 'apa hubungan dkreasi dengan pakde group?');

        $this->assertNotEmpty($chunks);
        $titles = $chunks->pluck('title')->toArray();
        $this->assertContains('Apa itu D-KREASI dan PakDe Group?', $titles);
    }

    public function test_knowledge_retrieval_retrieves_coming_soon_policy(): void
    {
        $retrievalService = app(KnowledgeRetrievalService::class);
        $chunks = $retrievalService->retrieve('l1', 'kapan layanan baru coming soon rilis?');

        $this->assertNotEmpty($chunks);
        $titles = $chunks->pluck('title')->toArray();
        $this->assertContains('Kebijakan Layanan Lainnya (Coming Soon)', $titles);
    }

    public function test_api_chat_l1_answers_with_retrieved_knowledge(): void
    {
        $response = $this->postJson('/api/ai/chat', [
            'layer' => 'l1',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'Saya butuh undangan untuk acara pernikahan bulan depan',
                ],
            ],
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('layer', 'l1');

        $this->assertStringContainsString('Undangan Digital', $response->json('message.content'));
    }
}
