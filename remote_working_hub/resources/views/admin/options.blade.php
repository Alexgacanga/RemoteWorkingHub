<x-main-layout>
    <div class="bg-white min-h-screen flex flex-col w-full" style="font-family: 'Poppins', sans-serif;">
        <!-- Main Workspace -->
        <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">

            <!-- Header & Toolbar Section -->
            <div class="mb-8 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <!-- Page Title -->
                <div>
                    <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Options</h1>
                </div>

                <!-- Controls & Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-4 w-full lg:w-auto">

                    <!-- Search Bar Form -->
                    <form method="GET" action="{{ url()->current() }}" class="relative w-full sm:w-80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search options..."
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 bg-[#FFFFFF] text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20 focus:border-[#4FC1FF] transition-all duration-300 shadow-sm" />
                    </form>

                    <!-- Add New Option Button -->
                    <a href="{{ route('options.create') }}">
                        <button type="button" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-6 py-3 text-sm font-semibold text-[#FFFFFF] shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:bg-opacity-90 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Option
                        </button>
                    </a>
                </div>
            </div>
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
            <!-- Cards Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($options as $option)
                    <!-- Dynamic Card -->
                    <div class="bg-[#FFFFFF] rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col overflow-hidden relative group border border-gray-100">
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold tracking-wide bg-[#4FC1FF]/15 text-red-900 border border-[#4FC1FF]/20 backdrop-blur-sm shadow-sm">
                               @if ($option->is_active)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </span>
                        </div>
                        <!-- Image Area -->
                        <div class="h-48 relative overflow-hidden bg-gray-100">
                            <!-- Ensure you load your actual dynamic image here if applicable -->
                            <img src="{{ $option->cover_image ? asset('storage/' . $option->cover_image) : '' }}" alt="{{ $option->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                        </div>
                        <!-- Content -->
                        <div class="p-5 flex-1 flex flex-col">
                            <h3 class="text-lg font-bold text-[#000000] mb-2 leading-tight group-hover:text-[#4FC1FF] transition-colors duration-300">{{ $option->name ?? 'Dedicated Desk' }}</h3>
                            <p class="text-gray-500 text-sm flex-1 mb-4 line-clamp-3">{{ $option->description }}</p>
                            <!-- Card Footer & Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs font-medium text-gray-400">Added {{ $option->created_at->diffForHumans() }}</span>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('options.edit', $option->id) }}">
                                        <button class="p-2 text-[#4FC1FF] bg-[#4FC1FF]/10 hover:bg-[#4FC1FF] hover:text-[#FFFFFF] rounded-lg transition-all duration-300 shadow-sm" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                    </a>
                                    <form action="{{ route('options.destroy', $option->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this option?');">
                                        @csrf
                                        @method('DELETE')
                                        <a>
                                            <button class="p-2 text-[#FF6245] bg-[#FF6245]/10 hover:bg-[#FF6245] hover:text-[#FFFFFF] rounded-lg transition-all duration-300 shadow-sm" title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Footer -->
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 bg-[#FFFFFF] px-6 py-4 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 font-medium">
                    Showing <span class="text-[#000000]">{{ $options->firstItem() ?? 0 }}-{{ $options->lastItem() ?? 0 }}</span> of <span class="text-[#000000]">{{ $options->total() }}</span> options
                </p>

                <nav aria-label="Pagination" class="inline-flex items-center gap-2">

                    <!-- Previous Button -->
                    @if($options->onFirstPage())
                        <button type="button" disabled class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-4 py-2 text-sm font-medium text-gray-500 transition-all focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm opacity-50 cursor-not-allowed">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Prev
                        </button>
                    @else
                        <a href="{{ $options->previousPageUrl() }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-4 py-2 text-sm font-medium text-gray-500 transition-all hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Prev
                        </a>
                    @endif

                    <!-- STRICT 4-PAGE SLIDING WINDOW -->
                    <div class="hidden sm:flex items-center gap-1">
                        @php
                            $currentPage = $options->currentPage();
                            $lastPage = $options->lastPage();
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
                                <a href="{{ $options->url($i) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-transparent bg-transparent text-sm font-medium text-gray-600 transition-all hover:bg-gray-50 hover:text-[#000000]">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor
                    </div>

                    <!-- Next Button -->
                    @if($options->hasMorePages())
                        <a href="{{ $options->nextPageUrl() }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-4 py-2 text-sm font-medium text-gray-700 transition-all hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]/20 shadow-sm">
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

        </main>
    </div>
</x-main-layout>
