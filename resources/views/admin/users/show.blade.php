<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <a href="{{ route('admin.users.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </a>
                        <span class="text-xs font-black text-blue-600 uppercase tracking-widest">Detail Profil Pengguna</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        {{ $user->name }}
                    </h2>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.users.edit', $user) }}" class="px-6 py-3 bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 rounded-2xl font-black text-xs uppercase tracking-widest transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        Edit User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-50/50 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">
            
            {{-- Main Info Card --}}
            <div class="bg-white border border-slate-100 rounded-[3rem] shadow-sm overflow-hidden">
                <div class="p-8 md:p-12">
                    <div class="flex flex-col md:flex-row items-center gap-8 mb-12">
                        <div class="w-24 h-24 rounded-[2rem] bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-3xl font-black shadow-xl shadow-blue-200">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div class="text-center md:text-left">
                            <div class="flex flex-col md:flex-row items-center gap-3">
                                <h3 class="text-2xl font-black text-slate-900">{{ $user->name }}</h3>
                                <span class="px-3 py-1 text-[10px] font-black uppercase tracking-widest rounded-lg {{ $user->role === 'admin' ? 'bg-rose-100 text-rose-600' : 'bg-emerald-100 text-emerald-600' }}">
                                    {{ $user->role === 'admin' ? 'Administrator' : 'User Biasa' }}
                                </span>
                            </div>
                            <p class="text-slate-400 font-bold mt-1">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        {{-- Account Details --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 border-b border-slate-50 pb-4">
                                <span class="w-2 h-6 bg-blue-600 rounded-full"></span>
                                <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Informasi Akun</h3>
                            </div>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-xs font-black text-slate-400 uppercase tracking-widest">ID Database</span>
                                    <span class="text-sm font-bold text-slate-700">#USR-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Tanggal Bergabung</span>
                                    <span class="text-sm font-bold text-slate-700">{{ $user->created_at->format('d F Y') }}</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Verifikasi Email</span>
                                    <span class="text-sm font-bold {{ $user->email_verified_at ? 'text-emerald-600' : 'text-rose-500' }}">
                                        {{ $user->email_verified_at ? 'Terverifikasi' : 'Belum Verifikasi' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Registration Stats --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 border-b border-slate-50 pb-4">
                                <span class="w-2 h-6 bg-indigo-600 rounded-full"></span>
                                <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Statistik Pendaftaran</h3>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-6 bg-blue-50 rounded-[2rem] text-center border border-blue-100">
                                    <p class="text-[10px] font-black text-blue-400 uppercase tracking-widest mb-1">Total</p>
                                    <p class="text-3xl font-black text-blue-600">{{ $user->studentRegistrations->count() }}</p>
                                </div>
                                <div class="p-6 bg-amber-50 rounded-[2rem] text-center border border-amber-100">
                                    <p class="text-[10px] font-black text-amber-400 uppercase tracking-widest mb-1">Pending</p>
                                    <p class="text-3xl font-black text-amber-600">{{ $user->studentRegistrations->where('status', 'pending')->count() }}</p>
                                </div>
                                <div class="p-6 bg-emerald-50 rounded-[2rem] text-center border border-emerald-100">
                                    <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest mb-1">Disetujui</p>
                                    <p class="text-3xl font-black text-emerald-600">{{ $user->studentRegistrations->where('status', 'approved')->count() }}</p>
                                </div>
                                <div class="p-6 bg-rose-50 rounded-[2rem] text-center border border-rose-100">
                                    <p class="text-[10px] font-black text-rose-400 uppercase tracking-widest mb-1">Ditolak</p>
                                    <p class="text-3xl font-black text-rose-600">{{ $user->studentRegistrations->where('status', 'rejected')->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Activity --}}
            <div class="bg-white border border-slate-100 rounded-[3rem] shadow-sm overflow-hidden">
                <div class="p-8 md:p-12">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-6 bg-slate-900 rounded-full"></span>
                            <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Pendaftaran Terbaru</h3>
                        </div>
                    </div>

                    @forelse($user->studentRegistrations->take(5) as $registration)
                        <div class="group flex flex-col md:flex-row items-center justify-between p-6 mb-4 bg-slate-50 hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 border border-transparent hover:border-slate-100 rounded-[2rem] transition-all">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-slate-400 group-hover:text-blue-600 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                </div>
                                <div>
                                    <h5 class="font-black text-slate-700">{{ $registration->student_name }}</h5>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-tight">{{ $registration->registration_type_label }} • {{ $registration->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 flex items-center gap-4">
                                {!! $registration->status_badge !!}
                                <a href="{{ route('admin.registrations.show', $registration) }}" class="p-2 text-slate-300 hover:text-blue-600 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-slate-50 rounded-[3rem] border border-dashed border-slate-200">
                            <svg class="w-16 h-16 text-slate-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            <h3 class="text-sm font-black text-slate-400 uppercase tracking-widest">Belum Ada Riwayat</h3>
                        </div>
                    @endforelse

                    @if($user->studentRegistrations->count() > 5)
                        <div class="mt-8 text-center">
                            <a href="{{ route('admin.registrations.index', ['search' => $user->email]) }}" class="inline-flex items-center gap-2 text-xs font-black text-blue-600 uppercase tracking-[0.2em] hover:gap-4 transition-all">
                                Lihat Semua Pendaftaran
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>