<x-main-layout>
    <div class="min-h-screen bg-white w-full" style="font-size: 14px; font-family: 'Poppins', sans-serif;">
        <!-- Main Container -->
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 xl:py-10 2xl:py-12 flex flex-col gap-8">

            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Packages</h1>

                <a href="{{ route('packages.create') }}">
                    <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-4 py-2.5 text-sm font-semibold text-[#FFFFFF] shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-[#FF6245] focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Package
                    </button>
                </a>
            </div>

            <!-- Controls / Toolbar Section -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 bg-[#FFFFFF] p-4 rounded-2xl shadow-sm border border-gray-100">
                <!-- Search Bar -->
                <!-- Added w-full to the form to ensure it takes up the entire row -->
<form method="GET" action="{{ url()->current() }}" class="w-full flex flex-col md:flex-row items-center justify-between gap-4 bg-[#FFFFFF] p-4 rounded-2xl shadow-sm border border-gray-100">

    <!-- Search Bar -->
    <div class="relative w-full md:max-w-md">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search packages by name or description..."
            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-[#FFFFFF] text-sm text-[#000000] placeholder-gray-400 transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
    </div>

    <!-- Filter Dropdown -->
    <!-- Added md:ml-auto here to forcefully push it to the right edge -->
    <div class="relative w-full md:w-auto md:ml-auto">
        <select name="time_options" onchange="this.form.submit()" class="w-full appearance-none rounded-xl border border-gray-200 bg-[#FFFFFF] px-4 py-3 pr-10 text-sm font-medium text-[#000000] transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20 cursor-pointer">
            <option value="" {{ request('time_options') == '' ? 'selected' : '' }}>All Billing Periods</option>

            <option value="day" {{ request('time_options') == 'day' ? 'selected' : '' }}>Daily</option>
            <option value="week" {{ request('time_options') == 'week' ? 'selected' : '' }}>Weekly</option>
            <option value="month" {{ request('time_options') == 'month' ? 'selected' : '' }}>Monthly</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>
</form>
            </div>

            <!-- Card Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($packages as $package)
                <!-- Package Card -->
                <div class="flex flex-col bg-[#FFFFFF] rounded-2xl shadow-md border border-gray-100 p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl group">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-lg font-bold text-[#000000] leading-tight">{{ $package->option->name }}</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-[#4FC1FF]/15 text-[#000000] text-xs font-bold tracking-wide uppercase">
                            {{ $package->time_options }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mb-6 flex-grow">{{ $package->description }}</p>

                    <div class="mb-5">
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-[#ff4545]">Ksh. {{ $package->price }}</span>
                            <span class="text-sm font-medium text-gray-500">/{{ $package->time_options }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mb-5 text-gray-500 text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>{{ $package->customers_count }} Customers</span>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-5 border-t border-gray-100">
                        <a href="{{ route('packages.edit', $package->id) }}">
                            <button class="inline-flex items-center justify-center p-2.5 rounded-xl bg-[#4FC1FF]/10 text-[#4FC1FF] transition-all duration-300 hover:bg-[#4FC1FF] hover:text-[#FFFFFF]" title="Edit Package">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                        </a>
                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                @csrf
                                @method('DELETE')
                            <button class="inline-flex items-center justify-center p-2.5 rounded-xl bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF]" title="Delete Package">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Pagination Section -->
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 bg-[#FFFFFF] px-6 py-4 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 font-medium">
                    Showing <span class="text-[#000000]">{{ $packages->firstItem() ?? 0 }}-{{ $packages->lastItem() ?? 0 }}</span> of <span class="text-[#000000]">{{ $packages->total() }}</span> packages
                </p>

                <nav aria-label="Pagination" class="inline-flex items-center gap-2">

                    <!-- Previous Button -->
                    @if($packages->onFirstPage())
                        <button type="button" disabled class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-4 py-2 text-sm font-medium text-gray-500 transition-all focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm opacity-50 cursor-not-allowed">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Prev
                        </button>
                    @else
                        <a href="{{ $packages->previousPageUrl() }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-4 py-2 text-sm font-medium text-gray-500 transition-all hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Prev
                        </a>
                    @endif

                    <!-- STRICT 4-PAGE SLIDING WINDOW -->
                    <div class="hidden sm:flex items-center gap-1">
                        @php
                            $currentPage = $packages->currentPage();
                            $lastPage = $packages->lastPage();
                            $window = 4;

                            // Math to ensure window is strictly 4 items and slides based on current page
                            $start = max(1, $currentPage - 1);
                            $end = $start + $window - 1; // Exactly 4 pages total

                            // If calculating forward puts us past the last page, pull backwards
                            if ($end > $lastPage) {
                                $end = max(1, $lastPage);
                                $start = max(1, $end - $window + 1);
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $currentPage)
                                <!-- Active Page -->
                                <span aria-current="page" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-[#FF6245] text-sm font-bold text-[#FFFFFF] shadow-md transition-all hover:bg-opacity-90 cursor-default">
                                    {{ $i }}
                                </span>
                            @else
                                <!-- Inactive Page Link -->
                                <a href="{{ $packages->url($i) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-transparent bg-transparent text-sm font-medium text-gray-600 transition-all hover:bg-gray-50 hover:text-[#000000]">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor
                    </div>

                    <!-- Next Button -->
                    @if($packages->hasMorePages())
                        <a href="{{ $packages->nextPageUrl() }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-4 py-2 text-sm font-medium text-gray-700 transition-all hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm">
                            Next
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    @else
                        <button type="button" disabled class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-4 py-2 text-sm font-medium text-gray-700 transition-all focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm opacity-50 cursor-not-allowed">
                            Next
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    @endif
                </nav>
            </div>

        </div>
    </div>
</x-main-layout>
