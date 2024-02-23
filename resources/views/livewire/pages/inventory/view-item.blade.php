<?php
use App\Models\AutoSupply;
use Illuminate\Validation\Rule;
use function Livewire\Volt\{state, mount};

state(['itemId', 'itemName', 'itemQuantity', 'unitPrice']);

mount(function ($item) {
    $this->itemId = $item->id;
    $this->itemName = $item->itemName;
    $this->itemQuantity = $item->itemQuantity;
    $this->unitPrice = $item->unitPrice;
});

//Update this item's data excluding quantity
$updateItemInformation = function () {
    $currentItem = AutoSupply::find($this->itemId);

    $validated = $this->validate([
        'itemName' => 'required|string|max:255|' . Rule::unique(AutoSupply::class)->ignore($this->itemId),
        'itemQuantity' => 'required|numeric',
        'unitPrice' => 'required|numeric',
    ]);

    $currentItem->update([
        'itemName' => $validated['itemName'],
        'itemQuantity' => $validated['itemQuantity'],
        'unitPrice' => $validated['unitPrice'],
    ]);

    $this->dispatch('close-modal', 'editItem');
};
?>


<div class="m-8 bg-white rounded-md shadow-lg sm:p-6 lg:p-8">
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

                <x-text-input id="itemName" wire:model="itemName" type="text" class="block w-full mt-1"
                    placeholder="Item Name" />

                <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="unitPrice" value="Unit Price" class="" />

                <x-text-input id="unitPrice" wire:model="unitPrice" type="text" class="block w-full mt-1"
                    placeholder="Unit Price" />

                <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="supplier" value="Supplier" class="" />

                <x-text-input id="supplier" wire:model="supplier" type="text" class="block w-full mt-1"
                    placeholder="Supplier" />

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

    <x-modal name="addStock" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6" x-data='{decrease: false}'>
            <div class="flex justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 uppercase">
                        <span x-text="decrease ? 'Deduct' : 'Add'"></span> item quantity
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Please enter the number of the item you want to
                        <span x-text="decrease ? 'deduct' : 'add'"></span>.
                    </p>
                </div>
                <div>
                    <x-primary-button x-on:click='decrease = !decrease'
                        x-bind:class="decrease
                            ?
                            'bg-green-700 active:bg-green-700 hover:bg-green-700 focus:bg-green-700' :
                            'bg-red-700 active:bg-red-700 hover:bg-red-700 focus:bg-red-700'">
                        <template x-if="decrease" x-transition>
                            <x-icon name="plus-circle" solid mini class="w-6 h-6" />
                        </template>
                        <template x-if="!decrease" x-transition>
                            <x-icon name="minus-circle" solid mini class="w-6 h-6" />
                        </template>
                    </x-primary-button>
                </div>
            </div>
            <form action="#" class="flex flex-col mt-2">
                <div class="flex space-x-4">
                    <div class="w-full mt-6">
                        <x-input-label for="itemQuantity" value="On Hand Quantity" class="" />

                        <x-text-input id="itemQuantity" wire:model="itemQuantity" type="text" class="w-full mt-1 "
                            placeholder="Item Quantity" disabled />

                        <x-input-error :messages="$errors->get('itemQuantity')" class="mt-2" />
                    </div>

                    <div class="w-full mt-6">
                        <x-input-label for="quantity" value="Quantity" class="" />

                        <x-text-input id="quantity" wire:model="quantity" type="text" class="w-full mt-1 "
                            placeholder="Quantity" />

                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div>
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
        </div>
    </x-modal>
</div>
