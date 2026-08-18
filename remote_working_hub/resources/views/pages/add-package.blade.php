<x-main-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">

        <!-- Form Container (The Card) -->
        <div class="w-full max-w-3xl bg-[#FFFFFF] rounded-2xl shadow-lg p-6 sm:p-8 md:p-10 relative">

            <!-- Back Button -->
            <a href="{{ route('packages.index') }}"
                class="inline-flex items-center text-sm font-medium text-[#000000] hover:text-[#4FC1FF] transition-colors duration-300 mb-8 group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Packages
            </a>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#000000] mb-2 tracking-tight">Add New Package</h2>
                <p class="text-sm text-gray-500">Configure the billing details and space options for this package.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('packages.store') }}" method="POST">
                @csrf

                <!-- Form Fields Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Package Name (Full Width) -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-semibold text-[#000000] mb-2">Package Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-xl text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                            placeholder="e.g. Monthly Dedicated Desk Standard">
                    </div>

                    <!-- Description (Full Width) -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-[#000000] mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-xl text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 resize-y"
                            placeholder="Brief description of the package benefits..."></textarea>
                    </div>

                    <!-- Price (1 Column) -->
                    <div>
                        <label for="price" class="block text-sm font-semibold text-[#000000] mb-2">Price</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            </div>
                            <input type="number" id="price" name="price" step="0.01" min="0" required
                                class="w-full pl-8 pr-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-xl text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300"
                                placeholder="Ksh. 0.00">
                        </div>
                    </div>

                    <!-- Space Option (1 Column) -->
                    <div>
                        <label for="option_id" class="block text-sm font-semibold text-[#000000] mb-2">Space Option</label>
                        <div class="relative">
                            <select id="option_id" name="option_id" required
                                class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-xl text-[#000000] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 appearance-none">
                                <option value="" disabled selected>Select associated space</option>
                                @foreach ($options as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                @endforeach

                            </select>
                            <!-- Custom Dropdown Arrow -->
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Time Options (Full Width) -->
                    <div class="md:col-span-2">
                        <label for="time_options" class="block text-sm font-semibold text-[#000000] mb-2">Time Option</label>
                        <div class="relative">
                            <select id="time_options" name="time_options" required
                                class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-xl text-[#000000] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 appearance-none">
                                <option value="" disabled selected>Select Time Option</option>
                                <option value="day">Day</option>
                                <option value="week">Week</option>
                                <option value="month">Month</option>
                            </select>
                            <!-- Custom Dropdown Arrow -->
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Custom UI Toggle Switch (Status - Full Width) -->
                    <div class="md:col-span-2 flex items-center justify-between bg-gray-50 p-5 rounded-xl border border-gray-200 mt-2">
                        <div>
                            <label for="statusToggle" class="text-sm font-semibold text-[#000000] cursor-pointer">Status (Active/Inactive)</label>
                            <p class="text-xs text-gray-500 mt-1">Make this package available for immediate booking.</p>
                        </div>

                        <!-- Fallback so unchecked state submits a '0' -->
                        <input type="hidden" name="is_active" value="0">

                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="statusToggle" name="is_active" value="1" class="sr-only peer" checked>

                            <!-- Switch Track & Thumb -->
                            <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-[#4FC1FF]/50 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-[#FFFFFF] after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all duration-300 peer-checked:bg-[#FF6245]"></div>
                        </label>
                    </div>

                </div>

                <!-- Submit Area (Footer) -->
                <div class="pt-6 mt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-end gap-4">
                    <!-- Cancel Button -->
                    <a href="{{ route('packages.index') }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-sm font-semibold text-[#000000] rounded-xl bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors duration-300">
                        Cancel
                    </a>

                    <!-- Primary Submit Button -->
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3 bg-[#FF6245] text-sm font-semibold text-[#FFFFFF] rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                        Save Package
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-main-layout>