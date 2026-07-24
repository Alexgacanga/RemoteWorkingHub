<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Remote Working Hub</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/sidebar.js'])
    </head>

<body class="bg-[#f5f6fa] text-[#526484] font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <div id="sidebar" class="hidden md:flex flex-col w-64 bg-white border-r border-gray-200 transition-all duration-300 overflow-hidden z-20">
            <!-- Logo Area -->
            <div class="flex items-center justify-start px-6 h-16 border-b border-transparent relative overflow-hidden shrink-0 mt-2">
                <!-- Icon Logo (Always visible) -->
                <div class="w-8 h-8 bg-indigo-600 rounded flex items-center justify-center shrink-0 z-10 text-white font-bold text-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <!-- Text Logos (Transition based on state) -->
                <span id="logoFull" class="text-gray-800 font-bold text-lg whitespace-nowrap absolute left-16 transition-all duration-300 opacity-100 scale-100">Remote Working Hub</span>
                <span id="logoShort" class="text-gray-800 font-bold text-lg whitespace-nowrap absolute left-16 transition-all duration-300 opacity-0 scale-50 hidden">RWH</span>
            </div>

            <!-- Navigation Links -->
            <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden pb-4 custom-scrollbar">
                <nav class="flex-1 py-4">

                    <!-- Section 1 -->
                    <div class="nav-section-title px-6 pt-4 pb-2 text-[11px] font-bold text-gray-400 uppercase tracking-widest transition-all duration-300">
                        Dashboard
                    </div>

                    <a href="{{ route('payments.index') }}" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Payments">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Payments</span>
                    </a>

                    <a href="#" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Sales">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Sales Analytics</span>
                    </a>

                    <a href="#" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Revenue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Revenue Overview</span>
                    </a>

                    <!-- Section 2 -->
                    <div class="nav-section-title px-6 pt-6 pb-2 text-[11px] font-bold text-gray-400 uppercase tracking-widest transition-all duration-300">
                        Management
                    </div>

                    <a href="{{ route('customers.index') }}" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Customers">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Customers</span>
                    </a>

                    <a href="{{ route('packages.index') }}" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Packages">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Packages</span>
                    </a>

                    <a href="{{ route('options.index') }}" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Options">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Hub Options</span>
                    </a>

                    <!-- Section 3 -->
                    <div class="nav-section-title px-6 pt-6 pb-2 text-[11px] font-bold text-gray-400 uppercase tracking-widest transition-all duration-300">
                        System Setup
                    </div>

                    <a href="{{ route('roles.index') }}" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Roles">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Role Permissions</span>
                    </a>

                    <a href="{{ route('users.index') }}" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Users">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">System Users</span>
                    </a>

                    <a href="#" class="nav-item flex items-center px-4 py-2.5 mx-3 mb-1 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all duration-200 group" title="Expenses">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-5 w-5 shrink-0 transition-all duration-300 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="nav-text ml-3 text-[15px] font-medium whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Expenses</span>
                    </a>

                </nav>
            </div>
        </div>

        <!-- FOUC Script -->
        <script>
            (function() {
                if (localStorage.getItem('sidebarCollapsed') === 'true' && window.innerWidth >= 768) {
                    const sidebar = document.getElementById('sidebar');
                    const logoFull = document.getElementById('logoFull');
                    const navTexts = document.querySelectorAll('.nav-text');
                    const sectionTitles = document.querySelectorAll('.nav-section-title');

                    sidebar.classList.remove('w-64', 'transition-all', 'duration-300');
                    sidebar.classList.add('w-20');

                    logoFull.classList.remove('opacity-100', 'scale-100');
                    logoFull.classList.add('opacity-0', 'scale-50');

                    navTexts.forEach(text => {
                        text.classList.remove('max-w-[200px]', 'opacity-100', 'ml-3');
                        text.classList.add('max-w-0', 'opacity-0', 'ml-0');
                    });

                    sectionTitles.forEach(title => {
                        title.classList.remove('opacity-100');
                        title.classList.add('opacity-0', 'h-0', 'pt-0', 'pb-0', 'overflow-hidden');
                    });

                    setTimeout(() => sidebar.classList.add('transition-all', 'duration-300'), 50);
                }
            })();
        </script>

        <!-- Main content area -->
        <div class="flex flex-col flex-1 overflow-y-auto w-full transition-all duration-300 bg-[#f5f6fa]">

            <!-- Header (Dashlite Style) -->
            <div class="flex items-center justify-between h-[72px] bg-white border-b border-gray-200 w-full z-10 px-4 lg:px-8 shrink-0">

                <!-- Left side Header -->
                <div class="flex items-center space-x-6">
                    <button id="sidebarToggle" class="p-1 text-gray-500 hover:text-indigo-600 focus:outline-none transition-all duration-200" title="Toggle Sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>

                </div>

                <!-- Right side Header Tools -->
                <div class="flex items-center space-x-5">
                    <!-- Notification Bell -->
                    {{-- <button class="text-gray-500 hover:text-indigo-600 focus:outline-none relative transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
                    </button>

                    <!-- Language Flag Placeholder -->
                    <button class="hidden sm:block focus:outline-none rounded-full overflow-hidden w-6 h-6 border border-gray-200">
                        <img src="https://flagcdn.com/w20/us.png" alt="English" class="w-full h-full object-cover">
                    </button> --}}

                    <!-- User Profile Avatar -->
                    <button class="flex items-center focus:outline-none">
                        <div class="w-9 h-9 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-sm shadow-sm">
                            SA
                        </div>
                    </button>
                    
                </div>
            </div>

            <!-- Page Slot Content -->
            <div class="">
                {{ $slot }}
            </div>

        </div>
    </div>
</body>
</html>
