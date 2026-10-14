<!DOCTYPE html>

@extends('layouts.app')

@section('title', 'D-KREASI — Digital Creative Platform')

@section('content')


    <section class="hero" id="beranda">
        <div class="hero-orb orb-purple"></div>
        <div class="hero-orb orb-cyan"></div>
        <div class="hero-orb orb-pink"></div>

        <div class="hero-decoration deco-star">✦</div>
        <div class="hero-decoration deco-sparkle">✧</div>
        <div class="hero-decoration deco-heart">♥</div>
        <div class="hero-decoration deco-smile">✺</div>

        <div class="floating-note note-creative">
            <span>✦</span> Made with creativity
        </div>

        <div class="floating-note note-genz">
            <span>✿</span> Your idea, our creation
        </div>

        <div class="hero-ring ring-one"></div>
        <div class="hero-ring ring-two"></div>


        <!-- Extra D-KREASI creative decorations -->
        <div class="creative-sticker sticker-idea" aria-hidden="true">
            <span>✦</span>
            IDEA<br>INSIDE!
        </div>

        <div class="creative-sticker sticker-color" aria-hidden="true">
            <span>✿</span>
            Stay<br>Creative
        </div>

        <div class="creative-doodle doodle-left" aria-hidden="true">〰</div>
        <div class="creative-doodle doodle-right" aria-hidden="true">✳</div>

        <div class="creative-palette" aria-hidden="true">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i>✦</i>
        </div>

        <div class="creative-caption" aria-hidden="true">
            <span class="caption-dot"></span>
            IDEAS → DESIGN → DIGITAL
        </div>



        <div class="hero-inner">
            <div class="eyebrow">
                <span class="live-dot"></span>
                Digital Creative Platform by PakDe Group
            </div>

            <h1>
                Kreasi Digital untuk<br>
                <span class="gradient-text">Berbagai Kebutuhan Anda.</span>
            </h1>

            <p class="hero-description">
                Eksplorasi berbagai solusi digital hasil kreasi kreator
                PakDe Group untuk kebutuhan personal, bisnis, dan brand Anda.
            </p>





            <div class="hero-buttons">
                <a href="#layanan" class="button button-gradient">
                    Pilih Layanan Kami <span>→</span>
                </a>
                <button class="button button-outline" data-ai>
                    <span class="purple-text">✦</span> Tanya AI Assistant
                </button>
            </div>

            <div class="stats">
                <div class="stat stat-cyan">
                    <strong>02+</strong>
                    <span>Layanan Digital</span>
                </div>
                <div class="stat stat-purple">
                    <strong>100%</strong>
                    <span>Kreatif &amp; Modern</span>
                </div>
                <div class="stat stat-pink">
                    <strong>AI</strong>
                    <span>Assisted Experience</span>
                </div>
                <div class="stat stat-lime">
                    <strong>∞</strong>
                    <span>Potensi Kreasi</span>
                </div>
            </div>
        </div>
    </section>



    <section class="section services" id="layanan">
        <div class="section-heading">
            <span class="section-label cyan-text">LAYANAN UTAMA KAMI</span>
            <h2>Solusi Digital Serba Praktis</h2>
            <p>Pilih layanan digital yang sesuai dengan kebutuhan Anda.</p>
        </div>

        <div class="service-grid">
            <article class="service-card invitation">
                <div class="service-top">
                    <span class="service-icon">♡</span>
                    <span class="service-index">01</span>
                </div>
                <span class="pill pill-purple">PERSONAL EVENT</span>
                <h3>Undangan Digital</h3>
                <p>
                    Buat momen spesialmu menjadi lebih berkesan dengan
                    undangan digital yang modern, elegan, dan mudah dibagikan.
                </p>
                <div class="card-divider"></div>
                <h4>KATEGORI &amp; FITUR</h4>
                <ul class="feature-list">
                    <li>AI Chatbot untuk membantu menjawab pertanyaan tamu</li>
                    <li>Kategori Pernikahan, Khitan, Ulang Tahun, dan lainnya</li>
                    <li>Informasi acara dan detail tamu</li>
                    <li>Galeri foto dan musik</li>
                    <li>Desain responsif untuk perangkat mobile</li>
                </ul>
                <div class="service-bottom">
                    <span>Jelajahi layanan</span>
                    <a href="{{ rtrim(config('app.url'), '/') }}/undangan" class="service-button">Pilih Undangan
                        →</a>
                </div>
            </article>

            <article class="service-card business">
                <div class="service-top">
                    <span class="service-icon">◎</span>
                    <span class="service-index">02</span>
                </div>
                <span class="pill pill-cyan">BUSINESS SOLUTION</span>
                <span class="pill pill-ai">AI CHATBOT INCLUDED</span>
                <h3>Website Bisnis</h3>
                <p>
                    Bangun kehadiran digital bisnis Anda dengan website
                    profesional yang sesuai kebutuhan dan karakter bisnis.
                </p>
                <div class="card-divider"></div>
                <h4>KEUNGGULAN WEBSITE</h4>
                <ul class="feature-list">
                    <li>AI Chatbot khusus berdasarkan data bisnis</li>
                    <li>Desain sesuai identitas bisnis</li>
                    <li>Tampilan responsif di berbagai perangkat</li>
                    <li>Struktur website yang ramah SEO</li>
                    <li>Opsi pengembangan sesuai kebutuhan bisnis</li>
                </ul>
                <div class="service-bottom">
                    <span>Jelajahi layanan</span>
                    <a href="{{ route('webia.index') }}" class="service-button">Pilih Website →</a>
                </div>
            </article>

            <article class="service-card coming">
                <div class="service-top">
                    <span class="service-icon">✧</span>
                    <span class="pill pill-muted">COMING SOON</span>
                </div>
                <span class="pill pill-lime">MORE CREATIVE</span>
                <h3>Layanan Kreatif Mendatang</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Berbagai kreasi digital lainnya sedang kami persiapkan.
                </p>
                <div class="card-divider"></div>
                <h4>EKSPLORASI IDE BARU</h4>
                <ul class="muted-list">
                    <li>Desain Logo &amp; Branding Kit</li>
                    <li>Konten Sosial Media</li>
                    <li>Solusi digital lainnya</li>
                </ul>
                <div class="service-bottom">
                    <span>✨ Segera hadir untuk Anda</span>
                    <span class="service-button disabled">Segera Diluncurkan</span>
                </div>
            </article>
        </div>
    </section>

    <section class="about-section" id="tentang">
        <div class="about-inner">
            <div class="about-copy">
                <span class="section-label purple-text">TENTANG D-KREASI</span>
                <h2>Kenapa Memilih<br>Platform <span class="gradient-text">D-KREASI?</span></h2>
                <p class="about-description">
                    Kami menghadirkan berbagai solusi digital yang praktis,
                    modern, dan dapat disesuaikan dengan kebutuhan Anda.
                    Mulai dari momen spesial hingga pengembangan bisnis.
                </p>

                <div class="benefit-grid">
                    <div class="benefit">
                        <span class="benefit-icon purple-bg">ϟ</span>
                        <div><b>Solusi Praktis</b>
                            <p>Proses yang terarah dan mudah dipahami.</p>
                        </div>
                    </div>
                    <div class="benefit">
                        <span class="benefit-icon cyan-bg">✧</span>
                        <div><b>Desain Modern</b>
                            <p>Tampilan menarik dan responsif.</p>
                        </div>
                    </div>
                    <div class="benefit">
                        <span class="benefit-icon lime-bg">✳</span>
                        <div><b>Ramah Bisnis</b>
                            <p>Solusi yang disesuaikan dengan kebutuhan.</p>
                        </div>
                    </div>
                    <div class="benefit">
                        <span class="benefit-icon pink-bg">♡</span>
                        <div><b>Dukungan Kreatif</b>
                            <p>Beragam ide dari kreator PakDe Group.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="process-window">
                <div class="window-header">
                    <div class="window-dots"><i></i><i></i><i></i></div>
                    <span>d-kreasi.com</span>
                </div>
                <div class="window-body">
                    <div class="process-step">
                        <span class="step-number purple-bg">1</span>
                        <div><b>Pilih Layanan</b><small>Tentukan kebutuhan digital Anda</small></div>
                        <span class="step-arrow">›</span>
                    </div>
                    <div class="process-step">
                        <span class="step-number cyan-bg">2</span>
                        <div><b>Sesuaikan Kebutuhan</b><small>Pilih desain dan fitur yang sesuai</small></div>
                        <span class="step-arrow">›</span>
                    </div>
                    <div class="process-step">
                        <span class="step-number lime-bg">3</span>
                        <div><b>Mulai Berkreasi</b><small>Lanjutkan proses pada layanan pilihan</small></div>
                        <span class="step-check">✓</span>
                    </div>
                </div>
                <div class="window-caption"><span>✦</span> Proses sederhana, solusi lebih terarah!</div>
            </div>
        </div>
    </section>

    <!-- D-KREASI Brand Marquee -->
    <div class="brand-marquee" aria-label="Identitas D-KREASI">
        <div class="brand-marquee-track">
            <span>✦ DIGITAL CREATIVITY</span>
            <span>♡ IDE JADI KARYA</span>
            <span>✳ CREATIVE SOLUTIONS</span>
            <span>✦ BY PAKDE GROUP</span>
            <span>♡ PERSONAL & BUSINESS</span>

            <span aria-hidden="true">✦ DIGITAL CREATIVITY</span>
            <span aria-hidden="true">♡ IDE JADI KARYA</span>
            <span aria-hidden="true">✳ CREATIVE SOLUTIONS</span>
            <span aria-hidden="true">✦ BY PAKDE GROUP</span>
            <span aria-hidden="true">♡ PERSONAL & BUSINESS</span>
        </div>
    </div>


    <!-- D-KREASI Brand Identity -->
    <section class="brand-story" id="identitas">
        <div class="brand-story-inner">
            <div class="brand-story-heading">
                <span class="section-label cyan-text">
                    MORE THAN A DIGITAL PLATFORM
                </span>

                <h2>
                    Berawal dari Ide,<br>
                    <span class="gradient-text">Menjadi Kreasi.</span>
                </h2>

                <p>
                    D-KREASI merupakan platform kreatif digital yang
                    menghadirkan layanan untuk kebutuhan personal dan bisnis,
                    sebagai bagian dari ekosistem PakDe Group.
                </p>
            </div>

            <div class="brand-story-grid">
                <article class="brand-story-card story-main">
                    <span class="story-icon">✳</span>
                    <span class="story-kicker">OUR IDENTITY</span>
                    <h3>Kenalan dengan D-KREASI</h3>
                    <p>
                        Ruang untuk mengeksplorasi kebutuhan digital melalui
                        layanan Undangan Digital dan Website Bisnis.
                    </p>
                    <span class="story-decoration">D.</span>
                </article>


                <article class="brand-story-card story-vision">
                    <span class="story-icon">✧</span>
                    <span class="story-kicker">OUR VISION</span>
                    <h3>Visi Kami</h3>
                    <p>
                        Menjadi platform kreatif digital yang inovatif dan terpercaya
                        dalam membantu individu, bisnis, dan brand mewujudkan ide menjadi
                        solusi digital yang menarik, praktis, dan berdampak.
                    </p>
                </article>



                <article class="brand-story-card story-mission">
                    <span class="story-icon">↗</span>
                    <span class="story-kicker">OUR MISSION</span>
                    <h3>Misi Kami</h3>
                    <ul class="brand-mission-list">
                        <li>Menghadirkan solusi kreatif sesuai kebutuhan.</li>
                        <li>Menggabungkan kreativitas dan teknologi.</li>
                        <li>Mempermudah proses berkreasi.</li>
                        <li>Mengembangkan layanan dan pemanfaatan AI.</li>
                        <li>Meningkatkan kualitas dan kepercayaan pengguna.</li>
                    </ul>
                </article>


                <article class="brand-story-card story-values">
                    <span class="story-icon">♡</span>
                    <span class="story-kicker">OUR VALUES</span>
                    <h3>Nilai yang Kami Bawa</h3>

                    <div class="story-tags">
                        <span>Creative</span>
                        <span>Innovative</span>
                        <span>User-Centered</span>
                        <span>Practical</span>
                        <span>Trustworthy</span>
                    </div>

                    <p class="story-note">
                        Nilai awal yang dapat disesuaikan dengan pedoman resmi brand.
                    </p>
                </article>

                {{-- <article class="brand-story-card story-team">
                    <span class="story-icon">✦</span>
                    <span class="story-kicker">OUR CREATIVE TEAM</span>
                    <h3>Di Balik Setiap Kreasi</h3>
                    <p>
                        Kenali tim di balik D-KREASI dan kontribusi mereka
                        dalam mengembangkan layanan digital.
                    </p>
                    <p class="story-placeholder">
                        [Tambahkan nama, foto, dan peran tim setelah datanya tersedia.]
                    </p>
                </article> --}}
            </div>

            <div class="brand-parent">
                <span class="parent-symbol">P</span>
                <div>
                    <span class="story-kicker">PART OF</span>
                    <h3>PakDe Group</h3>
                    <p>
                        D-KREASI hadir sebagai bagian dari PakDe Group.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="section portfolio" id="portfolio">
        <div class="section-heading">
            <span class="section-label purple-text">SHOWROOM &amp; PORTFOLIO</span>
            <h2>Hasil Karya Terbaru Kami</h2>
            <p>Intip contoh kreasi digital dan inspirasi desain dari D-KREASI.</p>
        </div>

        <div class="portfolio-filters" role="group" aria-label="Filter portfolio">
            <button class="filter-button active" data-filter="all">Semua Karya</button>
            <button class="filter-button" data-filter="invitation">Tema Undangan</button>
            <button class="filter-button" data-filter="business">Website Bisnis</button>
        </div>


        <div class="portfolio-grid">
            <article class="portfolio-card" data-category="invitation">
                <div class="portfolio-preview preview-purple preview-wedding">
                    <span class="portfolio-tag">NIKAH / WEDDING</span>
                    <div class="mini-invitation">
                        <span class="mini-kicker">THE WEDDING OF</span>
                        <span class="mini-monogram">A <i>&amp;</i> R</span>
                        <span class="mini-script">A Love Story</span>
                        <span class="mini-flower flower-left">✿</span>
                        <span class="mini-flower flower-right">✽</span>
                        <span class="mini-date">SAVE OUR DATE · 12.12.26</span>
                    </div>
                    <span class="preview-sticker sticker-wedding">forever ♡</span>
                </div>
                <div class="portfolio-info">
                    <h3>Rustic Elegance Theme</h3>
                    <p>Inspirasi undangan pernikahan dengan nuansa hangat dan elegan.</p>
                    <span class="portfolio-link">Contoh desain ↗</span>
                </div>
            </article>

            <article class="portfolio-card" data-category="business">
                <div class="portfolio-preview preview-blue preview-coffee">
                    <span class="portfolio-tag">UMKM / CAFE</span>
                    <div class="coffee-window">
                        <div class="coffee-nav">
                            <span class="coffee-logo">kopi<span>senja.</span></span>
                            <span class="coffee-menu">MENU&nbsp; ☰</span>
                        </div>
                        <div class="coffee-content">
                            <div class="coffee-copy">
                                <span class="coffee-eyebrow">YOUR DAILY COMFORT</span>
                                <span class="coffee-heading">A little<br>coffee, a lot<br>of
                                    <i>happiness.</i></span>
                                <span class="coffee-cta">EXPLORE MENU ↗</span>
                            </div>
                            <div class="coffee-art">
                                <div class="coffee-cup"><span>☕</span></div>
                                <span class="coffee-bean bean-one">●</span>
                                <span class="coffee-bean bean-two">●</span>
                                <span class="coffee-spark">✳</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-info">
                    <h3>Kopi Senja Coffee &amp; Eatery</h3>
                    <p>Inspirasi website untuk usaha makanan dan minuman.</p>
                    <span class="portfolio-link">Contoh desain ↗</span>
                </div>
            </article>

            <article class="portfolio-card" data-category="invitation">
                <div class="portfolio-preview preview-green preview-khitan">
                    <span class="portfolio-tag">KHITANAN</span>
                    <div class="khitan-art">
                        <span class="khitan-cloud cloud-one">☁</span>
                        <span class="khitan-cloud cloud-two">☁</span>
                        <span class="khitan-star star-one">✦</span>
                        <span class="khitan-star star-two">✧</span>
                        <div class="khitan-medal">
                            <span>✦</span>
                            <strong>KH</strong>
                            <small>HAPPY DAY</small>
                        </div>
                        <span class="khitan-ribbon">A Special Celebration!</span>
                        <span class="khitan-bottom">✿ &nbsp; ✦ &nbsp; ✿</span>
                    </div>
                </div>
                <div class="portfolio-info">
                    <h3>Syukuran Khitanan Cute</h3>
                    <p>Desain undangan ceria untuk acara keluarga.</p>
                    <span class="portfolio-link">Contoh desain ↗</span>
                </div>
            </article>

            <article class="portfolio-card" data-category="business">
                <div class="portfolio-preview preview-pink preview-beauty">
                    <span class="portfolio-tag">BEAUTY / BRAND</span>
                    <div class="beauty-window">
                        <div class="beauty-nav">
                            <span>glowskin<span>®</span></span>
                            <span>SKINCARE&nbsp; ✧</span>
                        </div>
                        <div class="beauty-content">
                            <div class="beauty-copy">
                                <span>YOUR SKIN, YOUR GLOW</span>
                                <strong>Glow<br>naturally.</strong>
                                <small>Discover your daily ritual</small>
                                <i>SHOP NOW ↗</i>
                            </div>
                            <div class="beauty-product">
                                <div class="beauty-bottle">
                                    <span>GLOW<br>SKIN</span>
                                </div>
                                <span class="beauty-orbit"></span>
                                <span class="beauty-flower">✿</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-info">
                    <h3>GlowSkin Official Web</h3>
                    <p>Inspirasi landing page untuk brand kecantikan.</p>
                    <span class="portfolio-link">Contoh desain ↗</span>
                </div>
            </article>

            <article class="portfolio-card" data-category="invitation">
                <div class="portfolio-preview preview-violet preview-birthday">
                    <span class="portfolio-tag">BIRTHDAY PARTY</span>
                    <div class="birthday-art">
                        <span class="birthday-topline">YOU'RE INVITED TO</span>
                        <span class="birthday-small">THE BIG</span>
                        <strong>17<span>th</span></strong>
                        <span class="birthday-party">BIRTHDAY PARTY!</span>
                        <span class="birthday-date">SATURDAY · 7 PM</span>
                        <span class="birthday-balloon balloon-pink">●</span>
                        <span class="birthday-balloon balloon-cyan">●</span>
                        <span class="birthday-balloon balloon-lime">●</span>
                        <span class="birthday-star">✦</span>
                    </div>
                </div>
                <div class="portfolio-info">
                    <h3>Sweet 17th Neon Party</h3>
                    <p>Konsep undangan ulang tahun dengan nuansa modern.</p>
                    <span class="portfolio-link">Contoh desain ↗</span>
                </div>
            </article>

            <article class="portfolio-card" data-category="business">
                <div class="portfolio-preview preview-slate preview-rental">
                    <span class="portfolio-tag">JASA RENTAL</span>
                    <div class="rental-window">
                        <div class="rental-nav">
                            <span>lens<span>rent.</span></span>
                            <span>CAMERAS&nbsp; · &nbsp;LENSES</span>
                        </div>
                        <div class="rental-content">
                            <div class="rental-copy">
                                <span>CAPTURE THE MOMENT</span>
                                <strong>Your next<br>story starts<br><i>here.</i></strong>
                                <small>Find your perfect gear.</small>
                                <b>EXPLORE GEAR ↗</b>
                            </div>
                            <div class="camera-art">
                                <div class="camera-strap"></div>
                                <div class="camera-body">
                                    <span class="camera-flash"></span>
                                    <span class="camera-lens"><i></i></span>
                                    <span class="camera-brand">L</span>
                                </div>
                                <span class="camera-spark">✦</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-info">
                    <h3>LensRent Studio Web</h3>
                    <p>Inspirasi website katalog jasa penyewaan kamera.</p>
                    <span class="portfolio-link">Contoh desain ↗</span>
                </div>
            </article>
        </div>
    </section>

    <section class="section faq-section" id="faq">
        <div class="section-heading">
            <span class="section-label cyan-text">ADA PERTANYAAN?</span>
            <h2>Sering Ditanyakan (FAQ)</h2>
            <p>Berikut beberapa jawaban singkat untuk pertanyaan umum.</p>
        </div>

        <div class="faq-list">
            <details class="faq-item">
                <summary>Apa saja layanan yang tersedia di D-KREASI?<span>⌄</span></summary>
                <p>Saat ini tersedia layanan Undangan Digital dan Website Bisnis. Layanan lain akan ditambahkan
                    secara bertahap.</p>
            </details>
            <details class="faq-item">
                <summary>Bagaimana cara memilih layanan yang sesuai?<span>⌄</span></summary>
                <p>Pilih kartu layanan untuk melihat informasi lebih lanjut. Kamu juga bisa menggunakan AI Assistant
                    saat integrasinya tersedia.</p>
            </details>
            <details class="faq-item">
                <summary>Apakah desain bisa disesuaikan dengan kebutuhan?<span>⌄</span></summary>
                <p>Detail penyesuaian akan mengikuti pilihan template, paket, dan fitur pada website layanan
                    masing-masing.</p>
            </details>
            <details class="faq-item">
                <summary>Bagaimana cara melanjutkan pemesanan?<span>⌄</span></summary>
                <p>Pilih layanan yang dibutuhkan, kemudian lanjutkan proses pada website layanan terkait.</p>
            </details>
        </div>
        <section class="cta-section">
            <div class="cta-glow"></div>
            <div class="cta-content">
                <span class="section-label purple-text">LET'S CREATE SOMETHING</span>
                <h2>Siap Memulai Kreasi Digitalmu?<br>Jadikan Lebih <span class="gradient-text">Menarik!</span></h2>
                <p>Temukan layanan yang sesuai dan mulai wujudkan ide digitalmu bersama D-KREASI.</p>
                <a href="#layanan" class="button button-gradient">Jelajahi Layanan <span>→</span></a>
            </div>
        </section>
    </section>

@endsection
@push('scripts')
    <script src="{{ asset('js/home.js') }}" defer></script>
@endpush
