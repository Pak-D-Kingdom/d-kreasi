@extends('website-bisnis.layouts.app')

@section('title', 'Website Bisnis — D-KREASI')
@section('meta_description',
    'Temukan paket pembuatan website bisnis dari D-KREASI. Website responsif, AI Chatbot, SEO,
    dan solusi digital sesuai kebutuhan bisnis Anda.')

@section('content')

    {{-- HERO WEBSITE BISNIS --}}
    <section class="website-hero" id="website-beranda">
        <div class="website-hero-decoration website-decoration-one"></div>
        <div class="website-hero-decoration website-decoration-two"></div>

        <div class="website-hero-inner">
            <div class="website-hero-copy">
                <span class="website-eyebrow">
                    ✦ DIGITAL SOLUTIONS FOR YOUR BUSINESS
                </span>

                <h1>
                    Bisnismu Punya Cerita.
                    <span>Website Kami Bantu Wujudkan!</span>
                </h1>

                <p>
                    Bangun identitas digital yang profesional dengan website
                    sesuai kebutuhan bisnis, dilengkapi AI Chatbot dan pilihan
                    fitur yang fleksibel.
                </p>

                <div class="website-hero-actions">
                    <a href="#paket-website" class="website-button website-button-primary">
                        Lihat Paket <span>↗</span>
                    </a>

                    <a href="#keunggulan-website" class="website-button website-button-secondary">
                        Kenali Layanannya
                    </a>
                </div>

                <div class="website-hero-note">
                    <span>✦</span> Satu platform untuk berbagai kebutuhan bisnis.
                </div>
            </div>

            <div class="website-hero-visual">
                <div class="website-floating-chip chip-top">✦ Responsive Design</div>

                <div class="website-browser">
                    <div class="website-browser-bar">
                        <span></span><span></span><span></span>
                        <div>website-bisnis.id</div>
                    </div>

                    <div class="website-browser-content">
                        <div class="website-demo-nav">
                            <div class="website-demo-logo">BRAND<span>.</span></div>
                            <div class="website-demo-links">
                                <i></i><i></i><i></i>
                            </div>
                        </div>

                        <div class="website-demo-hero">
                            <span>YOUR BUSINESS, YOUR STORY</span>
                            <div class="website-demo-title"></div>
                            <div class="website-demo-title short"></div>
                            <div class="website-demo-description"></div>
                            <div class="website-demo-description short"></div>
                            <div class="website-demo-button"></div>
                        </div>

                        <div class="website-demo-cards">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <div class="website-floating-chip chip-bottom">
                    <span>✧</span> AI Chatbot Ready
                </div>

                <div class="website-orbit-star">✳</div>
            </div>
        </div>
    </section>



    {{-- KATEGORI WEBSITE --}}
    <section class="webia-discovery webia-categories" id="kategori-website">
        <div class="webia-discovery-heading">
            <span class="website-eyebrow">FIND YOUR BUSINESS STYLE</span>
            <h2>Mulai dari <span>Kategori Bisnismu.</span></h2>
            <p>Pilih bidang usaha, lalu temukan inspirasi website yang paling cocok dengan cerita brand-mu.</p>
        </div>
        
        <div class="webia-category-grid">
            {{-- 01. F&B --}}
            <a class="webia-category-card category-fnb" href="{{ route('webia.collections', ['category' => 'fnb']) }}">
                <span class="webia-category-symbol">☕</span>
                <span class="webia-category-count">01 · F&B</span>
                <strong>F&B</strong>
                <small>Restaurant, cafe, catering, bakery, food product</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 02. BEAUTY --}}
            <a class="webia-category-card category-beauty"
                href="{{ route('webia.collections', ['category' => 'beauty']) }}">
                <span class="webia-category-symbol">✿</span>
                <span class="webia-category-count">02 · BEAUTY</span>
                <strong>Beauty</strong>
                <small>Salon, barbershop, beauty clinic, skincare, makeup artist</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 03. AUTOMOTIVE --}}
            <a class="webia-category-card category-auto"
                href="{{ route('webia.collections', ['category' => 'automotive']) }}">
                <span class="webia-category-symbol">✦</span>
                <span class="webia-category-count">03 · AUTOMOTIVE</span>
                <strong>Automotive</strong>
                <small>Bengkel, car wash, dealer, body repair</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 04. COMPANY --}}
            <a class="webia-category-card category-company"
                href="{{ route('webia.collections', ['category' => 'company']) }}">
                <span class="webia-category-symbol">▧</span>
                <span class="webia-category-count">04 · COMPANY</span>
                <strong>Company</strong>
                <small>Company profile, contractor, distributor, manufacturer, agency</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 05. PROPERTY --}}
            <a class="webia-category-card category-property"
                href="{{ route('webia.collections', ['category' => 'property']) }}">
                <span class="webia-category-symbol">⌂</span>
                <span class="webia-category-count">05 · PROPERTY</span>
                <strong>Property</strong>
                <small>Developer, property agent, real estate, villa</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 06. EDUCATION --}}
            <a class="webia-category-card category-education"
                href="{{ route('webia.collections', ['category' => 'education']) }}">
                <span class="webia-category-symbol">✎</span>
                <span class="webia-category-count">06 · EDUCATION</span>
                <strong>Education</strong>
                <small>School, course, tutor, training, online course</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 07. PROFESSIONAL SERVICE --}}
            <a class="webia-category-card category-professional"
                href="{{ route('webia.collections', ['category' => 'professional-service']) }}">
                <span class="webia-category-symbol">◇</span>
                <span class="webia-category-count">07 · PROFESSIONAL SERVICE</span>
                <strong>Professional Service</strong>
                <small>Consultant, lawyer, accountant, freelancer</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 08. PERSONAL BRAND --}}
            <a class="webia-category-card category-personal"
                href="{{ route('webia.collections', ['category' => 'personal-brand']) }}">
                <span class="webia-category-symbol">✧</span>
                <span class="webia-category-count">08 · PERSONAL BRAND</span>
                <strong>Personal Brand</strong>
                <small>Creator, influencer, portfolio</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 09. RETAIL --}}
            <a class="webia-category-card category-retail"
                href="{{ route('webia.collections', ['category' => 'retail']) }}">
                <span class="webia-category-symbol">▣</span>
                <span class="webia-category-count">09 · RETAIL</span>
                <strong>Retail</strong>
                <small>Store, distributor, supplier</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 10. HEALTHCARE --}}
            <a class="webia-category-card category-healthcare"
                href="{{ route('webia.collections', ['category' => 'healthcare']) }}">
                <span class="webia-category-symbol">✚</span>
                <span class="webia-category-count">10 · HEALTHCARE</span>
                <strong>Healthcare</strong>
                <small>Clinic, pharmacy, medical practice</small>
                <span class="webia-category-arrow">↗</span>
            </a>
        </div>
        
        <div class="webia-discovery-footer">
            <span>Belum menemukan kategori yang pas? Masih banyak kemungkinan ✨</span>
            <a class="website-button website-button-secondary" href="{{ route('webia.collections') }}">Jelajahi Semua
                Kategori <span>↗</span></a>
        </div>
    </section>

    {{-- TEMPLATE PILIHAN --}}
    <section class="webia-discovery webia-featured-templates" id="koleksi-template">
        <div class="webia-discovery-heading webia-discovery-heading-row">
            <div>
                <span class="website-eyebrow">A LITTLE PREVIEW OF OUR UNIVERSE</span>
                <h2>Template yang Bikin <span>Brand Makin Bersinar.</span></h2>
                <p>Intip beberapa gaya desain. Temukan favoritmu di galeri koleksi WEBIA.</p>
            </div>
            <a class="webia-text-link" href="{{ route('webia.collections') }}">Lihat Koleksi Kami <span>↗</span></a>
        </div>
        <div class="webia-featured-grid">
            <article class="webia-template-card">
                <a class="webia-template-preview preview-cafe"
                    href="{{ route('webia.collections', ['category' => 'fnb']) }}" aria-label="Lihat template cafe">
                    <div class="webia-preview-browser"><i></i><i></i><i></i><span>littlecorner.cafe</span></div>
                    <div class="webia-preview-content"><small>YOUR DAILY HAPPY PLACE</small><b>Good coffee.<br>Good
                            mood.</b><span></span>
                        <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                    </div>
                    <span class="webia-preview-open">Explore ↗</span>
                </a>
                <div class="webia-template-meta"><span>FOOD & BEVERAGE</span>
                    <h3>Little Corner</h3>
                    <p>Warm, welcoming, and full of flavor.</p>
                </div>
            </article>
            <article class="webia-template-card">
                <a class="webia-template-preview preview-beauty"
                    href="{{ route('webia.collections', ['category' => 'beauty']) }}" aria-label="Lihat template beauty">
                    <div class="webia-preview-browser"><i></i><i></i><i></i><span>maison.beauty</span></div>
                    <div class="webia-preview-content"><small>YOUR BEAUTY RITUAL</small><b>Feel good<br>in your
                            skin.</b><span></span>
                        <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                    </div>
                    <span class="webia-preview-open">Explore ↗</span>
                </a>
                <div class="webia-template-meta"><span>BEAUTY & LIFESTYLE</span>
                    <h3>Maison Beauty</h3>
                    <p>Soft, elegant, and effortlessly modern.</p>
                </div>
            </article>
            <article class="webia-template-card">
                <a class="webia-template-preview preview-company"
                    href="{{ route('webia.collections', ['category' => 'company']) }}"
                    aria-label="Lihat template company">
                    <div class="webia-preview-browser"><i></i><i></i><i></i><span>northstar.co</span></div>
                    <div class="webia-preview-content"><small>BUILT FOR WHAT'S NEXT</small><b>Ideas
                            into<br>impact.</b><span></span>
                        <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                    </div>
                    <span class="webia-preview-open">Explore ↗</span>
                </a>
                <div class="webia-template-meta"><span>COMPANY & SERVICES</span>
                    <h3>Northstar Studio</h3>
                    <p>Confident, clean, and professional.</p>
                </div>
            </article>
        </div>
        <div class="webia-featured-bottom"><span>✦ Koleksi akan terus bertambah seiring berkembangnya semesta
                WEBIA.</span><a href="{{ route('webia.collections') }}">Lihat semua template <span>→</span></a></div>
    </section>














    {{-- KEUNGGULAN --}}
    <section class="website-benefits" id="keunggulan-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">WHY D-KREASI?</span>
            <h2>Lebih dari Sekadar <span>Website.</span></h2>
            <p>
                Solusi digital yang dirancang untuk membantu bisnis tampil
                profesional dan mempermudah pelanggan mengenal layanan Anda.
            </p>
        </div>

        <div class="website-benefit-grid">
            <article class="website-benefit-card benefit-purple">
                <div class="website-benefit-icon">✧</div>
                <h3>Desain Responsif</h3>
                <p>Tampilan menyesuaikan perangkat desktop, tablet, dan smartphone.</p>
            </article>

            <article class="website-benefit-card benefit-pink">
                <div class="website-benefit-icon">♡</div>
                <h3>AI Chatbot</h3>
                <p>Asisten virtual yang dirancang menjawab pertanyaan berdasarkan data bisnis.</p>
            </article>

            <article class="website-benefit-card benefit-blue">
                <div class="website-benefit-icon">↗</div>
                <h3>SEO</h3>
                <p>Pondasi optimasi mesin pencari sesuai cakupan paket yang dipilih.</p>
            </article>

            <article class="website-benefit-card benefit-green">
                <div class="website-benefit-icon">✳</div>
                <h3>Fleksibel</h3>
                <p>Pilih fitur dan modul sesuai kebutuhan serta perkembangan bisnis.</p>
            </article>
        </div>
    </section>

    {{-- ALUR PEMESANAN --}}
    <section class="website-process" id="alur-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">ALUR PEMESANAN</span>
            <h2>Dari Ide Menjadi <span>Website.</span></h2>
            <p>Proses pemesanan dirancang agar kebutuhan bisnis bisa dipetakan dengan jelas.</p>
        </div>

        <div class="website-process-grid">
            <article><span>01</span>
                <h3>Pilih Kategori</h3>
                <p>Tentukan jenis website sesuai kebutuhan bisnis.</p>
            </article>
            <article><span>02</span>
                <h3>Pilih Template</h3>
                <p>Temukan tampilan yang paling sesuai dengan identitas brand.</p>
            </article>
            <article><span>03</span>
                <h3>Pilih Paket</h3>
                <p>Tentukan paket dan modul yang dibutuhkan.</p>
            </article>
            <article><span>04</span>
                <h3>Isi Data Bisnis</h3>
                <p>Siapkan profil, layanan, kontak, dan informasi bisnis.</p>
            </article>
            <article><span>05</span>
                <h3>Konfigurasi AI</h3>
                <p>Siapkan sumber informasi untuk AI Chatbot bisnis.</p>
            </article>
            <article><span>06</span>
                <h3>Konfirmasi Order</h3>
                <p>Tim meninjau detail pesanan dan kebutuhan proyek.</p>
            </article>
        </div>
    </section>

    {{-- LIMA PAKET WEBSITE --}}
    <section class="website-packages" id="paket-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">FIND YOUR PERFECT PACKAGE</span>
            <h2>Pilih Paket, <span>Mulai Berkarya!</span></h2>
            <p>
                Dari landing page sederhana hingga website bisnis dengan dashboard.
                Temukan solusi yang paling sesuai dengan kebutuhan Anda.
            </p>
        </div>

        <div class="website-package-grid">

            {{-- PAKET 1 --}}
            <article class="website-package-card package-static">
                <div class="website-package-top">
                    <span class="website-package-number">01 / START HERE</span>
                    <div class="website-package-icon">◈</div>
                </div>

                <h3>Static</h3>
                <p class="website-package-description">
                    Untuk bisnis yang membutuhkan halaman informasi sederhana dan profesional.
                </p>

                <div class="website-price-label">Harga paket</div>
                <div class="website-price">Segera ditentukan</div>
                <div class="website-price-caption">Landing page statis</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Static <span>↗</span>
                </a>

                <div class="website-package-divider"></div>
                <h4>Yang kamu dapatkan:</h4>
                <ul>
                    <li>Landing page statis</li>
                    <li>Desain responsif</li>
                    <li>AI Chatbot</li>
                    <li>SEO dasar</li>
                    <li>Tombol WhatsApp</li>
                </ul>
            </article>


            {{-- PAKET 2 --}}
            <article class="website-package-card package-starter">
                <div class="website-package-top">
                    <span class="website-package-number">02 / GET STARTED</span>
                    <div class="website-package-icon">✦</div>
                </div>

                <h3>Starter</h3>
                <p class="website-package-description">
                    Untuk bisnis yang ingin memperkuat kehadiran digitalnya.
                </p>

                <div class="website-price-label">Harga paket</div>
                <div class="website-price">Segera ditentukan</div>
                <div class="website-price-caption">Landing page dengan fitur bisnis</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Starter <span>↗</span>
                </a>

                <div class="website-package-divider"></div>
                <h4>Yang kamu dapatkan:</h4>
                <ul>
                    <li>Landing page bisnis</li>
                    <li>AI Chatbot</li>
                    <li>SEO dasar dan metadata</li>
                    <li>CTA WhatsApp</li>
                    <li>Animasi ringan</li>
                </ul>
            </article>


            {{-- PAKET 3 --}}
            <article class="website-package-card package-business">
                <div class="website-package-ribbon">★ PILIHAN FAVORIT</div>

                <div class="website-package-top">
                    <span class="website-package-number">03 / GROW YOUR BRAND</span>
                    <div class="website-package-icon">✳</div>
                </div>

                <h3>Business</h3>
                <p class="website-package-description">
                    Untuk bisnis yang ingin tampil lebih lengkap dan meyakinkan.
                </p>

                <div class="website-price-label">Harga paket</div>
                <div class="website-price">Segera ditentukan</div>
                <div class="website-price-caption">Website multi-section</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Business <span>↗</span>
                </a>

                <div class="website-package-divider"></div>
                <h4>Yang kamu dapatkan:</h4>
                <ul>
                    <li>Website profil bisnis</li>
                    <li>AI Chatbot</li>
                    <li>SEO standar</li>
                    <li>Galeri produk atau portfolio</li>
                    <li>Formulir kontak</li>
                    <li>Integrasi WhatsApp</li>
                </ul>
            </article>


            {{-- PAKET 4 --}}
            <article class="website-package-card package-professional">
                <div class="website-package-top">
                    <span class="website-package-number">04 / LEVEL UP</span>
                    <div class="website-package-icon">▦</div>
                </div>

                <h3>Professional</h3>
                <p class="website-package-description">
                    Untuk bisnis yang memerlukan website dan pengelolaan konten.
                </p>

                <div class="website-price-label">Harga paket</div>
                <div class="website-price">Segera ditentukan</div>
                <div class="website-price-caption">Website + admin dashboard</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Professional <span>↗</span>
                </a>

                <div class="website-package-divider"></div>
                <h4>Yang kamu dapatkan:</h4>
                <ul>
                    <li>Website bisnis</li>
                    <li>Admin dashboard</li>
                    <li>AI Chatbot</li>
                    <li>SEO lebih lengkap</li>
                    <li>Pengelolaan konten sesuai modul</li>
                    <li>Integrasi sesuai cakupan paket</li>
                </ul>
            </article>


            {{-- PAKET 5 --}}
            <article class="website-package-card package-custom">
                <div class="website-package-top">
                    <span class="website-package-number">05 / BUILT FOR YOU</span>
                    <div class="website-package-icon">✺</div>
                </div>

                <h3>Custom</h3>
                <p class="website-package-description">
                    Untuk kebutuhan khusus dengan fitur dan modul yang fleksibel.
                </p>

                <div class="website-price-label">Harga paket</div>
                <div class="website-price">Konsultasi</div>
                <div class="website-price-caption">Disesuaikan kebutuhan bisnis</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Diskusikan Proyek <span>↗</span>
                </a>

                <div class="website-package-divider"></div>
                <h4>Yang kamu dapatkan:</h4>
                <ul>
                    <li>Fitur sesuai kebutuhan</li>
                    <li>AI Chatbot</li>
                    <li>SEO sesuai ruang lingkup</li>
                    <li>Integrasi API berdasarkan kesepakatan</li>
                    <li>Estimasi biaya dan waktu pengerjaan</li>
                </ul>
            </article>

        </div>

        <p class="website-package-note">
            Harga final mengikuti ruang lingkup, modul, dan kebutuhan proyek.
            Detail paket akan dikonfirmasi sebelum pemesanan.
        </p>
    </section>

    {{-- SEO DAN ADD-ON --}}
    <section class="website-addons" id="add-on-website">
        <div class="website-addons-inner">
            <div class="website-addons-copy">
                <span class="website-eyebrow">EXTRA POWER FOR YOUR WEBSITE</span>
                <h2>Butuh Lebih Banyak? <span>Tinggal Tambahkan!</span></h2>
                <p>
                    Kembangkan website sesuai kebutuhan melalui layanan tambahan.
                    Ketersediaan dan biaya mengikuti ruang lingkup proyek.
                </p>
            </div>

            <div class="website-addon-list">
                <article>
                    <span>01</span>
                    <div>
                        <h3>SEO Optimization</h3>
                        <p>Optimasi teknis dan konten sesuai ruang lingkup layanan.</p>
                    </div>
                    <b>+</b>
                </article>

                <article>
                    <span>02</span>
                    <div>
                        <h3>Admin Dashboard</h3>
                        <p>Kelola konten website melalui panel admin jika dibutuhkan.</p>
                    </div>
                    <b>+</b>
                </article>

                <article>
                    <span>03</span>
                    <div>
                        <h3>Custom Module</h3>
                        <p>Tambahkan fungsi khusus sesuai kebutuhan bisnis.</p>
                    </div>
                    <b>+</b>
                </article>

                <article>
                    <span>04</span>
                    <div>
                        <h3>Integrasi Tambahan</h3>
                        <p>Integrasi layanan eksternal sesuai kesepakatan proyek.</p>
                    </div>
                    <b>+</b>
                </article>
            </div>
        </div>
    </section>


    {{-- FAQ --}}
    <section class="website-faq" id="faq-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">GOT QUESTIONS?</span>
            <h2>Pertanyaan yang <span>Sering Ditanyakan.</span></h2>
        </div>

        <div class="website-faq-list">
            <details>
                <summary>Apakah semua paket mendapatkan AI Chatbot?</summary>
                <p>Ya, kelima paket dirancang mencakup AI Chatbot. Cakupan konfigurasi, integrasi, dan penggunaan mengikuti
                    detail paket yang disepakati.</p>
            </details>

            <details>
                <summary>Apa perbedaan paket Static dan Professional?</summary>
                <p>Static berfokus pada landing page statis. Professional dirancang untuk kebutuhan website dengan admin
                    dashboard dan pengelolaan konten sesuai modul.</p>
            </details>

            <details>
                <summary>Apakah saya bisa menambahkan fitur khusus?</summary>
                <p>Bisa. Fitur tambahan akan ditinjau berdasarkan kebutuhan, kelayakan teknis, biaya, dan ruang lingkup
                    pengerjaan.</p>
            </details>

            <details>
                <summary>Apakah website sudah termasuk SEO?</summary>
                <p>Setiap paket dirancang memiliki cakupan SEO yang berbeda. Detail optimasi akan disesuaikan dengan paket
                    dan kebutuhan proyek.</p>
            </details>

            <details>
                <summary>Bagaimana jika saya belum tahu paket yang cocok?</summary>
                <p>Anda dapat mendiskusikan kebutuhan bisnis terlebih dahulu agar pilihan paket, modul, dan estimasi
                    pengerjaan lebih sesuai.</p>
            </details>
        </div>
    </section>


    {{-- CTA --}}
    <section class="website-final-cta" id="konsultasi-website">
        <div class="website-final-cta-inner">
            <span class="website-eyebrow">LET'S BUILD SOMETHING GREAT</span>
            <h2>Siap Membawa Bisnismu <span>Ke Level Berikutnya?</span></h2>
            <p>
                Mulai dari ide sederhana hingga kebutuhan website yang lebih kompleks,
                D-KREASI siap membantu merencanakan solusi digitalmu.
            </p>
            <a href="#paket-website" class="website-button website-button-primary">
                Temukan Paketmu <span>↗</span>
            </a>
        </div>
    </section>

@endsection


@push('scripts')
    <script src="{{ asset('js/website-bisnis/website-bisnis.js') }}" defer></script>
@endpush
