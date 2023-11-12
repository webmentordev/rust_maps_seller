@extends('layouts.apps')
@section('content')
    <section class="min-h-[600px] bg-center bg-cover relative bg-fixed flex items-center justify-center" style="background-image: url({{ asset('assets/header.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-7xl text-white mb-3 leading-[60px] 430:text-4xl">Buy Custom Rust Maps<br><span class="text-4xl link 430:text-lg">At Cheap Price Less than 4$</span></h1>
                {{-- <p class="text-white mb-3">Purchase Exquisite Custom-Built Maps Showcasing Newly Launched Monuments</p> --}}
                <a href="https://discord.gg/5XFteSutRK" target="_blank" rel="dofollow" class="link py-2 px-4 text-lg mr-2 text-gray-100 bg-rust inline-block">Discord</a>
                <a href="{{ route('maps.fetch') }}" class="link py-2 px-4 text-lg text-gray-100 bg-rust inline-block">Collection</a>
            </div>
        </div>
    </section>

    <x-listing />

    <section class="w-full">
        <div class="flex max-w-5xl m-auto py-[30px] rounded-lg px-4">
            <img src="{{ asset('assets/falt.webp') }}" class="rounded-lg w-full h-fit max-w-[500px]" title="FPS+ Flat Terrain Map" alt="FPS+ Flat Terrain">
            <div class="w-full p-6">
                <h2 class="text-4xl mb-3 text-white">What is FPS+ Rust Map?</h2>
                <p class="mb-4 text-gray-100">In the FPS+ Rust Map, the terrain is flat and smooth, with unnecessary prefabs removed and fewer rock formations. This improvement is designed to enhance server performance and player FPS. For additional details, please refer to the map description.</p>
                <p class="mb-4 text-gray-100">As visible in the image, there is no grass. We've utilized a special biome type to paint the terrain, resulting in shorter grass. This adjustment is aimed at enhancing player FPS in-game.</p>
                <p class="text-gray-100">We have removed large mountains and cliffs, eliminating extensive formations. This absence of substantial rock formations contributes to a reduced map size. Typically, a Rust map occupies 40 - 50MB, but without large rock formations, the number of prefabs decreases, significantly lowering the file size to approximately 15 - 20MB</p>
            </div>
        </div>

        <div class="flex max-w-5xl m-auto py-[30px] rounded-lg px-4">
            <div class="w-full py-6 pr-6">
                <h2 class="text-4xl mb-3 text-white">Combined Outpost & Bandit Camp</h2>
                <p class="mb-4 text-gray-100">The <a href="https://codefling.com/monuments/combined-outpost" class="text-main underline" title="Our Merged Outpost and Bandit Camp Design" target="_blank" rel="nofollow">Outpost and Bandit Camp</a> have been consolidated into a single entity, with the Outpost assuming the primary role. This unified location now includes added benefits such as teleportation and comprehensive support for the Monument addons plugin. Please refer to the map description for further details.</p>
                <p class="mb-4 text-gray-100">We maintain the Outpost as the default entity, ensuring that everything within the Outpost remains unchanged. This approach facilitates the functionality of plugins such as NTeleportation and MonumentsFinder, allowing them to accurately locate monuments for configuring specific teleport points or entities.</p>
                <p class="mb-4 text-gray-100">Our maps are designed with a primary focus on PvP, resulting in smaller PvP-grade maps typically ranging between 3450 and 4250 maximum. I have a personal preference for creating maps similar to 'Vital Rust' and 'WarBandits</p>
            </div>
            <img src="{{ asset('assets/outpost.webp') }}" class="rounded-lg w-full h-fit max-w-[500px]" title="FPS+ Flat Terrain Map" alt="FPS+ Flat Terrain">
        </div>

        <div class="flex max-w-5xl m-auto py-[30px] rounded-lg px-4">
            <img src="{{ asset('assets/map.webp') }}" class="rounded-lg w-full h-fit max-w-[500px]" title="FPS+ Flat Terrain Map" alt="FPS+ Flat Terrain">
            <div class="w-full p-6">
                <h2 class="text-4xl mb-3 text-white">Special Biome Pattern</h2>
                <p class="mb-4 text-gray-100">In the FPS+ Rust Map, the terrain is flat and smooth, with unnecessary prefabs removed and fewer rock formations. This improvement is designed to enhance server performance and player FPS. For additional details, please refer to the map description.</p>
                <p class="mb-4 text-gray-100">As visible in the image, there is no grass. We've utilized a special biome type to paint the terrain, resulting in shorter grass. This adjustment is aimed at enhancing player FPS in-game.</p>
                <p class="text-gray-100">We have removed large mountains and cliffs, eliminating extensive formations. This absence of substantial rock formations contributes to a reduced map size. Typically, a Rust map occupies 40 - 50MB, but without large rock formations, the number of prefabs decreases, significantly lowering the file size to approximately 15 - 20MB</p>
            </div>
        </div>
    </section>

    {{-- <x-sponsor /> --}}
    
    {{-- <section class="w-full h-[700px] relative bg-center bg-cover bg-fixed" style="background-image: url({{ asset('assets/turret.webp') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-70 backdrop-blur-sm"></div>
        <div class="h-full w-full relative z-20 flex items-center justify-center">
            <div class="text-center">
                <h2 class="text-white text-3xl mb-3">Want to learn and play rust <br> without worring about getting killed?</h2>
                <img src="{{ asset('assets/rusty_text_logo.png') }}" class="max-w-lg m-auto" alt="RustyUrnaium logo">
                <a href="steam://connect/188.244.117.121:28015" class="py-3 text-white text-3xl px-5 link rounded-md bg-rust inline-block" target="_blank">Join 5X PVE</a>
            </div>
        </div>
    </section> --}}
@endsection