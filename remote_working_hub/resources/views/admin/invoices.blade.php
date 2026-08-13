<x-main-layout>
    <div class="min-h-screen bg-white w-full" style="font-size: 14px; font-family: 'Poppins', sans-serif;">
        <!-- Main Container -->
        <div class="mx-auto max-w-[100rem] px-4 py-6 sm:px-6 lg:px-8 xl:py-10 2xl:py-12 flex flex-col gap-8">
            
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Invoices</h1>
            </div>

            <!-- Controls / Toolbar Section -->
            <div class="flex flex-col xl:flex-row items-center justify-between gap-4 bg-[#FFFFFF] p-4 rounded-2xl shadow-sm border border-gray-100">
                
                <!-- Search Bar -->
                <div class="relative w-full xl:max-w-md flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search by invoice number, name, or email..." 
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-[#FFFFFF] text-sm text-[#000000] placeholder-gray-400 transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
                </div>

                <!-- Filter Group -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full xl:w-auto">
                    
                    <!-- Packages Filter -->
                    <div class="relative w-full">
                        <select class="w-full appearance-none rounded-xl border border-gray-200 bg-[#FFFFFF] px-4 py-3 pr-10 text-sm font-medium text-[#000000] transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20 cursor-pointer">
                            <option value="">All Packages</option>
                            <option value="open-desk">Daily Open Desk</option>
                            <option value="board-room">Executive Sprint</option>
                            <option value="call-booth">Monthly Booth</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="relative w-full">
                        <select class="w-full appearance-none rounded-xl border border-gray-200 bg-[#FFFFFF] px-4 py-3 pr-10 text-sm font-medium text-[#000000] transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20 cursor-pointer">
                            <option value="">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="partially-paid">Partially Paid</option>
                            <option value="overdue">Overdue</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Billing Period Filter -->
                    <div class="relative w-full">
                        <select class="w-full appearance-none rounded-xl border border-gray-200 bg-[#FFFFFF] px-4 py-3 pr-10 text-sm font-medium text-[#000000] transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20 cursor-pointer">
                            <option value="">All Periods</option>
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
            </div>

            <!-- Data Table Section (High Density UI) -->
            <div class="bg-[#FFFFFF] rounded-2xl shadow-md border border-gray-100 overflow-hidden flex flex-col relative">
                
                <!-- Horizontal Overflow Wrapper -->
                <div class="overflow-x-auto w-full custom-scrollbar">
                    <table class="min-w-full divide-y divide-gray-200 text-left border-collapse whitespace-nowrap">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Invoice No.</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">First Name</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Last Name</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Phone</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">ID Number</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Package</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Start Date</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">End Date</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Period</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider text-right">Total</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider text-right">Paid</th>
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider text-right">Balance</th>
                                <!-- Sticky Action Column Header -->
                                <th scope="col" class="px-4 py-4 text-xs font-bold text-[#000000] uppercase tracking-wider text-right sticky right-0 bg-gray-50 z-10 border-l border-gray-200 shadow-[-4px_0_6px_-2px_rgba(0,0,0,0.05)]">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-[#FFFFFF]">
                            
                            <!-- Row 1: Paid -->
                            <tr class="transition-all duration-300 hover:bg-gray-50 group">
                                <td class="px-4 py-4 text-sm font-bold text-[#000000]">INV-26-001</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-600">Alex</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-600">Mwangi</td>
                                <td class="px-4 py-4 text-sm text-gray-500">alex.m@example.com</td>
                                <td class="px-4 py-4 text-sm text-gray-500">+254 712 345 678</td>
                                <td class="px-4 py-4 text-sm text-gray-500">32145678</td>
                                <td class="px-4 py-4 text-sm font-semibold text-[#000000]">Daily Open Desk</td>
                                <td class="px-4 py-4 text-sm text-gray-500">Aug 13, 2026</td>
                                <td class="px-4 py-4 text-sm text-gray-500">Aug 14, 2026</td>
                                <td class="px-4 py-4 text-sm text-gray-600 font-medium">Daily</td>
                                <td class="px-4 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-[#4FC1FF]/20 text-[#000000] text-xs font-bold tracking-wide uppercase">
                                        Paid
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-sm font-medium text-[#000000] text-right">KES 1,500</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-500 text-right">KES 1,500</td>
                                <td class="px-4 py-4 text-sm font-bold text-gray-400 text-right">KES 0</td>
                                <!-- Sticky Action Column -->
                                <td class="px-4 py-4 text-right sticky right-0 bg-[#FFFFFF] group-hover:bg-gray-50 transition-colors z-10 border-l border-gray-100 shadow-[-4px_0_6px_-2px_rgba(0,0,0,0.05)]">
                                    <div class="flex items-center justify-end gap-2">
                                        <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF]" title="Pay cash">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                        <button class="inline-flex items-center justify-center p-2 rounded-lg bg-gray-100 text-[#000000] transition-all duration-300 hover:bg-[#000000] hover:text-[#FFFFFF]" title="View Receipt">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#4FC1FF]/10 text-[#4FC1FF] transition-all duration-300 hover:bg-[#4FC1FF] hover:text-[#FFFFFF]" title="Edit Invoice">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF]" title="Delete Invoice">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Section -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-6 border-t border-gray-100 bg-[#FFFFFF]">
                    <p class="text-sm text-gray-500 font-medium">Showing <span class="font-bold text-[#000000]">1</span> to <span class="font-bold text-[#000000]">4</span> of <span class="font-bold text-[#000000]">1,024</span> invoices</p>
                    
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
                            <span class="px-2 text-gray-400">...</span>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none">
                                256
                            </button>
                        </div>
                        
                        <button type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]">
                            Next
                        </button>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</x-main-layout>