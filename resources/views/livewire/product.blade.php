<section>
    <div class="max-w-5xl m-auto px-4 grid grid-cols-2 py-[100px] gap-6 580px:grid-cols-1">
        <div class="h-fit" x-data="{ imageUrl: '{{ $singleImage }}' }">
            <a class="h-fit mb-5" :href="imageUrl" target="_blank" title="{{ $product->title }} Custom Rust Map image" alt="{{ $product->title }} Custom Rust Map image">
                <img :src="imageUrl" class="w-full h-fit rounded-3xl mb-5" alt="{{ $product->title }} image">
            </a>
            @if (count($product->images))
                <div class="w-fit grid grid-cols-5 gap-3 mb-6 520:grid-cols-2">
                    <img src="{{ asset('/storage/'.$product->image) }}" x-on:mouseenter="imageUrl = $event.target.src" class="mr-2 rounded-lg h-full object-cover w-full max-w-[250px] cursor-pointer" :class="{ 'border-4 border-rust': imageUrl == '{{ asset('/storage/'.$product->image) }}' }">
                    @foreach ($product->images as $image)
                        <img src="{{ asset('/storage/'.$image->image) }}" x-on:mouseenter="imageUrl = $event.target.src" class="mr-2 rounded-lg h-full object-cover w-full max-w-[250px] cursor-pointer" :class="{ 'border-4 border-rust': imageUrl == '{{ asset('/storage/'.$image->image) }}' }">
                    @endforeach
                </div>
            @endif
            <div class="text-black bg-main p-3 rounded-lg">
                <h3 class="text-2xl mb-1">Warning</h3>
                <p class="font-semibold text-sm">Please add the <a href="https://github.com/k1lly0u/Oxide.Ext.RustEdit" target="_blank" rel="nofollow" class="underline">RustEdit extension</a> to your server to make it work; otherwise, the map will not function properly.</p>
            </div>
        </div>
        <div wire:loading wire:target='purchaseNow'>
            <x-processing message="Processing! please wait..." />
        </div>
        <div class="bg-dark-100 p-6 rounded-2xl border border-white/10 mb-4 text-sm h-fit">
            <h1 class="text-3xl mb-1 text-white">{{ $product->title }}</h1>
            <p class="text-white mb-2">{{ $product->seo }}</p>
            <article class="article mb-5">
                {!! $product->description !!}
                <ul>
                    <li>-------------------------------------</li>
                    <li>Permanent registered on your email!</li>
                    <li>Exclusive Map Customize Support</li>
                    <li>No Password</li>
                    <li>Constant updates after force wipe!</li>
                </ul>
            </article>
            <input type="email" wire:model='email' placeholder="Email Address (Recieve download link)" class="w-full p-3 rounded-lg bg-dark placeholder:text-white/60 mb-2 text-white">
            <x-input-error :messages="$errors->get('email')" class="mb-3" />
            <button wire:click='purchaseNow' class="link text-2xl text-white bg-rust-green p-2 w-full mb-3">Pay now - ${{ $product->price }}</button>
            <div class="flex items-center justify-end mb-4">
                <img src="{{ asset('images/stripe-logo.png') }}" width="180" alt="stripe logo">
            </div>
            <p class="text-gray-300">We never retain your personal credit card information on our platform. Instead, we utilize the secure Stripe payment system, which uses its own checkout page for secure transactions. Your email is only used to send the download link, so you don't have to sign up or create an account. Rest assured, we won't inundate your inbox with marketing emails</p>
        </div>
    </div>
</section>