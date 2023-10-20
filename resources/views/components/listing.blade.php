<section class="w-full">
    <div class="max-w-5xl m-auto py-[120px] px-4"> 
        <h1 class="text-6xl text-white leading-10 text-center mb-6">New Rust Maps</h1>
        @if (count($maps))
            <div class="grid grid-cols-3 gap-6 mt-6 m-auto 710:flex 710:flex-col 1000:grid-cols-2 1000:max-w-2xl">
                @foreach ($maps as $map)
                    <div class="bg-dark-100 p-3 rounded-lg 710:max-w-[440px] w-full m-auto">
                        <div class="overflow-hidden rounded-lg relative">
                            <span class="link absolute z-10 bg-rust top-2 left-3 py-1 px-2 rounded-md text-lg text-white">{{ $map->map_size }} MAP</span>
                            <span class="link absolute z-10 bg-rust top-2 right-3 py-1 px-2 rounded-md text-lg text-white">${{ $map->price }}</span>
                            <img class="rounded-lg w-full lazyload" data-src="{{ asset('/storage/'. $map->thumbnail) }}" title="{{ $map->name }}" alt="{{ $map->name }} Map Image">
                            <div class="px-2 py-4 w-full">
                                <div class="flex items-center">
                                    <span class="link bg-dark text-sm text-gray-200 py-2 px-3 mb-2 inline-block">{{ $map->created_at->diffForHumans() }}</span>
                                    @if ($map->is_fps)
                                        <a href="#questions" class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">FPS+</a>
                                    @endif
                                    @if ($map->is_combined)
                                        <a href="#questions" class="link bg-rust-green text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Combined</a> 
                                    @endif
                                    @if ($map->is_buildable)
                                        <a href="#questions" class="link bg-rust text-sm text-gray-200 py-2 px-3 mb-2 inline-block ml-1">Buildable</a> 
                                    @endif
                                </div>
                                <h2 class="text-white/90 text-2xl mb-1">{{ $map->name }}</h2>
                                <a href="{{ route('map.show', $map->slug) }}" class="bg-rust-green text-white link py-2 px-4 w-full text-lg inline-block text-center rounded-sm transition-all hover:bg-rust">Read More </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-2xl mt-3 text-center text-white">No Maps data exist at the moment! 😢</p>
        @endif
        <div class="w-full flex items-center justify-center mt-12">
            <a href="{{ route('maps.fetch') }}" class="bg-rust text-white link py-2 px-5 w-fit inline-block text-center rounded-sm transition-all hover:bg-rust-green">View All Maps</a>
        </div>
    </div>
</section>