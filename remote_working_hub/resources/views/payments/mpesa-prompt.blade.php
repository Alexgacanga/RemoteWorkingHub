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
                        <h1 class="text-xl font-bold text-gray-900">Prompt M-Pesa Payment</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 bg-green-50">
                    <h2 class="text-lg font-semibold text-green-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Initiate STK Push
                    </h2>
                    <p class="text-sm text-green-700 mt-1">This will trigger an M-Pesa pin prompt directly on the customer's phone.</p>
                </div>

                <form action="#" method="POST" class="p-6 space-y-6">

                    <!-- Customer Select -->
                    <div>
                        <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-1">Customer</label>
                        <select id="customer_id" name="customer_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none shadow-sm bg-white">
                            <option value="" disabled selected>Search and select customer...</option>
                            <option value="1">John Doe</option>
                        </select>
                    </div>

                    <!-- M-Pesa Phone Number -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">M-Pesa Phone Number</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-4 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                +254
                            </span>
                            <input type="text" id="phone" name="phone" placeholder="712345678" required
                                class="flex-1 min-w-0 block w-full px-4 py-2 border border-gray-300 rounded-none rounded-r-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none shadow-sm">
                        </div>
                    </div>

                    <!-- Package Select -->
                    <div>
                        <label for="package_id" class="block text-sm font-medium text-gray-700 mb-1">Package to Bill</label>
                        <select id="package_id" name="package_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none shadow-sm bg-white">
                            <option value="" disabled selected>Select package...</option>
                            <option value="1">Daily Open Desk (KES 1,500)</option>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount to Request</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">KES</span>
                            </div>
                            <input type="number" id="amount" name="amount" placeholder="1500" required
                                class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none shadow-sm bg-gray-50 cursor-not-allowed" readonly>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Amount is locked based on the selected package.</p>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="bg-green-600 text-white font-medium py-2.5 px-6 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 shadow-sm transition-all flex items-center">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Send M-Pesa Prompt
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</x-main-layout>
