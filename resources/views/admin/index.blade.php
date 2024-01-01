<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="flex flex-wrap mb-2">
            
            <div class="w-full md:w-1/2 pt-3 px-3">
                <div class="bg-green-600 border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pl-1 pr-4"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                        <div class="flex-1 text-right">
                            <h5 class="text-white">Total Products</h5>
                            <h3 class="text-white text-3xl">{{ $count_products }}<span class="text-green-400"><i class="fas fa-caret-down"></i></span></h3>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="w-full md:w-1/2 pt-3 px-3">
                <div class="bg-blue-600 border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pl-1 pr-4"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                        <div class="flex-1 text-right">
                            <h5 class="text-white">Total Users</h5>
                            <h3 class="text-white text-3xl">{{ $count_users }} <span class="text-blue-400"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="w-full md:w-1/2 pt-3 px-3">
                <div class="bg-purple-600 border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pl-1 pr-4"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                        <div class="flex-1 text-right">
                            <h5 class="text-white">Total Products Active</h5>
                            <h3 class="text-white text-3xl">{{ $count_products_active }}</h3>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="w-full md:w-1/2 pt-3 px-3">
                <div class="bg-red-600 border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pl-1 pr-4"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                        <div class="flex-1 text-right">
                            <h5 class="text-white">Total Users Active</h5>
                            <h3 class="text-white text-3xl">{{ $count_users_active }}</h3>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>

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
                                <span class="mr-3 font-semibold text-dark">{{ __('Products') }}</span>
                                <span
                                    class="mt-1 font-medium text-secondary-dark text-lg/normal">{{ __('10 new products in last') }}</span>
                            </h3>
                            <div class="relative flex flex-wrap items-center my-2">
                               
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_new_products as $product)
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
