@extends('layouts.apps')
@section('content')
    <section class="h-[90vh] flex items-center">
        <div class="bg-white rounded-md p-6 max-w-lg w-full text-sm m-auto">
            <div class="text-center mb-2">
                <img src="https://api.iconify.design/material-symbols:check-circle.svg?color=%2320975a" class="m-auto mb-3" width="50" alt="Checkmark icon">
                <h1 class="text-3xl mb-2">Download The Map!</h1>
                <p class="mb-1">Keep the download link secure. You can download the map here! To save server/hosting bandwidth, we have limited downloads to 5.</p>
                <p class="mb-3"><strong>{{ Str::plural('Download', $order->downloads) }} left:</strong> {{ 5 - $order->downloads }}</p>
                <form action="{{ route('download', $order->checkout_id) }}" method="post">
                    @csrf
                    <button class="bg-rust-green p-2 px-4 font-semibold text-white" type="submit">Download</button>
                </form>
            </div>
            <a href="{{ route('home') }}" class="w-full bg-black text-white p-3 rounded-md mt-3 inline-block text-center">Go To Home Page!</a>
        </div>
    </section>
@endsection