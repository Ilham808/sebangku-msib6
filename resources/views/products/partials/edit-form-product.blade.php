<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Product') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Edit a product') }}
        </p>
    </header>

    <form method="post" action="{{ route('product.update', $product->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div>
            <x-input-label for="name" :value="__('Name Product')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', floatval($product->price))"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Image')" />
            <label class="block">
                <span class="sr-only">Choose File</span>
                <input type="file" name="image"
                    class="block w-full text-sm mt-1 text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </label>
            <span class="text-gray-500 text-sm mt-1 block">You can leave this field blank, if you don't want to change it</span>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
            

        </div>

        <div>
            <x-input-label for="image" :value="__('Status')" />
            <select id="status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="status">
                <option>Choose a status</option>
                <option {{ $product->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                <option {{ $product->status == 'inactive' ? 'selected' : '' }} value="inactive">Non Active</option>
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
