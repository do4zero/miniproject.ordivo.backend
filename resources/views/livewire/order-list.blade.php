<div>
    <x-slot name="header">
        <h2
            class="font-semibold text-md text-gray-800 leading-tight text-center"
        >
            <button
                class="bg-white hover:bg-blue-700 hover:text-white text-blue-500 py-1 px-3 rounded border border-blue-500"
                onclick="salinToko('{{ $bagikanLink }}')"
            >
                Salin Link Toko
            </button>
            <button
                class="bg-white hover:bg-blue-700 hover:text-white text-blue-500 py-1 px-3 rounded border border-blue-500"
                onclick="menujuToko('{{ $bagikanLink }}')"
            >
                Menuju Toko
            </button>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"
            >
                <div class="text-lg mb-3">Orders List</div>
                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 my-3" />
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
                @endif

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

                <div class="overflow-auto mt-5">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-100">Invoice Number</th>
                                <th class="px-4 py-2">Status Order</th>
                                <th class="px-4 py-2">Total Amount</th>
                                <th class="px-4 py-2">Buyer Name</th>
                                <th class="px-4 py-2">Buyer Phone</th>
                                <th class="px-4 py-2">Buyer Address</th>
                                <th class="px-4 py-2">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($oderlist as $order)
                            <tr>
                                <td class="border px-4 py-2 text-center">
                                    {{ $order->invoice_number }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $order->status }}
                                </td>
                                <td class="border px-4 py-2 text-right">
                                    Rp
                                    {{ number_format($order->total_amount,2,',','.') }}
                                </td>
                                <td class="border px-4 py-2 text-left">
                                    {{ $order->name }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    {{ $order->phone }}
                                </td>
                                <td class="border px-4 py-2 text-left">
                                    {{ $order->address }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    {{ $order->created_at }}
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
                    {{$oderlist->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        var dummy = document.createElement("textarea");
        // to avoid breaking orgain page when copying more words
        // cant copy when adding below this code
        // dummy.style.display = 'none'
        document.body.appendChild(dummy);
        //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
        dummy.value = text;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
    }

    function salinToko(text) {
        copyToClipboard(text);
        alert("link toko berhasil disalin : " + text);
    }

    function menujuToko(location) {
        window.location.href = location;
    }
</script>
