@extends('layouts.apps')
@section('content')
    <section class="h-[80vh] flex items-center">
        <div class="bg-gray-100 rounded-md p-6 max-w-lg w-full text-sm m-auto">
            <div class="text-center mb-2">
                <img src="https://api.iconify.design/mdi:close-octagon.svg?color=%23f83c0d" class="m-auto mb-3" width="80" alt="Checkmark icon">
                <h1 class="mb-2 text-4xl">Sad to See You Go!</h1>
                <p class="mb-2">Your order has been canceled</p>
            </div>
            <a href="{{ route('home') }}" class="w-full bg-black text-white p-3 rounded-md mt-3 inline-block text-center">Go To Home Page!</a>
        </div>
    </section>
@endsection