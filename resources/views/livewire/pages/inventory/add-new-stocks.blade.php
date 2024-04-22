<x-app-layout>
    <nav class="w-fit">
        <ul
            class="flex items-center *:px-1 *:py-2 px-1 text-sm font-bold bg-white rounded-md shadow-sm justify-items-center">
            <li>
                <a href="{{ route('inventory') }}" class="hover:text-blue-700">Inventory</a>
            </li>
            <li>
                <x-icon name="chevron-right" solid mini />
            </li>
            <li class="">
                Record New Item
            </li>
        </ul>
    </nav>
    <div class="my-4" x-data='autoSupplyFunction'>
        <form method="POST" action="{{ route('store-item') }}" class="flex flex-col p-2 bg-white rounded-md shadow-md">
            @csrf
            <div class="flex justify-between p-4">
                <div class="border-s-[16px] bg-blue-100 p-2 rounded border-s-blue-500 ps-1">
                    <h2 class="text-lg font-bold text-blue-700 uppercase">
                        Auto Supply Record Form
                    </h2>

                    <p class="mt-1 text-sm text-gray-700">
                        Please enter the details of the items that you want to add to the inventory.
                    </p>
                </div>
                <div class="flex flex-col-reverse gap-2 mb-auto lg:flex-row justify-items-center">
                    <x-secondary-button class="text-red-700 w-24 !bg-red-100 border-none hover:!bg-red-300">
                        <x-icon name="x-circle" solid mini class="size-4 me-1" />
                        <a href="{{ route('inventory') }}">Cancel</a>
                    </x-secondary-button>

                    <x-primary-button class="w-24">
                        <x-icon name="check-circle" solid mini class="size-4 me-1" />
                        Save
                    </x-primary-button>
                </div>
            </div>
            {{-- Supplier Details --}}
            <div class="grid grid-cols-3 gap-4 p-4">
                <h2 class="text-lg font-bold uppercase">
                    Supplier Details
                </h2>
                <div class="col-span-2">
                    <div>
                        <x-input-label value="Supplier Type" class="mb-1" />
                        <div class="flex justify-start p-3 space-x-4 border border-gray-300 rounded">
                            <x-input-label class="text-sm text-gray-600">
                                <input type="radio" class="focus:ring-0" name="supplierType" value="existing"
                                    id="existing" x-model="supplierType">
                                Existing Supplier
                            </x-input-label>
                            <x-input-label class="text-sm text-gray-600">
                                <input type="radio" class="focus:ring-0" name="supplierType" value="new"
                                    id="new" x-model="supplierType">
                                New Supplier
                            </x-input-label>
                            {{-- <div>
                            <x-primary-button x-on:click='toggle()' type="button">
                                <span x-text="open ? ' Choose From Existing Supplier' : 'New Supplier'"></span>
                            </x-primary-button>
                            <x-input-label value="Supplier Type" class="sr-only" />
                            <input type="hidden" id="supplierType" readonly :value="open ? 'new' : 'existing'"
                                name="supplierType">
                        </div> --}}
                        </div>
                    </div>

                    {{-- Existing Supplier --}}
                    <div class="mt-4" x-show='supplierType == "existing"'>
                        <x-input-label value="Supplier Name" />

                        <x-select-search-dropdown model='{{ $suppliers }}' placeHolder="Select item supplier"
                            name='supplierId' value="{{ old('supplierId') }}" />
                        <x-input-error :messages="$errors->get('supplierId')" class="mt-2" />
                    </div>

                    {{-- New Supplier --}}
                    <div class="flex flex-col md:space-x-4 md:flex-row" x-show='supplierType == "new"'>
                        <div class="mt-4 md:w-2/5">
                            <x-input-label for="supplierName" value="Supplier Name" />

                            <x-text-input id="supplierName" name="supplierName" type="text" class="block w-full mt-1"
                                placeholder="Supplier Name" value="{{ old('supplierName') }}" />

                            <x-input-error :messages="$errors->get('supplierName')" class="mt-2" />
                        </div>

                        <div class="mt-4 md:w-2/5">
                            <x-input-label for="supplierAddress" value="Supplier Address" />

                            <x-text-input id="supplierAddress" name="supplierAddress" type="text"
                                class="block w-full mt-1" placeholder="Supplier Address"
                                value="{{ old('supplierAddress') }}" />

                            <x-input-error :messages="$errors->get('supplierAddress')" class="mt-2" />
                        </div>

                        <div class="mt-4 md:w-1/5">
                            <x-input-label for="supplierContactNumber" value="Contact Number" />

                            <x-text-input id="supplierContactNumber" name="supplierContactNumber" type="text"
                                class="block w-full mt-1" placeholder="Contact Number"
                                value="{{ old('supplierContactNumber') }}" />

                            <x-input-error :messages="$errors->get('supplierContactNumber')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mx-4 my-6 border-2 border-blue-100 rounded-sm">

            {{-- Auto Supply Details --}}
            <div class="grid-cols-3 gap-4 p-4 lg:grid">
                <h2 class="text-lg font-bold text-gray-900 uppercase">
                    Auto Supply Details
                </h2>
                <div class="col-span-2">
                    <div class="flex space-x-1">
                        <div class="w-full ">
                            <x-input-label for="itemName" value="Item Name" />

                            <x-text-input id="itemName" name="item[0][itemName]" type="text"
                                class="{{ $errors->get('itemName') ? 'ring-1 ring-red-400' : '' }} block w-full mt-1"
                                placeholder="Item Name" value="{{ old('item.0.itemName') }}" />


                        </div>

                        <div class="w-4/12">
                            <x-input-label for="itemQuantity" value="Item Quantity" />

                            <x-text-input id="itemQuantity" name="item[0][itemQuantity]" type="text"
                                class="{{ $errors->get('itemQuantity') ? 'ring-1 ring-red-400' : '' }} block w-full mt-1"
                                placeholder="Item Quantity" value="{{ old('item.0.itemQuantity') }}" />


                        </div>

                        <div class="w-4/12">
                            <x-input-label for="unitPrice" value="Unit Price" />

                            <x-text-input id="unitPrice" name="item[0][unitPrice]" type="text"
                                class="{{ $errors->get('unitPrice') ? 'ring-1 ring-red-400' : '' }} block w-full mt-1 "
                                placeholder="Unit Price" value="{{ old('item.0.unitPrice') }}" />

                            {{-- <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" /> --}}
                        </div>
                        <div class="w-2/12">
                            <x-input-label for="actions" value="Actions" />
                            <button type="button" x-on:click="addNewField()"
                                class="w-full p-2.5 mt-1 text-center text-blue-700 bg-blue-100 rounded hover:bg-blue-300"
                                id="actions">
                                <x-icon name="plus-circle" solid mini class="mx-auto size-5" />
                            </button>
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
                                    class="w-full p-2.5 mt-1 text-center text-red-700 bg-red-100 rounded hover:bg-red-300"
                                    id="actions">
                                    <x-icon name="minus-circle" solid mini class="mx-auto size-5" />
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('autoSupplyFunction', () => ({
            open: false,

            supplierType: 'existing',

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

            init() {
                if ('{{ old('supplierType') == 'new' }}') {
                    this.supplierType = "new"
                } else if ('{{ old('supplierType') == 'existing' }}') {
                    this.supplierType = "existing"
                } else {
                    this.supplierType = this.supplierType
                }

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
