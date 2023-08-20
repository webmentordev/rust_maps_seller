@extends('layouts.apps')
@section('content')
    <header class="h-screen flex items-center justify-center bg-center b-cover relative" style="background-image: url({{ asset('assets/cancel.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="w-full sm:max-w-lg mt-6 p-8 bg-dark rounded-lg shadow-md overflow-hidden sm:rounded-lg relative z-10">
            <div class="text-center mb-2">
                <img src="https://api.iconify.design/material-symbols:check-circle.svg?color=%2320975a" class="m-auto mb-3" width="90" alt="Checkmark icon">
                <h1 class="text-xl text-white mb-2">Congratulations!</h1>
                <p class="mb-2 text-gray-300">Your order has been successfully placed</p>
                <p class="flex items-center text-white text-center">OrderID# <strong class="ml-2">{{ $order_id }}</strong></p>
            </div>
            <div class="bg-dark-100 p-6 rounded-lg border border-white/10">
                <h2 class="mb-2 text-lg text-white">What's NEXT?</h2>
                <p class="text-gray-300">The map has been permanently registered to your account. You can now download it by visiting our client area.</p>
            </div>
            <a href="{{ route('client') }}" class="w-full bg-rust text-white p-3 rounded-md mt-3 inline-block text-center">Go To Client!</a>
        </div>
    </header>
@endsection