<x-main-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">

        <!-- Form Container (The Card) -->
        <div class="w-full max-w-md bg-[#FFFFFF] rounded-2xl shadow-lg p-6 sm:p-8 relative">

            <!-- Back Button -->
            <!-- Ensure you replace the route with your actual customer profile or previous route -->
            <a href="{{ route('invoices.index') }}"
                class="inline-flex items-center text-sm font-medium text-[#000000] hover:text-[#4FC1FF] transition-colors duration-300 mb-8 group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to invoices
            </a>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#000000] mb-2 tracking-tight leading-tight">
                    Add cash for <span class="text-[#4FC1FF]">{{ $invoice->subscription->customer->fname }} {{ $invoice->subscription->customer->lname }}</span>
                </h2>
                <p class="text-sm text-gray-500">Enter the amount of cash received from the customer.</p>
            </div>

            <!-- Global Error Alert (Optional but recommended for form validation) -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 flex items-start gap-3 transition-all duration-300">
                    <svg class="h-5 w-5 text-red-500 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800">Action Failed</h3>
                        <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('cash-payments.store', $invoice->id ) }}" method="POST">
                @csrf

                <div class="space-y-6">

                    <!-- Premium Amount Input Field -->
                    <div>
                        <label for="amount" class="block text-sm font-semibold text-[#000000] mb-3">
                            Payment Amount
                        </label>
                        <div class="relative">
                            <!-- Currency Symbol -->
                            <div class="pointer-events-none absolute inset-y-0 left-0 pl-5 flex items-center">
                                <span class="text-[#4FC1FF] font-bold text-xl sm:text-2xl">Ksh.</span>
                            </div>
                            
                            <!-- Input Field -->
                            <input type="number" id="amount" name="amount" step="0.01" min="0" required
                                class="w-full pl-20 pr-5 py-4 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] text-2xl sm:text-3xl font-bold placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                                placeholder="0.00">
                        </div>
                        <p class="text-xs text-gray-400 mt-2 flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Ensure you have physically received this cash before confirming.
                        </p>
                    </div>

                </div>

                <!-- Submit Area (Footer) -->
                <div class="pt-6 mt-8 border-t border-gray-200">
                    <!-- Primary Submit Button (Full Width) -->
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-8 py-4 bg-[#FF6245] text-base font-semibold text-[#FFFFFF] rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                        Confirm Payment
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                
            </form>
            
        </div>
    </div>
</x-main-layout>