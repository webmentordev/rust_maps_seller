@extends('layouts.apps')
@section('content')
    <section class="h-[60vh] bg-center bg-cover relative bg-fixed" style="background-image: url({{ asset('assets/header.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-7xl text-white mb-3 leading-[60px] 430:text-4xl">Ultimate Destination for <br> <span class="text-4xl link 430:text-lg">Personalized Rust Maps</span></h1>
                {{-- <p class="text-white mb-3">Purchase Exquisite Custom-Built Maps Showcasing Newly Launched Monuments</p> --}}
                <a href="https://discord.gg/5XFteSutRK" target="_blank" rel="dofollow" class="link py-2 px-4 text-lg mr-2 text-gray-100 bg-rust inline-block">Discord</a>
                <a href="{{ route('maps.fetch') }}" class="link py-2 px-4 text-lg text-gray-100 bg-rust inline-block">Collection</a>
            </div>
        </div>
    </section>
    <x-listing />
    <x-sponsor />
@endsection