<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[99%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($orders))
                        <table class="w-full">
                            <tr>
                                <th class="text-start p-2">Product</th>
                                <th class="text-start">Email</th>
                                <th class="text-start">Price</th>
                                <th class="text-start">Status</th>
                                <th class="text-end">Created</th>
                                <th class="text-end">Created</th>
                                <th class="text-end p-2">Delete</th>
                            </tr>
                            @foreach ($orders as $item)
                                <tr class="text-sm">
                                    <td class="text-start p-2">{{ $item->product->title }}</td>
                                    <td class="text-start">{{ $item->email }}</td>
                                    <td class="text-start">{{ $item->price }}</td>
                                    <td class="text-start font-semibold">
                                        @if ($item->status == 'pending')
                                            <span class="rounded-lg bg-yellow-300 py-1 px-2">Pending</span>
                                        @elseif ($item->status == 'completed')
                                            <span class="rounded-lg bg-rust-green py-1 px-2 text-white">Completed</span>
                                        @else
                                            <span class="rounded-lg bg-rust py-1 px-2 text-white">Canceled</span>
                                        @endif
                                    </td>
                                    <td class="text-end">{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="text-end">{{ $item->updated_at->diffForHumans() }}</td>
                                    <td class="text-end p-2"><form action="{{ route('order.delete', $item->id) }}" method="post" onsubmit="return confirm('Do you really sure you want to delete?');">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="font-semibold text-red-500">Delete</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center">No orders exist in the database!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>