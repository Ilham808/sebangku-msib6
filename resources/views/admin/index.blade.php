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

    
</x-app-layout>
