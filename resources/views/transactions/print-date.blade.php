<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">No</th>
                            <th class="border px-6 py-4">Trash</th>
                            <th class="border px-6 py-4">User</th>
                            <th class="border px-6 py-4">Quantity</th>
                            <th class="border px-6 py-4">Total</th>
                            <th class="border px-6 py-4">Date</th>
                            <th class="border px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($printTransaction as $index => $item)
                        <tr>
                            <td class="border px-6 py-4">{{ $printTransaction->firstItem() + $index }}</td>
                            <td class="border px-6 py-4">{{ $item->trash->name }}</td>
                            <td class="border px-6 py-4">{{ $item->user->name }}</td>
                            <td class="border px-6 py-4">{{ $item->quantity }}</td>
                            <td class="border px-6 py-4">{{ number_format($item->total) }}</td>
                            <td class="border px-6 py-4">{{ date('d M Y', $item->created_at) }}</td>
                            <td class="border px-6 py-4">{{ $item->status }}</td>
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
                {{ $printTransaction->links() }}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>