<nav class="w-full fixed top-5 p-3 left-0 z-50 px-4">
    <div class="max-w-4xl py-2 px-3 m-auto flex items-center justify-between bg-dark rounded-lg border border-white/10 bg-opacity-70 backdrop-blur-md">
        <a class="flex items-center" href="{{ route('home') }}">
            <img src="{{ asset('assets/buyrust_favicon.png') }}" class="rounded-md" width="45" alt="Buy Cushrefm Rust Maps Logo">
            <span class="ml-3 link text-2xl text-white">Buyrustmaps</span>
        </a>
        <ul class="link text-white flex items-center">
            <a class="px-4 text-lg" href="{{ route('home') }}">Home</a>
            <a class="px-4 text-lg" href="{{ route('maps.fetch') }}">Maps</a>
            <a class="px-4 text-lg" href="#">Report</a>
            @auth
                <a class="px-4 text-lg" href="#">Client</a>
                @if (auth()->user()->is_admin)
                    <a class="px-4 text-lg" href="{{ route('dashboard') }}">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 text-lg link py-1 bg-rust">Logout</button>
                </form>
            @endauth
            @guest
                <a class="px-4 text-lg border-r border-white/10" href="{{ route('login') }}">Login</a>
                <a class="px-4 text-lg" href="{{ route('register') }}">Signup</a>
            @endguest
        </ul>
    </div>
</nav>