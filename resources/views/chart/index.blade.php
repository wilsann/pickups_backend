<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Recap') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg container max-width: 768px;">

                @livewire('chart.index')
                <main class="container">
                    @yield('content')
                </main>
                @livewireScripts
                @stack('js')
            </div>
        </div>
    </div>
</x-app-layout>
