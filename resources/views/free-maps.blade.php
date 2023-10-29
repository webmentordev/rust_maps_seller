@extends('layouts.apps')
@section('content')
    <section class="h-[50vh] bg-center bg-cover relative" style="background-image: url({{ asset('assets/store.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-6xl text-white mb-3 leading-[50px] 520:text-4xl">Download Free Custom<br> <span class="text-5xl link text-rust">Rust Maps</span></h1>
            </div>
        </div>
    </section>
    <section class="w-full">
        <div class="max-w-5xl m-auto py-[120px] px-4"> 
            <h2 class="text-6xl text-white leading-10 text-center mb-6">Our Free Rust Maps</h2>
            <form action="{{ route('free.map.search') }}" method="GET" class="flex items-center">
                <input type="text" name="search" required autocomplete="off" placeholder="Search map by name..." class="py-2 px-3 rounded-lg bg-dark-100 border border-white/10 w-full text-white/80">
                <button type="submit" class="py-2 px-4 ml-3 bg-white rounded-lg link">Search</button>
            </form>
            @if (count($maps))
                <div class="grid grid-cols-3 gap-6 mt-6 m-auto 710:flex 710:flex-col 1000:grid-cols-2 1000:max-w-2xl">
                    @foreach ($maps as $map)
                        <div class="bg-dark-100 p-3 rounded-lg 710:max-w-[440px] w-full m-auto">
                            <div class="overflow-hidden rounded-lg relative">
                                <span class="link absolute z-10 bg-rust top-2 left-3 py-1 px-2 rounded-md text-lg text-white">{{ $map->map_size }} MAP</span>
                                <img class="rounded-lg w-full lazyload" data-src="{{ asset('/storage/'. $map->thumbnail) }}" title="{{ $map->name }}" alt="{{ $map->name }} Map Image">
                                <div class="px-2 py-4 w-full">
                                    <span class="link bg-dark text-sm text-gray-200 py-2 px-3 mb-2 inline-block">{{ $map->created_at->diffForHumans() }}</span>
                                    <h2 class="text-white/90 text-2xl mb-1">{{ $map->name }}</h2>
                                    <form action="{{ route('freemap.download', $map->slug) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-rust-green text-white link py-2 px-4 w-full text-lg inline-block text-center rounded-sm transition-all hover:bg-rust">Download</button>
                                    </form>
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
    {{-- <x-sponsor /> --}}
@endsection