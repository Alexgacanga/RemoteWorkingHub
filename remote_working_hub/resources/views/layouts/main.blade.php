<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/sidebar.js'])
    </head>

<body>
    <div class="flex h-screen bg-gray-100 overflow-hidden">

        <!-- sidebar -->
        <div id="sidebar" class="hidden md:flex flex-col w-64 bg-gray-800 transition-all duration-300 overflow-hidden z-20">
            <div class="flex items-center justify-center h-16 bg-gray-900 relative overflow-hidden">
                <span id="logoFull" class="text-white font-bold uppercase whitespace-nowrap absolute transition-all duration-300 opacity-100 scale-100">Remote Working Hub</span>
                <span id="logoShort" class="text-white font-bold uppercase whitespace-nowrap absolute transition-all duration-300 opacity-0 scale-50">RWT</span>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
                <nav class="flex-1 py-4 bg-gray-800">
                    <div class="nav-item flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Dashboard</span>
                    </div>
                    <a href="{{ route('payments.index') }}" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Payments">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" viewBox="0 0 24 24" width="24"
                            height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="2" y1="10" x2="22" y2="10"></line>
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Payments</span>
                    </a>
                    <a href="{{ route('customers.index') }}" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Customers">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" viewBox="0 0 24 24" width="24"
                            height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Customers</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Sales">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" viewBox="0 0 24 24" width="24"
                            height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                            </path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            <circle cx="15" cy="11" r="1"></circle>
                            <circle cx="11" cy="15" r="1"></circle>
                            <line x1="16" y1="10" x2="10" y2="16"></line>
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Sales</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Expenses">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                            <path d="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16l2-2 2 2 2-2 2 2 2-2 2 2Z" />
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Expenses</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Revenue">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" viewBox="0 0 24 24" width="24"
                            height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                            <polyline points="16 7 22 7 22 13" />
                            <line x1="3" y1="20" x2="3" y2="19" />
                            <line x1="7" y1="20" x2="7" y2="14" />
                            <line x1="11" y1="20" x2="11" y2="16" />
                            <line x1="15" y1="20" x2="15" y2="11" />
                            <path d="M19 14c1.5 0 2.5 1 2.5 2.5S20.5 19 19 19s-2.5.5-2.5 2 1 2.5 2.5 2.5" />
                            <line x1="19" y1="13" x2="19" y2="25" />
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Revenue</span>
                    </a>
                    <a href="{{ route('roles.index') }}" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Roles">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" viewBox="0 0 24 24" width="24"
                            height="24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            <circle cx="12" cy="11" r="3" />
                            <path d="M8 17c0-2 2-3 4-3s4 1 4 3" />
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Roles</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Packages">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" viewBox="0 0 24 24" width="24"
                            height="24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Packages</span>
                    </a>

                    <a href="#" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Options">
                        <svg xmlns="http://w3.org" class="nav-icon h-6 w-6 shrink-0 transition-all duration-300" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="12" cy="5" r="1" />
                            <circle cx="12" cy="19" r="1" />
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Options</span>
                    </a>
                    <a href="#" class="nav-item flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700 transition-all duration-300" title="Users">
                        <svg class="nav-icon w-6 h-6 text-gray-800 shrink-0 transition-all duration-300 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="nav-text ml-2 whitespace-nowrap overflow-hidden transition-all duration-300 max-w-[200px] opacity-100">Users</span>
                    </a>
                </nav>
            </div>
        </div>

        <script>
            // Run synchronously to prevent the sidebar from flashing expanded on page load
            (function() {
                if (localStorage.getItem('sidebarCollapsed') === 'true' && window.innerWidth >= 768) {
                    const sidebar = document.getElementById('sidebar');
                    const logoFull = document.getElementById('logoFull');
                    const logoShort = document.getElementById('logoShort');
                    const navTexts = document.querySelectorAll('.nav-text');
                    const navItems = document.querySelectorAll('.nav-item');

                    // Apply collapsed classes before the browser paints
                    sidebar.classList.remove('w-64', 'transition-all', 'duration-300');
                    sidebar.classList.add('w-20');

                    logoFull.classList.remove('opacity-100', 'scale-100');
                    logoFull.classList.add('opacity-0', 'scale-50');

                    logoShort.classList.remove('opacity-0', 'scale-50');
                    logoShort.classList.add('opacity-100', 'scale-100');

                    navTexts.forEach(text => {
                        text.classList.remove('max-w-[200px]', 'opacity-100', 'ml-2');
                        text.classList.add('max-w-0', 'opacity-0', 'ml-0');
                    });

                    navItems.forEach(item => {
                        item.classList.remove('px-4');
                        item.classList.add('px-7');
                    });

                    // Restore transition safely after initial render
                    setTimeout(() => sidebar.classList.add('transition-all', 'duration-300'), 50);
                }
            })();
        </script>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto w-full transition-all duration-300">
            <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200 w-full z-10">
                <div class="flex items-center px-4">
                    <button id="sidebarToggle" class="p-2 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all duration-200" title="Toggle Sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <input class="mx-4 w-full border rounded-md px-4 py-2" type="text" placeholder="Search">
                </div>
                <div class="flex items-center pr-4">
                    <button class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l-7-7 7-7m5 14l7-7-7-7" />
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
