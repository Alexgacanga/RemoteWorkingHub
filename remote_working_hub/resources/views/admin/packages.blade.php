<x-main-layout>
    <div class="min-h-screen bg-white w-full flex flex-col" style="font-family: 'Poppins', sans-serif;">
        <!-- Main Container -->
        <main class="flex-1 mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 w-full flex flex-col gap-8">

            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#000000]">Packages</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage and monitor your workspace billing packages.</p>
                </div>

                <a href="{{ route('packages.create') }}" class="w-full sm:w-auto shrink-0">
                    <button type="button"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-6 py-3 text-sm font-semibold text-[#FFFFFF] shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:bg-opacity-90 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Package
                    </button>
                </a>
            </div>

            <!-- Controls / Toolbar Section -->
            <form method="GET" action="{{ url()->current() }}" class="w-full flex flex-col md:flex-row items-center justify-between gap-4 bg-[#FFFFFF] p-4 rounded-2xl shadow-sm border border-gray-100">

                <!-- Search Bar -->
                <div class="relative w-full md:max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search packages by name or description..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 bg-[#FFFFFF] text-sm text-[#000000] placeholder-gray-400 transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
                </div>

                <!-- Filter Dropdown (Pushed to the right on desktop) -->
                <div class="relative w-full md:w-auto md:ml-auto">
                    <select name="time_options" onchange="this.form.submit()" class="w-full appearance-none rounded-xl border border-gray-200 bg-[#FFFFFF] px-5 py-3 pr-12 text-sm font-medium text-[#000000] transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20 cursor-pointer">
                        <option value="" {{ request('time_options') == '' ? 'selected' : '' }}>All Billing Periods</option>
                        <option value="day" {{ request('time_options') == 'day' ? 'selected' : '' }}>Daily</option>
                        <option value="week" {{ request('time_options') == 'week' ? 'selected' : '' }}>Weekly</option>
                        <option value="month" {{ request('time_options') == 'month' ? 'selected' : '' }}>Monthly</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </form>
@if ($errors->any())
                <div class="mb-8 p-4 rounded-xl bg-red-50 border border-red-100 flex items-start gap-3 transition-all duration-300 shadow-sm">
                    <svg class="h-5 w-5 text-red-500 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800">Action Failed</h3>
                        <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <!-- Card Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($packages as $package)
                    <!-- Package Card -->
                    <div class="flex flex-col bg-[#FFFFFF] rounded-2xl shadow-md border border-gray-100 p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl group">

                        <!-- Header & Status Badge -->
                        <div class="flex justify-between items-start mb-3 gap-3">
                            <h3 class="text-lg font-bold text-[#000000] leading-tight">{{ $package->name }}</h3>

                            @if ($package->is_active)
                                <span class="inline-flex shrink-0 items-center px-3 py-1 rounded-full bg-[#4FC1FF]/10 border border-[#4FC1FF]/20 text-[#4FC1FF] text-xs font-bold tracking-wide uppercase">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex shrink-0 items-center px-3 py-1 rounded-full bg-[#FF6245]/10 border border-[#FF6245]/20 text-[#FF6245] text-xs font-bold tracking-wide uppercase">
                                    Inactive
                                </span>
                            @endif
                        </div>

                        <!-- Description -->
                        <p class="text-sm text-gray-500 mb-4 flex-grow line-clamp-2" title="{{ $package->description }}">
                            {{ $package->description }}
                        </p>

                        <!-- Related Space Option (Clickable Link) -->
                        <div class="mb-5">
                            <a href="{{ route('options.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#4FC1FF] hover:text-[#0091FF] hover:underline transition-all duration-300 w-max group/link">
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover/link:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                {{ $package->option?->name ?? 'Unknown Space' }}
                            </a>
                        </div>

                        <!-- Price & Billing Period -->
                        <div class="mb-5 flex flex-col items-start gap-1">
                            <div class="flex items-baseline gap-1">
                                <span class="text-sm font-semibold text-gray-400">Ksh.</span>
                                <span class="text-xl font-extrabold text-gray-500 tracking-tight">{{ number_format($package->price, 2, '.', ',') }}<span class="inline-flex items-center px-2 py-0.5 text-xs font-bold text-gray-500 uppercase tracking-wider"> / {{ $package->time_options }}</span></span>
                            </div>
                        </div>

                        <!-- Active Users -->
                        <div class="flex items-center gap-2 mb-5 text-gray-500 text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            {{-- TO BE CORRECTED --}}
                            <span> {{ $package->active_users_count }} Active Customers</span>
                        </div>

                        <!-- Card Actions (Footer) -->
                        <div class="flex items-center justify-end gap-3 pt-5 border-t border-gray-100 mt-auto">
                            <!-- Edit Button -->
                            <a href="{{ route('packages.edit', $package->id) }}" class="inline-flex items-center justify-center p-2.5 rounded-xl bg-[#4FC1FF]/10 text-[#4FC1FF] transition-all duration-300 hover:bg-[#4FC1FF] hover:text-[#FFFFFF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:ring-offset-1" title="Edit Package">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center p-2.5 rounded-xl bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF] focus:outline-none focus:ring-2 focus:ring-[#FF6245] focus:ring-offset-1" title="Delete Package">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 xl:col-span-4 flex flex-col items-center justify-center py-16 px-4 bg-[#FFFFFF] rounded-2xl shadow-sm border border-gray-100 text-center">
                        <div class="bg-gray-50 p-4 rounded-full mb-4">
                            <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#000000] mb-2">No packages found</h3>
                        <p class="text-sm text-gray-500 max-w-sm mx-auto">Try adjusting your search or filter criteria, or add a new package to get started.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Section -->
            @if($packages->hasPages())
                <div class="mt-4 flex flex-col sm:flex-row items-center justify-between gap-4 bg-[#FFFFFF] px-6 py-4 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">
                        Showing <span class="text-[#000000] font-bold">{{ $packages->firstItem() ?? 0 }}-{{ $packages->lastItem() ?? 0 }}</span> of <span class="text-[#000000] font-bold">{{ $packages->total() }}</span> packages
                    </p>

                    <nav aria-label="Pagination" class="inline-flex items-center gap-2">
                        <!-- Previous Button -->
                        @if($packages->onFirstPage())
                            <button type="button" disabled class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-400 transition-all focus:outline-none opacity-50 cursor-not-allowed">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                Prev
                            </button>
                        @else
                            <a href="{{ $packages->previousPageUrl() }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-600 transition-all hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm">
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

                                $start = max(1, $currentPage - 1);
                                $end = $start + $window - 1;

                                if ($end > $lastPage) {
                                    $end = max(1, $lastPage);
                                    $start = max(1, $end - $window + 1);
                                }
                            @endphp

                            @for ($i = $start; $i <= $end; $i++)
                                @if ($i == $currentPage)
                                    <!-- Active Page -->
                                    <span aria-current="page" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-[#FF6245] text-sm font-bold text-[#FFFFFF] shadow-md transition-all cursor-default">
                                        {{ $i }}
                                    </span>
                                @else
                                    <!-- Inactive Page Link -->
                                    <a href="{{ $packages->url($i) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-transparent bg-transparent text-sm font-medium text-gray-600 transition-all hover:bg-gray-100 hover:text-[#000000]">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endfor
                        </div>

                        <!-- Next Button -->
                        @if($packages->hasMorePages())
                            <a href="{{ $packages->nextPageUrl() }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-700 transition-all hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm">
                                Next
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        @else
                            <button type="button" disabled class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-400 transition-all focus:outline-none opacity-50 cursor-not-allowed">
                                Next
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        @endif
                    </nav>
                </div>
            @endif

        </main>
    </div>
</x-main-layout>
