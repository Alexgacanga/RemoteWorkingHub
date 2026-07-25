<x-main-layout>
    <div class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex flex-col w-full">

        <!-- Top Navigation / Header -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-3">
                        <h1 class="text-xl font-bold text-gray-900">Packages Management</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Left Column: Create Form (Takes up 4 columns on large screens) -->
                <div class="lg:col-span-4">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-24">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                            <h2 class="text-lg font-semibold text-gray-900">Create New Package</h2>
                            <p class="text-sm text-gray-500 mt-1">Set up pricing plans for your hub options.</p>
                        </div>

                        <form action="#" method="POST" class="p-6 space-y-5">

                            <!-- Package Name Field -->
                            <div>
                                <label for="package-name" class="block text-sm font-medium text-gray-700 mb-1">Package Name</label>
                                <input type="text" id="package-name" name="package-name" placeholder="e.g., Daily Open Desk Pass" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 shadow-sm placeholder-gray-400">
                            </div>

                            <!-- Option (Space) Field -->
                            <div>
                                <label for="option_id" class="block text-sm font-medium text-gray-700 mb-1">Linked Option (Space)</label>
                                <select id="option_id" name="option_id" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 shadow-sm bg-white text-gray-700">
                                    <option value="" disabled selected>Select the space...</option>
                                    <option value="1">Open Area</option>
                                    <option value="2">Board Room</option>
                                    <option value="3">Call Booth</option>
                                </select>
                            </div>

                            <!-- Price and Period Row -->
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Price Field -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">KES</span>
                                        </div>
                                        <input type="number" id="price" name="price" placeholder="1500" required
                                            class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 shadow-sm placeholder-gray-400">
                                    </div>
                                </div>

                                <!-- Billing Period -->
                                <div>
                                    <label for="period" class="block text-sm font-medium text-gray-700 mb-1">Billing Period</label>
                                    <select id="period" name="period" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 shadow-sm bg-white text-gray-700">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea id="description" name="description" rows="4" placeholder="List what is included in this package (e.g., unlimited coffee, high-speed wifi)..." required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 shadow-sm placeholder-gray-400 resize-none"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit" class="w-full bg-gray-800 text-white font-medium py-2.5 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 shadow-sm transition-all duration-200 flex justify-center items-center">
                                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create Package
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Listings (Takes up 8 columns on large screens) -->
                <div class="lg:col-span-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Active Packages</h2>

                        <!-- Filter/Sort -->
                        <div class="flex space-x-2">
                            <select class="border-gray-300 rounded-md text-sm pl-3 pr-8 py-2 border shadow-sm focus:ring-blue-500 focus:border-blue-500 outline-none bg-white">
                                <option>All Options</option>
                                <option>Open Area</option>
                                <option>Board Room</option>
                                <option>Call Booth</option>
                            </select>
                        </div>
                    </div>

                    <!-- Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Card 1 -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                            <!-- Period Ribbon/Badge -->
                            <div class="absolute top-0 right-0 bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-bl-lg">Daily</div>

                            <!-- Linked Option Badge -->
                            <div class="mb-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Option: Open Area
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-1 pr-12">Daily Open Desk Pass</h3>
                            <div class="flex items-baseline mb-4 text-gray-900">
                                <span class="text-2xl font-extrabold tracking-tight">KES 1,500</span>
                                <span class="text-sm text-gray-500 ml-1">/day</span>
                            </div>

                            <p class="text-gray-600 text-sm flex-1 mb-6">
                                Full day access to our open area desks. Includes unlimited access to the kitchenette for coffee and microwave use. High-speed Wi-Fi included.
                            </p>

                            <!-- Card Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-green-600 font-medium flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                    12 Active Users
                                </span>
                                <div class="flex space-x-2">
                                    <button class="p-1.5 text-gray-400 hover:text-blue-500 hover:bg-blue-50 rounded-md transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-md transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                            <div class="absolute top-0 right-0 bg-purple-100 text-purple-700 text-xs font-bold px-3 py-1 rounded-bl-lg">Weekly</div>

                            <!-- Linked Option Badge -->
                            <div class="mb-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Option: Board Room
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-1 pr-12">Executive Team Sprint</h3>
                            <div class="flex items-baseline mb-4 text-gray-900">
                                <span class="text-2xl font-extrabold tracking-tight">KES 35,000</span>
                                <span class="text-sm text-gray-500 ml-1">/week</span>
                            </div>

                            <p class="text-gray-600 text-sm flex-1 mb-6">
                                Exclusive use of a fully equipped board room for a full week (Mon-Fri). Perfect for team sprints. Includes TV projection and whiteboard.
                            </p>

                            <!-- Card Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400 font-medium flex items-center">
                                    <span class="w-2 h-2 bg-gray-300 rounded-full mr-1.5"></span>
                                    0 Active Users
                                </span>
                                <div class="flex space-x-2">
                                    <button class="p-1.5 text-gray-400 hover:text-blue-500 hover:bg-blue-50 rounded-md transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-md transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                            <div class="absolute top-0 right-0 bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-bl-lg">Monthly</div>

                            <!-- Linked Option Badge -->
                            <div class="mb-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Option: Call Booth
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-1 pr-12">Dedicated Monthly Booth</h3>
                            <div class="flex items-baseline mb-4 text-gray-900">
                                <span class="text-2xl font-extrabold tracking-tight">KES 15,000</span>
                                <span class="text-sm text-gray-500 ml-1">/month</span>
                            </div>

                            <p class="text-gray-600 text-sm flex-1 mb-6">
                                Reserved sound-proof call booth for an entire month. Best suited for remote sales agents or remote workers who spend 80% of their day on calls.
                            </p>

                            <!-- Card Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-green-600 font-medium flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                    5 Active Users
                                </span>
                                <div class="flex space-x-2">
                                    <button class="p-1.5 text-gray-400 hover:text-blue-500 hover:bg-blue-50 rounded-md transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-md transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>
</x-main-layout>
