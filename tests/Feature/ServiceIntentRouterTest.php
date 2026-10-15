<?php

namespace Tests\Feature;

use App\Services\AI\Routing\ServiceIntentRouter;
use Database\Seeders\AiKnowledgeChunkSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceIntentRouterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AiKnowledgeChunkSeeder::class);
    }

    public function test_detects_website_intent_for_workshop_query(): void
    {
        $router = app(ServiceIntentRouter::class);
        $decision = $router->detectAndRoute('Saya mau buat website untuk bengkel motor saya');

        $this->assertSame(ServiceIntentRouter::INTENT_WEBSITE, $decision['intent']);
        $this->assertSame('navigate', $decision['action']);
        $this->assertSame('/webia', $decision['target_url']);
        $this->assertSame('Jelajahi Website Bisnis →', $decision['button_text']);
        $this->assertNull($decision['clarification_question']);
    }

    public function test_detects_invitation_intent_for_wedding_query(): void
    {
        $router = app(ServiceIntentRouter::class);
        $decision = $router->detectAndRoute('Bisa bantu buat undangan pernikahan online?');

        $this->assertSame(ServiceIntentRouter::INTENT_INVITATION, $decision['intent']);
        $this->assertSame('navigate', $decision['action']);
        $this->assertSame('/undangan', $decision['target_url']);
        $this->assertStringContainsString('Undangan Digital', $decision['button_text']);
    }

    public function test_detects_coming_soon_intent_for_unreleased_services(): void
    {
        $router = app(ServiceIntentRouter::class);
        $decision = $router->detectAndRoute('Apakah ada jasa buat aplikasi mobile android atau video editing?');

        $this->assertSame(ServiceIntentRouter::INTENT_COMING_SOON, $decision['intent']);
        $this->assertSame('inform', $decision['action']);
        $this->assertNull($decision['target_url']);
    }

    public function test_detects_support_intent_for_whatsapp_request(): void
    {
        $router = app(ServiceIntentRouter::class);
        $decision = $router->detectAndRoute('Saya ingin bicara langsung dengan customer service via whatsapp');

        $this->assertSame(ServiceIntentRouter::INTENT_SUPPORT, $decision['intent']);
        $this->assertSame('handoff', $decision['action']);
        $this->assertStringContainsString('wa.me', $decision['target_url']);
    }

    public function test_detects_ambiguous_greeting_and_asks_single_clarification(): void
    {
        $router = app(ServiceIntentRouter::class);
        $decision = $router->detectAndRoute('Halo selamat siang, saya butuh informasi');

        $this->assertSame(ServiceIntentRouter::INTENT_CLARIFICATION, $decision['intent']);
        $this->assertSame('clarify', $decision['action']);
        $this->assertNotNull($decision['clarification_question']);
        $this->assertStringContainsString('Undangan Digital', $decision['clarification_question']);
        $this->assertStringContainsString('Website Bisnis', $decision['clarification_question']);
    }

    public function test_api_chat_returns_structured_routing_payload_for_l1(): void
    {
        $response = $this->postJson('/api/ai/chat', [
            'layer' => 'l1',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'Saya butuh landing page untuk resto kafe saya',
                ],
            ],
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('layer', 'l1')
            ->assertJsonStructure([
                'success',
                'layer',
                'message' => ['role', 'content'],
                'routing' => [
                    'intent',
                    'confidence',
                    'action',
                    'target_url',
                    'button_text',
                    'service_name',
                    'clarification_question',
                ],
                'meta',
            ])
            ->assertJsonPath('routing.intent', ServiceIntentRouter::INTENT_WEBSITE)
            ->assertJsonPath('routing.target_url', '/webia');
    }

    public function test_support_intent_respects_custom_configured_whatsapp_number(): void
    {
        config([
            'ai.support.whatsapp_number' => '6288899990000',
            'ai.support.whatsapp_default_message' => 'Halo Admin PakDe CS',
        ]);

        $router = app(ServiceIntentRouter::class);
        $decision = $router->detectAndRoute('Tolong hubungi customer service whatsapp');

        $this->assertSame(ServiceIntentRouter::INTENT_SUPPORT, $decision['intent']);
        $this->assertSame('handoff', $decision['action']);
        $this->assertStringContainsString('6288899990000', $decision['target_url']);
        $this->assertStringContainsString('Halo%20Admin%20PakDe%20CS', $decision['target_url']);
    }
}
