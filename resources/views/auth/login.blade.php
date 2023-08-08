<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex items-center">
            <h1 class="text-4xl text-white mb-3 leading-[50px]">Client Login</h1>
            @if ($errors->get('email') || $errors->get('password'))
                <img src="{{ asset('assets/sus_rock.gif') }}" width="45" class="rounded-full ml-4 -mt-3" alt="Rock Sus Gif">
            @endif
        </div>
        <!-- Email Address -->
        <div>
            <x-custom-label for="email" :value="__('Email')" />
            <x-custom-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-custom-label for="password" :value="__('Password')" />

            <x-custom-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-rust-green shadow-sm focus:text-rust-green" name="remember">
                <span class="ml-2 text-sm text-gray-200">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-200 hover:text-rust-green rounded-md focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-custom-button class="ml-3">
                {{ __('Log in') }}
            </x-custom-button>
        </div>
        <a class="underline text-sm text-center text-gray-200 hover:text-rust-green rounded-md focus:outline-none" href="{{ route('register') }}">
            {{ __('Create new account') }}
        </a>
    </form>
</x-guest-layout>
