<x-main-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">

        <!-- Form Container (The Card) -->
        <div class="w-full max-w-3xl bg-[#FFFFFF] rounded-2xl shadow-lg p-6 sm:p-8 relative">

            <!-- Back Button -->
            <!-- Ensure you replace the route with your actual users listing route -->
            <a href="{{ route('users.index') }}"
                class="inline-flex items-center text-sm font-medium text-[#000000] hover:text-[#4FC1FF] transition-colors duration-300 mb-8 group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back
            </a>

            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#000000] mb-2 tracking-tight leading-tight">
                    Add new user
                </h2>
                <p class="text-sm text-gray-500">Fill in the details below to provision a new user account.</p>
            </div>

            <!-- Global Error Alert (Crucial for Form Validation) -->
            @if ($errors->any())
                <div class="mb-8 p-4 rounded-xl bg-red-50 border border-red-100 flex items-start gap-3 transition-all duration-300 shadow-sm">
                    <svg class="h-5 w-5 text-red-500 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800">Cannot create user</h3>
                        <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Form Fields Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Full Name (1 Column Desktop) -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#000000] mb-2">
                            Full Name
                        </label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                            placeholder="e.g. Jane Doe">
                    </div>

                    <!-- Email Address (1 Column Desktop) -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#000000] mb-2">
                            Email Address
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                            placeholder="jane@example.com">
                    </div>

                    <!-- National ID Number (1 Column Desktop) -->
                    <div>
                        <label for="national_id" class="block text-sm font-semibold text-[#000000] mb-2">
                            National ID Number
                        </label>
                        <input type="text" id="national_id" name="id_no" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                            placeholder="e.g. 12345678">
                    </div>

                    <!-- Phone Number (1 Column Desktop) -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-[#000000] mb-2">
                            Phone Number
                        </label>
                        <input type="tel" id="phone" name="phone_no" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                            placeholder="+254...">
                    </div>

                    <!-- Assign Role (Spans 2 Columns on Desktop) -->
                    <div class="md:col-span-2">
                        <label for="role" class="block text-sm font-semibold text-[#000000] mb-2">
                            Assign Role
                        </label>
                        <div class="relative">
                            <select id="role" name="role" required
                                class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 appearance-none cursor-pointer shadow-sm">
                                <option value="" disabled selected>Select a role...</option>
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                                <option value="staff">Staff</option>
                            </select>

                            <!-- Custom Dropdown Arrow -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500">
                                <svg class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password (1 Column Desktop) -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-[#000000] mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                            placeholder="••••••••">
                    </div>

                    <!-- Verify Password (1 Column Desktop) -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-[#000000] mb-2">
                            Verify Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                            placeholder="••••••••">
                    </div>

                </div>

                <!-- Submit Area (Footer) -->
                <div class="pt-6 mt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-end gap-4">

                    <!-- Cancel Button -->
                    <a href="{{ route('users.index') }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-sm font-semibold text-[#000000] rounded-lg bg-[#FFFFFF] hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors duration-300 shadow-sm">
                        Cancel
                    </a>

                    <!-- Primary Submit Button -->
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3 bg-[#FF6245] text-sm font-semibold text-[#FFFFFF] rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                        Create User
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>

                </div>
            </form>

        </div>
    </div>
</x-main-layout>
