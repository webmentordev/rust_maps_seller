<nav class="w-full fixed top-2 left-0 z-50 px-1">
    <div class="max-w-5xl py-2 px-3 m-auto flex items-center justify-between bg-dark rounded-lg border border-white/10 bg-opacity-70 backdrop-blur-md">
        <a wire:navigate class="flex items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/buy-rust-maps-logo.png') }}" class="rounded-md" width="40" alt="Buy Cushrefm Rust Maps Logo">
            <span class="ml-3 link text-2xl text-white">CustomRustPrint</span>
        </a>
        <ul class="link text-white flex items-center 945px:hidden">
            <a wire:navigate class="px-4 text-lg transition-all hover:text-rust" href="{{ route('home') }}">Home</a>
            <a wire:navigate class="px-4 text-lg transition-all hover:text-rust" href="{{ route('maps') }}">Maps</a>
            <a class="px-4 text-lg transition-all hover:text-rust" href="https://discord.gg/5XFteSutRK" target="_blank" rel="dofollow">Discord</a>
            <a wire:navigate class="px-4 text-lg transition-all hover:text-rust" rel="nofollow" href="{{ route('contact') }}">Contact</a>
            @auth
                <a class="px-4 text-lg transition-all hover:text-rust" rel="nofollow" href="{{ route('dashboard') }}">Dashboard</a>
            @endauth
        </ul>
        <div x-data="{ open: false }" class="945px:block hidden relative">
            <img x-on:click="open = !open" src="https://api.iconify.design/fluent:text-align-right-16-filled.svg?color=%23e85617" width="38" alt="Align Icons">
            <ul class="absolute w-[200px] text-start border border-white/10 right-0 top-9 rounded-lg text-white flex flex-col bg-dark p-6 link" x-show="open" x-transition x-cloak>
                <a wire:navigate class="pb-3 border-b border-dark-100" href="{{ route('home') }}">Home</a>
                <a wire:navigate class="py-3 border-b border-dark-100" href="{{ route('maps') }}"> Maps</a>
                <a wire:navigate class="py-3 border-b border-dark-100" rel="nofollow" href="{{ route('contact') }}">Contact</a>
                <a class="py-3 border-b border-dark-100" rel="nofollow" href="https://discord.gg/5XFteSutRK">Discord</a>
                @auth
                    <a wire:navigate class="py-3 border-b border-dark-100" rel="nofollow" href="{{ route('dashboard') }}">Dashboard</a>
                @endauth
            </ul>
        </div>
    </div>
</nav>