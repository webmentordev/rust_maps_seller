<section class="w-full">
    <div class="max-w-5xl m-auto py-[120px] px-4"> 
        <h1 class="text-6xl text-white leading-10 text-center mb-6">New Rust Maps</h1>
        @if (count($maps))
            <div class="grid grid-cols-3 gap-6 mt-6">
                @foreach ($maps as $map)
                    <div class="bg-dark-100 p-3 rounded-lg">
                        <div class="overflow-hidden rounded-lg relative">
                            <img class="rounded-lg w-full" src="{{ asset('/storage/'. $map->thumbnail) }}" alt="{{ $map->name }} Map Image">
                            <div class="px-2 py-4 w-full">
                                <div class="flex items-center">
                                    <span class="link bg-dark text-sm text-gray-200 py-2 px-3 mb-2 inline-block">{{ $map->created_at->diffForHumans() }}</span>
                                    @if ($map->is_fps)
                                    <div class="cursor-pointer" x-data="{ open: false }" x-on:click="open = !open">
                                        <span class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">FPS+</span> 
                                        <div class="fixed p-6 rounded-lg left-3 bottom-3 max-w-[350px] bg-dark-100 text-white" x-show="open"><p>The terrain is flat and smooth, with unnecessary prefabs removed and fewer rock formations, which improves server and player FPS. Please read the map description for more information.</p></div>
                                    </div>
                                    @endif
                                    @if ($map->is_combined)
                                        <div class="cursor-pointer" x-data="{ open: false }" x-on:click="open = !open">
                                            <span class="link bg-rust-green text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Combined</span> 
                                            <div class="fixed p-6 rounded-lg left-3 bottom-3 max-w-[350px] bg-dark-100 text-white" x-show="open"><p>Outpost and Bandit Camp have been merged into a unified entity, with Outpost taking the lead as the primary location, encompassing the added advantages of teleportation and full support for Monument addons plugin. Must read the map description for more.</p></div>
                                        </div>
                                    @endif
                                    @if ($map->is_buildable)
                                        <div class="cursor-pointer" x-data="{ open: false }" x-on:click="open = !open">
                                            <span class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Buildable</span> 
                                            <div class="fixed p-6 rounded-lg left-3 bottom-3 max-w-[350px] bg-dark-100 text-white" x-show="open"><p>Roads and Monuments are buildable. You must read the map description to check if either or both of them can be built upon. Must read the map description for more.</p></div>
                                        </div>
                                        {{-- <span class="link bg-rust-green text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Buildable</span> --}}
                                    @endif
                                </div>
                                <h2 class="text-white/90 text-2xl mb-1">{{ $map->name }}</h2>
                                <a href="{{ route('map.show', $map->slug) }}" class="bg-rust-green text-white link py-2 px-4 w-full text-lg inline-block text-center rounded-sm transition-all hover:bg-rust">Buy ${{ $map->price }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-2xl mt-3 text-center text-white">No Maps data exist at the moment! 😢</p>
        @endif
        <div class="w-full flex items-center justify-center mt-12">
            <a href="#" class="bg-rust text-white link py-2 px-5 w-fit inline-block text-center rounded-sm transition-all hover:bg-rust-green">View All Maps</a>
        </div>
    </div>
</section>