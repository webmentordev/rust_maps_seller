<section>
    <header class="min-h-[600px] bg-center bg-cover relative bg-fixed flex items-center justify-center" style="background-image: url({{ asset('images/buy-custom-rust-maps-with-less-prefabs.jpg') }})">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-60 backdrop-blur-sm"></div>
        <div class="max-w-7xl m-auto px-4 flex items-center justify-center h-full relative"> 
            <div class="text-center">
                <h1 class="text-7xl text-white mb-3 leading-[60px] 430:text-4xl">Buy Custom, Less Prefabs<br><span class="text-4xl link 430:text-lg"> Rust Maps At Cheap Price Less than 4$</span></h1>
                <a href="https://discord.gg/5XFteSutRK" target="_blank" rel="dofollow" class="link py-2 px-4 text-lg mr-2 text-gray-100 bg-rust inline-block">Discord</a>
                <a wire:navigate href="{{ route('maps') }}" class="link py-2 px-4 text-lg text-gray-100 bg-rust inline-block">Collection</a>
            </div>
        </div>
    </header>
    
    <div class="max-w-5xl m-auto py-12 px-4">
        <h1 class="text-5xl mb-5 text-white">Latest Maps collection</h1>
        <div class="grid grid-cols-3 gap-4 945px:grid-cols-2 580px:grid-cols-1">
            @foreach ($products as $item)
                <x-item :$item />
            @endforeach
        </div>
    </div>

    <div class="flex max-w-5xl m-auto py-[30px] rounded-lg px-4 900:flex-col">
        <img src="{{ asset('images/falt-custom-rust-map-design.webp') }}" class="rounded-lg w-full h-fit max-w-[500px] 900:order-2 900:max-w-full" title="Flat FPS+ Custom Flat Rust Map Design" alt="Flat FPS+ Custom Flat Rust Map Design">
        <div class="w-full p-6 900:p-0 900:py-6 900:order-1">
            <h2 class="text-4xl mb-3 text-white">What is FPS+ Rust Map?</h2>
            <p class="mb-4 text-gray-100">In the FPS+ Rust Map, the terrain is flat and smooth, with unnecessary prefabs removed and fewer rock formations. This improvement is designed to enhance server performance and player FPS. For additional details, please refer to the map description.</p>
            <p class="mb-4 text-gray-100">As visible in the image, there is no grass (tundra biome). We've utilized a special biome type to paint the terrain, resulting in shorter grass. This adjustment is aimed at enhancing player FPS in-game.</p>
            <p class="text-gray-100">We have removed large mountains and cliffs, eliminating extensive formations. This absence of substantial rock formations contributes to a reduced map size. Typically, a Rust map occupies 40 - 50MB, but without large rock formations, the number of prefabs decreases, significantly lowering the file size to approximately 15 - 20MB</p>
        </div>
    </div>

    <div class="flex max-w-5xl m-auto py-[30px] rounded-lg px-4 900:flex-col">
        <div class="w-full py-6 pr-6 900:pr-0">
            <h2 class="text-4xl mb-3 text-white">Combined Outpost & Bandit Camp</h2>
            <p class="mb-4 text-gray-100">The <a href="https://codefling.com/monuments/combined-outpost" class="text-main underline" title="Our Merged Outpost and Bandit Camp Design" target="_blank" rel="nofollow">Outpost and Bandit Camp</a> have been consolidated into a single entity, with the Outpost assuming the primary role. This unified location now includes added benefits such as teleportation and comprehensive support for the Monument addons plugin. Please refer to the map description for further details.</p>
            <p class="mb-4 text-gray-100">We maintain the Outpost as the default entity, ensuring that everything within the Outpost remains unchanged. This approach facilitates the functionality of plugins such as NTeleportation and MonumentsFinder, allowing them to accurately locate monuments for configuring specific teleport points or entities.</p>
            <p class="mb-4 text-gray-100">Our maps are designed with a primary focus on PvP, resulting in smaller PvP-grade maps typically ranging between 3450 and 4250 maximum. I have a personal preference for creating maps similar to 'Vital Rust' and 'WarBandits</p>
        </div>
        <img src="{{ asset('images/custom-rust-outpost-design.webp') }}" class="rounded-lg w-full h-fit max-w-[500px] 900:max-w-full" title="Custom Rust Outpost and Bandit Design" alt="Custom Rust Outpost and Bandit Design">
    </div>

    <div class="flex max-w-5xl m-auto py-[30px] rounded-lg px-4 900:flex-col">
        <img src="{{ asset('images/rust-custom-map-biome-pattern.webp') }}" class="rounded-lg w-full h-fit max-w-[500px] 900:order-2 900:max-w-full" title="Custom Rust Map Biome Pattern" alt="Custom Rust Map Biome Pattern">
        <div class="w-full p-6 900:p-0 900:py-6 900:order-1">
            <h2 class="text-4xl mb-3 text-white">Special Biome Pattern Rust Maps</h2>
            <p class="mb-4 text-gray-100">We use a special biome pattern for our paid maps, aiming to include all four biome types: Arctic, Desert (Arid), Temperature (Long grass), and Tundra (Short grass). Free maps, on the other hand, do not come with a custom biome pattern due to the time it takes to create them. Free maps only feature the merged Outpost and Bandit Camp.</p>
            <p class="mb-4 text-gray-100">We use all four biome designs to ensure that all biome-specific monuments spawn appropriately, such as the Arctic base in the snow biome, military base in the desert biome, etc. Using all four biomes ensures that we don't miss out on those monuments.</p>
            <p class="text-gray-100">We try our best to divided the map into three biomes, primarily Arctic, Desert, and Temperature. The Temperature biome is mixed with Tundra.</p>
        </div>
    </div>
</section>