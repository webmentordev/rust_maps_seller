@extends('layouts.apps')
@section('content')
    <section class="h-screen bg-center bg-cover relative bg-fixed" style="background-image: url({{ asset('assets/contact.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-xl m-auto py-12 px-4 flex items-center justify-center relative h-full"> 
            <div class="bg-dark p-12 w-full rounded-lg">
                <h1 class="text-4xl text-white mb-3 leading-[50px]">Contact Us</h1>
                <form action="{{ route('contact') }}" method="POST">
                    @csrf
                    @if (session('success'))
                        <x-custom-success :value="session('success')" />
                    @endif

                    @if (session('status'))
                        <p class="mb-3 text-red-600">{{ session('status') }}</p>
                    @endif

                    @auth
                        <div class="w-full mb-3">
                            <x-custom-label for="name" :value="__('Name')" />
                            <x-custom-input id="name" class="block mt-1 w-full" type="text" name="name" :value="auth()->user()->name" autocomplete="off" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    @endauth
                    @guest
                        <div class="w-full mb-3">
                            <x-custom-label for="name" :value="__('Name')" />
                            <x-custom-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    @endguest

                    @auth
                        <div class="w-full mb-3">
                            <x-custom-label for="email" :value="__('Email')" />
                            <x-custom-input id="email" class="block mt-1 w-full" type="email" name="email" :value="auth()->user()->email" autocomplete="off" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    @endauth

                    @guest
                        <div class="w-full mb-3">
                            <x-custom-label for="email" :value="__('Email')" />
                            <x-custom-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    @endguest

                    <div class="w-full mb-3">
                        <x-custom-label for="subject" :value="__('Subject')" />
                        <x-custom-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" autocomplete="off" />
                        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                    </div>

                    <div class="w-full mb-3">
                        <x-custom-label for="message" :value="__('Message')" />
                        <x-custom-textarea id="message" :value="{{ old('message') }}" class="block mt-1 w-full" placeholder="Compose here..." name="message" :value="old('message')" autocomplete="off" />
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>
                    
                    <x-custom-button class="mt-1">
                        {{ __('Send') }}
                    </x-custom-button>
                </form>
            </div>
        </div>
    </section>
@endsection