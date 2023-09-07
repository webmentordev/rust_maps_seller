<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}

        <link rel="shortcut icon" href="{{ asset('assets/buy_rust_maps_favicon.png') }}" type="image/x-icon">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ asset('assets/buyrust_favicon.png') }}" type="image/x-icon">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-HFPCP46W7K"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', 'G-HFPCP46W7K');
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <x-navbar />
        <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-center bg-cover" style="background-image: url({{ asset('assets/ferry_terminal.jpg') }})">
            <div class="absolute top-0 left-0 h-full w-full bg-dark bg-opacity-90 backdrop-blur"></div>
            <div class="relative z-10">
                <a href="/">
                    <img src="{{ asset('assets/buy_rust_maps_logo.png') }}" width="80" alt="Buy Rust Maps logo">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 p-8 bg-dark rounded-lg shadow-md overflow-hidden sm:rounded-lg relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
