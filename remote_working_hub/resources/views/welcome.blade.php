<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Remote Working Hub</title>

        <!-- Google Fonts: Poppins -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* Tailwind CSS fallback or injection point if not using Vite in this exact setup */
                /*! tailwindcss v3.x | MIT License | https://tailwindcss.com */
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css'); 
            </style>
        @endif
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Poppins', 'sans-serif'],
                        },
                        colors: {
                            brand: {
                                coral: '#FF6245',
                                blue: '#4FC1FF',
                                black: '#000000',
                                white: '#FFFFFF',
                            }
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-[#FFFFFF] text-[#000000] font-sans antialiased overflow-x-hidden relative">

        <!-- Abstract Background Blobs for depth -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute -top-32 -right-32 w-72 h-72 bg-brand-blue opacity-10 rounded-full blur-3xl mix-blend-multiply"></div>
            <div class="absolute top-32 -left-32 w-72 h-72 bg-brand-coral opacity-10 rounded-full blur-3xl mix-blend-multiply"></div>
        </div>

        <!-- Top Navigation Bar (Header) -->
        <header class="fixed top-0 w-full bg-[#FFFFFF]/90 backdrop-blur-md border-b border-gray-100 z-50 transition-all duration-300">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Left Side (Brand) -->
                    <div class="flex items-center gap-2">
                        <!-- Abstract Logo Placeholder -->
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-coral to-brand-blue flex items-center justify-center shadow-md">
                            <span class="text-[#FFFFFF] font-bold text-base">R</span>
                        </div>
                        <span class="font-bold text-lg tracking-tight text-[#000000]">Remote Working Hub</span>
                    </div>

                    <!-- Right Side (Actions) -->
                    @if (Route::has('login'))
                        <div class="hidden sm:flex items-center gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-xs font-medium text-gray-600 hover:text-brand-blue transition-colors duration-300">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-xs font-medium text-[#000000] px-3 py-1.5 rounded-md hover:bg-gray-50 transition-all duration-300">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-[#FFFFFF] bg-brand-coral rounded-md shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>

                        <!-- Mobile Menu Button -->
                        <div class="sm:hidden flex items-center">
                            <button type="button" class="text-gray-500 hover:text-[#000000] focus:outline-none focus:text-[#000000]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section (Main Welcome Area) -->
        <main class="relative pt-24 pb-12 lg:pt-32 lg:pb-16 flex items-center min-h-[80vh]">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-6">
                    
                    <!-- Left Column -->
                    <div class="w-full lg:w-1/2 flex flex-col justify-center text-center lg:text-left z-10">
                        
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#000000] leading-tight mb-4 tracking-tight">
                            Welcome to <br class="hidden sm:block">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-coral to-brand-blue">
                                Remote Working Hub
                            </span>
                        </h1>
                        
                        <p class="text-base sm:text-lg text-gray-500 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Manage your workspace, subscriptions, and seamless remote working experience all in one place. Designed for modern professionals.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row items-center gap-3 justify-center lg:justify-start">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-[#FFFFFF] bg-brand-coral rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                    Explore Dashboard
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-[#FFFFFF] bg-brand-coral rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                    Get Started Today
                                </a>
                                <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-[#000000] bg-[#FFFFFF] border-2 border-gray-200 rounded-lg hover:border-brand-blue hover:text-brand-blue hover:shadow-md transition-all duration-300">
                                    Sign In
                                </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Right Column (Visual) -->
                    <div class="w-full lg:w-1/2 relative z-10 flex justify-center lg:justify-end">
                        <!-- Abstract Geometric Illustration / Mockup Placeholder -->
                        <div class="relative w-full max-w-md aspect-square lg:aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl bg-white border border-gray-100 group">
                            
                            <!-- Internal decorative elements simulating a UI -->
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-50 to-gray-100 p-4 flex flex-col gap-3">
                                <!-- Mock Header -->
                                <div class="w-full h-6 flex justify-between items-center mb-3">
                                    <div class="flex gap-1.5">
                                        <div class="w-2 h-2 rounded-full bg-red-400"></div>
                                        <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
                                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                                    </div>
                                    <div class="w-16 h-3 bg-gray-200 rounded-full"></div>
                                </div>

                                <!-- Mock Dashboard Grid -->
                                <div class="grid grid-cols-2 gap-3 h-full">
                                    <div class="col-span-2 h-24 rounded-xl bg-gradient-to-r from-brand-coral/20 to-brand-coral/5 border border-brand-coral/10 p-3 transition-transform duration-500 group-hover:-translate-y-2">
                                        <div class="w-8 h-8 rounded-full bg-brand-coral/20 mb-2"></div>
                                        <div class="w-1/2 h-3 bg-gray-800 rounded-full mb-1.5"></div>
                                        <div class="w-1/3 h-2 bg-gray-400 rounded-full"></div>
                                    </div>
                                    <div class="h-full rounded-xl bg-gradient-to-b from-brand-blue/20 to-brand-blue/5 border border-brand-blue/10 p-3 transition-transform duration-500 delay-100 group-hover:-translate-y-2">
                                        <div class="w-8 h-8 rounded-lg bg-brand-blue/20 mb-2"></div>
                                        <div class="w-3/4 h-2 bg-gray-800 rounded-full mb-1.5"></div>
                                        <div class="w-1/2 h-1.5 bg-gray-400 rounded-full"></div>
                                    </div>
                                    <div class="h-full rounded-xl bg-white border border-gray-200 p-3 shadow-sm transition-transform duration-500 delay-200 group-hover:-translate-y-2">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100 mb-2"></div>
                                        <div class="w-2/3 h-2 bg-gray-800 rounded-full mb-1.5"></div>
                                        <div class="w-1/2 h-1.5 bg-gray-400 rounded-full"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Overlay overlay to make it look like a graphic -->
                            <div class="absolute inset-0 bg-gradient-to-t from-white/40 to-transparent pointer-events-none"></div>
                        </div>

                        <!-- Floating decorative blob -->
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-brand-coral rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-brand-blue rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                    </div>

                </div>
            </div>
        </main>

        <!-- Simple Footer -->
        <footer class="bg-white border-t border-gray-100 py-6 text-center text-gray-500 text-xs">
            <p>&copy; {{ date('Y') }} Remote Working Hub. All rights reserved.</p>
        </footer>

    </body>
</html>