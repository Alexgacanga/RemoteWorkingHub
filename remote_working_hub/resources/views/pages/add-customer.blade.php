<x-main-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">

        <!-- Form Container (The Card) -->
        <div class="w-full max-w-3xl bg-[#FFFFFF] rounded-2xl shadow-lg p-6 sm:p-8 md:p-10 relative">

            <!-- Back Button -->
            <a href="{{ route('customers.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-[#4FC1FF] transition-colors duration-300 mb-8 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Customers
            </a>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#000000] mb-2 tracking-tight">Add New Customer</h2>
                <p class="text-sm text-gray-500">Enter the customer's details below to register them in the system.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <!-- Form Fields Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-semibold text-[#000000] mb-2">First Name</label>
                        <input type="text" id="first_name" name="fname" required
                            class="w-full px-4 py-2.5 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                            placeholder="e.g. Jane">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-semibold text-[#000000] mb-2">Last Name</label>
                        <input type="text" id="last_name" name="lname" required
                            class="w-full px-4 py-2.5 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                            placeholder="e.g. Doe">
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#000000] mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2.5 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                            placeholder="jane.doe@example.com">
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-[#000000] mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone_no" required
                            class="w-full px-4 py-2.5 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                            placeholder="+254 700 000 000">
                    </div>

                    <!-- ID Number (Full Width) -->
                    <div class="md:col-span-2">
                        <label for="id_number" class="block text-sm font-semibold text-[#000000] mb-2">ID Number</label>
                        <input type="text" id="id_number" name="id_no" required
                            class="w-full px-4 py-2.5 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                            placeholder="e.g. 12345678">
                    </div>

                </div>

                <!-- Submit Area (Footer) -->
                <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-end gap-4">
                    <!-- Optional Cancel Button for better UX -->
                    <a href="{{ route('customers.index') }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-sm font-semibold text-[#000000] rounded-xl bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors duration-300">
                        Cancel
                    </a>

                    <!-- Primary Submit Button -->
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3 bg-[#FF6245] text-sm font-semibold text-[#FFFFFF] rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF6245]">
                        Save Customer
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-main-layout>
