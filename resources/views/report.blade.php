@extends('layouts.apps')
@section('content')
    <section class="h-screen bg-center bg-cover relative bg-fixed" style="background-image: url({{ asset('assets/bug.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <img src="{{ asset('assets/rustedit_logo.png') }}" class="m-auto mb-4 absolute bottom-4 left-4" width="180" alt="RustEdit logo">
        <div class="max-w-xl m-auto py-12 px-4 flex items-center justify-center relative h-full"> 
            <div class="bg-dark p-12 w-full rounded-lg">
                <h1 class="text-4xl text-white mb-3 leading-[50px]">Report Map Bug</h1>
                <form action="{{ route('report') }}" method="POST">
                    @csrf
                    @if (session('success'))
                        <x-custom-success :value="session('success')" />
                    @elseif (session('error'))
                        <x-custom-error :value="session('error')" />
                    @endif
                    <div class="w-full mb-3">
                        <x-custom-label for="name" :value="__('Name')" />
                        <x-custom-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autocomplete="off" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="w-full mb-3">
                        <x-custom-label for="email" :value="__('Email')" />
                        <x-custom-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="off" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="w-full mb-3">
                        <x-custom-label for="map" :value="__('Map')" />
                        <x-custom-input list="maps" id="map" class="block mt-1 w-full" type="text" name="map" :value="old('map')" autocomplete="off" />
                        <datalist id="maps">
                            @foreach ($maps as $map)
                                <option value="{{ $map }}">
                            @endforeach
                        </datalist>
                        <x-input-error :messages="$errors->get('map')" class="mt-2" />
                    </div>

                    <div class="w-full mb-3">
                        <x-custom-label for="message" :value="__('Message')" />
                        <x-custom-textarea id="message" :value="{{ old('message') }}" class="block mt-1 w-full" placeholder="Please mention grid number too...!" name="message" :value="old('message')" autocomplete="off" />
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>
                    
                    <x-custom-button class="mt-1">
                        {{ __('Report') }}
                    </x-custom-button>
                </form>
            </div>
        </div>
    </section>
    <x-sponsor />
@endsection