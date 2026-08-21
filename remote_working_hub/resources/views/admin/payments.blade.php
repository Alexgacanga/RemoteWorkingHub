<x-main-layout>
    <div class="min-h-screen w-full bg-white text-black" style="font-size: 14px; font-family: 'Poppins', sans-serif;">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 xl:py-10 2xl:py-12">
            <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex items-center gap-3">
                    <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Payments</h1>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-[#DDF6E7] bg-[#EAFBF2] px-2.5 py-1 text-[11px] font-semibold text-[#1D8D61]">
                        <span class="relative flex h-2.5 w-2.5">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#1D8D61] opacity-75"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-[#1D8D61]"></span>
                        </span>
                        Live
                    </span>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    {{-- <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-4 py-3 text-xs font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#e7583d] hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF6245] focus-visible:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Cash
                    </button> --}}

                    <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#4FC1FF] px-4 py-3 text-xs font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#38b5f5] hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF] focus-visible:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Verify Payment
                    </button>
                </div>
            </div>

            <div
                class="mb-6 flex flex-col gap-4 rounded-2xl border border-gray-200 bg-white p-4 shadow-sm sm:p-3 lg:flex-row lg:items-center lg:justify-between">
                <label class="relative block w-full max-w-lg">
                    <span class="sr-only">Search payments</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="search" placeholder="Search by name, ID, or phone..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-black placeholder:text-gray-400 transition duration-200 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
                </label>

                <div
                    class="inline-flex w-full max-w-xs items-center gap-1 rounded-xl border border-gray-200 bg-gray-50 p-1">
                    @php $selectedMethod = 'All'; @endphp
                    @foreach (['All', 'M-Pesa', 'Cash'] as $method)
                        <button type="button" aria-pressed="{{ $selectedMethod === $method ? 'true' : 'false' }}"
                            class="flex-1 rounded-lg px-3 py-2 text-sm font-medium transition duration-200 {{ $selectedMethod === $method ? 'bg-[#FF6245] text-white shadow-sm' : 'text-gray-600 hover:bg-white hover:text-black' }}">
                            {{ $method }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-md">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead
                            class="bg-gray-50 text-left text-xs font-semibold uppercase tracking-[0.14em] text-gray-600">
                            <tr>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Date &amp; Time</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Transaction ID</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">First Name</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Last Name</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Phone</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Method</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Account Number</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5 text-right">Amount</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5 text-right">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-600">
                            @foreach ($payments as $payment)
                                <tr class="transition-all duration-200 hover:bg-gray-50 {{-- {{ $loop->first ? 'animate-[pulse_1.5s_ease-in-out_1]' : '' }} --}}"
                                    data-live-row="true">
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        <div class="font-semibold text-black">
                                            {{ $payment->created_at }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 font-medium text-black">
                                        {{ $payment->transaction_id ?? '-'}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $payment->fname }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $payment->lname }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $payment->phone_number ?? '-' }}
                                    </td>
                                    <td class="px-4 py-4">
                                        <span
                                            class="inline-flex items-center rounded-full border px-2.5 py-1 text-xs font-semibold">
                                            {{ $payment->payment_method }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $payment->bill_reference }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-right font-bold text-black">
                                        KES {{ $payment->amount }}
                                    </td>
                                    <td class="px-4 py-4 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#FF6245]/10 text-[#000000] transition-all duration-300 hover:bg-[#FF6245] border-[#FF6245]/20 hover:text-[#FFFFFF]" title="View Receipt">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div
                class="mt-6 flex flex-col items-center justify-between gap-4 border-t border-gray-200 bg-white px-4 py-4 sm:flex-row">
                <p class="text-sm text-gray-500">Showing 1-5 of 24 transactions</p>

                <nav aria-label="Pagination" class="inline-flex items-center gap-2">
                    <button type="button"
                        class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF]">
                        Previous
                    </button>

                    <div class="flex items-center gap-2">
                        <button type="button"
                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-[#FF6245] text-sm font-semibold text-white shadow-sm">1</button>
                        <button type="button"
                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9]">2</button>
                        <button type="button"
                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9]">3</button>
                        <button type="button"
                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9]">4</button>
                    </div>

                    <button type="button"
                        class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF]">
                        Next
                    </button>
                </nav>
            </div>
        </div>
    </div>
</x-main-layout>
