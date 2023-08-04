<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ asset('assets/buyrust_favicon.png') }}" type="image/x-icon">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-center bg-cover" style="background-image: url({{ asset('assets/ferry_terminal.jpg') }})">
            <div class="absolute top-0 left-0 h-full w-full bg-dark bg-opacity-90 backdrop-blur"></div>
            <div class="relative z-10">
                <a href="/">
                    <div class="bg-rust p-6 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M21.472 3.118A1 1 0 0 1 22 4v12a1 1 0 0 1-.445.832L16 20.535V6.131l4.445-2.963a1 1 0 0 1 1.027-.05zM14 6.131l-4-2.666v14.404l4 2.666V6.131zM8 17.87l-4.445 2.963A1 1 0 0 1 2 20V8a1 1 0 0 1 .445-.832L8 3.465v14.404z" fill="#1e2020"/></g></svg>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
