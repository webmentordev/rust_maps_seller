@props(['item'])
<a wire:navigate href="{{ route('map', $item->slug) }}" title="{{ $item->title }} Rust Custom Map" class="relative" class="bg-dark-100 p-3 rounded-lg 710:max-w-[440px] w-full m-auto">
    <div class="overflow-hidden rounded-lg relative p-3 bg-dark-100">
        <div class="relative">
            <span class="link absolute z-10 bg-rust top-2 left-3 py-1 px-2 rounded-md text-lg text-white">{{ $item->size }} MAP</span>
            <span class="link absolute z-10 bg-rust top-2 right-3 py-1 px-2 rounded-md text-lg text-white">${{ $item->price }}</span>
            <img class="rounded-lg w-full lazyload mb-3" data-src="{{ asset('/storage/'. $item->image) }}" title="{{ $item->name }}" alt="{{ $item->name }} Map Image">
            <span class="link absolute bottom-1 right-2 bg-dark text-sm text-gray-200 py-2 px-3 mb-2 inline-block">{{ $item->created_at->diffForHumans() }}</span>
        </div>
        <h2 class="text-white/90 text-2xl mb-1">{{ $item->title }}</h2>
        <span class="bg-rust-green text-white link py-2 px-4 w-full text-lg inline-block text-center rounded-sm transition-all hover:bg-rust">Buy Now </span>
    </div>
</a>