<footer class="w-full">
    <div class="max-w-6xl m-auto py-12 px-4">
        <div class="flex 710:flex-col 710:items-start items-center justify-between border-b border-white/10 py-6">
            <div class="w-full max-w-3xl 710:mb-6">
                <img src="{{ asset('images/buy-rust-maps-logo.png') }}" width="60" class="mb-3" alt="BuyRustMaps Logo">
                <h3 class="text-white mb-3 text-3xl">CustomRustPrints.online</h3>
                <p class="text-white/80 mb-3">Welcome to CustomRustPrints, your ultimate destination for acquiring top-quality game maps for Rust, the renowned multiplayer survival game. We specialize in providing gamers with meticulously crafted maps that enhance your gameplay experience in Rust's dynamic and challenging world. With a keen focus on authenticity, detail, and user satisfaction.</p>
                <ul class="flex">
                    <li class="mr-3"><a href="{{ route('terms') }}" title="Terms Of Service" class="underline text-sm text-rust hover:text-rust-green">Terms Of Service</a></li>
                    <li class="mr-3"><a href="{{ route('policy') }}" title="Privacy Policy" class="underline text-sm text-rust hover:text-rust-green">Privacy Policy</a></li>
                    <li><a href="{{ route('sitemap') }}" class="underline text-sm text-rust hover:text-rust-green">Sitemap</a></li>
                </ul>
            </div>
            <div class="text-end">
                <h3 class="text-white mb-3 text-3xl">Navigation</h3>
                <nav class="link text-white">
                    <ul class="flex flex-col 710:text-start">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('maps') }}">Maps</a>
                        <a href="{{ route('contact') }}" rel="nofollow">Contact</a>
                        <a href="{{ route('login') }}" rel="nofollow">Account</a>
                    </ul>
                </nav>
            </div>
        </div>
        <p class="text-center pt-12 text-white">Copyright &copy; {{ date('Y') }} CustomRustPrints | All rights reserved</p>
    </div>
</footer>