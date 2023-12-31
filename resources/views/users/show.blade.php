<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <div class="py-10">
        {{-- <div class="w-full md:w-1/2 pt-3 px-3"> --}}
        <div class="max-w-7xl mx-auto md:w-1/2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('users.partials.detail-user')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
