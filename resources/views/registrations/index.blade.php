<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                        Status <span class="text-blue-600">Pendaftaran</span>
                    </h2>
                    <p class="text-slate-500 mt-1 font-medium">Pantau riwayat dan perkembangan proses seleksi Anda secara real-time.</p>
                </div>
                <a href="{{ route('registrations.create') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white font-black rounded-2xl shadow-xl shadow-blue-200 hover:scale-105 transition-all">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Buat Pendaftaran Baru
                </a>
            </div>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen">
        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Statistik Ringkas (Pindah ke Atas agar User langsung melihat summary) --}}
            @if($registrations->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        $stats = [
                            ['label' => 'Menunggu', 'count' => $registrations->where('status', 'pending')->count(), 'color' => 'amber', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                            ['label' => 'Disetujui', 'count' => $registrations->where('status', 'approved')->count(), 'color' => 'emerald', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                            ['label' => 'Ditolak', 'count' => $registrations->where('status', 'rejected')->count(), 'color' => 'rose', 'icon' => 'M6 18L18 6M6 6l12 12'],
                        ];
                    @endphp

                    @foreach($stats as $stat)
                    <div class="bg-white border border-slate-100 p-6 rounded-[2rem] shadow-sm flex items-center gap-5">
                        <div class="w-14 h-14 bg-{{ $stat['color'] }}-50 rounded-2xl flex items-center justify-center text-{{ $stat['color'] }}-600">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-1">{{ $stat['label'] }}</p>
                            <h4 class="text-2xl font-black text-slate-900 leading-none">{{ $stat['count'] }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            {{-- Daftar Pendaftaran (Tabel) --}}
            @if($registrations->count() > 0)
                <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden text-slate-700">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50 border-b border-slate-100">
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Tipe / Siswa</th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-center">Tahun Ajaran</th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-center">Status</th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-center">Tanggal</th>
                                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($registrations as $registration)
                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center gap-4">
                                                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-black text-xs {{ $registration->registration_type === 'student' ? 'bg-blue-50 text-blue-600' : 'bg-purple-50 text-purple-600' }}">
                                                    {{ $registration->registration_type === 'student' ? 'S' : 'W' }}
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900 leading-none mb-1">{{ $registration->student_name }}</p>
                                                    <p class="text-xs text-slate-400 font-medium lowercase tracking-tight">{{ $registration->registration_type_label }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 text-center font-bold text-slate-600 text-sm">
                                            {{ $registration->school_year }}
                                        </td>
                                        <td class="px-8 py-6 text-center">
                                            {{-- Custom Status Badge agar senada --}}
                                            @php
                                                $statusColor = [
                                                    'pending' => 'amber',
                                                    'approved' => 'emerald',
                                                    'rejected' => 'rose'
                                                ][$registration->status] ?? 'slate';
                                            @endphp
                                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-{{ $statusColor }}-50 text-{{ $statusColor }}-600 border border-{{ $statusColor }}-100">
                                                {{ $registration->status }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-center text-sm font-medium text-slate-400">
                                            {{ $registration->created_at->format('d M Y') }}
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <a href="{{ route('registrations.show', $registration) }}"
                                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-600 font-black rounded-xl text-xs hover:bg-blue-600 hover:text-white transition-all">
                                                Detail
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                {{-- Empty State --}}
                <div class="bg-white border border-dashed border-slate-200 rounded-[3rem] p-20 text-center shadow-sm">
                    <div class="w-24 h-24 bg-slate-50 rounded-[2rem] flex items-center justify-center mx-auto mb-6">
                        <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-2">Belum Ada Riwayat</h3>
                    <p class="text-slate-500 max-w-sm mx-auto font-medium mb-10">Anda belum mengajukan pendaftaran apapun. Data pendaftaran Anda akan muncul di sini setelah dibuat.</p>
                    <a href="{{ route('registrations.create') }}"
                        class="inline-flex items-center px-10 py-4 bg-blue-600 text-white font-black rounded-2xl shadow-xl shadow-blue-200 hover:scale-105 transition-all">
                        Buat Pendaftaran Pertama
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>