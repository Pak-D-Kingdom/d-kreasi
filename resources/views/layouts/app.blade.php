
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0C3685">

    <title>@yield('title', 'D-KREASI — Digital Creative Platform')</title>
    <meta name="description"
        content="@yield('meta_description', 'D-KREASI — Digital Creative Platform by PakDe Group.')">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="D-KREASI">
    <meta property="og:title" content="@yield('og_title', 'D-KREASI — Digital Creative Platform')">
    <meta property="og:description" content="@yield('meta_description', 'D-KREASI — Digital Creative Platform by PakDe Group.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-dkreasi.png') }}">
    <meta property="og:image:alt" content="D-KREASI — Ide Jadi Karya">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'D-KREASI — Digital Creative Platform')">
    <meta name="twitter:description" content="@yield('meta_description', 'D-KREASI — Digital Creative Platform by PakDe Group.')">
    <meta name="twitter:image" content="{{ asset('images/og-dkreasi.png') }}">

    <link rel="stylesheet" href="{{ asset('css/d-kreasi.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    @stack('styles')
</head>
<body>
    @include('components.announcement')
    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')

    <script
        src="{{ rtrim(config('services.ai_engine.url'), '/') }}/widget/widget.js"
        data-site-key="site_dkreasi_public"
        data-layer="l1"
        defer
    ></script>
</body>
</html>
