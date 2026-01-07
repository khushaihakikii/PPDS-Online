<x-guest-layout>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .blob {
            position: absolute; width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%; z-index: 0;
        }
    </style>

    <div class="min-h-screen flex items-center justify-center bg-[#fcfcfd] p-4 lg:p-8 relative overflow-hidden">
        <div class="blob top-[-10%] left-[-10%] animate-pulse"></div>
        <div class="blob bottom-[-10%] right-[-10%]"></div>

        <div class="w-full max-w-5xl bg-white/80 backdrop-blur-xl rounded-[2rem] md:rounded-[3rem] shadow-2xl shadow-blue-100 border border-slate-100 overflow-hidden grid grid-cols-1 lg:grid-cols-2 relative z-10">
            
            {{-- Bagian Kiri - Visual Branding (Gradient Sesuai Landing Page) --}}
            <div class="hidden lg:flex flex-col items-center justify-center bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-12 relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                
                <div class="relative z-10 text-center">
                    <div class="w-20 h-20 bg-white/10 border border-white/20 rounded-2xl flex items-center justify-center mx-auto mb-8 backdrop-blur-md">
                        <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    
                    <h1 class="text-3xl font-extrabold mb-4 tracking-tight">PPDS <span class="text-blue-200">Online</span></h1>
                    <p class="text-blue-100/80 text-lg leading-relaxed max-w-xs mx-auto">
                        Masuk untuk memantau status pendaftaran dan verifikasi dokumen Anda secara real-time.
                    </p>

                    <div class="mt-12 inline-flex items-center gap-2 px-4 py-2 bg-white/10 rounded-full border border-white/10 text-[11px] font-bold uppercase tracking-widest text-white">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-ping"></span>
                        Sistem Terverifikasi Aman
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan - Form Login --}}
            <div class="p-8 lg:p-16 bg-white flex items-center justify-center">
                <div class="w-full max-w-sm">
                    {{-- Header --}}
                    <div class="mb-10 text-center lg:text-left">
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Selamat Datang</h2>
                        <p class="text-slate-500 mt-2 font-medium">Silakan masuk ke akun Anda.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Email Address --}}
                        <div>
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-2 block ml-1">Alamat Email</label>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                class="block w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all duration-200 placeholder-slate-300 text-sm font-semibold text-slate-700"
                                placeholder="nama@email.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-bold text-red-500" />
                        </div>

                        {{-- Password --}}
                        <div>
                            <div class="flex justify-between items-center mb-2 ml-1">
                                <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest block">Kata Sandi</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-[11px] font-bold text-blue-600 hover:underline">Lupa?</a>
                                @endif
                            </div>
                            <input id="password" type="password" name="password" required
                                class="block w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all duration-200 placeholder-slate-300 text-sm font-semibold text-slate-700"
                                placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-bold text-red-500" />
                        </div>

                        {{-- Remember Me --}}
                        <div class="flex items-center ml-1">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                                <input id="remember_me" type="checkbox" class="rounded-md border-slate-200 text-blue-600 focus:ring-blue-500" name="remember">
                                <span class="ms-2 text-xs font-bold text-slate-500 uppercase tracking-wider">Ingat Saya</span>
                            </label>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                            class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl shadow-lg shadow-blue-200 font-bold text-sm transition-all duration-300 transform hover:-translate-y-1 active:scale-[0.98]">
                            Masuk Sekarang
                        </button>

                        {{-- Divider --}}
                        <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-slate-100"></div>
                            </div>
                            <div class="relative flex justify-center text-[10px] uppercase tracking-widest font-bold">
                                <span class="px-3 bg-white text-slate-400">Atau</span>
                            </div>
                        </div>

                        {{-- Register Link --}}
                        <div class="text-center mt-6">
                            <p class="text-sm text-slate-500 font-medium">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-bold ml-1">
                                    Daftar Gratis
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>