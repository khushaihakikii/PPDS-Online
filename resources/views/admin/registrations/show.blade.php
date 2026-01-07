<x-app-layout>
    {{-- Inisialisasi Alpine.js untuk fitur Modal Pop-up --}}
    <div x-data="{ 
        showModal: false, 
        modalTitle: '', 
        fileUrl: '', 
        isImage: false,
        openModal(title, url) {
            this.modalTitle = title;
            this.fileUrl = url;
            // Deteksi apakah file adalah gambar berdasarkan ekstensi
            this.isImage = url.match(/\.(jpeg|jpg|gif|png)$/i);
            this.showModal = true;
        }
    }">
        
        {{-- Header Section --}}
        <div class="bg-white border-b border-slate-100">
            <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <a href="{{ route('admin.registrations.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </a>
                            <span class="text-xs font-black text-blue-600 uppercase tracking-widest">Detail Pendaftaran</span>
                        </div>
                        {{-- <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                            {{ $registration->student_name }}
                        </h2> --}}
                    </div>
                    <div class="flex items-center gap-4">
                        {!! $registration->status_badge !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
            {{-- Background Decoration --}}
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-50/50 rounded-full blur-3xl -z-10"></div>

            <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">
                
                {{-- Action Banner untuk Status Pending --}}
                @if($registration->status === 'pending')
                    <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl shadow-slate-200 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center text-white">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-black text-lg">Tinjauan Diperlukan</h4>
                                <p class="text-slate-400 text-sm font-medium">Tentukan status pendaftaran ini setelah memvalidasi dokumen di bawah.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <form method="POST" action="{{ route('admin.registrations.approve', $registration) }}" class="flex-1 md:flex-none">
                                @csrf
                                <button type="submit" onclick="return confirm('Setujui pendaftaran ini?')" 
                                    class="w-full px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all">
                                    Setujui
                                </button>
                            </form>
                            <a href="{{ route('admin.registrations.reject-form', $registration) }}" 
                                class="flex-1 md:flex-none px-8 py-4 bg-rose-600 hover:bg-rose-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all text-center">
                                Tolak
                            </a>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    {{-- Sisi Kiri: Informasi Detail --}}
                    <div class="lg:col-span-2 space-y-8">
                        <div class="bg-white border border-slate-100 rounded-[3rem] shadow-sm overflow-hidden">
                            <div class="p-8 md:p-12 space-y-12">
                                
                                {{-- Data Siswa --}}
                                <div class="space-y-8">
                                    <div class="flex items-center gap-3 border-b border-slate-50 pb-4">
                                        <span class="w-2 h-6 bg-blue-600 rounded-full"></span>
                                        <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Informasi Dasar Siswa</h3>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Lengkap</label>
                                            <p class="text-base font-bold text-slate-700">{{ $registration->student_name }}</p>
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Jenis Kelamin</label>
                                            <p class="text-base font-bold text-slate-700">{{ $registration->student_gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</p>
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Tanggal Lahir</label>
                                            <p class="text-base font-bold text-slate-700">{{ $registration->student_birth_date->format('d F Y') }}</p>
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Tahun Ajaran</label>
                                            <p class="text-base font-bold text-slate-700">{{ $registration->school_year }}</p>
                                        </div>
                                        <div class="space-y-1 md:col-span-2">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Alamat Domisili</label>
                                            <p class="text-sm font-bold text-slate-600 bg-slate-50 p-5 rounded-2xl border border-slate-100 mt-2">{{ $registration->student_address }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Data Wali --}}
                                <div class="space-y-8">
                                    <div class="flex items-center gap-3 border-b border-slate-50 pb-4">
                                        <span class="w-2 h-6 bg-indigo-600 rounded-full"></span>
                                        <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Data Orang Tua / Wali</h3>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Wali</label>
                                            <p class="text-base font-bold text-slate-700">{{ $registration->parent_name ?: 'Mandiri' }}</p>
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">No. WhatsApp</label>
                                            <p class="text-base font-bold text-blue-600">{{ $registration->parent_phone }}</p>
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</label>
                                            <p class="text-base font-bold text-slate-700">{{ $registration->parent_email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sisi Kanan: Dokumen Pendukung --}}
                    <div class="space-y-8">
                        <div class="bg-white border border-slate-100 rounded-[3rem] shadow-sm p-8 md:p-10 space-y-8">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-emerald-50 text-emerald-600 rounded-xl">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Dokumen Pendukung</h3>
                            </div>

                            <div class="space-y-4">
                                {{-- Preview Akta Kelahiran --}}
                                <button type="button" 
                                    @click="openModal('Akta Kelahiran', '{{ asset('storage/' . $registration->birth_certificate_path) }}')"
                                    class="w-full p-5 border border-slate-100 rounded-[2rem] bg-slate-50/50 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:shadow-blue-900/5 transition-all text-left group">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all text-slate-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-xs font-black text-slate-900 uppercase">Akta Kelahiran</p>
                                                <p class="text-[10px] font-medium text-slate-400 tracking-tight">Klik untuk Preview</p>
                                            </div>
                                        </div>
                                        <svg class="w-4 h-4 text-slate-300 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </div>
                                </button>

                                {{-- Preview KK --}}
                                <button type="button" 
                                    @click="openModal('Kartu Keluarga', '{{ asset('storage/' . $registration->family_card_path) }}')"
                                    class="w-full p-5 border border-slate-100 rounded-[2rem] bg-slate-50/50 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:shadow-blue-900/5 transition-all text-left group">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all text-slate-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-xs font-black text-slate-900 uppercase">Kartu Keluarga</p>
                                                <p class="text-[10px] font-medium text-slate-400 tracking-tight">Klik untuk Preview</p>
                                            </div>
                                        </div>
                                        <svg class="w-4 h-4 text-slate-300 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </div>
                                </button>
                            </div>
                        </div>

                        {{-- Catatan Admin jika ada --}}
                        @if($registration->notes)
                            <div class="bg-rose-50 border border-rose-100 rounded-[2.5rem] p-8 space-y-4">
                                <h4 class="text-xs font-black text-rose-600 uppercase tracking-widest">Catatan Penolakan</h4>
                                <p class="text-sm font-bold text-rose-900 leading-relaxed italic">"{{ $registration->notes }}"</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL POP-UP (Teleport ke Body) --}}
        <template x-teleport="body">
            <div x-show="showModal" 
                 class="fixed inset-0 z-[100] flex items-center justify-center p-4"
                 x-cloak>
                {{-- Overlay dengan Blur --}}
                <div x-show="showModal" 
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="showModal = false"
                     class="absolute inset-0 bg-slate-900/60 backdrop-blur-md"></div>

                {{-- Konten Modal --}}
                <div x-show="showModal"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-8"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-8"
                     class="relative w-full max-w-5xl max-h-[90vh] bg-white rounded-[3rem] shadow-2xl overflow-hidden flex flex-col">
                    
                    {{-- Header Modal --}}
                    <div class="p-6 border-b border-slate-50 flex items-center justify-between bg-white z-10">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-6 bg-blue-600 rounded-full"></div>
                            <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest" x-text="modalTitle"></h3>
                        </div>
                        <button @click="showModal = false" class="p-2 hover:bg-slate-100 rounded-full transition-all text-slate-400 hover:text-rose-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    {{-- Isi Modal (Viewer) --}}
                    <div class="flex-1 bg-slate-100 overflow-auto p-6 flex items-center justify-center min-h-[500px]">
                        {{-- Tampilan jika Gambar --}}
                        <template x-if="isImage">
                            <img :src="fileUrl" class="max-w-full h-auto rounded-2xl shadow-2xl border-4 border-white">
                        </template>
                        {{-- Tampilan jika PDF --}}
                        <template x-if="!isImage">
                            <iframe :src="fileUrl" class="w-full h-[70vh] rounded-2xl border border-slate-200 shadow-inner bg-white" frameborder="0"></iframe>
                        </template>
                    </div>

                    {{-- Footer Modal --}}
                    <div class="p-6 bg-white border-t border-slate-50 flex justify-between items-center">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Document Viewer v1.0</p>
                        <div class="flex gap-3">
                            <button @click="showModal = false" class="px-6 py-3 text-xs font-black text-slate-500 uppercase tracking-widest hover:text-slate-900 transition-all">Tutup</button>
                            <a :href="fileUrl" download class="px-8 py-3 bg-slate-900 hover:bg-black text-white rounded-xl text-xs font-black uppercase tracking-widest transition-all shadow-lg">
                                Download File
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</x-app-layout>