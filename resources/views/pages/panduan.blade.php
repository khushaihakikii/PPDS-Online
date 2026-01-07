<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[80rem] mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-blue-600 font-black text-[10px] uppercase tracking-[0.3em] mb-4 block">Information Center</span>
            <h2 class="text-4xl font-black text-slate-900 tracking-tight mb-4">
                Panduan <span class="text-blue-600">Pendaftaran</span>
            </h2>
            <p class="text-slate-500 max-w-2xl mx-auto font-medium">
                Pahami langkah-langkah dan persiapkan berkas Anda sebelum memulai pendaftaran untuk memastikan proses verifikasi berjalan lancar.
            </p>
        </div>
    </div>

    <div class="py-16 bg-[#fcfcfd] min-h-screen">
        <div class="max-w-[70rem] mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Alur Pendaftaran (Vertical Steps) --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
                
                {{-- Left Side: Steps --}}
                <div class="lg:col-span-7 space-y-12">
                    <h3 class="text-2xl font-black text-slate-900 mb-8 flex items-center gap-3">
                        <div class="w-2 h-8 bg-blue-600 rounded-full"></div>
                        Alur Pendaftaran
                    </h3>

                    @php
                        $steps = [
                            ['title' => 'Lengkapi Profil', 'desc' => 'Pastikan data akun Anda sudah benar dan sesuai dengan identitas resmi.', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                            ['title' => 'Pilih Jalur Pendaftaran', 'desc' => 'Tentukan jalur yang sesuai (Siswa Baru atau Pindahan) pada menu dashboard.', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                            ['title' => 'Unggah Berkas Digital', 'desc' => 'Siapkan scan dokumen asli dalam format PDF atau JPG dengan ukuran maksimal 2MB.', 'icon' => 'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12'],
                            ['title' => 'Pantau Status Verifikasi', 'desc' => 'Tim admin akan mereview berkas Anda dalam waktu 1x24 jam secara real-time.', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ];
                    @endphp

                    @foreach($steps as $index => $step)
                    <div class="flex gap-6 relative group">
                        @if(!$loop->last)
                            <div class="absolute left-7 top-14 w-0.5 h-16 bg-slate-100 group-hover:bg-blue-100 transition-colors"></div>
                        @endif
                        
                        <div class="w-14 h-14 bg-white border-2 border-slate-100 rounded-2xl flex items-center justify-center font-black text-slate-400 group-hover:border-blue-600 group-hover:text-blue-600 transition-all shrink-0 shadow-sm">
                            {{ $index + 1 }}
                        </div>
                        
                        <div class="pt-2">
                            <h4 class="text-xl font-black text-slate-900 mb-2 tracking-tight">{{ $step['title'] }}</h4>
                            <p class="text-slate-500 font-medium leading-relaxed text-sm">
                                {{ $step['desc'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Right Side: Requirements Card --}}
                <div class="lg:col-span-5">
                    <div class="bg-white border border-slate-100 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 sticky top-12">
                        <h3 class="text-xl font-black text-slate-900 mb-6 tracking-tight">Persyaratan Berkas</h3>
                        
                        <div class="space-y-4">
                            @foreach(['Kartu Keluarga (KK)', 'Ijazah Terakhir / SKL', 'Akte Kelahiran', 'Pas Foto 3x4 (Latar Merah)', 'KTP Orang Tua'] as $item)
                            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 group hover:bg-blue-50 hover:border-blue-100 transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 rounded-full bg-blue-600"></div>
                                    <span class="text-sm font-bold text-slate-700">{{ $item }}</span>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Wajib</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-8 p-6 bg-amber-50 rounded-[1.5rem] border border-amber-100">
                            <div class="flex gap-3">
                                <svg class="w-6 h-6 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <p class="text-xs font-black text-amber-800 uppercase tracking-widest mb-1">Penting</p>
                                    <p class="text-xs text-amber-700 font-medium leading-relaxed">
                                        Pastikan dokumen terlihat jelas (tidak buram) agar proses verifikasi lebih cepat disetujui.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('registrations.create') }}" class="mt-8 flex items-center justify-center w-full px-6 py-4 bg-blue-600 text-white rounded-2xl font-black text-sm shadow-xl shadow-blue-200 hover:scale-105 transition-all">
                            Saya Mengerti, Daftar Sekarang
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>