<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[99%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($contacts))
                        <table class="w-full">
                            <tr>
                                <th class="text-start p-2">Name</th>
                                <th class="text-start">Email</th>
                                <th class="text-start">Subject</th>
                                <th class="text-start">Message</th>
                                <th class="text-start">Created</th>
                                <th class="text-end p-2">Delete</th>
                            </tr>
                            @foreach ($contacts as $item)
                                <tr class="text-sm">
                                    <td class="text-start p-2">{{ $item->name }}</td>
                                    <td class="text-start">{{ $item->email }}</td>
                                    <td class="text-start">{{ $item->subject }}</td>
                                    <td class="text-start">{{ $item->message }}</td>
                                    <td class="text-start">{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="text-end p-2"><form action="{{ route('contact.delete', $item->id) }}" method="post" onsubmit="return confirm('Do you really sure you want to delete?');">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="font-semibold text-red-500">Delete</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center">No contacts exist in the database!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>