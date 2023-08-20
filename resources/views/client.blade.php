@extends('layouts.apps')
@section('content')
    <section class="w-full">
        <div class="max-w-5xl m-auto pt-[150px] pb-12 px-4 min-h-screen">
            <div class=" border border-white/10 p-12 rounded-lg bg-dark-100">
                <h1 class="text-3xl mb-6 text-white">Welcome to the Client Panel, {{ auth()->user()->name }} 👋</h1>
                <p class="bg-rust/10 text-rust p-6 w-full rounded-lg mb-3 border border-rust hidden 710:block">We recommend using the client panel on your PC or desktop for a better viewing experience</p>
                
                <div class="flex flex-wrap items-center mb-3">
                    <form action="{{ route('client.filter') }}" method="get" class="mr-2 mb-2">
                        <button type="submit" name="filter" value="last-updated" class="px-4 text-lg link py-1 text-white bg-rust-green hover:bg-rust transition-all">New Update</button>
                    </form>
                    <form action="{{ route('client.filter') }}" method="get" class="m-2">
                        <button type="submit" name="filter" value="fps-plus" class="px-4 text-lg link py-1 text-white bg-rust-green hover:bg-rust transition-all">FPS+</button>
                    </form>
                    <form action="{{ route('client.filter') }}" method="get" class="m-2">
                        <button type="submit" name="filter" value="buildable" class="px-4 text-lg link py-1 text-white bg-rust-green hover:bg-rust transition-all">Buildable</button>
                    </form>
                    <form action="{{ route('client.filter') }}" method="get" class="m-2">
                        <button type="submit" name="filter" value="combined" class="px-4 text-lg link py-1 text-white bg-rust-green hover:bg-rust transition-all">Combined</button>
                    </form>
                    <form action="{{ route('client.filter') }}" method="get" class="m-2">
                        <button type="submit" name="filter" value="latest-purchase" class="px-4 text-lg link py-1 text-white bg-rust-green hover:bg-rust transition-all">Latest Purchases</button>
                    </form>
                </div>
                @if (count($orders))
                    <main class="flex flex-col 900:flex-wrap 900:flex-row">
                        @foreach ($orders as $order)
                            <div class="pl-4 pr-6 py-3 900:mr-3 900:p-8 rounded-lg bg-dark border border-white/10 mb-3 flex items-center justify-between 900:flex-col 900:items-start">
                                <div class="flex items-center 900:mb-3">
                                    <a href="{{ route('map.show', $order->product->slug) }}" class="p-1 rounded-full border hover:border-rust-green border-rust overflow-hidden">
                                        <img data-src="{{ asset('/storage/'. $order->product->thumbnail) }}" width="40" class="rounded-full lazyload" alt="{{ $order->product->name }}">
                                    </a>
                                    <div class="ml-3">
                                        <h3 class="text-3xl text-white">{{ $order->product->name }}</h3>
                                        <p class="text-sm text-white/50">{{ $order->product->map_size }} Map Size</p>
                                    </div>
                                </div>
                                <div class="flex items-center 900:mb-3">
                                    @if ($order->product->is_fps)
                                        <a href="#questions" class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">FPS+</a>
                                    @endif
                                    @if ($order->product->is_combined)
                                        <a href="#questions" class="link bg-rust-green text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Combined</a> 
                                    @endif
                                    @if ($order->product->is_buildable)
                                        <a href="#questions" class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Buildable</a> 
                                    @endif
                                </div>
                                <div class="flex items-center 540:flex-col">
                                    <div class="flex flex-col mr-2">
                                        <h3 class="text-white text-[16px]">Purchased</h3>
                                        <p class="text-gray-200 text-[12px]">{{ $order->updated_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('report') }}" class="ml-4 540:ml-0 540:mb-2 px-4 text-lg link py-1 text-white bg-rust hover:bg-rust-green transition-all">Report Bug</a>
                                    <form action="{{ route('client.download', $order->map_slug) }}" method="post">
                                        @csrf
                                        <button type="submit" class="ml-4 540:ml-0 px-4 text-lg link py-1 text-white bg-rust hover:bg-rust-green transition-all">Download</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </main>
                @else
                    <p class="p-6 rounded-lg bg-dark border border-white/10 text-center text-white">Apologies, but it appears that you do not possess any kind of maps at the moment</p>
                @endif
            </div>
        </div>
    </section>
@endsection