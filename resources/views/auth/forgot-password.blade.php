<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50 p-4">
        <div class="w-full max-w-6xl bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/20 overflow-hidden grid grid-cols-1 lg:grid-cols-2 transition-all duration-500">

            {{-- Bagian Kiri - Ilustrasi --}}
            <div class="hidden lg:flex flex-col items-center justify-center bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white p-12 relative overflow-hidden">
                {{-- Background Pattern --}}
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full"></div>
                    <div class="absolute bottom-10 right-10 w-16 h-16 bg-white rounded-full"></div>
                    <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-white rounded-full"></div>
                </div>
                
                {{-- Content --}}
                <div class="relative z-10 text-center">
                    <div class="w-32 h-32 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-8 backdrop-blur-sm">
                        <svg class="w-16 h-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">Reset Password</h1>
                    <p class="text-blue-100/90 text-lg font-light leading-relaxed max-w-md mx-auto">
                        Enter your email address and we'll send you a link to reset your password.
                    </p>
                </div>
            </div>

            {{-- Bagian Kanan - Form --}}
            <div class="p-8 lg:p-12 flex items-center justify-center">
                <div class="w-full max-w-md">
                    {{-- Header --}}
                    <div class="text-center lg:text-left mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Reset Password</h2>
                        <p class="text-gray-600 text-lg">Enter your email to receive reset instructions</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf

                        {{-- Email --}}
                        <div class="space-y-3">
                            <x-input-label for="email" :value="__('Email Address')" class="text-sm font-semibold text-gray-700" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400"
                                    placeholder="your@email.com" 
                                />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="text-red-600 text-sm bg-red-50 px-3 py-2 rounded-lg border border-red-200" />
                        </div>

                        {{-- Submit --}}
                        <x-primary-button
                            class="w-full py-4 bg-gradient-to-r from-blue-600 to-purple-700 hover:from-blue-700 hover:to-purple-800 text-white rounded-xl shadow-lg font-semibold transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            {{ __('Send Password Reset Link') }}
                        </x-primary-button>

                        {{-- Back to Login --}}
                        <div class="text-center text-sm text-gray-600 mt-8 pt-6 border-t border-gray-200">
                            Remember your password?
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-200 hover:underline ml-1">
                                Back to login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>