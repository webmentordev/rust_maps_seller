<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('Product Images Gellery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('gellery') }}" method="post" enctype="multipart/form-data" class="flex items-center p-6">
                    @csrf
                    <div class="w-full mr-3">
                        <x-input-label for="images" :value="__('Multiple Images')" />
                        <x-text-input id="images" class="block mt-1 w-full" type="file" name="images[]" accept="images/*" :value="old('images')" multiple required />
                        <x-input-error :messages="$errors->get('images')" class="mt-2" />
                    </div>
                    <div>
                        <x-select name="product">
                            <option value="" selected>--Select the product--</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('product')" class="mt-2" />
                    </div>
                    <x-primary-button class="ml-3">
                        {{ __('Upload') }}
                    </x-primary-button>
                </form>
                @if (count($gellery))
                    <table class="w-full">
                        <tr class="text-sm text-white bg-gray-800">
                            <th class="p-2 text-start">Image</th>
                            <th class="text-start">Product</th>
                            <th class="text-start">IsActive</th>
                            <th class="p-2 text-end">SignedUp</th>
                        </tr>
                        @foreach ($gellery as $item)
                            <tr class="text-sm odd:bg-gray-100">
                                <td class="p-2 text-start"><a href="{{ asset('/storage/'.$item->url) }}" target="_blank"><img data-src="{{ asset('/storage/'.$item->url) }}" class="lazyload" loading="lazy" width="60"></a></td>
                                <td class="text-start">{{ $item->product->name }}</td>
                                <td class="text-start flex">
                                    @if ($item->is_active)
                                        Active
                                    @else
                                        InActive
                                    @endif
                                </td>
                                <td class="p-2 text-end">{{ $item->created_at->format('D d-M-Y H:i:s A') }}</td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($gellery->hasPages())
                        <div class="py-3">
                            {{ $gellery->links() }}
                        </div>
                    @endif
                @else
                    <p class="py-3 text-center">No image data exist in gellery!</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>