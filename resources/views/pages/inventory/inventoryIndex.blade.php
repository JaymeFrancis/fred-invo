<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800">
            Auto Supply
            <x-icon name="chevron-right" solid mini class="mx-2" />
            Inventory
        </h2>
    </x-slot>

    <div class="p-2 my-4 bg-white rounded-md shadow-md">
        {{-- Navigation --}}
        <div class="flex justify-between p-4">
            <div class="border-s-[16px] bg-blue-100 p-2 rounded border-s-blue-500 ps-1">
                <h2 class="text-lg font-bold text-blue-700 uppercase">
                    List of Auto Supply
                </h2>

                <p class="mt-1 text-sm text-gray-700">
                    All items that present in the inventory can be found on the table
                </p>
            </div>
            <div class="flex flex-col-reverse gap-2 mb-auto lg:flex-row justify-items-center">
                <x-secondary-button type="button">
                    <a href="{{ route('supplier') }}" class="flex items-center">
                        <x-icon name="truck" solid class="w-5 h-5 me-2" />
                        Suppliers
                    </a>
                </x-secondary-button>

                <x-primary-button type="button">
                    <a href="{{ route('record-new-item') }}" class="flex items-center">
                        <x-icon name="plus-circle" solid class="w-5 h-5 me-2" />
                        Record New Item
                    </a>
                </x-primary-button>
            </div>
        </div>

        {{-- Table --}}
        @if (session()->has('success'))
            {{ session()->get('success') }}
        @endif
    </div>
    <div class="my-4">
        <livewire:tables.autosupplytable lazy />
    </div>

</x-app-layout>
