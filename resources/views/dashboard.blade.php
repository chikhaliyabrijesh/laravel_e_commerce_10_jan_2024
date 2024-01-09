<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="md:container md:mx-auto w-9/12 mt-16 px-10">
        <div class="grid grid-cols-4 gap-10">
            <div class="col-start-1 col-span-1">
                <div class="box-content h-32 w-60 p-4 border-2 border-gray-100 shadow-2xl bg-white rounded-md">
                    <p class="text-center text-xl">Total User</p>
                    <p class="text-center text-4xl mt-2">{{ $total_user }}</p>
                </div>
            </div>

            <div class="col-start-2 col-span-1">
                <div class="box-content h-32 w-60 p-4 border-2 border-gray-100 shadow-2xl bg-white rounded-md">
                    <p class="text-center text-xl">Total Product</p>
                    <p class="text-center text-4xl mt-2">{{ $total_product }}</p>
                </div>
            </div>

            <div class="col-start-3 col-span-1">
                <div class="box-content h-32 w-60 p-4 border-2 border-gray-100 shadow-2xl bg-white rounded-md">
                    <p class="text-center text-xl">Total Subcategory</p>
                    <p class="text-center text-4xl mt-2">{{ $total_subcategory }}</p>
                </div>
            </div>

            <div class="col-start-4 col-span-1">
                <div class="box-content h-32 w-60 p-4 border-2 border-gray-100 shadow-2xl bg-white rounded-md">
                    <p class="text-center text-xl">Total Category</p>
                    <p class="text-center text-4xl mt-2">{{ $total_category }}</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>