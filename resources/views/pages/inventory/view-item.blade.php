<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800">
            Auto Supply
            <x-icon name="chevron-right" solid mini class="mx-2"/>
            <a href="{{route('inventory')}}" class="hover:text-indigo-700">Inventory</a>
            <x-icon name="chevron-right" solid mini class="mx-2"/>
            View Item               
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-8 sm:px-6 lg:px-8" x-data="{openModal: false}">
            {{-- Navigation --}}
            <div class="flex space-x-4 float-end">
                {{-- Edit button and Modal --}}
                <x-secondary-button type="button" x-on:click="$dispatch('open-modal', 'editItem')">
                    Edit Item Information 
                    <x-icon name="pencil-square" solid class="w-6 h-6 ms-2" />
                </x-secondary-button>

                <livewire:pages.inventory.edit-item :item="$item"/>
                
                {{-- Add Stock button and Modal --}}
                <x-primary-button type="button" x-on:click="$dispatch('open-modal', 'newStock')">
                    Add Stock
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
        <div>
            <p>ID: {{ $item->id }}</p>
            <p>Item Name: {{ $item->itemName }}</p>
            <p>Item Quantity: {{ $item->itemQuantity }}</p>
            <p>Item Price: {{ $item->unitPrice }}</p>
        </div>
    </div>
</x-app-layout>