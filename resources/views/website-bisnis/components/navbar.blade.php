<header class="webia-header">
    <nav class="webia-navbar" aria-label="Navigasi utama">
        <a href="{{ route('webia.index') }}" class="webia-brand" aria-label="WEBIA — Beranda">

            <span class="webia-brand-mark">W</span>

            <span class="webia-brand-text">
                <strong>WEBIA</strong>
                <small>by D-KREASI</small>
            </span>
        </a>

        <button type="button" class="webia-menu-toggle" aria-label="Buka menu navigasi" aria-expanded="false"
            aria-controls="webia-navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

<div class="webia-navigation" id="webia-navigation">

    <a href="{{ route('webia.index') }}">
        Beranda
    </a>

    <a href="{{ route('webia.index') }}#kategori-website">
        Kategori
    </a>

    <a href="{{ route('webia.index') }}#koleksi-template">
        Galeri Template
    </a>

    <a href="{{ route('webia.index') }}#keunggulan-website">
        Keunggulan
    </a>

    <a href="{{ route('webia.index') }}#paket-website">
        Paket Website
    </a>

    <a href="{{ route('webia.index') }}#faq-website">
        FAQ
    </a>

    <a href="{{ route('webia.index') }}#konsultasi-website"
       class="webia-nav-cta">
        Konsultasi
    </a>

    <a href="{{ url('/') }}" class="webia-homebase-link">
        ← D-KREASI
    </a>

</div>

    </nav>
</header>
