<footer class="webia-footer">
    <div class="webia-footer-container">

        <div class="webia-footer-main">
            <a href="{{ route('webia.index') }}" class="webia-footer-brand">
                <span class="webia-brand-mark">W</span>
                <span>
                    <strong>WEBIA</strong>
                    <small>by D-KREASI</small>
                </span>
            </a>

            <p class="webia-footer-description">
                Solusi pembuatan website bisnis untuk membantu brand,
                UMKM, dan perusahaan membangun kehadiran digital.
            </p>
        </div>

        <div class="webia-footer-links">
            <h3>Layanan</h3>
            <a href="{{ route('webia.index') }}#paket-website">
                Paket Website
            </a>
            <a href="{{ route('webia.index') }}#keunggulan-website">
                Keunggulan
            </a>
            <a href="{{ route('webia.index') }}#faq-website">
                Pertanyaan Umum
            </a>
            <a href="{{ route('webia.index') }}#kategori-website">
                Kategori Bisnis
            </a>

            <a href="{{ route('webia.index') }}#koleksi-template">
                Galeri Template
            </a>
             <a href="{{ url('/') }}">
                Jelajahi D-KREASI Homebase ↗
            </a>
        </div>

        <div class="webia-footer-links">
            <h3>Informasi</h3>
            <a href="{{ route('webia.index') }}#konsultasi-website">
                Konsultasi
            </a>
            <a href="{{ url('/') }}">
                D-KREASI Homebase
            </a>
        </div>

    </div>

    <div class="webia-footer-bottom">
        <p>
            &copy; {{ date('Y') }} WEBIA by D-KREASI.
            Seluruh hak cipta dilindungi.
        </p>
    </div>
</footer>
