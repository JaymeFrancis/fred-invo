<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800">
            Auto Supply
            <x-icon name="chevron-right" solid mini class="mx-2" />
            Inventory
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-8 sm:px-6 lg:px-8">
            {{-- Navigation --}}
            <div class="flex space-x-4 float-end">
                <x-secondary-button type="button">
                    <a href="{{ route('supplier') }}" class="flex items-center">
                        Suppliers
                        <x-icon name="truck" solid class="w-6 h-6 ms-2" />
                    </a>
                </x-secondary-button>

                <x-primary-button type="button">
                    <a href="{{ route('record-new-item') }}" class="flex items-center">
                        Record New Item
                        <x-icon name="plus-circle" solid class="w-6 h-6 ms-2" />
                    </a>
                </x-primary-button>


            </div>

            {{-- Table --}}
            @if (session()->has('success'))
                {{ session()->get('success') }}
            @endif

        </div>
    </div>

    <div class="m-8 bg-white rounded-md shadow-lg sm:p-6 lg:p-8">
        <livewire:tables.autosupplytable lazy />
    </div>
</x-app-layout>
