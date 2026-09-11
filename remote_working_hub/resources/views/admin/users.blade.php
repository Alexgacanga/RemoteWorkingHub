<x-main-layout>
    <div class="min-h-screen bg-white w-full" style="font-size: 14px; font-family: 'Poppins', sans-serif;">
        <!-- Main Container -->
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 xl:py-10 2xl:py-12 flex flex-col gap-8">

            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h1 class="text-xl font-bold tracking-tight text-black sm:text-2xl">Users</h1>

                <a href="{{ route('users.create') }}">
                    <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#FF6245] px-6 py-3 text-sm font-semibold text-[#FFFFFF] shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-[#FF6245] focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Add New User
                    </button>
                </a>
            </div>

            <!-- Controls / Toolbar Section -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 bg-[#FFFFFF] p-4 rounded-2xl shadow-sm border border-gray-100">
                <!-- Search Bar -->
                <div class="relative w-full md:max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search users by name, email, or ID..."
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-[#FFFFFF] text-sm text-[#000000] placeholder-gray-400 transition-all duration-300 focus:border-[#4FC1FF] focus:outline-none focus:ring-4 focus:ring-[#4FC1FF]/20">
                </div>
            </div>

            <!-- Data Table Section -->
            <div class="bg-[#FFFFFF] rounded-2xl shadow-md border border-gray-100 overflow-hidden flex flex-col">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead class="bg-gray-50 text-left text-xs font-semibold uppercase tracking-[0.14em] text-gray-600">
                            <tr>
                                <th scope="col" class="whitespace-nowrap px-6 py-4">First Name</th>
                                <th scope="col" class="whitespace-nowrap px-6 py-4">Email</th>
                                <th scope="col" class="whitespace-nowrap px-6 py-4">Phone</th>
                                <th scope="col" class="whitespace-nowrap px-6 py-4">ID Number</th>
                                <th scope="col" class="whitespace-nowrap px-6 py-4">Role</th>
                                <th scope="col" class="whitespace-nowrap px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-[#FFFFFF]">
                            @foreach ($users as $user)
                            <!-- User Row 1 -->
                            <tr class="transition-all duration-300 hover:bg-gray-50 group">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[#000000]">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->phone_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->id_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-[#4FC1FF]/15 text-[#000000] text-xs font-bold tracking-wide uppercase">
                                        {{-- {{ $user->role->name }} --}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 md:opacity-100">
                                        <a href="">
                                            <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#4FC1FF]/10 text-[#4FC1FF] transition-all duration-300 hover:bg-[#4FC1FF] hover:text-[#FFFFFF]" title="Edit User">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="">
                                            <button class="inline-flex items-center justify-center p-2 rounded-lg bg-[#FF6245]/10 text-[#FF6245] transition-all duration-300 hover:bg-[#FF6245] hover:text-[#FFFFFF]" title="Delete User">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Pagination Section -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-6 border-t border-gray-100 bg-[#FFFFFF]">
                    <p class="text-sm text-gray-500 font-medium">Showing <span class="font-bold text-[#000000]">1</span> to <span class="font-bold text-[#000000]">4</span> of <span class="font-bold text-[#000000]">48</span> users</p>

                    <nav class="inline-flex items-center gap-2" aria-label="Pagination">
                        <button type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]">
                            Previous
                        </button>

                        <div class="hidden sm:flex items-center gap-1">
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-[#FF6245] text-sm font-bold text-[#FFFFFF] shadow-sm transition-all duration-300 focus:outline-none">
                                1
                            </button>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none">
                                2
                            </button>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none">
                                3
                            </button>
                            <span class="px-2 text-gray-400">...</span>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none">
                                12
                            </button>
                        </div>

                        <button type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-[#FFFFFF] px-3 py-2 text-sm font-medium text-gray-600 transition-all duration-300 hover:border-[#4FC1FF] hover:text-[#4FC1FF] focus:outline-none focus:ring-2 focus:ring-[#4FC1FF]">
                            Next
                        </button>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</x-main-layout>
