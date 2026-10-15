<?php

namespace App\Services\AI\Routing;

class ServiceIntentRouter
{
    public const INTENT_WEBSITE = 'need_website';

    public const INTENT_INVITATION = 'need_invitation';

    public const INTENT_CLARIFICATION = 'need_clarification';

    public const INTENT_COMING_SOON = 'coming_soon';

    public const INTENT_SUPPORT = 'customer_support';

    /**
     * Keywords mapping to specific service intents.
     *
     * @var array<string, array<int, string>>
     */
    protected array $intentKeywords = [
        self::INTENT_INVITATION => [
            'undangan', 'nikah', 'pernikahan', 'wedding', 'akad', 'resepsi',
            'khitan', 'khitanan', 'sunat', 'ulang tahun', 'ultah', 'birthday',
            'anniversary', 'aqiqah', 'wisuda', 'graduation', 'selebrasi',
            'acara keluarga', 'undangan online', 'rsvp', 'tamu undangan',
        ],
        self::INTENT_WEBSITE => [
            'website', 'web', 'landing page', 'toko online', 'bengkel', 'restoran',
            'resto', 'cafe', 'kafe', 'salon', 'klinik', 'properti', 'kontraktor',
            'company profile', 'profil bisnis', 'bisnis', 'umkm', 'usaha', 'jualan',
            'katalog produk', 'seo', 'ecommerce', 'webia', 'perusahaan', 'agency',
        ],
        self::INTENT_COMING_SOON => [
            'coming soon', 'layanan lain', 'layanan baru', 'kapan rilis', 'aplikasi mobile',
            'aplikasi android', 'aplikasi ios', 'desain logo', 'video editing',
        ],
        self::INTENT_SUPPORT => [
            'whatsapp', 'wa', 'customer service', 'cs', 'hubungi admin', 'kontak admin',
            'chat admin', 'bicara manusia', 'kontak cs', 'telepon', 'keluhan', 'komplain',
        ],
    ];

    /**
     * Analyze user query and return structured routing decision.
     *
     * @param  array<string, mixed>  $context
     * @return array{
     *     intent: string,
     *     confidence: float,
     *     action: string,
     *     target_url: ?string,
     *     button_text: ?string,
     *     service_name: ?string,
     *     clarification_question: ?string
     * }
     */
    public function detectAndRoute(string $query, array $context = []): array
    {
        $normalized = mb_strtolower(trim($query));

        // 1. Calculate scores for each intent
        $scores = [
            self::INTENT_INVITATION => 0,
            self::INTENT_WEBSITE => 0,
            self::INTENT_COMING_SOON => 0,
            self::INTENT_SUPPORT => 0,
        ];

        foreach ($this->intentKeywords as $intent => $keywords) {
            foreach ($keywords as $kw) {
                if (str_contains($normalized, $kw)) {
                    $scores[$intent] += 1;
                }
            }
        }

        // Determine top scoring intent
        arsort($scores);
        $topIntent = array_key_first($scores);
        $topScore = $scores[$topIntent];

        // 2. High confidence match
        if ($topScore > 0) {
            return $this->buildRoutingPayload($topIntent, 0.95);
        }

        // 3. Ambiguous / Greeting / Unclear -> Require Clarification (L1-S2-02)
        return [
            'intent' => self::INTENT_CLARIFICATION,
            'confidence' => 0.5,
            'action' => 'clarify',
            'target_url' => null,
            'button_text' => null,
            'service_name' => null,
            'clarification_question' => 'Apakah Anda sedang membutuhkan Undangan Digital untuk acara spesial atau Website Bisnis untuk mengembangkan usaha Anda?',
        ];
    }

    /**
     * Build detailed action payload for frontend navigation.
     *
     * @return array{
     *     intent: string,
     *     confidence: float,
     *     action: string,
     *     target_url: ?string,
     *     button_text: ?string,
     *     service_name: ?string,
     *     clarification_question: ?string
     * }
     */
    protected function buildRoutingPayload(string $intent, float $confidence): array
    {
        return match ($intent) {
            self::INTENT_WEBSITE => [
                'intent' => self::INTENT_WEBSITE,
                'confidence' => $confidence,
                'action' => 'navigate',
                'target_url' => route('webia.index', [], false) ?: '/webia',
                'button_text' => 'Jelajahi Website Bisnis →',
                'service_name' => 'Website Bisnis (WEBIA)',
                'clarification_question' => null,
            ],
            self::INTENT_INVITATION => [
                'intent' => self::INTENT_INVITATION,
                'confidence' => $confidence,
                'action' => 'navigate',
                'target_url' => '/undangan',
                'button_text' => 'Konsultasi Undangan Digital →',
                'service_name' => 'Undangan Digital',
                'clarification_question' => null,
            ],
            self::INTENT_COMING_SOON => [
                'intent' => self::INTENT_COMING_SOON,
                'confidence' => $confidence,
                'action' => 'inform',
                'target_url' => null,
                'button_text' => null,
                'service_name' => 'Layanan Lainnya (Coming Soon)',
                'clarification_question' => null,
            ],
            self::INTENT_SUPPORT => [
                'intent' => self::INTENT_SUPPORT,
                'confidence' => $confidence,
                'action' => 'handoff',
                'target_url' => $this->getWhatsAppUrl(),
                'button_text' => 'Hubungi Customer Support WhatsApp →',
                'service_name' => 'Customer Support PakDe Group',
                'clarification_question' => null,
            ],
            default => [
                'intent' => self::INTENT_CLARIFICATION,
                'confidence' => 0.5,
                'action' => 'clarify',
                'target_url' => null,
                'button_text' => null,
                'service_name' => null,
                'clarification_question' => 'Apakah Anda membutuhkan Undangan Digital atau Website Bisnis?',
            ],
        };
    }

    /**
     * Get the configured WhatsApp handoff URL with an encoded message.
     */
    public function getWhatsAppUrl(?string $customMessage = null): string
    {
        $waNumber = preg_replace('/\D+/', '', (string) config('ai.support.whatsapp_number', '6281234567890'));
        $message = $customMessage ?? config('ai.support.whatsapp_default_message', 'Halo CS PakDe Group, saya ingin berkonsultasi mengenai layanan D-KREASI.');

        return 'https://wa.me/'.$waNumber.'?text='.rawurlencode($message);
    }
}
