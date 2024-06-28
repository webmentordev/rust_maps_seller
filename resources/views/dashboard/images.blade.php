<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[99%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('image.create') }}" method="post" enctype="multipart/form-data" class="flex items-center mb-4">
                        @csrf
                        <div class="w-full">
                            <x-text-input id="image" class="block mt-1 w-full p-1" type="file" multiple name="image[]" accept="image/*" required />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-select name="product" required class="w-full">
                                <option value="" selected>Please select a product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->slug }}" selected>{{ $product->title }}</option>  
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('product')" class="mt-2" />
                        </div>
                        <x-primary-button class="ml-4">
                            {{ __('Upload') }}
                        </x-primary-button>
                    </form>
                    @if (count($images))
                        <table class="w-full">
                            <tr>
                                <th class="text-start p-2">Image</th>
                                <th class="text-start">Product</th>
                                <th class="text-start">Created</th>
                                <th class="text-end p-2">Delete</th>
                            </tr>
                            @foreach ($images as $item)
                                <tr class="text-sm">
                                    <td class="text-start p-2">{{ $item->image }}</td>
                                    <td class="text-start">{{ $item->product->title }}</td>
                                    <td class="text-start">{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="text-end p-2"><form action="{{ route('image.delete', $item->id) }}" method="post" onsubmit="return confirm('Do you really sure you want to delete?');">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="font-semibold text-red-500">Delete</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center">No images exist in the database!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>