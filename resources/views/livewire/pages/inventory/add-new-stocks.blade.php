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
        <div class="mt-4 bg-white rounded-md shadow-lg lg:mx-16 sm:p-4 lg:p-6" x-data='autoSupplyFunction'>
            <form method="POST" action="{{ route('store-item') }}" class="flex flex-col">
                @csrf
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 uppercase">
                            Recording of Auto Supply Form
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Please enter the details of the items that you want to add to the inventory.
                        </p>
                    </div>
                    <div class="flex">
                        <x-secondary-button class="text-white !bg-red-500 hover:bg-red-700">
                            Cancel
                        </x-secondary-button>

                        <x-primary-button class="px-6 ms-3">
                            Save
                        </x-primary-button>
                    </div>
                </div>

                <div class="p-4 mt-6 border border-t-2 rounded-sm shadow-sm border-t-green-600">
                    <div class="flex justify-between mb-2">
                        <h2 class="text-lg font-bold text-gray-900 uppercase">
                            Supplier Details
                        </h2>
                        <div>
                            <x-secondary-button x-on:click='toggle()' type="button"
                                class='text-white !bg-sky-600 hover:!bg-sky-700'>
                                <span x-text="open ? ' Choose From Existing Supplier' : 'New Supplier'"></span>
                            </x-secondary-button>
                            <x-input-label value="Supplier Type" class="sr-only" />
                            <input type="hidden" id="supplierType" readonly :value="open ? 'new' : 'existing'"
                                name="supplierType">
                        </div>
                    </div>
                    <div class="mt-3" x-show='!open'>
                        <x-input-label value="Supplier Name" class="uppercase" />

                        <x-select-search-dropdown model='{{ $suppliers }}' placeHolder="Select item supplier"
                            name='supplierId' />

                        <x-input-error :messages="$errors->get('supplierId')" class="mt-2" />
                    </div>
                    <div class="flex flex-col md:space-x-4 md:flex-row" x-show='open'>
                        <div class="mt-3 md:w-2/5">
                            <x-input-label for="supplierName" value="Supplier Name" class="uppercase" />

                            <x-text-input id="supplierName" name="supplierName" type="text" class="block w-full mt-1"
                                placeholder="Supplier Name" value="{{ old('supplierName') }}" />

                            <x-input-error :messages="$errors->get('supplierName')" class="mt-2" />
                        </div>

                        <div class="mt-3 md:w-2/5">
                            <x-input-label for="supplierAddress" value="Supplier Address" class="uppercase" />

                            <x-text-input id="supplierAddress" name="supplierAddress" type="text"
                                class="block w-full mt-1" placeholder="Supplier Address"
                                value="{{ old('supplierAddress') }}" />

                            <x-input-error :messages="$errors->get('supplierAddress')" class="mt-2" />
                        </div>

                        <div class="mt-3 md:w-1/5">
                            <x-input-label for="supplierContactNumber" value="Contact Number" class="uppercase" />

                            <x-text-input id="supplierContactNumber" name="supplierContactNumber" type="text"
                                class="block w-full mt-1" placeholder="Contact Number"
                                value="{{ old('supplierContactNumber') }}" />

                            <x-input-error :messages="$errors->get('supplierContactNumber')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="p-4 mt-6 border border-t-2 rounded-sm shadow-sm border-t-green-600">
                    <h2 class="text-lg font-bold text-gray-900 uppercase">
                        Auto Supply Details
                    </h2>
                    <div class="flex space-x-1">
                        <div class="w-full mt-3">
                            <x-input-label for="itemName" value="Item Name" class="uppercase" />

                            <x-text-input id="itemName" name="item[0][itemName]" type="text"
                                class="block w-full mt-1" placeholder="Item Name"
                                value="{{ old('item.0.itemName') }}" />

                            <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
                        </div>

                        <div class="w-4/12 mt-3">
                            <x-input-label for="itemQuantity" value="Item Quantity" class="uppercase" />

                            <x-text-input id="itemQuantity" name="item[0][itemQuantity]" type="text"
                                class="block w-full mt-1" placeholder="Item Quantity"
                                value="{{ old('item.0.itemQuantity') }}" />

                            <x-input-error :messages="$errors->get('itemQuantity')" class="mt-2" />
                        </div>

                        <div class="w-4/12 mt-3">
                            <x-input-label for="unitPrice" value="Unit Price" class="uppercase" />

                            <x-text-input id="unitPrice" name="item[0][unitPrice]" type="text"
                                class="block w-full mt-1" placeholder="Unit Price"
                                value="{{ old('item.0.unitPrice') }}" />

                            <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
                        </div>
                        <div class="w-2/12 mt-3">
                            <x-input-label for="actions" value="Actions" class="uppercase" />
                            <button type="button" x-on:click="addNewField()"
                                class="w-full p-2 mt-1 text-center text-white bg-green-500 border border-gray-300 rounded-md hover:bg-green-600"
                                id="actions">+</button>
                        </div>
                    </div>

                    <template x-for="(field, index) in supplyFields" :key="index">
                        <div class="flex space-x-1">
                            <div class="w-full mt-3">

                                <x-text-input x-bind:name="`item[${index + 1}][itemName]`" x-model='field.itemName'
                                    type="text" class="block w-full mt-1" placeholder="Item Name"
                                    value="{{ old('itemName') }}" />

                                <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
                            </div>

                            <div class="w-4/12 mt-3">

                                <x-text-input x-bind:name="`item[${index + 1}][itemQuantity]`" type="text"
                                    class="block w-full mt-1" placeholder="Item Quantity"
                                    x-model='field.itemQuantity' value="{{ old('itemQuantity') }}" />

                                <x-input-error :messages="$errors->get('itemQuantity')" class="mt-2" />
                            </div>

                            <div class="w-4/12 mt-3">

                                <x-text-input x-bind:name="`item[${index + 1}][unitPrice]`" x-model='field.unitPrice'
                                    type="text" class="block w-full mt-1" placeholder="Unit Price"
                                    value="{{ old('unitPrice') }}" />

                                <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
                            </div>
                            <div class="w-2/12 mt-3">
                                <button type="button" x-on:click="removeField(index)"
                                    class="w-full p-2 mt-1 text-center text-white bg-red-500 border border-gray-300 rounded-md hover:bg-red-600"
                                    id="actions">-</button>
                            </div>
                        </div>
                    </template>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('autoSupplyFunction', () => ({
            open: false,

            supplyFields: [

            ],

            addNewField() {
                this.supplyFields.push({
                    itemName: '',
                    itemQuantity: '',
                    unitPrice: '',
                });
            },

            removeField(index) {
                this.supplyFields.splice(index, 1);
            },

            toggle() {
                this.open = !this.open
            },

            init() {
                this.open = ('{{ old('supplierType') }}' == 'new' ? true : false)

                @if (old('item'))
                    @foreach (old('item') as $i => $field)
                        this.supplyFields.push({
                            itemName: '{{ $field['itemName'] }}',
                            itemQuantity: '{{ $field['itemQuantity'] }}',
                            unitPrice: '{{ $field['unitPrice'] }}',
                        })
                    @endforeach
                    this.supplyFields.splice(0, 1)
                    console.log('{{ old('item.0.itemName') }}')
                @endif
            },
        }))
    })
</script>
