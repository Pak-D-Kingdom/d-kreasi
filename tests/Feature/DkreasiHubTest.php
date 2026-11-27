<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class DkreasiHubTest extends TestCase
{
    public function test_home_uses_configured_service_urls_and_ai_widget(): void
    {
        Config::set('services.ai_engine.url', 'https://ai.test');
        Config::set('services.dkarsa.url', 'https://dkarsa.test');
        Config::set('services.webia.url', 'https://webia.test');

        $this->get('/')
            ->assertOk()
            ->assertSee('src="https://ai.test/widget/widget.js"', false)
            ->assertSee('https://dkarsa.test/buat-undangan', false)
            ->assertSee('https://webia.test', false)
            ->assertDontSee('http://localhost:8001/widget/widget.js', false)
            ->assertDontSee('id="dkreasi-ai"', false)
            ->assertDontSee('css/home-ai-assistant.css', false)
            ->assertDontSee('js/home-ai-assistant.js', false);
    }

    public function test_local_ai_chat_endpoint_is_not_exposed(): void
    {
        $this->postJson('/api/ai/chat', [])->assertNotFound();
    }

    public function test_status_and_not_found_pages_are_available(): void
    {
        $this->get('/status')
            ->assertOk()
            ->assertSee("Akses layanan D-KREASI");

        $this->get('/halaman-yang-tidak-ada')
            ->assertNotFound()
            ->assertSee('Halaman tidak ditemukan');
    }
}
