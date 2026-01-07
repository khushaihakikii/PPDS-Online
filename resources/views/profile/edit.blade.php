<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Pengaturan <span class="text-blue-600">Profil</span>
            </h2>
            <p class="text-slate-500 mt-1 text-sm font-medium">Kelola informasi akun dan keamanan kata sandi Anda.</p>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-50 rounded-full blur-3xl opacity-40 -z-10"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-50 rounded-full blur-3xl opacity-40 -z-10"></div>

        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">
            
            {{-- Update Information --}}
            <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden transition-all hover:shadow-slate-200/60">
                <div class="p-8 md:p-12">
                    <div class="max-w-2xl">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">Informasi Profil</h3>
                                <p class="text-sm text-slate-500 font-medium">Perbarui nama pendaftaran dan alamat email akun Anda.</p>
                            </div>
                        </div>
                        
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            {{-- Update Password --}}
            <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden transition-all hover:shadow-slate-200/60">
                <div class="p-8 md:p-12">
                    <div class="max-w-2xl">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">Keamanan Akun</h3>
                                <p class="text-sm text-slate-500 font-medium">Gunakan kata sandi yang panjang dan acak agar akun tetap aman.</p>
                            </div>
                        </div>

                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="bg-rose-50/50 border border-rose-100 rounded-[2.5rem] shadow-xl shadow-rose-200/20 overflow-hidden">
                <div class="p-8 md:p-12">
                    <div class="max-w-2xl">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 bg-rose-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-rose-900 tracking-tight">Hapus Akun</h3>
                                <p class="text-sm text-rose-600/80 font-medium">Setelah akun dihapus, semua data akan hilang secara permanen.</p>
                            </div>
                        </div>

                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>