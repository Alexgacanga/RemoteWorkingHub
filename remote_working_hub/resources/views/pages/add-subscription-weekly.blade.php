<x-main-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">

        <!-- Form Container (The Card) -->
        <div class="w-full max-w-lg bg-[#FFFFFF] rounded-2xl shadow-lg p-6 sm:p-8 relative">

            <!-- Back Button -->
            <a href="{{ route('customers.index') }}"
                class="inline-flex items-center text-sm font-medium text-[#000000] hover:text-[#4FC1FF] transition-colors duration-300 mb-8 group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to customers
            </a>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#000000] mb-2 tracking-tight leading-tight">
                    Create weekly subscription for <span class="text-[#FF6245]">{{ $customer->fname }}</span>
                </h2>
                <p class="text-sm text-gray-500">Configure the package details.</p>
            </div>
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 flex items-start gap-3 transition-all duration-300">
                    <svg class="h-5 w-5 text-red-500 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800">Cannot create subscription</h3>
                        <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <!-- Form -->
            <form action="{{ route('weekly-subscriptions.store', $customer->id) }}" method="POST">
                @csrf

                <div class="space-y-6">

<!-- Start Date Input (Added Here) -->
                    <div>
                        <label for="start_date" class="block text-sm font-semibold text-[#000000] mb-2">
                            Start Date
                        </label>
                        <input type="date" id="start_date" name="start_date" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm">
                    </div>
                    
                    <!-- Package Selection Dropdown -->
                    <div>
                        <label for="package_id" class="block text-sm font-semibold text-[#000000] mb-2">
                            Select Package
                        </label>
                        <div class="relative">
                            <select id="package_id" name="package_id" required
                                class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 appearance-none cursor-pointer shadow-sm">
                                <option value="" disabled selected>Choose a package...</option>
                                @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }} - Ksh. {{ number_format($package->price, 2) }}/week</option>
                                @endforeach
                            </select>

                            <!-- Custom Dropdown Arrow -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500">
                                <svg class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Submit Area (Footer) -->
                <div class="pt-6 mt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-end gap-4">

                    <!-- Cancel Button (Optional but recommended UX) -->
                    <a href="{{ url()->previous() }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-sm font-semibold text-[#000000] rounded-lg bg-[#FFFFFF] hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors duration-300 shadow-sm">
                        Cancel
                    </a>

                    <!-- Primary Submit Button -->
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3 bg-[#FF6245] text-sm font-semibold text-[#FFFFFF] rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                        Create subscription
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>

                </div>
            </form>

        </div>
    </div>
</x-main-layout>
