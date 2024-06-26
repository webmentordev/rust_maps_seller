<section>
    <div wire:loading wire:target='render'>
        <x-processing message="Processing...." />
    </div>
    <header class="min-h-[300px] bg-center bg-cover relative bg-fixed flex items-center justify-center" style="background-image: url({{ asset('images/rust-custom-maps-collection.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-7xl text-white mb-3 leading-[60px] 430:text-4xl">Our Maps collection</h1>
            </div>
        </div>
    </header>
    <div class="max-w-5xl m-auto py-12 px-4">
        <p class="mb-3 text-white">Find our collection of all custom flat, FPS+ boosted, less item/prefab and combined outpost & bandit Rust maps. These maps are built with fewer rock formations and offer a lot of building and roaming areas</p>
        <input type="search" wire:model.live='search' placeholder="Search maps e.g No caves, No lakes, Falt terrain e.t.c" class="w-full p-3 rounded-lg bg-dark-100 placeholder:text-white/60 mb-2 text-white">
        <div class="flex flex-col mb-3">
            <input type="range" id="range" wire:model.live="range" min="1000" max="6000" class="w-full">
            <ul class="flex justify-between text-white font-semibold">
                <li>1000 Size</li>
                <li>Current: {{ $range }}</li>
                <li>6000 Size</li>
            </ul>
        </div>
        @if (count($products))
            <div class="grid grid-cols-3 gap-4 945px:grid-cols-2 580px:grid-cols-1">
                @foreach ($products as $item)
                    <x-item :$item />
                @endforeach
            </div>
        @else
            <p class="text-white text-lg">No product find for the search! try resetting the search</p>
        @endif
    </div>
</section>