<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    <div id="editor">
                        <p>Hello World!</p>
                        <p>Some initial <strong>bold</strong> text</p>
                        <p><br></p>
                    </div>                   
                </div> --}}
                @if (count($users))
                    <table class="w-full">
                        <tr class="text-sm text-white bg-gray-800">
                            <th class="p-2 text-start">Name</th>
                            <th class="text-start">Email</th>
                            <th class="text-start">Verified</th>
                            <th class="p-2 text-end">SignedUp</th>
                        </tr>
                        @foreach ($users as $item)
                            <tr class="text-sm odd:bg-gray-100">
                                <td class="p-2 text-start">{{ $item->name }}</td>
                                <td class="text-start">{{ $item->email }}</td>
                                <td class="text-start">{{ $item->email_verified_at }}</td>
                                <td class="p-2 text-end">{{ $item->created_at->format('D d-M-Y H:i:s A') }}</td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($users->hasPages())
                        <div class="py-3">
                            {{ $users->links() }}
                        </div>
                    @endif
                @else
                    <p class="py-3 text-center">No users data exist!</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
