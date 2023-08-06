<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl text-gray-800 leading-tight">
                {{ __('Products Database') }}
            </h2>
            <a href="{{ route('product.dashboard') }}" class="py-2 bg-indigo-600 text-white px-4 rounded-md text-sm">View Producs</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('create.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <p class="py-4 border-green-600 border text-center bg-green-700/20 rounded-lg mb-3 text-green-600">{{ session('success') }}</p>
                        @endif
                        <div class="grid grid-cols-2 gap-3">
                            <div class="w-full mb-3">
                                <x-input-label for="name" :value="__('Map Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3">
                                <x-input-label for="price" :value="__('Map Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price')" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3 col-span-2">
                                <x-input-label for="size" :value="__('Map Size')" />
                                <x-text-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')" required />
                                <x-input-error :messages="$errors->get('size')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3 p-4 border border-gray-300 rounded-lg">
                                <x-input-label for="thumbnail" :value="__('Map Thumbnail')" />
                                <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" required />
                                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3 p-4 border border-gray-300 rounded-lg">
                                <x-input-label for="map" :value="__('Map File')" />
                                <x-text-input id="map" class="block mt-1 w-full" type="file" name="map" :value="old('map')" required />
                                <x-input-error :messages="$errors->get('map')" class="mt-2" />
                            </div>
                            <div class="col-span-2">
                                <x-input-label for="editor" :value="__('Body')" />
                                <textarea id="editor" name="description">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div class="col-span-2 flex">
                                <div class="block mt-4 mr-4">
                                    <label for="is_fps" class="inline-flex items-center">
                                        <input id="is_fps" type="checkbox" class="rounded border-gray-300 mr-2 text-indigo-600 shadow-sm focus:ring-indigo-500" name="fps">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Is FPS') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4 mr-4">
                                    <label for="is_combined" class="inline-flex items-center">
                                        <input id="is_combined" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="combined">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Is Combined') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4 mr-4">
                                    <label for="is_buildable" class="inline-flex items-center">
                                        <input id="is_buildable" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="buildable">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Is Buildable') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <x-primary-button class="mt-6">
                            {{ __('Create Product') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>