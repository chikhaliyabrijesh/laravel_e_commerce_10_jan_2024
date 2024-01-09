<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Subcategory Page') }}
        </h2>
    </x-slot>

    <section class="bg-gray-0 dark:bg-gray-900">
        <div class="flex flex-col items-center mt-20  mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow-2xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-3 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Edit Subcategory Form
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{route('update.subcategory',$subcategory->id)}}"
                        method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select name="category" id="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($categories as $category)
                                @if($subcategory->category_id == $category->id)
                                <option value="{{$subcategory->category_id}}" selected>{{$category->category}}
                                </option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endif
                                @endforeach
                            </select>
                            @if ($errors)
                            <span class="text-red-600">{{ $errors->first('category') }}</span>
                            @endif
                        </div>

                        <div>
                            <label for="subcategory"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subcategory</label>
                            <input type="text" name="subcategory" id="subcategory" value="{{$subcategory->subcategory}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors)
                            <span class="text-red-600">{{ $errors->first('subcategory') }}</span>
                            @endif
                        </div>

                        <div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>

                            <a href="{{route('index.subcategory')}}"><button type="button"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>