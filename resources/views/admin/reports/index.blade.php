<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        Laporan & <span class="text-blue-600">Statistik</span>
                    </h2>
                    <p class="text-slate-500 mt-1 text-sm font-medium">Analisis data pendaftaran dan performa sistem
                        secara real-time.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.reports.export') }}"
                        class="px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-emerald-200 flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Export Excel (.xlsx)
                    </a>
                    <a href="{{ route('admin.reports.export-pdf') }}"
                        class="px-8 py-4 bg-rose-600 hover:bg-rose-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-rose-200 flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Export PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen">
        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Overview Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $stats_overview = [
                        [
                            'label' => 'Total Pendaftaran',
                            'value' => $totalRegistrations,
                            'color' => 'blue',
                            'icon' =>
                                'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                        ],
                        [
                            'label' => 'Disetujui',
                            'value' => $approvedRegistrations,
                            'color' => 'emerald',
                            'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                        ],
                        [
                            'label' => 'Menunggu Review',
                            'value' => $pendingRegistrations,
                            'color' => 'amber',
                            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                        ],
                        [
                            'label' => 'Ditolak',
                            'value' => $rejectedRegistrations,
                            'color' => 'rose',
                            'icon' => 'M6 18L18 6M6 6l12 12',
                        ],
                    ];
                @endphp

                @foreach ($stats_overview as $stat)
                    <div
                        class="bg-white border border-slate-100 p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 flex items-center group hover:bg-slate-50 transition-all">
                        <div
                            class="w-14 h-14 bg-{{ $stat['color'] }}-50 rounded-2xl flex items-center justify-center mr-5 transition-transform group-hover:rotate-3">
                            <svg class="w-7 h-7 text-{{ $stat['color'] }}-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-3xl font-black text-slate-900 tracking-tight">{{ $stat['value'] }}</p>
                            <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">{{ $stat['label'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                {{-- Registration Types --}}
                <div
                    class="lg:col-span-5 bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="text-xl font-black text-slate-900 tracking-tight">Jenis Pendaftaran</h3>
                    </div>
                    <div class="p-8 space-y-4">
                        @foreach ($registrationTypes as $type)
                            <div
                                class="flex justify-between items-center p-5 bg-slate-50/50 rounded-2xl border border-slate-100 group hover:bg-white hover:shadow-md transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 rounded-full bg-blue-600"></div>
                                    <span class="font-bold text-slate-700">{{ $type->registration_type }}</span>
                                </div>
                                <span
                                    class="text-2xl font-black text-blue-600 group-hover:scale-110 transition-transform">{{ $type->count }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Top Users --}}
                <div
                    class="lg:col-span-7 bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="text-xl font-black text-slate-900 tracking-tight">Top 10 User Aktif</h3>
                    </div>
                    <div class="p-8">
                        <div class="space-y-4">
                            @foreach ($topUsers as $index => $user)
                                <div
                                    class="flex items-center justify-between p-4 bg-slate-50/50 rounded-2xl border border-transparent hover:border-slate-200 hover:bg-white transition-all group">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-white shadow-sm border border-slate-100 text-blue-600 flex items-center justify-center mr-4 text-sm font-black">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <p
                                                class="font-black text-slate-900 text-sm tracking-tight group-hover:text-blue-600 transition-colors">
                                                {{ $user->name }}</p>
                                            <p class="text-xs font-medium text-slate-400">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-lg font-black text-slate-900">{{ $user->student_registrations_count }}</span>
                                        <span
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Berkas</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Footer --}}
            {{-- <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden group">
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-black mb-2 tracking-tight">Butuh Laporan Kustom?</h3>
                        <p class="text-slate-400 font-medium max-w-xl">Semua data yang ditampilkan di sini diperbarui
                            setiap kali ada pendaftaran baru masuk ke sistem. Anda dapat mengekspor data mentah untuk
                            analisis lebih lanjut.</p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.reports.export') }}"
                            class="px-8 py-4 bg-white text-slate-900 font-black rounded-2xl hover:scale-105 transition-all inline-block">
                            Unduh Sekarang
                        </a>
                    </div>
                </div>
                Decorative background elements
                <div
                    class="absolute -top-24 -right-24 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700">
                </div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-600/20 rounded-full blur-3xl"></div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
