<?php

namespace Tests\Feature;

use Database\Seeders\AiKnowledgeChunkSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeAssistantWidgetTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AiKnowledgeChunkSeeder::class);
    }

    public function test_homepage_renders_ai_assistant_widget_and_assets(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="dkreasi-ai"', false);
        $response->assertSee('id="dkreasi-ai-launcher"', false);
        $response->assertSee('id="dkreasi-ai-panel"', false);
        $response->assertSee('css/home-ai-assistant.css');
        $response->assertSee('js/home-ai-assistant.js');
        $response->assertSee('D-KREASI Assistant');
    }

    public function test_homepage_ai_chat_returns_handoff_for_support_inquiry(): void
    {
        config(['ai.support.whatsapp_number' => '6281234567890']);

        $response = $this->postJson('/api/ai/chat', [
            'layer' => 'l1',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'Bisa minta nomor kontak WhatsApp CS admin?',
                ],
            ],
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('routing.action', 'handoff')
            ->assertJsonPath('routing.intent', 'customer_support');

        $this->assertStringContainsString('wa.me/6281234567890', $response->json('routing.target_url'));
    }

    public function test_homepage_ai_chat_returns_navigation_for_invitation_inquiry(): void
    {
        $response = $this->postJson('/api/ai/chat', [
            'layer' => 'l1',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'Saya mau buat undangan pernikahan online untuk bulan depan',
                ],
            ],
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('routing.action', 'navigate')
            ->assertJsonPath('routing.intent', 'need_invitation')
            ->assertJsonPath('routing.target_url', '/undangan');
    }
}
