<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl text-gray-800 leading-tight">
                {{ __('Free Maps Database') }}
            </h2>
            <a href="{{ route('free.map.create') }}" class="py-2 bg-indigo-600 text-white px-4 rounded-md text-sm">Create FreeMap</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (count($maps))
                    <table class="w-full">
                        <tr class="text-[12px] text-white bg-gray-800">
                            <th class="p-2 text-start">Name</th>
                            <th class="p-2 text-start">Slug</th>
                            <th class="p-2 text-start">Size</th>
                            <th class="text-end p-2">Created</th>
                            <th class="text-end p-2">Updated</th>
                            <th class="text-end p-2">Edit</th>
                        </tr>
                        @foreach ($maps as $item)
                            <tr class="text-[12px] odd:bg-gray-100">
                                <td class="p-2 text-start">{{ $item->name }}</td>
                                <td class="p-2 text-start">{{ $item->slug }}</td>
                                <td class="text-start">{{ $item->map_size }}</td>
                                <td class="text-end p-2">{{ $item->created_at->format('D d-M-Y H:i:s A') }}</td>
                                <td class="text-end p-2">{{ $item->updated_at->format('D d-M-Y H:i:s A') }}</td>
                                <td class="p-2 text-end"><a class="underline text-blue-600" href="{{ route('free.map.update', $item->slug) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($maps->hasPages())
                        <div class="py-3">
                            {{ $maps->links() }}
                        </div>
                    @endif
                @else
                    <p class="py-3 text-center">No maps data exist!</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>