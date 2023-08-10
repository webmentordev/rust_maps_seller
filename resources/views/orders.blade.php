<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (count($orders))
                    <table class="w-full">
                        <tr class="text-[12px] text-white bg-gray-800">
                            <th class="p-2 text-start">OrderID</th>
                            <th class="p-2 text-start">Name</th>
                            <th class="p-2 text-start">email</th>
                            <th class="text-start">Product</th>
                            <th class="text-start">Status</th>
                            <th class="text-start">Price</th>
                            <th class="text-end p-2">Created</th>
                        </tr>
                        @foreach ($orders as $item)
                            <tr class="text-[12px] odd:bg-gray-100">
                                <td class="p-2 text-start">#{{ $item->order_id }}</td>
                                <td class="p-2 text-start">{{ $item->user->name }}</td>
                                <td class="text-start">{{ $item->user->email }}</td>
                                <td class="text-start">{{ $item->product->name }}</td>
                                <td class="text-start">{{ $item->status }}</td>
                                <td class="text-start">${{ $item->price }}</td>
                                <td class="text-end p-2">{{ $item->created_at->format('D d-M-Y H:i:s A') }}</td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($orders->hasPages())
                        <div class="py-3">
                            {{ $orders->links() }}
                        </div>
                    @endif
                @else
                    <p class="py-3 text-center">No orders data exist!</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>