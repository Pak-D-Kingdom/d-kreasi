<?php

namespace Database\Seeders;

use App\Models\AiKnowledgeChunk;
use Illuminate\Database\Seeder;

class AiKnowledgeChunkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunks = [
            // L1 — Layanan Undangan Digital
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'service_overview',
                'title' => 'Layanan Undangan Digital D-KREASI',
                'content' => 'Undangan Digital D-KREASI adalah layanan pembuatan undangan online interaktif untuk berbagai acara seperti Pernikahan, Khitanan, Ulang Tahun, Wisuda, dan Event. Dilengkapi RSVP digital, peta navigasi Google Maps, musik latar, gallery foto, dan animasi modern.',
                'keywords' => ['undangan', 'nikah', 'wedding', 'khitan', 'wisuda', 'acara', 'rsvp', 'invitation'],
                'priority' => 10,
            ],
            // L1 — Layanan Website Bisnis
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'service_overview',
                'title' => 'Layanan Website Bisnis WEBIA D-KREASI',
                'content' => 'Website Bisnis (WEBIA) D-KREASI adalah layanan pembuatan website profesional untuk UMKM, bengkel, salon, restoran/cafe, klinik, retail, perusahaan, hingga personal brand. Setiap website otomatis dilengkapi AI Chatbot bisnis cerdas dan struktur SEO siap ranking.',
                'keywords' => ['website', 'bengkel', 'toko', 'resto', 'bisnis', 'umkm', 'company', 'web', 'jasa'],
                'priority' => 10,
            ],
            // L1 — Layanan Coming Soon
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'policy',
                'title' => 'Kebijakan Layanan Coming Soon',
                'content' => 'Layanan lain di luar Undangan Digital dan Website Bisnis saat ini berstatus Coming Soon dan sedang dipersiapkan oleh tim kreatif PakDe Group. Dilarang menjanjikan tanggal peluncuran pasti kepada customer.',
                'keywords' => ['coming', 'soon', 'layanan lain', 'jadwal rilis'],
                'priority' => 5,
            ],
            // L1 — Profil PakDe Group
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'faq',
                'title' => 'Tentang D-KREASI dan PakDe Group',
                'content' => 'D-KREASI adalah Digital Creative Platform resmi milik PakDe Group yang menjadi homebase solusi digital, mempercepat proses kreasi dengan template reusable berkualitas tinggi dan asisten AI terintegrasi.',
                'keywords' => ['pakde', 'group', 'dkreasi', 'profil', 'tentang'],
                'priority' => 5,
            ],
            // L3 — 5 Paket Website Bisnis
            [
                'layer' => 'l3',
                'tenant_id' => null,
                'category' => 'pricing_package',
                'title' => '5 Paket Website Bisnis (WEBIA)',
                'content' => "Paket Website Bisnis:\n1. STATIC: Landing page profil + AI Chatbot + Technical SEO dasar. Sangat cepat & ekonomis.\n2. STARTER: AI Landing Page + Basic SEO untuk promosi aktif.\n3. BUSINESS: Multi-page AI Business Website + Standard SEO + integrasi katalog produk/layanan.\n4. PROFESSIONAL: AI Website + Admin Dashboard mandiri + SEO lengkap.\n5. CUSTOM: Platform bisnis custom terintegrasi kebutuhan spesifik klien.",
                'keywords' => ['paket', 'static', 'starter', 'business', 'professional', 'custom', 'harga', 'tier'],
                'priority' => 10,
            ],
            // L3 — Modul Add-on
            [
                'layer' => 'l3',
                'tenant_id' => null,
                'category' => 'module_catalog',
                'title' => 'Modul Tambahan Website Bisnis',
                'content' => 'Modul opsional yang dapat ditambahkan sesuai kebutuhan: Modul Booking Reservasi (Salon, Bengkel, Klinik), Modul Admin Dashboard (update konten mandiri), Modul E-Commerce (katalog & checkout), Modul Member Area (kursus/komunitas), dan WhatsApp API Handoff.',
                'keywords' => ['modul', 'booking', 'admin', 'ecommerce', 'member', 'whatsapp', 'reservasi'],
                'priority' => 8,
            ],
            // L3 — Kebijakan SEO
            [
                'layer' => 'l3',
                'tenant_id' => null,
                'category' => 'policy',
                'title' => 'Kebijakan Edukasi SEO WEBIA',
                'content' => 'Semua website dioptimalkan dengan struktur SEO yang rapi dan cepat terindeks search engine. D-KREASI secara transparan TIDAK menjamin ranking #1 Google secara instan, melainkan membangun fondasi teknis dan kata kunci yang solid agar mudah ditemukan calon pelanggan lokal.',
                'keywords' => ['seo', 'google', 'ranking', 'pencarian', 'visibilitas'],
                'priority' => 9,
            ],
        ];

        foreach ($chunks as $chunk) {
            AiKnowledgeChunk::updateOrCreate(
                [
                    'layer' => $chunk['layer'],
                    'tenant_id' => $chunk['tenant_id'],
                    'title' => $chunk['title'],
                ],
                array_merge($chunk, [
                    'status' => 'approved',
                    'version' => 1,
                ])
            );
        }
    }
}
