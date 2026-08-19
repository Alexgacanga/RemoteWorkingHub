<x-main-layout>
    <div class="min-h-screen bg-white" style="font-family: 'Poppins', sans-serif;">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8  xl:py-10 2xl:py-12">
            <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Customers</h1>
                </div>

                <a href="{{ route('customers.create') }}">
                    <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-5 py-3 text-xs font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#e7573b] hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF6245] focus-visible:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Customer
                    </button>
                </a>
            </div>

            <div
                class="mb-6 flex flex-col gap-4 rounded-2xl border border-gray-200 bg-white p-4 shadow-sm sm:p-3 lg:flex-row lg:items-center lg:justify-between">

                {{-- SEARCH FORM --}}
                <form method="GET" action="{{ route('customers.index') }}" class="relative block w-full max-w-lg">
                    <span class="sr-only">Search customers</span>

                    {{-- Hidden input preserves the current status filter when searching --}}
                    <input type="hidden" name="status" value="{{ request('status') }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>

                    {{-- Search Input with value preservation --}}
                    <input type="search" name="search" value="{{ request('search') }}"
                        placeholder="Search customer..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-black placeholder:text-gray-400 transition duration-200 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
                </form>

                {{-- FILTER BUTTONS --}}
                <div
                    class="inline-flex w-full max-w-xs items-center gap-1 rounded-xl border border-gray-200 bg-gray-50 p-1">
                    @php
                        $selectedFilter = ucfirst(request('status', 'All'));
                    @endphp

                    @foreach (['All', 'Active', 'Dormant'] as $filterOption)
                        {{-- fullUrlWithQuery ensures the search string stays intact, and page resets to 1 --}}
                        <a href="{{ request()->fullUrlWithQuery(['status' => strtolower($filterOption), 'page' => 1]) }}"
                            aria-pressed="{{ $selectedFilter === $filterOption ? 'true' : 'false' }}"
                            class="flex-1 text-center rounded-lg px-3 py-2 text-sm font-medium transition duration-200 {{ $selectedFilter === $filterOption ? 'bg-[#FF6245] text-white shadow-sm' : 'text-gray-600 hover:bg-white hover:text-black' }}">
                            {{ $filterOption }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="rounded-2xl border border-gray-200 bg-white shadow-md">
                <div class="w-full">
                    <table class="min-w-full border-collapse">
                        <thead
                            class="bg-gray-50 text-left text-xs font-semibold uppercase tracking-[0.14em] text-gray-600">
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
                            @foreach ($customers as $customer)
                                <tr class="transition-colors hover:bg-gray-50">
                                    <td class="whitespace-nowrap px-4 py-4 font-medium text-black">
                                        {{ $customer->payment_id }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $customer->fname }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $customer->lname }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $customer->email }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $customer->phone_no }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                                        {{ $customer->id_no }}
                                    </td>
                                    <td class="px-4 py-4">
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold">
                                            {{ $customer->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div
                                            class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 md:opacity-100">
                                            <button
                                                class="inline-flex items-center justify-center p-2 rounded-lg bg-[#4FC1FF]/10 text-[#4FC1FF] transition-all duration-300 hover:bg-[#4FC1FF] hover:text-[#FFFFFF]"
                                                title="Edit customer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <!-- Subscribe Dropdown Wrapper -->
                                            <div class="relative group/dropdown">
                                                <!-- Trigger Button -->
                                                <button
                                                    class="inline-flex items-center justify-center p-2 rounded-lg bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF]"
                                                    title="Subscribe">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown Menu -->
                                                <div
                                                    class="absolute right-0 top-full z-50 mt-1 w-32 invisible translate-y-2 opacity-0 transition-all duration-300 group-hover/dropdown:visible group-hover/dropdown:translate-y-0 group-hover/dropdown:opacity-100">
                                                    <div
                                                        class="flex flex-col overflow-hidden rounded-xl border border-gray-100 bg-white py-1 shadow-lg">
                                                        <a href="{{ route('day-pass-subscriptions.create', $customer->id) }}">
                                                            <button type="button"
                                                                class="px-4 py-2 text-left text-sm font-medium text-gray-600 transition-colors hover:bg-[#FF6245]/10 hover:text-[#FF6245]">
                                                                Day Pass
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('weekly-subscriptions.create', $customer->id) }}">
                                                            <button type="button"
                                                                class="px-4 py-2 text-left text-sm font-medium text-gray-600 transition-colors hover:bg-[#FF6245]/10 hover:text-[#FF6245]">
                                                                Weekly
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('monthly-subscriptions.create', $customer->id) }}">
                                                            <button type="button"
                                                                class="px-4 py-2 text-left text-sm font-medium text-gray-600 transition-colors hover:bg-[#FF6245]/10 hover:text-[#FF6245]">
                                                                Monthly
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
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
                <p class="text-sm text-gray-500">
                    Showing {{ $customers->firstItem() ?? 0 }}-{{ $customers->lastItem() ?? 0 }} of
                    {{ $customers->total() }} customers
                </p>

                <nav aria-label="Pagination" class="inline-flex items-center gap-2">

                    {{-- Previous Button --}}
                    @if ($customers->onFirstPage())
                        <a
                            class="inline-flex btn-disabled opacity-50 cursor-not-allowed items-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF]">
                            Previous
                        </a>
                    @else
                        <a href="{{ $customers->previousPageUrl() }}"
                            class="inline-flex btn-active items-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF]">
                            Previous
                        </a>
                    @endif

                    {{-- Custom Sliding Window Page Numbers --}}
                    <div class="flex items-center gap-2">
                        @php
                            $currentPage = $customers->currentPage();
                            $lastPage = $customers->lastPage();
                            $window = 6;

                            // Calculate start and end page for the sliding window
                            $start = max(1, $currentPage - floor($window / 2));
                            $end = $start + $window - 1;

                            // Adjust if we hit the end of the pagination
                            if ($end > $lastPage) {
                                $end = $lastPage;
                                $start = max(1, $end - $window + 1);
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $currentPage)
                                <a aria-current="page"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-[#FF6245] text-sm font-semibold text-white shadow-sm cursor-default">
                                    {{ $i }}
                                </a>
                            @else
                                <a href="{{ $customers->url($i) }}"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9]">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor
                    </div>

                    {{-- Next Button --}}
                    @if ($customers->hasMorePages())
                        <a href="{{ $customers->nextPageUrl() }}"
                            class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 transition hover:border-[#4FC1FF] hover:text-[#0A8FD9] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF]">
                            Next
                        </a>
                    @else
                        <a
                            class="inline-flex btn-disabled opacity-50 cursor-not-allowed items-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF]">
                            Next
                        </a>
                    @endif

                </nav>
            </div>
        </div>
    </div>
</x-main-layout>
