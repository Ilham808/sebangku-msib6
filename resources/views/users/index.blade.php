<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-3">

        <div class="flex flex-wrap -mx-3 mb-5">
            <div class="w-full max-w-full px-3 mb-6  mx-auto">

                <div
                    class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
                    <div
                        class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
                        <!-- card header -->

                        @if (session()->has('error'))
                            <x-error-alert> {{ session()->get('error') }} </x-error-alert>
                        @endif

                        @if (session()->has('success'))
                            <x-success-alert> {{ session()->get('success') }} </x-success-alert>
                        @endif

                        <div
                            class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
                            <h3
                                class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark">
                                <span class="mr-3 font-semibold text-dark">{{ __('Users') }}</span>
                                <span
                                    class="mt-1 font-medium text-secondary-dark text-lg/normal">{{ __('All Users List Here') }}</span>
                            </h3>
                            <div class="relative flex flex-wrap items-center my-2">
                                <a href="{{ route('user.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <p class="text-sm font-medium leading-none text-white">{{ __('Add User') }}</p>
                                </a>
                            </div>

                        </div>
                        <!-- end card header -->
                        <!-- card body  -->
                        <div class="flex-auto block py-8 pt-6 px-9">
                            <div class="overflow-x-auto">
                                <table class="w-full my-0 align-middle text-dark border-neutral-200">
                                    <thead class="align-bottom">
                                        <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                                            <th class="pb-3 text-start min-w-[120px]">NAME</th>
                                            <th class="pb-3 text-start min-w-[120px]">ROLE</th>
                                            <th class="pb-3 text-start min-w-[120px]">CREATED AT</th>
                                            <th class="pb-3 text-start min-w-[100px]">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr class="border-b border-dashed last:border-b-0">
                                            <td class="p-3 pr-0 text-start">
                                                <span class="font-semibold text-light-inverse text-md/normal">
                                                    {{ $user->name }}
                                                </span>
                                            </td>
                                            <td class="p-3 pr-0 text-start">
                                                <span class="font-semibold text-light-inverse text-md/normal">
                                                    {{ $user->roles }} 
                                                </span>
                                            </td>
                                            <td class="p-3 pr-0 text-start">
                                                <span class="font-semibold text-light-inverse text-md/normal">
                                                    {{ date('d F Y', strtotime($user->created_at)) }} 
                                                </span>
                                            </td>
                                            <td class="p-3 pr-0 text-start">
                                                <span class="font-semibold text-light-inverse text-md/normal">

                                                    <div class="flex space-x-2">

                                                        @if ($user->id != Auth::user()->id)

                                                        @if($user->is_active == 0)
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('user.approve', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded "
                                                                type="submit">
                                                                Approve
                                                            </button>
                                                        </form>
                                                        @endif

                                                        <a href="{{ route('user.show', $user->id) }}"
                                                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2 mr-2">
                                                            Detail
                                                        </a>

                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2 mr-2">
                                                            Edit
                                                        </a>
                                                
                                                    
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('user.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            
                                                            <!-- Tombol Delete -->
                                                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                                type="submit">
                                                                Delete
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                    

                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
