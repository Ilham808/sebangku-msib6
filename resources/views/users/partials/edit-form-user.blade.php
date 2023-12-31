<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit User') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Edit a user') }}
        </p>
    </header>

    <form method="post" action="{{ route('user.update', $user->id) }}" class="mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="number" :value="__('Phone Number')" />
            <x-text-input id="number" name="number" type="number" class="mt-1 block w-full" :value="old('number', $user->phone_number)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
        </div>


        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                name="role">
                <option>Choose a role</option>
                <option {{ $user->roles == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                <option {{ $user->roles == 'user' ? 'selected' : '' }} value="user">User</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div>


        <div>
            <x-input-label for="status" :value="__('Status')" />
            <select id="status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                name="status">
                <option>Choose a status</option>
                <option {{ $user->is_active == 1 ? 'selected' : '' }} value="1">Active</option>
                <option {{ $user->is_active == 0 ? 'selected' : '' }} value="0">Non Active</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"  />
            <span class="text-gray-500 text-sm mt-1 block">You can leave this field blank, if you don't want to change
                it</span>
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Password Confirmation')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full"  />
            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
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
