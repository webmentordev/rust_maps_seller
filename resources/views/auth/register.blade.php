<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-custom-label for="name" :value="__('Name')" />
            <x-custom-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-custom-label for="email" :value="__('Email')" />
            <x-custom-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-custom-label for="password" :value="__('Password')" />

            <x-custom-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-custom-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-custom-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-200 hover:text-rust-green rounded-md focus:outline-none" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-custom-button class="ml-4">
                {{ __('Register') }}
            </x-custom-button>
        </div>
        <a class="underline text-sm text-center text-gray-200 hover:text-rust-green rounded-md focus:outline-none" href="{{ route('login') }}">
            {{ __('Already have an account? login now') }}
        </a>
    </form>
</x-guest-layout>
