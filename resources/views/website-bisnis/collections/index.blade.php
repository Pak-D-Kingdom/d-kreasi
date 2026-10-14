@extends('website-bisnis.layouts.app')

@section('title', 'Koleksi Template Website — WEBIA')
@section('meta_description',
    'Jelajahi koleksi template website WEBIA berdasarkan kategori bisnis dan temukan inspirasi
    desain yang sesuai.')

@section('content')
    <section class="webia-gallery-hero">
        <div class="webia-gallery-orb webia-gallery-orb-one"></div>
        <div class="webia-gallery-orb webia-gallery-orb-two"></div>
        <div class="webia-gallery-hero-inner">
            <a class="webia-gallery-back" href="{{ route('webia.index') }}">← Kembali ke WEBIA</a>
            <span class="website-eyebrow">THE WEBIA TEMPLATE UNIVERSE</span>
            <h1>Temukan Tampilan yang <span>Pas untuk Ceritamu.</span></h1>
            <p>Jelajahi inspirasi website berdasarkan kategori bisnis. Pilih gaya yang kamu suka, lalu konsultasikan
                kebutuhanmu bersama tim WEBIA.</p>
            <div class="webia-gallery-stats">
                <span><b>01</b> Pilih kategori</span><i>✦</i><span><b>02</b> Temukan inspirasi</span><i>✦</i><span><b>03</b>
                    Kembangkan bersama</span>
            </div>
        </div>
    </section>

    <section class="webia-gallery-section">
        <div class="webia-gallery-heading">
            <div>
                <span class="website-eyebrow">BROWSE THE COLLECTION</span>
                <h2>Galeri <span>Template WEBIA.</span></h2>
                <p>Gunakan filter atau pencarian untuk menemukan kategori yang kamu butuhkan.</p>
            </div>
            <a class="website-button website-button-secondary" href="{{ route('webia.index') }}#paket-website">Lihat Paket
                <span>↗</span></a>
        </div>

        <div class="webia-gallery-toolbar">
            <label class="webia-gallery-search">
                <span aria-hidden="true">⌕</span>
                <input id="webia-template-search" type="search" placeholder="Cari template atau kategori..."
                    aria-label="Cari template atau kategori">
            </label>
            <div class="webia-gallery-filters" role="group" aria-label="Filter kategori template">

                <button type="button" class="is-active" data-category="all" aria-pressed="true">
                    ✦ Semua
                </button>

                <button type="button" data-category="fnb" aria-pressed="false">
                    ☕ F&B
                </button>

                <button type="button" data-category="beauty" aria-pressed="false">
                    ✿ Beauty
                </button>

                <button type="button" data-category="automotive" aria-pressed="false">
                    ✦ Automotive
                </button>

                <button type="button" data-category="company" aria-pressed="false">
                    ▧ Company
                </button>

                <button type="button" data-category="property" aria-pressed="false">
                    ⌂ Property
                </button>

                <button type="button" data-category="education" aria-pressed="false">
                    ✎ Education
                </button>

                <button type="button" data-category="professional-service" aria-pressed="false">
                    ◇ Professional Service
                </button>

                <button type="button" data-category="personal-brand" aria-pressed="false">
                    ✧ Personal Brand
                </button>

                <button type="button" data-category="retail" aria-pressed="false">
                    ▣ Retail
                </button>

                <button type="button" data-category="healthcare" aria-pressed="false">
                    ✚ Healthcare
                </button>
            </div>
        </div>

        <div class="webia-gallery-resultline">
            <span id="webia-template-count">Menampilkan 12 inspirasi</span>
            <span>Template preview · Demo visual</span>
        </div>

        <div class="webia-gallery-grid" id="webia-gallery-grid">
            @php
                $templates = [
                    [
                        'name' => 'Little Corner',
                        'category' => 'fnb',
                        'label' => 'F&B',
                        'desc' => 'Website untuk restaurant, cafe, catering, bakery, dan food product.',
                        'style' => 'preview-cafe',
                        'eyebrow' => 'YOUR DAILY HAPPY PLACE',
                        'headline' => 'Good coffee.<br>Good mood.',
                        'tag' => 'F&B website',
                    ],
                    [
                        'name' => 'Maison Beauty',
                        'category' => 'beauty',
                        'label' => 'Beauty',
                        'desc' => 'Website salon, barbershop, beauty clinic, skincare, dan makeup artist.',
                        'style' => 'preview-beauty',
                        'eyebrow' => 'YOUR BEAUTY RITUAL',
                        'headline' => 'Feel good<br>in your skin.',
                        'tag' => 'Beauty website',
                    ],
                    [
                        'name' => 'Pitstop Garage',
                        'category' => 'automotive',
                        'label' => 'Automotive',
                        'desc' => 'Website bengkel, car wash, dealer, dan body repair.',
                        'style' => 'preview-auto',
                        'eyebrow' => 'DRIVE WITH CONFIDENCE',
                        'headline' => 'Built to<br>perform.',
                        'tag' => 'Automotive website',
                    ],
                    [
                        'name' => 'Northstar Studio',
                        'category' => 'company',
                        'label' => 'Company',
                        'desc' => 'Website company profile, contractor, distributor, manufacturer, dan agency.',
                        'style' => 'preview-company',
                        'eyebrow' => "BUILT FOR WHAT'S NEXT",
                        'headline' => 'Ideas into<br>impact.',
                        'tag' => 'Company profile',
                    ],
                    [
                        'name' => 'Casa Verde',
                        'category' => 'property',
                        'label' => 'Property',
                        'desc' => 'Website developer, property agent, real estate, dan villa.',
                        'style' => 'preview-property',
                        'eyebrow' => 'FIND YOUR NEXT HOME',
                        'headline' => 'A place to<br>belong.',
                        'tag' => 'Property website',
                    ],
                    [
                        'name' => 'BrightPath Academy',
                        'category' => 'education',
                        'label' => 'Education',
                        'desc' => 'Website sekolah, course, tutor, training, dan online course.',
                        'style' => 'preview-company',
                        'eyebrow' => 'LEARN WITHOUT LIMITS',
                        'headline' => 'Grow your<br>potential.',
                        'tag' => 'Education website',
                    ],
                    [
                        'name' => 'Nexa Consulting',
                        'category' => 'professional-service',
                        'label' => 'Professional Service',
                        'desc' => 'Website konsultan, lawyer, accountant, dan freelancer.',
                        'style' => 'preview-build',
                        'eyebrow' => 'EXPERTISE YOU CAN TRUST',
                        'headline' => 'Clarity for<br>every move.',
                        'tag' => 'Professional service',
                    ],
                    [
                        'name' => 'The Creator Room',
                        'category' => 'personal-brand',
                        'label' => 'Personal Brand',
                        'desc' => 'Website creator, influencer, dan portfolio personal.',
                        'style' => 'preview-creative',
                        'eyebrow' => 'MAKE YOUR MARK',
                        'headline' => 'Your story.<br>Your impact.',
                        'tag' => 'Personal branding',
                    ],
                    [
                        'name' => 'Urban Supply',
                        'category' => 'retail',
                        'label' => 'Retail',
                        'desc' => 'Website store, distributor, dan supplier.',
                        'style' => 'preview-bakery',
                        'eyebrow' => 'DISCOVER SOMETHING NEW',
                        'headline' => 'Your store,<br>online.',
                        'tag' => 'Retail website',
                    ],
                    [
                        'name' => 'Medika Care',
                        'category' => 'healthcare',
                        'label' => 'Healthcare',
                        'desc' => 'Website clinic, pharmacy, dan medical practice.',
                        'style' => 'preview-property',
                        'eyebrow' => 'CARE THAT MATTERS',
                        'headline' => 'Your health<br>comes first.',
                        'tag' => 'Healthcare website',
                    ],
                    [
                        'name' => 'Daily Crumb',
                        'category' => 'fnb',
                        'label' => 'F&B',
                        'desc' => 'Konsep website bakery atau catering yang playful.',
                        'style' => 'preview-bakery',
                        'eyebrow' => 'FRESH FROM OUR OVEN',
                        'headline' => 'Little treats.<br>Big smiles.',
                        'tag' => 'Bakery website',
                    ],
                    [
                        'name' => 'Glow Society',
                        'category' => 'beauty',
                        'label' => 'Beauty',
                        'desc' => 'Konsep website chic untuk salon, spa, atau skincare.',
                        'style' => 'preview-glow',
                        'eyebrow' => 'A LITTLE MORE GLOW',
                        'headline' => 'Your time<br>to shine.',
                        'tag' => 'Beauty studio',
                    ],
                ];
            @endphp
            @foreach ($templates as $template)
                <article class="webia-template-card webia-gallery-card" data-category="{{ $template['category'] }}"
                    data-search="{{ strtolower($template['name'] . ' ' . $template['label'] . ' ' . $template['desc']) }}">
                    <div class="webia-template-preview {{ $template['style'] }}">
                        <div class="webia-preview-browser">
                            <i></i><i></i><i></i><span>{{ strtolower(str_replace(' ', '', $template['name'])) }}.webia</span>
                        </div>
                        <div class="webia-preview-content">
                            <small>{{ $template['eyebrow'] }}</small>
                            <b>{!! $template['headline'] !!}</b>
                            <span></span>
                            <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                        </div>
                        <span class="webia-preview-open">Template Preview ✦</span>
                    </div>
                    <div class="webia-template-meta">
                        <span>{{ strtoupper($template['label']) }}</span>
                        <h3>{{ $template['name'] }}</h3>
                        <p>{{ $template['desc'] }}</p>
                        <div class="webia-gallery-card-bottom"><small>{{ $template['tag'] }}</small><a
                                href="{{ route('webia.index') }}#konsultasi-website"
                                aria-label="Konsultasikan template {{ $template['name'] }}">Konsultasi ↗</a></div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="webia-gallery-empty" id="webia-gallery-empty" hidden>
            <span>✧</span>
            <h3>Belum ada template yang cocok.</h3>
            <p>Coba kata kunci atau kategori lainnya, ya!</p>
            <button type="button" id="webia-gallery-reset">Tampilkan semua template</button>
        </div>

        <div class="webia-gallery-cta">
            <span class="website-eyebrow">YOUR BRAND, YOUR UNIVERSE</span>
            <h2>Belum menemukan yang <span>benar-benar kamu?</span></h2>
            <p>Jadikan inspirasi ini titik awal. Kita bisa diskusikan penyesuaian desain sesuai karakter dan kebutuhan
                bisnismu.</p>
            <a href="{{ route('webia.index') }}#konsultasi-website"
                class="website-button website-button-primary">Diskusikan Kebutuhanmu <span>↗</span></a>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/collections.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/website-bisnis/collections.js') }}" defer></script>
@endpush
