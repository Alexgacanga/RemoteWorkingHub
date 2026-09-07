<x-main-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">

        <!-- Form Container (The Card) -->
        <div class="w-full max-w-4xl bg-[#FFFFFF] rounded-2xl shadow-lg p-6 sm:p-8 lg:p-10 relative">

            <!-- Back Button -->
            <!-- Ensure you replace the route with your actual roles listing route -->
            <a href="{{ route('roles.index') }}"
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
                    Add new role
                </h2>
                <p class="text-sm text-gray-500">Define role details and configure system permissions.</p>
            </div>

            <!-- Global Error Alert (Crucial for Form Validation) -->
            @if ($errors->any())
                <div class="mb-8 p-4 rounded-xl bg-red-50 border border-red-100 flex items-start gap-3 transition-all duration-300 shadow-sm">
                    <svg class="h-5 w-5 text-red-500 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800">Cannot create role</h3>
                        <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <!-- Basic Role Details -->
                <div class="space-y-6">

                    <!-- Role Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#000000] mb-2">
                            Role Name
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm"
                            placeholder="e.g. Finance Manager">
                    </div>

                    <!-- Role Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-[#000000] mb-2">
                            Role Description
                        </label>
                        <textarea id="description" name="description" rows="3" required
                            class="w-full px-4 py-3 bg-[#FFFFFF] border border-gray-300 rounded-lg text-[#000000] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4FC1FF] focus:border-transparent transition-all duration-300 shadow-sm resize-none"
                            placeholder="Briefly describe the responsibilities of this role..."></textarea>
                    </div>

                </div>

                <!-- Permissions Matrix Section -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-[#000000]">Assign Permissions</h3>
                            <p class="text-sm text-gray-500 mt-1">Select the specific modules and actions this role can access.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach($permissions as $category => $group)
        <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 hover:shadow-md transition-shadow duration-300">

            <h4 class="text-sm font-bold text-[#000000] mb-4 pb-2 border-b border-gray-200">
                {{ $category }}
            </h4>

            <div class="space-y-3">

                @foreach($group as $permission)
                    <label
                        for="permission_{{ $permission->id }}"
                        class="flex items-center gap-3 cursor-pointer group">

                        <input
                            type="checkbox"
                            id="permission_{{ $permission->id }}"
                            name="permissions[]"
                            value="{{ $permission->id }}"
                            {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-gray-300 text-[#FF6245] focus:ring-2 focus:ring-[#4FC1FF] focus:ring-offset-1 accent-[#FF6245]">

                        <span class="text-sm font-medium text-gray-700 group-hover:text-[#000000]">
                            {{ $permission->name }}
                        </span>

                    </label>
                @endforeach

            </div>

        </div>
    @endforeach

</div>
                    </div>

                <!-- Submit Area (Footer) -->
                <div class="pt-6 mt-10 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-end gap-4">

                    <!-- Cancel Button -->
                    <a href="{{ route('roles.index') }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-sm font-semibold text-[#000000] rounded-lg bg-[#FFFFFF] hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors duration-300 shadow-sm">
                        Cancel
                    </a>

                    <!-- Primary Submit Button -->
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3 bg-[#FF6245] text-sm font-semibold text-[#FFFFFF] rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                        Create Role
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>

                </div>
            </form>

        </div>
    </div>
</x-main-layout>
