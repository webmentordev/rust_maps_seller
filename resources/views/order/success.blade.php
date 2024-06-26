@extends('layouts.apps')
@section('content')
    <section class="h-[90vh] flex items-center">
        <div class="bg-white rounded-md p-6 max-w-lg w-full text-sm m-auto">
            <div class="text-center mb-2">
                <img src="https://api.iconify.design/material-symbols:check-circle.svg?color=%2320975a" class="m-auto mb-3" width="50" alt="Checkmark icon">
                <h1 class="text-3xl mb-2">Congratulations!</h1>
                <p class="mb-2">Your order has been successfully placed</p>
                <p><strong>OrderID#</strong> {{ $order->checkout_id }}</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg border border-gray-200">
                <h2 class="mb-2 text-3xl">What's NEXT?</h2>
                <p class="mb-2">We have sent you an email with the download link. Please check your email and click the download button. You will be redirected to the download page, where you can download the map file.</p>
                <p>In case you have not received the email, you can contact us on Discord. We will verify the order and provide you with the map download link.</p>
            </div>
            <a href="{{ route('home') }}" class="w-full bg-black text-white p-3 rounded-md mt-3 inline-block text-center">Go To Home Page!</a>
        </div>
    </section>
@endsection