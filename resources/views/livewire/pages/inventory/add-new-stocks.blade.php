<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800">
            Auto Supply
            <x-icon name="chevron-right" solid mini class="mx-2" />
            <a href="{{ route('inventory') }}" class="hover:text-white">Inventory</a>
            <x-icon name="chevron-right" solid mini class="mx-2" />
            Record New Item
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="mt-4 bg-white rounded-md shadow-lg lg:mx-16 sm:p-4 lg:p-6" x-data='{open: false}'
            x-init="open = ('{{ old('supplierType') }}' == 'new' ? true : false)">
            <form method="POST" action="{{ route('store-item') }}" class="flex flex-col">
                @csrf
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 uppercase">
                            Record item form
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Please enter the details of the item you want to add.
                        </p>
                    </div>
                    <div>
                        <x-secondary-button x-on:click='open = !open' type="button"
                            class='text-white !bg-cyan-500 hover:!bg-cyan-600'>
                            <span x-text="open ? ' Choose From Existing Supplier' : 'New Supplier'"></span>
                        </x-secondary-button>
                        <input type="hidden" readonly :value="open ? 'new' : 'existing'" name="supplierType">
                    </div>
                </div>
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

                <div class="mt-3" x-show='!open'>
                    <x-input-label value="Supplier" class="uppercase" />

                    <x-select-search-dropdown model='{{ $suppliers }}' placeHolder="Select item supplier"
                        name='supplierId' />

                    <x-input-error :messages="$errors->get('supplierId')" class="mt-2" />
                </div>

                <div class="flex-col" x-show='open'>
                    <div class="w-full mt-3">
                        <x-input-label for="supplierName" value="Supplier Name" class="uppercase" />

                        <x-text-input id="supplierName" name="supplierName" type="text" class="block w-full mt-1"
                            placeholder="Supplier Name" value="{{ old('supplierName') }}" />

                        <x-input-error :messages="$errors->get('supplierName')" class="mt-2" />
                    </div>
                    <div class="flex flex-col md:space-x-4 md:flex-row">
                        <div class="mt-3 md:w-3/5">
                            <x-input-label for="supplierAddress" value="Supplier Address" class="uppercase" />

                            <x-text-input id="supplierAddress" name="supplierAddress" type="text"
                                class="block w-full mt-1" placeholder="Supplier Address"
                                value="{{ old('supplierAddress') }}" />

                            <x-input-error :messages="$errors->get('supplierAddress')" class="mt-2" />
                        </div>

                        <div class="mt-3 md:w-2/5">
                            <x-input-label for="supplierContactNumber" value="Supplier Contact Number"
                                class="uppercase" />

                            <x-text-input id="supplierContactNumber" name="supplierContactNumber" type="text"
                                class="block w-full mt-1" placeholder="Supplier Contact Number"
                                value="{{ old('supplierContactNumber') }}" />

                            <x-input-error :messages="$errors->get('supplierContactNumber')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <x-secondary-button class="text-white !bg-red-500 hover:bg-red-700">
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
