 <!DOCTYPE html>
 <html lang="id">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>@yield('title', 'WEBIA — Solusi Website Bisnis')</title>

     <meta name="description" content="@yield('meta_description', 'WEBIA, layanan pembuatan website bisnis dari D-KREASI.')">

     <meta name="theme-color" content="#123B82">

     <link rel="stylesheet" href="{{ asset('css/website-bisnis/website-bisnis.css') }}">
     <link rel="stylesheet" href="{{ asset('css/website-bisnis/ai-assistant.css') }}">

     @stack('styles')
 </head>

 <body class="webia-body">

     @include('website-bisnis.components.navbar')

     <main id="main-content">
         @yield('content')
     </main>

     @include('website-bisnis.components.footer')

     @stack('scripts')

     <script src="{{ asset('js/website-bisnis/ai-assistant.js') }}" defer></script>

     @include('website-bisnis.components.ai-assistant')
     @include('website-bisnis.components.portal-dkreasi')
 </body>

 </html>
