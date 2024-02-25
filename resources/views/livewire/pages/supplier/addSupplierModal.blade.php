<x-modal name="addSupplier" :show="$errors->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('store-supplier') }}" class="flex flex-col p-6">
        @csrf
        <h2 class="text-lg font-bold text-gray-900 uppercase">
            Record New Supplier
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Please enter the details of the supplier you want to add.
        </p>

        <div class="mt-6">
            <x-input-label for="supplierName" value="Supplier Name" class="uppercase" />

            <x-text-input id="supplierName" name="supplierName" type="text" class="block w-full mt-1"
                placeholder="Enter Supplier Name" value="{{ old('supplierName') }}" />

            <x-input-error :messages="$errors->get('supplierName')" class="mt-2" />
        </div>
        <div class="mt-3">
            <x-input-label for="supplierAddress" value="Supplier Address" class="uppercase" />

            <x-text-input id="supplierAddress" name="supplierAddress" type="text" class="block w-full mt-1"
                placeholder="Enter Supplier Address" value="{{ old('supplierAddress') }}" />

            <x-input-error :messages="$errors->get('supplierAddress')" class="mt-2" />
        </div>

        <div class="mt-3">
            <x-input-label for="supplierContactNumber" value="Supplier Contact Number" class="uppercase" />

            <x-text-input id="supplierContactNumber" name="supplierContactNumber" type="text"
                class="block w-full mt-1" placeholder=" Enter Supplier Contact Number"
                value="{{ old('supplierContactNumber') }}" />

            <x-input-error :messages="$errors->get('supplierContactNumber')" class="mt-2" />
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
