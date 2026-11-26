 <!DOCTYPE html>
 <html lang="id">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>@yield('title', 'WEBIA — Solusi Website Bisnis')</title>

     <meta name="description" content="@yield('meta_description', 'WEBIA, layanan pembuatan website bisnis dari D-KREASI.')">

     <meta name="theme-color" content="#123B82">

     <link rel="stylesheet" href="{{ asset('css/website-bisnis/website-bisnis.css') }}">

     @stack('styles')
 </head>

 <body class="webia-body">

     @include('website-bisnis.components.navbar')

     <main id="main-content">
         @yield('content')
     </main>

     @include('website-bisnis.components.footer')

     @stack('scripts')

     @include('website-bisnis.components.portal-dkreasi')
     <script
         src="{{ rtrim(config('services.ai_engine.url'), '/') }}/widget/widget.js"
         data-site-key="site_webia_public"
         data-layer="l3"
         defer
     ></script>
 </body>

 </html>
