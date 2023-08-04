<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl text-gray-800 leading-tight">
                {{ __('Products Database') }}
            </h2>
            <a href="{{ route('product.create') }}" class="py-2 bg-indigo-600 text-white px-4 rounded-md text-sm">Create Product</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (count($products))
                    <table class="w-full">
                        <tr class="text-[12px] text-white bg-gray-800">
                            <th class="p-2 text-start">Name</th>
                            <th class="text-start">Price</th>
                            <th class="text-start">Stripe_ID</th>
                            <th class="text-start">Price_ID</th>
                            <th class="text-start">Gellery Images</th>
                            <th class="text-end">Image</th>
                            <th class="text-end">Posted</th>
                            <th class="p-2 text-end">Visit</th>
                        </tr>
                        @foreach ($products as $item)
                            <tr class="text-[12px] odd:bg-gray-100">
                                <td class="p-2 text-start">{{ $item->name }}</td>
                                <td class="text-start">${{ $item->price }}</td>
                                <td class="text-start">{{ $item->stripe_id }}</td>
                                <td class="text-start">{{ $item->price_id }}</td>
                                <td class="text-start">{{ count($item->images) }}</td>
                                <td class="text-end"><a class="underline text-blue-600" href="{{ asset('/storage/'. $item->thumbnail) }}" target="_blank">View</a></td>
                                <td class="text-end">{{ $item->created_at->format('D d-M-Y H:i:s A') }}</td>
                                <td class="p-2 text-end"><a class="underline text-blue-600" href="{{ route('map.show', $item->slug) }}" target="_blank">Visit</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($products->hasPages())
                        <div class="py-3">
                            {{ $products->links() }}
                        </div>
                    @endif
                @else
                    <p class="py-3 text-center">No product data exist!</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>