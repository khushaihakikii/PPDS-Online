<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Admin <span class="text-blue-600">Dashboard</span>
            </h2>
            <p class="text-slate-500 mt-1 text-sm font-medium">Monitoring dan kelola seluruh data pendaftaran siswa.</p>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-50 rounded-full blur-3xl opacity-40 -z-10"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-50 rounded-full blur-3xl opacity-40 -z-10"></div>

        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">

            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Total Card --}}
                <div class="bg-white/80 backdrop-blur-xl border border-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 flex items-center gap-5 group transition-all hover:scale-[1.02]">
                    <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200 transition-transform group-hover:rotate-6">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Total</p>
                        <h3 class="text-2xl font-black text-slate-900">{{ $stats['total'] }}</h3>
                    </div>
                </div>

                {{-- Pending Card --}}
                <div class="bg-white/80 backdrop-blur-xl border border-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 flex items-center gap-5 group transition-all hover:scale-[1.02]">
                    <div class="w-14 h-14 bg-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-200 transition-transform group-hover:rotate-6">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Menunggu</p>
                        <h3 class="text-2xl font-black text-slate-900">{{ $stats['pending'] }}</h3>
                    </div>
                </div>

                {{-- Approved Card --}}
                <div class="bg-white/80 backdrop-blur-xl border border-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 flex items-center gap-5 group transition-all hover:scale-[1.02]">
                    <div class="w-14 h-14 bg-emerald-500 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200 transition-transform group-hover:rotate-6">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Disetujui</p>
                        <h3 class="text-2xl font-black text-slate-900">{{ $stats['approved'] }}</h3>
                    </div>
                </div>

                {{-- Rejected Card --}}
                <div class="bg-white/80 backdrop-blur-xl border border-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 flex items-center gap-5 group transition-all hover:scale-[1.02]">
                    <div class="w-14 h-14 bg-rose-500 rounded-2xl flex items-center justify-center shadow-lg shadow-rose-200 transition-transform group-hover:rotate-6">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Ditolak</p>
                        <h3 class="text-2xl font-black text-slate-900">{{ $stats['rejected'] }}</h3>
                    </div>
                </div>
            </div>

            {{-- Search and Filter --}}
            <div class="bg-white/80 backdrop-blur-xl border border-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 p-8">
                <form method="GET" action="{{ route('admin.registrations.index') }}" class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    <div class="lg:col-span-2">
                        <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1 mb-2 block">Cari Pendaftaran</label>
                        <div class="relative group">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Nama pendaftar, email, atau siswa..."
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all font-semibold text-sm">
                            <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2 group-focus-within:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <div>
                        <label class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest ml-1 mb-2 block">Status</label>
                        <select name="status" class="w-full px-5 py-4 bg-slate-50 border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all font-semibold text-sm">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <div class="flex items-end gap-3">
                        <button type="submit" class="flex-1 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl shadow-lg shadow-blue-200 font-bold text-sm transition-all transform hover:-translate-y-1 active:scale-95">
                            Terapkan Filter
                        </button>
                        @if(request('search') || request('status'))
                            <a href="{{ route('admin.registrations.index') }}" class="px-5 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold text-sm hover:bg-slate-200 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Table Card --}}
            <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-2xl shadow-slate-200/50 overflow-hidden">
                <div class="p-8 border-b border-slate-50 bg-slate-50/30 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 tracking-tight">Daftar Pendaftaran</h3>
                        <p class="text-slate-500 text-sm font-medium">Data pendaftaran terbaru dari calon siswa.</p>
                    </div>
                </div>

                <div class="overflow-x-auto px-4 pb-4">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-5 text-left text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Pendaftar</th>
                                <th class="px-6 py-5 text-left text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Tipe</th>
                                <th class="px-6 py-5 text-left text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Nama Siswa</th>
                                <th class="px-6 py-5 text-left text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Status</th>
                                <th class="px-6 py-5 text-center text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($registrations as $registration)
                                <tr class="group hover:bg-slate-50/80 transition-all">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-500 text-xs">
                                                {{ substr($registration->user->name, 0, 2) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-slate-900">{{ $registration->user->name }}</div>
                                                <div class="text-xs font-medium text-slate-400">{{ $registration->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest 
                                            {{ $registration->registration_type === 'student' ? 'bg-blue-50 text-blue-600' : 'bg-indigo-50 text-indigo-600' }}">
                                            {{ $registration->registration_type_label }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-sm font-semibold text-slate-700">
                                        {{ $registration->student_name }}
                                        <div class="text-[10px] text-slate-400 font-medium">TA: {{ $registration->school_year }}</div>
                                    </td>
                                    <td class="px-6 py-5">
                                        {{-- Gunakan logika badge kustom atau dari model --}}
                                        <div class="inline-flex">
                                            {!! $registration->status_badge !!}
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="{{ route('admin.registrations.show', $registration) }}"
                                                class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Detail">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                            </a>

                                            @if($registration->status === 'pending')
                                                <form method="POST" action="{{ route('admin.registrations.approve', $registration) }}" class="inline">
                                                    @csrf
                                                    <button type="submit" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all" onclick="return confirm('Setujui pendaftaran ini?')" title="Setujui">
                                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                    </button>
                                                </form>

                                                <a href="{{ route('admin.registrations.reject-form', $registration) }}"
                                                    class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all" title="Tolak">
                                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($registrations->hasPages())
                    <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                        {{ $registrations->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>