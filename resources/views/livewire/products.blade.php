<div>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight text-center"
        >
            Products Display
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"
            >
                @if (session()->has('message'))
                <div
                    class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert"
                >
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session("message") }}</p>
                        </div>
                    </div>
                </div>
                @endif; @if($isOpen) @include('livewire.create') @endif

                <div class="relative">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            ></path>
                        </svg>
                    </div>
                    <input
                        type="search"
                        id="default-search"
                        class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Product . . ."
                        wire:model="searchTerm"
                    />
                </div>

                <div class="flex justify-end mt-5">
                    <button
                        wire:click="create()"
                        class="bg-white hover:bg-blue-700 hover:text-white text-blue-500 py-1 mb-6 px-3 rounded my-3 mt-1 border border-blue-500"
                    >
                        <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        Add Product
                    </button>
                </div>

                <div class="overflow-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-60">Action</th>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td class="border px-4 py-2 text-center">
                                    <div
                                        class="inline-flex rounded-md shadow-sm"
                                        role="group"
                                    >
                                        <button
                                            wire:click="edit({{ $product->id }})"
                                            class="px-4 py-1.5 text-sm font-medium text-gray-900 bg-blue-600 border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                                        >
                                            <i
                                                class="fa fa-pencil-square-o text-white"
                                                aria-hidden="true"
                                            ></i>
                                        </button>
                                        <button
                                            type="button"
                                            wire:click="delete({{ $product->id }})"
                                            class="px-4 py-1.5 text-sm font-medium text-gray-900 bg-red-600 border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                                        >
                                            <i
                                                class="fa fa-trash-o text-white"
                                                aria-hidden="true"
                                            ></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $product->name }}
                                </td>
                                <td class="border px-4 py-2 text-right">
                                    Rp
                                    {{ number_format($product->price,2,',','.') }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    {{ $product->stok }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td
                                    colspan="5"
                                    class="text-center border px-4 py-2"
                                >
                                    No products data found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="py-2">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
