<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <a href="{{ route('product.create') }}" class="p-2 px-4 rounded-sm bg-black font-semibold text-white">Create products</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[99%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($products))
                        <table class="w-full">
                            <tr>
                                <th class="text-start p-2">Stripe</th>
                                <th class="text-start">Name</th>
                                <th class="text-start">Slug</th>
                                <th class="text-start">Orders</th>
                                <th class="text-start">Price</th>
                                <th class="text-start">Image</th>
                                <th class="text-start">Size</th>
                                <th class="text-end">Status</th>
                                <th class="text-end">Edit</th>
                                <th class="text-end p-2">Created</th>
                            </tr>
                            @foreach ($products as $item)
                                <tr class="text-sm">
                                    <td class="text-start p-2">{{ $item->stripe_id }}</td>
                                    <td class="text-start">{{ $item->title }}</td>
                                    <td class="text-start">{{ $item->slug }}</td>
                                    <td class="text-start">{{ $item->orders->count() }}</td>
                                    <td class="text-start">{{ number_format($item->price, 2) }}</td>
                                    <td class="text-start"><a target="_blank" class="underline text-blue-600" href="{{ asset('/storage/'. $item->image) }}">Image</a></td>
                                    <td class="text-start">{{ $item->size }}</td>
                                    <td class="text-end"><a class="underline text-blue-600" href="{{ route('product.update', $item->slug) }}">Update</a></td>
                                    <td class="text-end"><form action="{{ route('product.status', $item->slug) }}" method="post">
                                        @csrf
                                        @method("PATCH")
                                        <button type="submit" class="font-semibold py-1 px-2 @if ($item->is_active)
                                            bg-black
                                        @else
                                            bg-red-600
                                        @endif  rounded-md text-white">
                                            @if ($item->is_active)
                                                Active
                                            @else
                                                InActive
                                            @endif
                                        </button>
                                    </form>
                                    <td class="text-end p-2">{{ $item->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center">No product exist in the database!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>