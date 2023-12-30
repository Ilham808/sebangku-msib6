<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
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
                            <x-alert-error bg-color="red-200" border-color="red-300" icon-bg-color="red-100"
                                icon-border-color="red-500" icon-color="red-500" title-color="red-800"
                                description-color="red-600" title="Error"
                                description="{{ session()->get('error') }}" />
                        @endif

                        @if (session()->has('success'))
                            <x-alert-success bg-color="green-200" border-color="green-300" icon-bg-color="green-100"
                                icon-border-color="green-500" icon-color="green-500" title-color="green-800"
                                description-color="green-600" title="Success"
                                description="{{ session()->get('success') }}" />
                        @endif

                        <div
                            class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
                            <h3
                                class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark">
                                <span class="mr-3 font-semibold text-dark">{{ __('Products') }}</span>
                                <span
                                    class="mt-1 font-medium text-secondary-dark text-lg/normal">{{ __('All products from your store') }}</span>
                            </h3>
                            <div class="relative flex flex-wrap items-center my-2">
                                <a href="{{ route('product.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <p class="text-sm font-medium leading-none text-white">{{ __('Add Product') }}</p>
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
                                            <th class="pb-3 text-start min-w-[175px]">NAME PRODUCT</th>
                                            <th class="pb-3 text-end min-w-[100px]">PRICE</th>
                                            <th class="pb-3 text-end min-w-[100px]">STATUS</th>
                                            <th class="pb-3 text-end min-w-[100px]">CREATED AT</th>
                                            <th class="pb-3 text-end min-w-[50px]">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="border-b border-dashed last:border-b-0">
                                                <td class="p-3 pl-0">
                                                    <div class="flex items-center">
                                                        <div class="relative inline-block shrink-0 rounded-2xl me-3">
                                                            <img src="{{ Storage::url('public/images/' . $product->image) }}"
                                                                class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl"
                                                                alt="">
                                                        </div>
                                                        <div class="flex flex-col justify-start">
                                                            <a href="javascript:void(0)"
                                                                class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary">
                                                                {{ $product->name }} </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-3 pr-0 text-end">
                                                    <span class="font-semibold text-light-inverse text-md/normal">
                                                        Rp {{ number_format($product->price, 2, ',', '.') }}
                                                    </span>
                                                </td>
                                                <td class="p-3 pr-0 text-end">
                                                    <span
                                                        class="font-semibold text-light-inverse text-md/normal">{{ $product->status }}</span>
                                                </td>
                                                <td class="p-3 pr-0 text-end">
                                                    <span
                                                        class="font-semibold text-light-inverse text-md/normal">{{ date('d F Y', strtotime($product->created_at)) }}</span>
                                                </td>
                                                <td class="p-3 pr-0 text-end">
                                                   
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('product.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                            Edit
                                                        </a>
                                                        
                                                        <!-- Tombol Delete -->
                                                        <button
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
                                                            type="submit">
                                                            Delete
                                                        </button>
                                                    </form>
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
