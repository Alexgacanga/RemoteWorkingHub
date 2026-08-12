<x-main-layout>
    <div class="min-h-screen bg-white" style="font-family: 'Poppins', sans-serif;">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8  xl:py-10 2xl:py-12">
            <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Customers</h1>
                </div>

                <button type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-5 py-3 text-xs font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#e7573b] hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF6245] focus-visible:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Customer
                </button>
            </div>

            <div
                class="mb-6 flex flex-col gap-4 rounded-2xl border border-gray-200 bg-white p-4 shadow-sm sm:p-3 lg:flex-row lg:items-center lg:justify-between">
                <label class="relative block w-full max-w-lg">
                    <span class="sr-only">Search customers</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="search" placeholder="Search customer..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-black placeholder:text-gray-400 transition duration-200 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
                </label>

                <div
                    class="inline-flex w-full max-w-xs items-center gap-1 rounded-xl border border-gray-200 bg-gray-50 p-1">
                    @php $selectedFilter = 'All'; @endphp
                    @foreach (['All', 'Active', 'Dormant'] as $filterOption)
                        <button type="button" aria-pressed="{{ $selectedFilter === $filterOption ? 'true' : 'false' }}"
                            class="flex-1 rounded-lg px-3 py-2 text-sm font-medium transition duration-200 {{ $selectedFilter === $filterOption ? 'bg-[#FF6245] text-white shadow-sm' : 'text-gray-600 hover:bg-white hover:text-black' }}">
                            {{ $filterOption }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-md">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead class="bg-gray-50 text-left text-xs font-semibold uppercase tracking-[0.14em] text-gray-600">
                            <tr>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Payment ID</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">First Name</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Last Name</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Email</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Phone</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">ID Number</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5">Status</th>
                                <th scope="col" class="whitespace-nowrap px-4 py-3.5 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-600">

                                <tr class="transition-colors hover:bg-gray-50">
                                    <td class="whitespace-nowrap px-4 py-4 font-medium text-black">
                                        Sample
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        Sample
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        Sample
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        Sample
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        Sample
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        Sample
                                    </td>
                                    <td class="px-4 py-4">
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold">
                                            Sample
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 md:opacity-100">
                                        <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#4FC1FF]/10 text-[#4FC1FF] transition-all duration-300 hover:bg-[#4FC1FF] hover:text-[#FFFFFF]" title="Edit customer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF]" title="Subsribe">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                            {{-- @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-10 text-center text-sm text-gray-500">No customers
                                        found.</td>
                                </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <div
                class="mt-6 flex flex-col items-center justify-between gap-4 border-t border-gray-200 bg-white px-4 py-4 sm:flex-row">
                <p class="text-sm text-gray-500">Showing 1-5 of 24 customers</p>

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
