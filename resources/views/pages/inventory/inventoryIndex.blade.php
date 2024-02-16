<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800">
            Auto Supply
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mx-2">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
            Inventory              
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-8 sm:px-6 lg:px-8">
            {{-- Navigation --}}
            <div class="flex space-x-4 float-end" x-data="{openModal: false}">
                <x-secondary-button type="button">
                    Suppliers 
                    <x-icon name="truck" solid class="w-6 h-6 ms-2"/>
                </x-secondary-button>
                
                {{-- $dispatch('open-modal', 'newStock') --}}
                <x-primary-button type="button" x-on:click="$dispatch('open-modal', 'newStock')">
                    Add New Stocks 
                    <x-icon name="plus-circle" solid class="w-6 h-6 ms-2" />
                </x-primary-button>
            
                <livewire:pages.inventory.add-new-stocks>
            </div>
                
            {{-- Table --}}
            @if (session()->has('success'))
                {{session()->get('success')}}
            @endif

        </div>
    </div>

    <div class="m-8 bg-white rounded-md shadow-lg sm:p-6 lg:p-8">
        <livewire:tables.autosupplytable />
    </div>
</x-app-layout>