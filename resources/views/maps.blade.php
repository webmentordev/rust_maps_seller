@extends('layouts.apps')
@section('content')
    <section class="h-[50vh] bg-center bg-cover relative" style="background-image: url({{ asset('assets/store.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <img src="{{ asset('assets/rustedit_logo.png') }}" class="m-auto mb-4 absolute bottom-4 left-4" width="180" alt="RustEdit logo">
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-6xl text-white mb-3 leading-[50px]">Our Personalized Rust Maps<br> <span class="text-5xl link text-rust">Collection</span></h1>
            </div>
        </div>
    </section>
    <section class="w-full">
        <div class="max-w-5xl m-auto py-[120px] px-4"> 
            <h1 class="text-6xl text-white leading-10 text-center mb-6">Our Rust Maps</h1>
            <form action="{{ route('map.search') }}" method="POST" class="flex items-center">
                @csrf
                <input type="text" name="search" required autocomplete="off" placeholder="Search map by name..." class="py-2 px-3 rounded-lg bg-dark-100 border border-white/10 w-full text-white/80">
                <button type="submit" class="py-2 px-4 ml-3 bg-white rounded-lg link">Search</button>
            </form>
            @if (count($maps))
                <div class="grid grid-cols-3 gap-6 mt-6">
                    @foreach ($maps as $map)
                        <div class="bg-dark-100 p-3 rounded-lg">
                            <div class="overflow-hidden rounded-lg relative">
                                <span class="link absolute z-10 bg-rust top-2 left-3 py-1 px-2 rounded-md text-lg text-white">{{ $map->map_size }} MAP</span>
                                <img class="rounded-lg w-full lazyload" data-src="{{ asset('/storage/'. $map->thumbnail) }}" alt="{{ $map->name }} Map Image">
                                <div class="px-2 py-4 w-full">
                                    <div class="flex items-center">
                                        <span class="link bg-dark text-sm text-gray-200 py-2 px-3 mb-2 inline-block">{{ $map->created_at->diffForHumans() }}</span>
                                        @if ($map->is_fps)
                                        <a href="#questions" class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">FPS+</a>
                                        @endif
                                        @if ($map->is_combined)
                                            <a href="#questions" class="link bg-rust-green text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Combined</a> 
                                        @endif
                                        @if ($map->is_buildable)
                                            <a href="#questions" class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Buildable</a> 
                                        @endif
                                    </div>
                                    <h2 class="text-white/90 text-2xl mb-1">{{ $map->name }}</h2>
                                    <a href="{{ route('map.show', $map->slug) }}" class="bg-rust-green text-white link py-2 px-4 w-full text-lg inline-block text-center rounded-sm transition-all hover:bg-rust">Buy ${{ $map->price }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-2xl mt-3 text-center text-white">No Maps data exist at the moment! 😢</p>
            @endif
        </div>
    </section>
    <x-sponsor />
@endsection