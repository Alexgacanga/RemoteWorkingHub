<x-main-layout>
    <div class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex flex-col w-full">

        <!-- Top Navigation / Header -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-3">
                        <h1 class="text-xl font-bold text-gray-900">Roles Management</h1>
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
                            <h2 class="text-lg font-semibold text-gray-900">Create New Role</h2>
                            <p class="text-sm text-gray-500 mt-1">Define system access levels for staff.</p>
                        </div>

                        <form action="#" method="POST" class="p-6 space-y-5">

                            <!-- Role Name Field -->
                            <div>
                                <label for="role-name" class="block text-sm font-medium text-gray-700 mb-1">Role Name</label>
                                <input type="text" id="role-name" name="role-name" placeholder="e.g., Finance Manager" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 shadow-sm placeholder-gray-400">
                            </div>

                            <!-- Permissions Checkboxes -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Assign Permissions</label>

                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                    <!-- Select All Option -->
                                    <div class="flex items-center mb-4 pb-4 border-b border-gray-200">
                                        <input id="perm-all" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                        <label for="perm-all" class="ml-2 block text-sm font-bold text-gray-900 cursor-pointer">
                                            Select All Modules
                                        </label>
                                    </div>

                                    <!-- Grid of Module Permissions -->
                                    <div class="grid grid-cols-2 gap-y-3 gap-x-4">

                                        <!-- Payments -->
                                        <div class="flex items-center">
                                            <input id="perm-payments" type="checkbox" name="permissions[]" value="payments" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-payments" class="ml-2 block text-sm text-gray-700 cursor-pointer">Payments</label>
                                        </div>

                                        <!-- Customers -->
                                        <div class="flex items-center">
                                            <input id="perm-customers" type="checkbox" name="permissions[]" value="customers" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-customers" class="ml-2 block text-sm text-gray-700 cursor-pointer">Customers</label>
                                        </div>

                                        <!-- Sales -->
                                        <div class="flex items-center">
                                            <input id="perm-sales" type="checkbox" name="permissions[]" value="sales" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-sales" class="ml-2 block text-sm text-gray-700 cursor-pointer">Sales</label>
                                        </div>

                                        <!-- Expenses -->
                                        <div class="flex items-center">
                                            <input id="perm-expenses" type="checkbox" name="permissions[]" value="expenses" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-expenses" class="ml-2 block text-sm text-gray-700 cursor-pointer">Expenses</label>
                                        </div>

                                        <!-- Revenue -->
                                        <div class="flex items-center">
                                            <input id="perm-revenue" type="checkbox" name="permissions[]" value="revenue" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-revenue" class="ml-2 block text-sm text-gray-700 cursor-pointer">Revenue</label>
                                        </div>

                                        <!-- Options -->
                                        <div class="flex items-center">
                                            <input id="perm-options" type="checkbox" name="permissions[]" value="options" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-options" class="ml-2 block text-sm text-gray-700 cursor-pointer">Options</label>
                                        </div>

                                        <!-- Packages -->
                                        <div class="flex items-center">
                                            <input id="perm-packages" type="checkbox" name="permissions[]" value="packages" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-packages" class="ml-2 block text-sm text-gray-700 cursor-pointer">Packages</label>
                                        </div>

                                        <!-- Users -->
                                        <div class="flex items-center">
                                            <input id="perm-users" type="checkbox" name="permissions[]" value="users" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-users" class="ml-2 block text-sm text-gray-700 cursor-pointer">Users</label>
                                        </div>

                                        <!-- Roles -->
                                        <div class="flex items-center">
                                            <input id="perm-roles" type="checkbox" name="permissions[]" value="roles" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                                            <label for="perm-roles" class="ml-2 block text-sm text-gray-700 cursor-pointer">Roles</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit" class="w-full bg-gray-800 text-white font-medium py-2.5 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 shadow-sm transition-all duration-200 flex justify-center items-center">
                                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create Role
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Listings (Takes up 8 columns on large screens) -->
                <div class="lg:col-span-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Active Roles</h2>
                    </div>

                    <!-- Cards Grid -->
                    <div class="grid grid-cols-1 gap-6">

                        <!-- Card 1 (Super Admin - Read Only) -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col group relative overflow-hidden">
                            <div class="absolute top-0 right-0 bg-red-100 text-red-700 text-xs font-bold px-3 py-1 rounded-bl-lg">System</div>

                            <h3 class="text-lg font-bold text-gray-900 mb-4 pr-12">Super Admin</h3>

                            <div class="flex-1 mb-6">
                                <p class="text-sm text-gray-500 mb-3">Permissions:</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                                        Full Access (All Modules)
                                    </span>
                                </div>
                            </div>

                            <!-- Card Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-500 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    1 User Assigned
                                </span>
                                <!-- No edit/delete for System Super Admin -->
                                <span class="text-xs text-gray-400 italic">Cannot be modified</span>
                            </div>
                        </div>

                        <!-- Card 2 (Finance Manager) -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Finance Manager</h3>

                            <div class="flex-1 mb-6">
                                <p class="text-sm text-gray-500 mb-3">Permissions:</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Payments</span>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Sales</span>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Expenses</span>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Revenue</span>
                                </div>
                            </div>

                            <!-- Card Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-500 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    2 Users Assigned
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

                        <!-- Card 3 (Receptionist) -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Reception Desk</h3>

                            <div class="flex-1 mb-6">
                                <p class="text-sm text-gray-500 mb-3">Permissions:</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Customers</span>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Payments</span>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Packages</span>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Options</span>
                                </div>
                            </div>

                            <!-- Card Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-500 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    4 Users Assigned
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
