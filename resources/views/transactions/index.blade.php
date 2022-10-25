<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('print-date') }}" target="blank" class="inline-block bg-green-500 hover:bg-green-700 transition duration-150 text-white py-2 px-4 mx-2 rounded">
                    Print <i class="fa-solid fa-print"></i>
                </a>
                <a href="{{ route('charts') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 transition duration-150 text-white py-2 px-4 mx-2 rounded">
                    Show Graphic <i class="fa-solid fa-print"></i>
                </a>
            </div>

            {{-- SearchBar --}}
            <div class="mb-2">
                <input id="" name="search" type="text" wire:model="term" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" wire:model="search" placeholder="Search">
            </div>

            <div class="bg-white rounded-xl shadow-md">
            {{-- Table --}}
                <table class="table-auto w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="border px-6 py-4">No</th>
                            <th class="border px-6 py-4">Trash</th>
                            <th class="border px-6 py-4">User</th>
                            <th class="border px-6 py-4">Quantity</th>
                            <th class="border px-6 py-4">Total</th>
                            <th class="border px-6 py-4">Date</th>
                            <th class="border px-6 py-4">Status</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $index => $item)
                        <tr>
                            <td class="border px-6 py-4">{{ $transactions->firstItem() + $index }}</td>
                            <td class="border px-6 py-4">{{ $item->trash->name }}</td>
                            <td class="border px-6 py-4">{{ $item->user->name }}</td>
                            <td class="border px-6 py-4">{{ $item->quantity }}</td>
                            <td class="border px-6 py-4">{{ number_format($item->total) }}</td>
                            <td class="border px-6 py-4">{{ date('d M Y', $item->created_at) }}</td>
                            <td class="border px-6 py-4">{{ $item->status }}</td>
                            <td class="border px-6 py-4 text-center">
                                <a href="{{ route('transactions.show', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 transition duration-150 text-white py-2 px-4 mx-2 rounded">
                                    View
                                </a>
                                <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 transition duration-150 text-white py-2 px-4 mx-2 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border text-center py-5">
                                    Data tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
