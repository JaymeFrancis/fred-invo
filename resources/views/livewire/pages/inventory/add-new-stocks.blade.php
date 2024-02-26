<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800">
            Auto Supply
            <x-icon name="chevron-right" solid mini class="mx-2" />
            <a href="{{ route('inventory') }}" class="hover:text-indigo-700">Inventory</a>
            <x-icon name="chevron-right" solid mini class="mx-2" />
            Record New Item
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="m-8 bg-white rounded-md shadow-lg sm:p-4lg:p-6">
            <form method="POST" action="{{ route('store-item') }}" class="flex flex-col p-6">
                @csrf
                <h2 class="text-lg font-bold text-gray-900 uppercase">
                    Record item form
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Please enter the details of the item you want to add.
                </p>

                <div class="mt-6">
                    <x-input-label for="itemName" value="Item Name" class="uppercase" />

                    <x-text-input id="itemName" name="itemName" type="text" class="block w-full mt-1"
                        placeholder="Item Name" value="{{ old('itemName') }}" />

                    <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
                </div>
                <div class="flex space-x-4">

                    <div class="w-full mt-3">
                        <x-input-label for="itemQuantity" value="Item Quantity" class="uppercase" />

                        <x-text-input id="itemQuantity" name="itemQuantity" type="text" class="block w-full mt-1"
                            placeholder="Item Quantity" value="{{ old('itemQuantity') }}" />

                        <x-input-error :messages="$errors->get('itemQuantity')" class="mt-2" />
                    </div>

                    <div class="w-full mt-3">
                        <x-input-label for="unitPrice" value="Unit Price" class="uppercase" />

                        <x-text-input id="unitPrice" name="unitPrice" type="text" class="block w-full mt-1"
                            placeholder="Unit Price" value="{{ old('unitPrice') }}" />

                        <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-3">
                    <x-input-label value="Supplier" class="uppercase" />
                    <x-select-search-dropdown model='{{ $suppliers }}' placeHolder="Select item supplier" />

                    {{-- 

                    <x-text-input id="supplier" name="supplier" type="text" class="block w-full mt-1"
                        placeholder="Supplier" />

                    <x-input-error :messages="$errors->get('supplier')" class="mt-2" /> --}}
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
</x-app-layout>
