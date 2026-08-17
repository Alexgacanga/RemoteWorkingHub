<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="font-size: 14px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Remote Working Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/main.js', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-700 antialiased" style="font-family: 'Poppins', sans-serif;">
    <div class="flex h-screen overflow-auto">
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full flex-col border-r border-gray-200 bg-white shadow-xl transition-all duration-300 ease-in-out md:static md:translate-x-0 md:shadow-none">
            <div class="flex h-20 items-center justify-between border-b border-gray-200 px-3">
                <div class="flex min-w-0 items-center gap-3">
                    <div
                        class="group relative flex h-10 w-10 items-center justify-center rounded-xl bg-[#000000] text-lg font-bold text-white shadow-sm transition-all duration-300 ease-in-out">
                        <span class="relative z-10">R</span>
                        <span
                            class="pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100">
                            Remote Working<br>Hub
                        </span>
                    </div>
                    <div class="overflow-hidden transition-all duration-300 ease-in-out">
                        <span id="brandText"
                            class="block whitespace-nowrap text-base font-bold text-black transition-all duration-300 ease-in-out">Remote
                            Working <br>Hub</span>
                    </div>
                </div>

                <button id="desktopSidebarToggle" type="button"
                    class="hidden h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-gray-50 text-gray-600 transition duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-[#000000] md:flex"
                    aria-label="Toggle sidebar">
                    <svg id="sidebarChevron" xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>


            <nav id="sidebarNav" class="flex-1 space-y-1 overflow-y-auto overflow-x-hidden px-3 py-4">
                <div
                    class="nav-section-title px-3 pb-2 text-[10px] font-semibold uppercase tracking-[0.22em] text-gray-400 transition-all duration-300 ease-in-out">
                    Dashboard</div>

                <a href="{{ route('payments.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Payments</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Payments</span>
                </a>

                <a href="{{ route('subscriptions.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Subscriptions</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Subscriptions</span>
                </a>

                <a href="{{ route('invoices.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Invoices</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Invoices</span>
                </a>

                <a href="#"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Sales</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Sales</span>
                </a>

                <a href="#"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Revenue</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Revenue</span>
                </a>

                <div
                    class="nav-section-title px-3 pb-2 pt-5 text-[10px] font-semibold uppercase tracking-[0.22em] text-gray-400 transition-all duration-300 ease-in-out">
                    Management</div>

                <a href="{{ route('customers.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Customers</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Customers</span>
                </a>

                <a href="{{ route('packages.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Packages</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Packages</span>
                </a>

                <a href="{{ route('roles.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Roles</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Roles</span>
                </a>

                <a href="{{ route('users.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">System Users</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">System
                        Users</span>
                </a>

                <a href="#"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>

                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Expenses</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Expenses</span>
                </a>

                <a href="#"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12l2-1 2 1 2-1 2 1 2-1 2 1V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9h6m-6-4h6" />
                    </svg>

                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Receipts</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Receipts</span>
                </a>
                <a href="{{ route('options.index') }}"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zM14 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                    </svg>



                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Space options</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Space
                        options</span>
                </a>

                <a href="#"
                    class="nav-item group relative flex items-center gap-3 rounded-xl border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-gray-600 transition-all duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="nav-label truncate transition-all duration-300 ease-in-out">Settings</span>
                    <span
                        class="tooltip-label pointer-events-none absolute left-full top-1/2 z-50 ml-3 -translate-y-1/2 -translate-x-2 invisible whitespace-nowrap rounded-lg bg-[#000000] px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 ease-in-out group-hover:visible group-hover:translate-x-0 group-hover:opacity-100 hidden md:block">Settings</span>
                </a>
            </nav>

        </aside>

        <div id="mobileOverlay" class="fixed overflow-y-auto inset-0 z-30 hidden bg-black/40 md:hidden"></div>

        <div class="flex min-w-0 flex-1 flex-col overflow-x-hidden overflow-y-auto">
            <header
                class="sticky top-0 z-20 flex h-20 shrink-0 items-center justify-between border-b border-gray-200 bg-white px-4 shadow-sm md:px-8">
                <div class="flex items-center gap-3">
                    <button id="mobileSidebarToggle" type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 transition duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 hover:text-black md:hidden"
                        aria-label="Open sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div class="relative ml-auto">
                    <button id="profileButton" type="button"
                        class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white px-2 py-1.5 text-left transition duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF]">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-[#000000] text-sm font-bold text-white">
                            SA</div>
                        <div class="hidden sm:block">
                            <div class="text-sm font-semibold text-black">Super Admin</div>
                            <div class="text-[11px] text-gray-500">Administrator</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-gray-500 transition-transform duration-200" id="profileChevron"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="profileDropdown"
                        class="absolute right-0 top-full z-50 mt-2 hidden w-48 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg transition-all duration-200 ease-in-out">
                        <button type="button"
                            class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-[#4FC1FF]/10 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        </button>
                        <a href="{{ route('logout') }}">
                            <button type="button"
                                class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-[#FF6245]/10 hover:text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </a>
                    </div>
                </div>
            </header>
            <div>
                {{ $slot }}
                @stack('scripts')
            </div>

        </div>
    </div>
</body>

</html>
