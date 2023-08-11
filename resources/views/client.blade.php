@extends('layouts.apps')
@section('content')
    <section class="w-full">
        <div class="max-w-5xl m-auto pt-[150px] pb-12 px-4 min-h-screen">
            <div class=" border border-white/10 p-12 rounded-lg bg-dark-100">
                <h1 class="text-3xl mb-6 text-white">Welcome to the Client Panel, {{ auth()->user()->name }} 👋</h1>
                @if (count($orders))
                    <main class="flex flex-col">
                        @foreach ($orders as $order)
                            <div class="pl-4 pr-6 py-3 rounded-lg bg-dark border border-white/10 mb-3 flex items-center justify-between">
                                <div class="flex items-center">
                                    <a href="{{ asset('/storage/'. $order->product->thumbnail) }}" class="p-1 rounded-full border hover:border-rust-green border-rust overflow-hidden">
                                        <img data-src="{{ asset('/storage/'. $order->product->thumbnail) }}" width="40" class="rounded-full lazyload" alt="{{ $order->product->name }}">
                                    </a>
                                    <h3 class="text-3xl text-white ml-3">{{ $order->product->name }}</h3>
                                </div>
                                <div class="flex items-center">
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
                                <div class="flex items-center">
                                    <div class="flex flex-col mr-2">
                                        <h3 class="text-white text-[12px]">Last Updated</h3>
                                        <p class="text-gray-200 text-[12px]">{{ $order->created_at->diffForHumans() }}</p>
                                    </div>
                                    <form action="{{ route('client.download', $order->map_slug) }}" method="post">
                                        @csrf
                                        <button type="submit" class="ml-4 px-4 text-lg link py-1 text-white bg-rust">Download</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </main>
                @else
                    <p class="p-6 rounded-lg bg-dark border border-white/10 text-center text-white">Apologies, but it appears that you do not possess any maps at the moment</p>
                @endif
            </div>
        </div>
    </section>
@endsection