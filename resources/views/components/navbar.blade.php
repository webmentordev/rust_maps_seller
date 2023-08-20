<nav class="w-full fixed top-5 p-3 left-0 z-50 px-4">
    <div class="max-w-5xl py-2 px-3 m-auto flex items-center justify-between bg-dark rounded-lg border border-white/10 bg-opacity-70 backdrop-blur-md">
        <a class="flex items-center" href="{{ route('home') }}">
            <img src="{{ asset('assets/buy_rust_maps_logo.png') }}" class="rounded-md" width="45" alt="Buy Cushrefm Rust Maps Logo">
            <span class="ml-3 link text-2xl text-white">Buyrustmaps</span>
        </a>
        <ul class="link text-white flex items-center 760:hidden">
            <a class="px-4 text-lg transition-all hover:text-rust" href="{{ route('home') }}">Home</a>
            <a class="px-4 text-lg transition-all hover:text-rust" href="{{ route('maps.fetch') }}">Maps</a>
            <a class="px-4 text-lg transition-all hover:text-rust" href="{{ route('report') }}">Report</a>
            <a class="px-4 text-lg transition-all hover:text-rust" href="{{ route('contact') }}">Contact</a>
            @auth
                <a class="px-4 text-lg transition-all hover:text-rust border-r border-white/10" href="{{ route('client') }}">Client</a>
                @if (auth()->user()->is_admin)
                    <a class="px-4 text-lg transition-all hover:text-rust" href="{{ route('dashboard') }}">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="ml-4 px-4 text-lg link py-1 bg-rust">Logout</button>
                </form>
            @endauth
            @guest
                <a class="px-4 text-lg transition-all hover:text-rust border-r border-white/10" href="{{ route('login') }}">Login</a>
                <a class="px-4 text-lg transition-all hover:text-rust" href="{{ route('register') }}">Signup</a>
            @endguest
        </ul>
        <div x-data="{ open: false }" class="760:block hidden relative">
            <img x-on:click="open = !open" src="https://api.iconify.design/fluent:text-align-right-16-filled.svg?color=%23e85617" width="38" alt="Align Icons">
            <ul class="absolute w-[200px] text-start right-0 top-9 rounded-lg text-white flex flex-col bg-dark p-6 link" x-show="open" x-transition x-cloak>
                <a class="pb-3 border-b border-dark-100" href="{{ route('home') }}">Home</a>
                <a class="py-3 border-b border-dark-100" href="{{ route('maps.fetch') }}">Maps</a>
                <a class="py-3 border-b border-dark-100" href="{{ route('report') }}">Report</a>
                <a class="py-3 border-b border-dark-100" href="{{ route('contact') }}">Contact</a>
                @auth
                    @if (auth()->user()->is_admin)
                        <a class="py-3 border-b border-dark-100" href="{{ route('dashboard') }}">Dashboard</a>
                    @endif
                    <a class="py-3 border-b border-dark-100" href="{{ route('client') }}">Client</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="mt-3 px-4 text-lg link py-1 bg-rust">Logout</button>
                    </form>
                @endauth
                @guest
                    <a class="py-3 border-b border-dark-100" href="{{ route('login') }}">Login</a>
                    <a class="py-3" href="{{ route('register') }}">Register</a>
                @endguest
            </ul>
        </div>
    </div>
</nav>