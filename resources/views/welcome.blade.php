@extends('layouts.apps')
@section('content')
    <section class="h-[60vh] bg-center bg-cover relative bg-fixed" style="background-image: url({{ asset('assets/header.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-7xl text-white mb-3 leading-[60px] 430:text-4xl">Ultimate Destination<br><span class="text-4xl link 430:text-lg">for Custom Rust Maps</span></h1>
                {{-- <p class="text-white mb-3">Purchase Exquisite Custom-Built Maps Showcasing Newly Launched Monuments</p> --}}
                <a href="https://discord.gg/5XFteSutRK" target="_blank" rel="dofollow" class="link py-2 px-4 text-lg mr-2 text-gray-100 bg-rust inline-block">Discord</a>
                <a href="{{ route('maps.fetch') }}" class="link py-2 px-4 text-lg text-gray-100 bg-rust inline-block">Collection</a>
            </div>
        </div>
    </section>
    <x-listing />
    <x-sponsor />
    
    <section class="w-full h-[700px] relative bg-center bg-cover bg-fixed" style="background-image: url({{ asset('assets/turret.webp') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-70 backdrop-blur-sm"></div>
        <div class="h-full w-full relative z-20 flex items-center justify-center">
            <div class="text-center">
                <h2 class="text-white text-3xl mb-3">Want to learn and play rust <br> without worring about getting killed?</h2>
                <img src="{{ asset('assets/rusty_text_logo.png') }}" class="max-w-lg m-auto" alt="RustyUrnaium logo">
                <a href="steam://connect/188.244.117.121:28015" class="py-3 text-white text-3xl px-5 link rounded-md bg-rust inline-block" target="_blank">Join 10x PVE</a>
            </div>
        </div>
    </section>
    
    <x-f-a-q />
@endsection