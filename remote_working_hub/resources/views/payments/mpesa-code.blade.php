<x-main-layout>
    <div class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex flex-col w-full">

        <!-- Top Navigation / Header -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('payments.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </a>
                        <h1 class="text-xl font-bold text-gray-900">Link Missing Transaction</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 bg-gray-800 text-white">
                    <h2 class="text-lg font-semibold flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Verify M-Pesa Transaction ID
                    </h2>
                    <p class="text-sm text-gray-300 mt-1">Use this if a customer paid but the system did not automatically update.</p>
                </div>

                <form action="#" method="POST" class="p-6 space-y-6">

                    <!-- TXN Code -->
                    <div>
                        <label for="txn_code" class="block text-sm font-medium text-gray-700 mb-1">M-Pesa Transaction Code</label>
                        <input type="text" id="txn_code" name="txn_code" placeholder="e.g., QWE1234567" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none shadow-sm uppercase font-mono tracking-wide placeholder-gray-400">
                    </div>

                    <!-- Customer Select -->
                    <div>
                        <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-1">Assign to Customer</label>
                        <select id="customer_id" name="customer_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none shadow-sm bg-white">
                            <option value="" disabled selected>Search and select customer...</option>
                            <option value="1">John Doe</option>
                        </select>
                    </div>

                    <!-- Package Select -->
                    <div>
                        <label for="package_id" class="block text-sm font-medium text-gray-700 mb-1">Package Paid For</label>
                        <select id="package_id" name="package_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none shadow-sm bg-white">
                            <option value="" disabled selected>Select package...</option>
                            <option value="1">Daily Open Desk</option>
                            <option value="2">Weekly Board Room</option>
                        </select>
                    </div>

                    <!-- Alert / Info Box -->
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">
                                    Clicking verify will ping the Daraja API to validate this code. If valid, the customer's subscription will be activated automatically.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="bg-gray-800 text-white font-medium py-2.5 px-6 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 shadow-sm transition-all flex items-center">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Verify & Link Transaction
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</x-main-layout>
