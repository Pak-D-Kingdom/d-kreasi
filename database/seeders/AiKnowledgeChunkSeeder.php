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
                'content' => 'Undangan Digital D-KREASI adalah layanan pembuatan undangan online interaktif untuk berbagai acara seperti Pernikahan (wedding/akad/resepsi), Khitanan, Ulang Tahun, Anniversary, Aqiqah, Wisuda/Graduation, dan Acara Umum/Komunitas. Dilengkapi fitur RSVP interaktif, navigasi Google Maps, musik latar, gallery foto/video, countdown acara, dan tampilan elegan responsif di perangkat mobile.',
                'keywords' => ['undangan', 'nikah', 'wedding', 'khitan', 'wisuda', 'acara', 'rsvp', 'invitation', 'anniversary', 'aqiqah', 'ultah'],
                'priority' => 10,
            ],
            // L1 — Layanan Website Bisnis
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'service_overview',
                'title' => 'Layanan Website Bisnis WEBIA D-KREASI',
                'content' => 'Website Bisnis (WEBIA - Web Business & Intelligent Automation) adalah layanan pembuatan website profesional siap pakai untuk berbagai industri (F&B/restoran/cafe, salon/beauty, otomotif/bengkel, kontraktor/perusahaan, retail, klinik kesehatan, pendidikan, properti, hingga personal brand). Keunggulan utama: setiap website otomatis dilengkapi AI Chatbot bisnis cerdas dan struktur SEO siap indeks search engine.',
                'keywords' => ['website', 'bengkel', 'toko', 'resto', 'bisnis', 'umkm', 'company', 'web', 'jasa', 'salon', 'klinik', 'perusahaan', 'webia'],
                'priority' => 10,
            ],
            // L1 — Layanan Lainnya / Coming Soon
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'policy',
                'title' => 'Kebijakan Layanan Lainnya (Coming Soon)',
                'content' => 'Layanan lain di luar Undangan Digital dan Website Bisnis saat ini berstatus Coming Soon dan sedang dipersiapkan oleh tim kreator PakDe Group sebagai bagian dari ekspansi platform digital. PENTING: AI dilarang keras menjanjikan tanggal peluncuran, bulan rilis, atau ketersediaan pasti kepada customer. Jelaskan secara transparan bahwa layanan tersebut sedang dalam tahap persiapan kreatif.',
                'keywords' => ['coming', 'soon', 'layanan lain', 'jadwal rilis', 'kapan rilis', 'fitur baru'],
                'priority' => 8,
            ],
            // L1 — FAQ: Profil D-KREASI & PakDe Group
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'faq',
                'title' => 'Apa itu D-KREASI dan PakDe Group?',
                'content' => 'D-KREASI adalah platform kreatif digital resmi dari PakDe Group yang berfungsi sebagai homebase (pusat kreasi) berbagai layanan digital. D-KREASI membantu individu, UMKM, maupun korporasi memiliki produk digital profesional dengan cepat dan terjangkau melalui sistem template reusable berkualitas tinggi dan asisten AI terintegrasi.',
                'keywords' => ['pakde', 'group', 'dkreasi', 'profil', 'tentang', 'perusahaan', 'apa itu'],
                'priority' => 6,
            ],
            // L1 — FAQ: Konsep Homebase vs Website Jasa
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'faq',
                'title' => 'Apakah D-KREASI Menggantikan Website Jasa?',
                'content' => 'Tidak. D-KREASI bukan pengganti website jasa, melainkan bertindak sebagai portal utama (homebase). Setiap lini jasa (seperti Undangan Digital dan Website Bisnis) tetap memiliki website atau subdomain khusus dengan alur pemesanan, katalog template, dan asisten AI spesifik masing-masing.',
                'keywords' => ['homebase', 'portal', 'subdomain', 'alur', 'website jasa', 'konsep'],
                'priority' => 6,
            ],
            // L1 — FAQ: Target Pengguna / Siapa yang Cocok
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'faq',
                'title' => 'Siapa Saja yang Cocok Menggunakan D-KREASI?',
                'content' => 'D-KREASI dirancang untuk: 1) Pemilik usaha/UMKM yang butuh website bisnis profesional; 2) Perusahaan yang membutuhkan company profile modern; 3) Personal brand/kreator konten; 4) Calon pengantin atau keluarga yang membutuhkan undangan digital acara; 5) Penyelenggara event atau organisasi.',
                'keywords' => ['target', 'pengguna', 'siapa', 'cocok', 'klien', 'customer'],
                'priority' => 5,
            ],
            // L1 — FAQ: Alur Pemesanan di Platform
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'faq',
                'title' => 'Bagaimana Cara Memesan Layanan di D-KREASI?',
                'content' => 'Cara pemesanan sangat mudah: 1) Pilih layanan yang diinginkan di homepage D-KREASI (Undangan Digital atau Website Bisnis); 2) Jelajahi kategori dan pilih tema/template yang disukai; 3) Pilih paket layanan; 4) Lengkapi data acara atau informasi bisnis; 5) Review dan lakukan konfirmasi order. Tim PakDe Group akan segera memproses produk digital Anda.',
                'keywords' => ['cara order', 'alur pesan', 'pemesanan', 'langkah', 'tahapan'],
                'priority' => 7,
            ],
            // L1 — FAQ: Bantuan WhatsApp & Kontak CS
            [
                'layer' => 'l1',
                'tenant_id' => null,
                'category' => 'faq',
                'title' => 'Kontak Bantuan & Customer Support PakDe Group',
                'content' => 'Jika Anda memerlukan konsultasi khusus, penawaran custom di luar paket standar, atau ingin berdiskusi langsung dengan tim konsultan manusia, silakan hubungi Customer Service PakDe Group melalui tombol WhatsApp yang tersedia di platform kami.',
                'keywords' => ['kontak', 'whatsapp', 'bantuan', 'cs', 'customer service', 'support', 'hubungi'],
                'priority' => 7,
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
