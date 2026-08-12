<x-main-layout>
    <div class="min-h-screen bg-white w-full" style="font-size: 14px; font-family: 'Poppins', sans-serif;">
        <!-- Main Container -->
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 xl:py-10 2xl:py-12 flex flex-col gap-8">

            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Packages</h1>

                <button type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-4 py-2.5 text-sm font-semibold text-[#FFFFFF] shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-[#FF6245] focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Package
                </button>
            </div>

            <!-- Controls / Toolbar Section -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 bg-[#FFFFFF] p-4 rounded-2xl shadow-sm border border-gray-100">
                <!-- Search Bar -->
                <div class="relative w-full md:max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search packages by name or description..."
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-[#FFFFFF] text-sm text-[#000000] placeholder-gray-400 transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
                </div>

                <!-- Filter Dropdown -->
                <div class="relative w-full md:w-auto">
                    <select class="w-full appearance-none rounded-xl border border-gray-200 bg-[#FFFFFF] px-4 py-3 pr-10 text-sm font-medium text-[#000000] transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20 cursor-pointer">
                        <option value="">All Billing Periods</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <!-- Package Card -->
                <div class="flex flex-col bg-[#FFFFFF] rounded-2xl shadow-md border border-gray-100 p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl group">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-lg font-bold text-[#000000] leading-tight">Daily Open Desk Pass</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-[#4FC1FF]/15 text-[#000000] text-xs font-bold tracking-wide uppercase">
                            Daily
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mb-6 flex-grow">Full day access to our open area desks. Includes unlimited access to the kitchenette and high-speed Wi-Fi.</p>

                    <div class="mb-5">
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-[#FF6245]">KES 1,500</span>
                            <span class="text-sm font-medium text-gray-500">/day</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mb-5 text-gray-500 text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>12 Active Users</span>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-5 border-t border-gray-100">
                        <button class="inline-flex items-center justify-center p-2.5 rounded-xl bg-[#4FC1FF]/10 text-[#4FC1FF] transition-all duration-300 hover:bg-[#4FC1FF] hover:text-[#FFFFFF]" title="Edit Package">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button class="inline-flex items-center justify-center p-2.5 rounded-xl bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF]" title="Delete Package">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pagination Section -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500 font-medium">Showing <span class="font-bold text-[#000000]">1</span> to <span class="font-bold text-[#000000]">4</span> of <span class="font-bold text-[#000000]">12</span> packages</p>

                <nav class="inline-flex items-center gap-2" aria-label="Pagination">
                    <button type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]">
                        Previous
                    </button>

                    <div class="hidden sm:flex items-center gap-1">
                        <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-[#FF6245] text-sm font-bold text-[#FFFFFF] shadow-sm transition-all duration-300 focus:outline-none">
                            1
                        </button>
                        <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none">
                            2
                        </button>
                        <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none">
                            3
                        </button>
                    </div>

                    <button type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]">
                        Next
                    </button>
                </nav>
            </div>

        </div>
    </div>
</x-main-layout>
