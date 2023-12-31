@extends('layouts.apps')
@section('content')
    <section class="h-[50vh] bg-center bg-cover relative" style="background-image: url({{ asset('assets/buy.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto py-12 px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-8xl text-white mb-3 leading-[50px] 690px:text-6xl 430px:text-4xl">{{ $product->name }}</h1>
            </div>
        </div>
    </section>
    <section class="w-full">
        <div class="max-w-6xl m-auto py-12 px-4 grid grid-cols-3 gap-3 1040px:grid-cols-1" 
        x-data="{ 
            images: [
                '{{ asset('/storage/'. $product->thumbnail) }}',
                @foreach ($product->images as $image)
                    '{{ asset('/storage/'.$image->url) }}',
                @endforeach
        ], active: null }" x-init="active = images[0]">
            <div class="col-span-2 w-full p-3 rounded-lg bg-dark-100 1040px:col-span-1">
                @if (session('error'))
                    <x-custom-error :value="session('error')" />
                @endif
                <img :src="active" class="lazyload mb-3 w-full h-fit rounded-lg" alt="{{ $product->name }} Rust Map Image" title="{{ $product->name }} Rust Map Image">
                @if (count($product->images))
                    <div class="w-fit grid grid-cols-5 gap-3 mb-6 520:grid-cols-2">
                        <template x-for="image in images">
                            <img :src="image" class="mr-2 rounded-lg h-full object-cover w-full max-w-[250px]" :class="{ 'border-4 border-rust': active == image }" x-on:mouseenter="active = image">
                        </template>
                    </div>
                @endif
                <main class="main-body px-3">
                    {!! $product->description !!}
                </main>
            </div>
            <div class="w-full 1040px:max-w-lg 1040px:m-auto">
                <div class="py-6 px-5 rounded-lg bg-dark-100 h-fit mb-3">
                    <h1 class="text-white mb-1 text-2xl">What you will get!</h1>
                    <ul class="list-disc ml-6 mb-3 text-white/50 font-normal"> 
                        <li class="mb-1">Permanent registered on account!</li>
                        <li class="mb-1">Exclusive Map Customize Support</li>
                        <li class="mb-1">Receive map updates</li>
                        <li class="mb-1">No Password</li>
                        <li>Constant updates after force wipe!</li>
                    </ul>
                    <form action="{{ route("order", $product->slug) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-rust-green text-white link py-2 px-4 w-full text-lg inline-block text-center rounded-sm transition-all hover:bg-rust">Buy ${{ $product->price }}</button>
                    </form>
                    <div class="flex justify-between items-center w-full mt-2 py-3">
                        <img src="{{ asset('assets/payment_cards.png') }}" width="140px" alt="Stripe Payment methods icon">
                        <img src="{{ asset('assets/stripe_square_logo.png') }}" width="140px" alt="Powerd by stipe image">
                    </div>
                    <p class="text-white/80 text-sm">We never retain your personal credit card information on our platform. Instead, we utilize the secure Stripe payment system, which employs its own checkout page for secure transactions. When you sign up, it's solely for authentication purposes, ensuring that you're not a bot. Rest assured, we won't inundate your inbox with marketing emails</p>
                </div>
                <div class="bg-yellow-400 text-black p-3 rounded-lg mb-3">
                    <h3 class="title text-lg">Warning</h3>
                    <p class="text-sm">Please add the <a class="underline font-semibold" target="_blank" href="https://github.com/k1lly0u/Oxide.Ext.RustEdit" title="Download Rust Edit Extension">RustEdit</a> extension to your server to make it work; otherwise, the map will not function properly. If you don't know how to do it, you can hire me on <a class="underline font-semibold" target="_blank" href="https://www.fiverr.com/mahmer97" title="Hire Rust Game Server Developer">Fiverr</a></p>
                </div>
                <a href="{{ route('report') }}" class="font-bold py-2 px-4 rounded-sm bg-rust transition-all text-sm hover:bg-rust-green flex items-center w-fit"><img src="https://api.iconify.design/material-symbols:bug-report.svg?color=%23000" width="20" class="mr-1" alt="Bug icon">Report Bug</a>
            </div>
        </div>
    </section>
@endsection