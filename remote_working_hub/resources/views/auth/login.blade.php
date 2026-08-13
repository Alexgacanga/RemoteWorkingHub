<x-guest-layout>
    <div class="min-h-screen w-full flex bg-[#FFFFFF]" style="font-family: 'Poppins', sans-serif;">
        
        <!-- Left Side: Branding & Visuals (Desktop Only) -->
        <div class="hidden md:flex md:w-1/2 lg:w-[55%] bg-[#000000] relative overflow-hidden flex-col justify-center items-center p-12">
            <!-- Decorative Glowing Blobs -->
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#FF6245] rounded-full mix-blend-screen filter blur-[100px] opacity-40 animate-pulse"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#4FC1FF] rounded-full mix-blend-screen filter blur-[100px] opacity-30"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-tr from-[#FF6245]/10 to-[#4FC1FF]/10 rounded-full filter blur-[80px]"></div>

            <!-- Brand Logo/Name -->
            <div class="absolute top-8 left-10 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FF6245] to-[#4FC1FF] flex items-center justify-center shadow-lg">
                    <span class="text-[#FFFFFF] font-bold text-xl">R</span>
                </div>
                <span class="font-bold text-xl tracking-tight text-[#FFFFFF]">Remote Working Hub</span>
            </div>

            <!-- Welcome Copy -->
            <div class="relative z-10 text-center max-w-lg mt-10">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-[#FFFFFF] leading-tight mb-6 tracking-tight">
                    Welcome back to your <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF6245] to-[#4FC1FF]">workspace.</span>
                </h2>
                <p class="text-gray-400 text-lg leading-relaxed">
                    Manage your spaces, track subscriptions, and experience seamless remote working all in one place.
                </p>
            </div>
            
            <!-- Abstract UI Mockup Element (Optional enhancement) -->
            <div class="absolute -bottom-20 left-1/2 transform -translate-x-1/2 w-[80%] h-64 border border-white/10 bg-white/5 backdrop-blur-md rounded-t-3xl shadow-2xl p-6">
                <div class="flex gap-3 mb-4">
                    <div class="w-3 h-3 rounded-full bg-[#FF6245]"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                    <div class="w-3 h-3 rounded-full bg-[#4FC1FF]"></div>
                </div>
                <div class="space-y-4">
                    <div class="w-3/4 h-4 bg-white/10 rounded-full"></div>
                    <div class="w-1/2 h-4 bg-white/10 rounded-full"></div>
                    <div class="w-5/6 h-4 bg-white/10 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Right Side: The Login Form -->
        <div class="w-full md:w-1/2 lg:w-[45%] flex items-center justify-center px-6 py-12 sm:px-12 lg:px-16 bg-[#FFFFFF]">
            <div class="w-full max-w-md">
                
                <!-- Mobile Brand Header (Visible only on small screens) -->
                <div class="flex md:hidden items-center gap-3 mb-10">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#FF6245] to-[#4FC1FF] flex items-center justify-center shadow-md">
                        <span class="text-[#FFFFFF] font-bold text-base">R</span>
                    </div>
                    <span class="font-bold text-lg tracking-tight text-[#000000]">Remote Working Hub</span>
                </div>

                <!-- Form Header -->
                <div class="mb-10">
                    <h1 class="text-3xl sm:text-4xl font-bold text-[#000000] mb-3 tracking-tight">Log In</h1>
                    <p class="text-gray-500 text-base">Please enter your details to access your account.</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#000000] mb-2">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-[#FFFFFF] text-[#000000] placeholder-gray-400 focus:outline-none focus:border-[#4FC1FF] focus:ring-4 focus:ring-[#4FC1FF]/20 transition-all duration-300"
                            placeholder="Enter your email" />
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-[#000000] mb-2">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-[#FFFFFF] text-[#000000] placeholder-gray-400 focus:outline-none focus:border-[#4FC1FF] focus:ring-4 focus:ring-[#4FC1FF]/20 transition-all duration-300"
                            placeholder="••••••••" />
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Controls (Remember Me & Forgot Password) -->
                    <div class="flex items-center justify-between mt-6">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" name="remember" 
                                class="w-4 h-4 rounded border-gray-300 text-[#4FC1FF] focus:ring-[#4FC1FF] transition duration-200 cursor-pointer accent-[#4FC1FF]">
                            <span class="ml-2 text-sm font-medium text-gray-600 group-hover:text-[#000000] transition-colors">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-semibold text-[#4FC1FF] hover:text-[#2da5e8] hover:underline underline-offset-4 transition-all duration-300">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full flex items-center justify-center px-8 py-3.5 text-base font-bold text-[#FFFFFF] bg-[#FF6245] rounded-lg shadow-md hover:bg-[#e85338] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#FF6245]/30">
                            Log In
                        </button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="mt-10 text-center">
                    <p class="text-sm text-gray-500 font-medium">
                        Don't have an account? 
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-[#FF6245] font-bold hover:text-[#e85338] hover:underline underline-offset-4 transition-all duration-300">
                                Register
                            </a>
                        @endif
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>