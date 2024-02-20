<?php

use App\Models\AutoSupply;
use Illuminate\Validation\Rule;
use function Livewire\Volt\{state, mount};


state([
    'itemId',
    'itemName',
    'itemQuantity',
    'unitPrice',
]);

mount(function ($item){
    $this->itemId = $item->id;
    $this->itemName = $item->itemName;
    $this->itemQuantity = $item->itemQuantity;
    $this->unitPrice = $item->unitPrice;
});


$updateItemInformation = function() {

    $currentItem = AutoSupply::find($this->itemId);

    $validated = $this->validate([
        'itemName' => 'required|string|max:255|'.Rule::unique(AutoSupply::class)->ignore($this->itemId),
        'itemQuantity' => 'required|numeric',
        'unitPrice' => 'required|numeric',
    ]);

    $currentItem->update([
        'itemName' => $validated['itemName'],
        'itemQuantity' => $validated['itemQuantity'],
        'unitPrice' => $validated['unitPrice'],
    ]);

    $this->dispatch('close-modal', 'editItem');
}

?>

<div>
    <div>
        <p>ID: {{ $itemId }}</p>
        <p>Item Name: {{ $itemName }}</p>
        <p>Item Quantity: {{ $itemQuantity }}</p>
        <p>Item Price: {{ $unitPrice }}</p>
    </div>

    <x-modal name="editItem" :show="$errors->isNotEmpty()" focusable>
            <form wire:submit='updateItemInformation' class="flex flex-col p-6">
                @csrf
                <h2 class="text-lg font-bold text-gray-900 uppercase">
                    Edit this item's details
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Please enter the details of the item you want to edit.
                </p>
                
                <div class="mt-6">
                    <x-input-label for="itemName" value="Item Name" class="" />
        
                    <x-text-input
                        id="itemName"
                        wire:model="itemName"
                        type="text"
                        class="block w-full mt-1"
                        placeholder="Item Name"
                    />
        
                    <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
                </div>
        
                <div class="mt-3">
                    <x-input-label for="unitPrice" value="Unit Price" class="" />
    
                    <x-text-input
                        id="unitPrice"
                        wire:model="unitPrice"
                        type="text"
                        class="block w-full mt-1"
                        placeholder="Unit Price"
                    />
    
                    <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
                </div>
    
                <div class="mt-3">
                    <x-input-label for="supplier" value="Supplier" class="" />
    
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
</div>