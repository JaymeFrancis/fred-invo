<?php

use App\Models\AutoSupply;
use function Livewire\Volt\{state};

state([
    'item',
]);

$updateItemInformation = function() {

    $currentItem = AutoSupply::find($item->id);

    $validated = $this->validate([
        'itemName' => 'required|string|max:255|unique:'.AutoSupply::class,
        'itemQuantity' => 'required|numeric',
        'unitPrice' => 'required|numeric',
    ]);

    $currentItem->update([
        'itemName' => $validated['itemName'],
        'itemQuantity' => $validated['itemQuantity'],
        'unitPrice' => $validated['unitPrice'],
    ]);
}

?>

<x-modal name="editItem" :show="$errors->isNotEmpty()" focusable>
        <form action="#" class="flex flex-col p-6">
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
                    wire:model="name"
                    type="text"
                    class="block w-full mt-1"
                    placeholder="Item Name"
                    value="{{$item->itemName}}"
                />
    
                <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
            </div>
            <div class="mt-3">
                <x-input-label for="itemQuantity" value="Item Quantity" class="sr-only" />
                
                <x-text-input
                    id="itemQuantity"
                    wire:model="quantity"
                    type="text"
                    class="block w-full mt-1"
                    placeholder="Item Quantity"
                    value="{{$item->itemQuantity}}"
                />
    
                <x-input-error :messages="$errors->get('itemQuantity')" class="mt-2" />
                </div>
    
                <div class="mt-3">
                    <x-input-label for="unitPrice" value="Unit Price" class="sr-only" />
    
                    <x-text-input
                        id="unitPrice"
                        wire:model="price"
                        type="text"
                        class="block w-full mt-1"
                        placeholder="Unit Price"
                        value="{{$item->unitPrice}}"
                    />
    
                    <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
                </div>
    
                <div class="mt-3">
                    <x-input-label for="supplier" value="Supplier" class="sr-only" />
    
                    <x-text-input
                        id="supplier"
                        wire:model="supplier"
                        type="text"
                        class="block w-full mt-1"
                        placeholder="Supplier"
                    />
    
                    <x-input-error :messages="$errors->get('supplier')" class="mt-2" />
                </div>
                
                <div class="flex justify-end mt-6">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Cancel
                    </x-secondary-button>
    
                    <x-primary-button class="ms-3">
                        Submit
                    </x-primary-button>
                </div>
        </form>
</x-modal>
