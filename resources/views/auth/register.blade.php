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

        <div class="w-full max-w-5xl bg-white/80 backdrop-blur-xl rounded-[2rem] md:rounded-[3rem] shadow-2xl shadow-blue-100 border border-slate-100 overflow-hidden grid grid-cols-1 lg:grid-cols-2 relative z-10 transition-all duration-500">

            {{-- Bagian Kiri - Visual Branding (Gradient Biru-Indigo) --}}
            <div class="hidden lg:flex flex-col items-center justify-center bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-12 relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                
                <div class="relative z-10 text-center">
                    <div class="w-20 h-20 bg-white/10 border border-white/20 rounded-2xl flex items-center justify-center mx-auto mb-8 backdrop-blur-md">
                        <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    
                    <h1 class="text-3xl font-extrabold mb-4 tracking-tight">PPDS <span class="text-blue-200">Online</span></h1>
                    <p class="text-blue-100/80 text-lg leading-relaxed max-w-xs mx-auto">
                        Bergabunglah dengan ribuan siswa lainnya dan mulai pendaftaran sekolah Anda dengan lebih mudah.
                    </p>

                    <div class="mt-12 flex items-center justify-center gap-4 py-3 px-6 bg-white/10 rounded-2xl border border-white/10 backdrop-blur-sm">
                        <div class="text-left leading-tight border-r border-white/10 pr-4">
                            <div class="text-xl font-bold uppercase">100%</div>
                            <div class="text-[9px] text-blue-200 uppercase font-bold tracking-widest">Paperless</div>
                        </div>
                        <div class="text-left leading-tight">
                            <div class="text-xl font-bold uppercase">Safe</div>
                            <div class="text-[9px] text-blue-200 uppercase font-bold tracking-widest">Protected</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan - Form Register --}}
            <div class="p-8 lg:p-14 bg-white flex items-center justify-center">
                <div class="w-full max-w-sm">
                    {{-- Header --}}
                    <div class="mb-10 text-center lg:text-left">
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Buat Akun</h2>
                        <p class="text-slate-500 mt-2 font-medium">Lengkapi data untuk mulai mendaftar.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-2 block ml-1">Nama Lengkap</label>
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus
                                class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all duration-200 placeholder-slate-300 text-sm font-semibold text-slate-700"
                                placeholder="Masukkan nama lengkap" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs font-bold text-red-500" />
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-2 block ml-1">Alamat Email</label>
                            <input id="email" type="email" name="email" :value="old('email')" required
                                class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all duration-200 placeholder-slate-300 text-sm font-semibold text-slate-700"
                                placeholder="nama@email.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-bold text-red-500" />
                        </div>

                        {{-- Password --}}
                        <div>
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-2 block ml-1">Kata Sandi</label>
                            <input id="password" type="password" name="password" required
                                class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all duration-200 placeholder-slate-300 text-sm font-semibold text-slate-700"
                                placeholder="Minimal 8 karakter" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-bold text-red-500" />
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-2 block ml-1">Konfirmasi Sandi</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all duration-200 placeholder-slate-300 text-sm font-semibold text-slate-700"
                                placeholder="Ulangi kata sandi" />
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                            class="w-full mt-4 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl shadow-lg shadow-blue-200 font-bold text-sm transition-all duration-300 transform hover:-translate-y-1 active:scale-[0.98]">
                            Daftar Sekarang
                        </button>

                        {{-- Google Login Button --}}
                        <a href="{{ route('google.login') }}"
                            class="w-full py-4 mt-4 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 rounded-2xl shadow-sm font-bold text-sm transition-all duration-300 flex items-center justify-center gap-3 transform hover:-translate-y-1 active:scale-[0.98]">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Daftar dengan Google
                        </a>

                        {{-- Sign In Link --}}
                        <div class="text-center mt-8">
                            <p class="text-sm text-slate-500 font-medium">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-bold ml-1">
                                    Masuk di sini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>