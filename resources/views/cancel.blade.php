@extends('layouts.apps')
@section('content')
    <header class="h-screen flex items-center justify-center bg-center b-cover relative" style="background-image: url({{ asset('assets/cancel.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="w-full sm:max-w-md mt-6 p-8 bg-dark rounded-lg shadow-md overflow-hidden sm:rounded-lg relative z-10">
            <div class="text-center mb-2">
                <img src="https://api.iconify.design/mdi:close-octagon.svg?color=%23E25742" class="m-auto mb-3" width="90" alt="Checkmark icon">
                <h1 class="text-xl mb-2 text-white">Sad to See You Go!</h1>
                <p class="mb-2 text-gray-300">Your order has been canceled</p>
            </div>
            <a href="{{ route('home') }}" class="w-full bg-rust text-white p-3 rounded-md mt-3 inline-block text-center">Go To Home Page!</a>
        </div>
    </header>
@endsection