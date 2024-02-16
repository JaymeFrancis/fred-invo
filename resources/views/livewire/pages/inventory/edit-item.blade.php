<?php

use function Livewire\Volt\{state};

state(['item'])

?>

<div>
    <div>
        <p>{{ $item->id }}</p>
        <p>{{ $item->itemName }}</p>
        <p>{{ $item->itemQuantity }}</p>
        <p>{{ $item->unitPrice }}</p>
    </div>

    <div class="w-1/2 p-4 border rounded-lg shadow-md">
        <form method="POST" action="#" class="flex flex-col p-6">
            @csrf
            <h2 class="text-lg font-bold text-gray-900 uppercase">
                Edit this item's details
            </h2>
    
            <p class="mt-1 text-sm text-gray-600">
                Please enter the details of the item you want to edit.
            </p>
            
            <div class="mt-6">
                <x-input-label for="itemName" value="Item Name" class="sr-only" />
    
                <x-text-input
                    id="itemName"
                    name="itemName"
                    type="text"
                    class="block w-1/2 mt-1"
                    placeholder="Item Name"
                    value="{{$item->itemName}}"
                />
    
                <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
            </div>
            <div class="mt-3">
                <x-input-label for="itemQuantity" value="Item Quantity" class="sr-only" />
                
                <x-text-input
                    id="itemQuantity"
                    name="itemQuantity"
                    type="text"
                    class="block w-1/2 mt-1"
                    placeholder="Item Quantity"
                    value="{{$item->itemQuantity}}"
                />
    
                <x-input-error :messages="$errors->get('itemQuantity')" class="mt-2" />
                </div>
    
                <div class="mt-3">
                    <x-input-label for="unitPrice" value="Unit Price" class="sr-only" />
    
                    <x-text-input
                        id="unitPrice"
                        name="unitPrice"
                        type="text"
                        class="block w-1/2 mt-1"
                        placeholder="Unit Price"
                        value="{{$item->unitPrice}}"
                    />
    
                    <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
                </div>
    
                <div class="mt-3">
                    <x-input-label for="supplier" value="Supplier" class="sr-only" />
    
                    <x-text-input
                        id="supplier"
                        name="supplier"
                        type="text"
                        class="block w-1/2 mt-1"
                        placeholder="Supplier"
                    />
    
                    <x-input-error :messages="$errors->get('supplier')" class="mt-2" />
                </div>
                
                <div class="flex justify-end mt-6">
                    <x-secondary-button>
                        Cancel
                    </x-secondary-button>
    
                    <x-primary-button class="ms-3">
                        Submit
                    </x-primary-button>
                </div>
        </form>
    </div>
</div>
