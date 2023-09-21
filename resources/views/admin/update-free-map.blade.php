<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl text-gray-800 leading-tight">
                {{ __('Update Product') }}
            </h2>
            <a href="{{ route('product.dashboard') }}" class="py-2 bg-indigo-600 text-white px-4 rounded-md text-sm">View Producs</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('update.free.map', $product->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <p class="py-4 border-green-600 border text-center bg-green-700/20 rounded-lg mb-3 text-green-600">{{ session('success') }}</p>
                        @endif
                        <div class="grid grid-cols-2 gap-3">
                            <div class="w-full mb-3">
                                <x-input-label for="name" :value="__('Map Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3">
                                <x-input-label for="slug" :value="__('Map Slug')" />
                                <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="$product->slug" />
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3 col-span-2">
                                <x-input-label for="size" :value="__('Map Size')" />
                                <x-text-input id="size" class="block mt-1 w-full" type="number" name="size" :value="$product->map_size" />
                                <x-input-error :messages="$errors->get('size')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3 p-4 border border-gray-300 rounded-lg">
                                <x-input-label for="thumbnail" :value="__('Map Thumbnail')" />
                                <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" />
                                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3 p-4 border border-gray-300 rounded-lg">
                                <x-input-label for="map" :value="__('Map File')" />
                                <x-text-input id="map" class="block mt-1 w-full" type="file" name="map" :value="old('map')" />
                                <x-input-error :messages="$errors->get('map')" class="mt-2" />
                            </div>
                        </div>
                        <x-primary-button class="mt-6">
                            {{ __('Update') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>