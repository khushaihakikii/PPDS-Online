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