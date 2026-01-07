<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        {{ Auth::user()->role === 'admin' ? 'Admin' : 'Student' }} <span
                            class="text-blue-600">Dashboard</span>
                    </h2>
                    <p class="text-slate-500 mt-1 text-sm font-medium">Selamat datang kembali, {{ Auth::user()->name }}.
                    </p>
                </div>
                <div class="flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-wider">Sistem Online</span>
                </div>
            </div>
        </div>
    </div>

    <div class="py-10 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-50 rounded-full blur-3xl opacity-40 -z-10"></div>

        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">

            {{-- Admin Dashboard --}}
            @if (Auth::user()->role === 'admin')

                {{-- Welcome Banner Admin --}}
                <div
                    class="relative overflow-hidden bg-slate-900 rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-slate-900/20">
                    <div class="relative z-10 md:flex md:items-center md:justify-between">
                        <div class="mb-6 md:mb-0">
                            <h1 class="text-3xl md:text-4xl font-black text-white mb-4 tracking-tight">System Control
                                Center</h1>
                            <p class="text-slate-400 text-lg max-w-xl font-medium leading-relaxed">
                                Kelola pendaftaran siswa, pantau statistik real-time, dan kendalikan hak akses pengguna
                                dalam satu platform terintegrasi.
                            </p>
                        </div>
                        <div class="hidden md:flex items-center gap-4">
                            <div
                                class="w-20 h-20 bg-white/10 backdrop-blur-md rounded-3xl flex items-center justify-center border border-white/10 shadow-inner">
                                <svg class="w-10 h-10 text-blue-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl"></div>
                </div>

                {{-- Quick Actions - Menggunakan style yang sama dengan Card di Manajemen User --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        $adminActions = [
                            [
                                'label' => 'Kelola Pendaftaran',
                                'desc' => 'Tinjau semua data masuk.',
                                'icon' =>
                                    'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                'color' => 'blue',
                                'route' => route('admin.registrations.index'),
                            ],
                            [
                                'label' => 'Statistik Sistem',
                                'desc' => 'Laporan grafik lengkap.',
                                'icon' =>
                                    'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                                'color' => 'emerald',
                                'route' => route('admin.registrations.index'),
                            ],
                            [
                                'label' => 'Manajemen User',
                                'desc' => 'Atur akun dan akses.',
                                'icon' =>
                                    'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z',
                                'color' => 'purple',
                                'route' => route('admin.users.index'),
                            ],
                            [
                                'label' => 'Pengaturan',
                                'desc' => 'Konfigurasi platform.',
                                'icon' =>
                                    'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
                                'color' => 'orange',
                                'route' => '#',
                            ],
                        ];
                    @endphp

                    @foreach ($adminActions as $action)
                        <a href="{{ $action['route'] }}"
                            class="bg-white border border-slate-100 p-7 rounded-[2.5rem] shadow-xl shadow-slate-200/50 group hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-{{ $action['color'] }}-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-{{ $action['color'] }}-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $action['icon'] }}" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-black text-slate-900 mb-2 tracking-tight">{{ $action['label'] }}
                            </h3>
                            <p class="text-slate-500 text-sm font-medium leading-relaxed mb-4">{{ $action['desc'] }}</p>
                            <span
                                class="inline-flex items-center text-xs font-black uppercase tracking-widest text-{{ $action['color'] }}-600">
                                Buka Panel <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>

                {{-- Admin Statistics & Activity --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- System Overview --}}
                    <div
                        class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden">
                        <div
                            class="px-8 py-6 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
                            <h3 class="text-xl font-black text-slate-900 tracking-tight">Ringkasan Berkas</h3>
                            <span
                                class="px-3 py-1 bg-white border border-slate-100 rounded-xl text-[10px] font-black text-slate-400 uppercase tracking-widest">Real-time</span>
                        </div>
                        <div class="p-8 grid grid-cols-2 gap-4">
                            @php
                                $stats_data = [
                                    [
                                        'label' => 'Total Masuk',
                                        'value' => \App\Models\StudentRegistration::count(),
                                        'bg' => 'blue',
                                        'icon' =>
                                            'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                    ],
                                    [
                                        'label' => 'Pending',
                                        'value' => \App\Models\StudentRegistration::where('status', 'pending')->count(),
                                        'bg' => 'amber',
                                        'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                    ],
                                    [
                                        'label' => 'Disetujui',
                                        'value' => \App\Models\StudentRegistration::where(
                                            'status',
                                            'approved',
                                        )->count(),
                                        'bg' => 'emerald',
                                        'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                    ],
                                    [
                                        'label' => 'Ditolak',
                                        'value' => \App\Models\StudentRegistration::where(
                                            'status',
                                            'rejected',
                                        )->count(),
                                        'bg' => 'rose',
                                        'icon' =>
                                            'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                                    ],
                                ];
                            @endphp
                            @foreach ($stats_data as $s)
                                <div
                                    class="p-6 bg-{{ $s['bg'] }}-50/30 rounded-[2rem] border border-{{ $s['bg'] }}-100/50">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div
                                            class="w-8 h-8 bg-white rounded-lg flex items-center justify-center text-{{ $s['bg'] }}-600 shadow-sm">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $s['icon'] }}" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-[10px] font-black text-{{ $s['bg'] }}-800 uppercase tracking-widest">{{ $s['label'] }}</span>
                                    </div>
                                    <div class="text-3xl font-black text-slate-900 tracking-tighter">
                                        {{ $s['value'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Recent Activity --}}
                    <div
                        class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden">
                        <div class="px-8 py-6 border-b border-slate-50 bg-slate-50/30">
                            <h3 class="text-xl font-black text-slate-900 tracking-tight">Pendaftar Terbaru</h3>
                        </div>
                        <div class="p-8">
                            <div class="space-y-4">
                                @php
                                    $recentRegistrations = \App\Models\StudentRegistration::with('user')
                                        ->orderBy('created_at', 'desc')
                                        ->take(4)
                                        ->get();
                                @endphp
                                @forelse($recentRegistrations as $registration)
                                    <div
                                        class="flex items-center justify-between p-5 bg-slate-50 rounded-[2rem] group hover:bg-white hover:shadow-lg hover:shadow-slate-200/50 transition-all border border-transparent hover:border-slate-100">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center font-black text-white shadow-lg shadow-blue-100">
                                                {{ substr($registration->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-black text-slate-900 text-sm tracking-tight">
                                                    {{ $registration->user->name }}</p>
                                                <p
                                                    class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">
                                                    {{ $registration->registration_type_label }} •
                                                    {{ $registration->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="inline-flex scale-90">
                                            {!! $registration->status_badge !!}
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-10">
                                        <div
                                            class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-slate-200">
                                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                            </svg>
                                        </div>
                                        <p class="text-slate-400 font-bold italic text-sm">Belum ada pendaftaran</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Student Dashboard --}}
            @else
                {{-- Welcome Banner User --}}
                <div
                    class="relative overflow-hidden bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-blue-900/20 text-white">
                    <div class="relative z-10 md:flex md:items-center md:justify-between">
                        <div class="mb-6 md:mb-0">
                            <h1 class="text-3xl md:text-4xl font-black mb-4 tracking-tight">Halo,
                                {{ explode(' ', Auth::user()->name)[0] }}!</h1>
                            <p class="text-blue-100 text-lg max-w-xl font-medium leading-relaxed opacity-90">
                                Pantau status pendaftaran Anda secara real-time dan akses kemudahan pendaftaran dalam
                                satu pintu.
                            </p>
                        </div>
                        <div
                            class="hidden md:flex w-24 h-24 bg-white/20 backdrop-blur-md rounded-[2rem] items-center justify-center border border-white/20 transform rotate-12 shadow-inner">
                            <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- User Actions --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        $userActions = [
                            [
                                'label' => 'Daftar Siswa Baru',
                                'desc' => 'Mulai pendaftaran Anda di sini.',
                                'icon' =>
                                    'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z',
                                'color' => 'blue',
                                'route' => route('registrations.create'),
                            ],
                            [
                                'label' => 'Riwayat & Berkas',
                                'desc' => 'Lihat berkas yang diunggah.',
                                'icon' =>
                                    'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                'color' => 'indigo',
                                'route' => route('registrations.index'),
                            ],
                            [
                                'label' => 'Status Verifikasi',
                                'desc' => 'Cek hasil review admin.',
                                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                'color' => 'emerald',
                                'route' => route('registrations.index'),
                            ],
                        ];
                    @endphp

                    @foreach ($userActions as $action)
                        <div
                            class="bg-white/80 backdrop-blur-xl border border-white p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 group hover:-translate-y-2 transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-{{ $action['color'] }}-50 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                                <svg class="w-7 h-7 text-{{ $action['color'] }}-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $action['icon'] }}" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-900 mb-2 tracking-tight">{{ $action['label'] }}
                            </h3>
                            <p class="text-slate-500 text-sm font-medium mb-8 leading-relaxed">{{ $action['desc'] }}
                            </p>
                            <a href="{{ $action['route'] }}"
                                class="inline-flex items-center justify-center w-full px-6 py-4 bg-{{ $action['color'] }}-600 text-white rounded-2xl font-black text-sm shadow-lg shadow-{{ $action['color'] }}-100 hover:shadow-{{ $action['color'] }}-200 transition-all">
                                Daftar Sekarang
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Personal Stats & Info --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <div
                        class="lg:col-span-8 bg-white border border-slate-100 rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50">
                        <h3 class="text-2xl font-black text-slate-900 mb-6 tracking-tight">Informasi PPDS</h3>
                        <p class="text-slate-500 font-medium leading-relaxed mb-8 text-lg">
                            Platform digital ini dirancang untuk memastikan proses seleksi dan pendaftaran berjalan
                            secara objektif dan transparan.
                        </p>
                        <div class="grid md:grid-cols-2 gap-4">
                            @foreach (['Pendaftaran Real-time', 'Review Digital', 'Notifikasi Instan', 'Akses 24/7'] as $feature)
                                <div
                                    class="flex items-center gap-3 p-5 bg-slate-50 rounded-[1.5rem] border border-slate-100 font-bold text-slate-700">
                                    <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="text-sm">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div
                        class="lg:col-span-4 bg-white border border-slate-100 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 flex flex-col">
                        {{-- Judul tetap Slate-900 karena sekarang latarnya putih --}}
                        <h3
                            class="text-xl font-black text-slate-900 mb-8 uppercase tracking-widest text-center md:text-left">
                            Statistik Saya</h3>

                        <div class="space-y-4 flex-grow">
                            @php
                                $uStats = [
                                    [
                                        'label' => 'Total Pendaftaran',
                                        'value' => \App\Models\StudentRegistration::where(
                                            'user_id',
                                            auth()->id(),
                                        )->count(),
                                        'icon' =>
                                            'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                        'color' => 'blue',
                                    ],
                                    [
                                        'label' => 'Lolos Seleksi',
                                        'value' => \App\Models\StudentRegistration::where('user_id', auth()->id())
                                            ->where('status', 'approved')
                                            ->count(),
                                        'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                        'color' => 'emerald',
                                    ],
                                ];
                            @endphp

                            @foreach ($uStats as $us)
                                {{-- Kartu kecil di dalam menggunakan warna latar Slate tipis agar kontras dengan putih di bawahnya --}}
                                <div
                                    class="bg-slate-50 border border-slate-100 rounded-[2rem] p-6 group hover:bg-{{ $us['color'] }}-50/50 transition-all duration-300">
                                    <div class="flex items-center gap-4">
                                        {{-- Icon box tetap cerah sebagai aksen --}}
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-{{ $us['color'] }}-600 shadow-sm border border-slate-100 group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $us['icon'] }}" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span
                                                class="text-[10px] font-black uppercase tracking-[0.15em] text-slate-400 block mb-1">{{ $us['label'] }}</span>
                                            <div
                                                class="text-3xl font-black text-slate-900 leading-none tracking-tighter">
                                                {{ $us['value'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Akses Cepat di bagian bawah statistik --}}
                        <div class="mt-8 p-4 bg-blue-50 rounded-2xl border border-blue-100">
                            <p
                                class="text-[10px] font-bold text-blue-600 uppercase text-center tracking-widest leading-relaxed">
                                Status akun diperbarui secara otomatis oleh sistem
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Call to Action --}}
                <div
                    class="bg-blue-600 rounded-[2.5rem] p-10 md:p-14 text-center text-white relative overflow-hidden group shadow-2xl shadow-blue-200">
                    <div class="relative z-10">
                        <h3 class="text-3xl font-black mb-4 tracking-tight">Siap Memulai Pendidikan Anda?</h3>
                        <p class="text-blue-100 mb-10 max-w-2xl mx-auto font-medium opacity-90 leading-relaxed">
                            Jangan tunda masa depan cerah Anda. Daftarkan diri sekarang dan jadilah bagian dari
                            perubahan positif bersama PPDS Online.
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            {{-- Tombol Utama (Solid White) --}}
                            <a href="{{ route('registrations.create') }}"
                                class="px-10 py-4 bg-white text-blue-600 font-black rounded-2xl shadow-xl shadow-blue-900/20 hover:scale-105 hover:bg-blue-50 transition-all duration-300 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                Mulai Pendaftaran
                            </a>

                            {{-- Tombol Sekunder (Outline/Ghost Style agar Konsisten tapi Berbeda Hierarki) --}}
                            <a href="{{ route('pages.panduan') }}"
                                class="px-10 py-4 bg-transparent text-white font-black rounded-2xl border-2 border-white/30 backdrop-blur-sm hover:bg-white hover:text-blue-600 hover:border-white transition-all duration-300 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253" />
                                </svg>
                                Panduan & Syarat
                            </a>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-20 -left-20 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl transition-transform group-hover:scale-125">
                    </div>
                </div>

            @endif

        </div>
    </div>
</x-app-layout>
