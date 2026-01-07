<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-2">
                <a href="{{ route('admin.registrations.show', $registration) }}" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <span class="text-xs font-black text-rose-600 uppercase tracking-widest">Konfirmasi Penolakan</span>
            </div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Tolak Pendaftaran <span class="text-rose-600">Siswa</span>
            </h2>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Dekorasi Latar Belakang --}}
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-rose-50/50 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[3rem] overflow-hidden">
                
                {{-- Info Singkat Pendaftar --}}
                <div class="p-8 md:p-12 bg-rose-50/30 border-b border-rose-50">
                    <div class="flex items-start gap-5">
                        <div class="w-14 h-14 bg-rose-100 rounded-2xl flex items-center justify-center text-rose-600 shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-rose-400 uppercase tracking-widest mb-1">Pendaftar Terpilih</p>
                            <h3 class="text-xl font-black text-slate-900">{{ $registration->student_name }}</h3>
                            <p class="text-sm font-medium text-slate-500 mt-1 uppercase tracking-tight">ID: #REG-{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }} &bull; Oleh : {{ $registration->user->name }}</p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.registrations.reject', $registration) }}" class="p-8 md:p-12 space-y-8">
                    @csrf

                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <label for="notes" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">
                                Alasan Penolakan <span class="text-rose-500">*</span>
                            </label>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-md uppercase">Wajib Diisi</span>
                        </div>
                        
                        <textarea
                            id="notes"
                            name="notes"
                            rows="6"
                            class="block w-full px-6 py-5 bg-slate-50 border-2 border-transparent focus:border-rose-500 focus:ring-0 rounded-[2rem] transition-all font-bold text-slate-700 placeholder:text-slate-300 placeholder:font-medium"
                            placeholder="Contoh: Dokumen Kartu Keluarga tidak terbaca, silakan upload ulang dengan foto yang lebih jelas."
                            required>{{ old('notes') }}</textarea>
                        
                        <div class="flex items-start gap-3 px-2">
                            <svg class="w-4 h-4 text-slate-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <p class="text-[11px] font-medium text-slate-400 italic leading-relaxed">Pesan ini akan dikirimkan langsung ke dashboard pendaftar agar mereka dapat melakukan perbaikan data.</p>
                        </div>

                        @error('notes')
                            <p class="mt-2 text-xs text-rose-600 font-bold ml-2 italic tracking-tight">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-col md:flex-row items-center gap-4 pt-4">
                        <button type="submit"
                            onclick="return confirm('Konfirmasi penolakan pendaftaran ini?')"
                            class="w-full md:flex-1 px-10 py-5 bg-rose-600 hover:bg-rose-700 text-white rounded-2xl shadow-xl shadow-rose-200 font-black text-sm uppercase tracking-widest transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            <span>Tolak Pendaftaran</span>
                        </button>
                        
                        <a href="{{ route('admin.registrations.show', $registration) }}"
                            class="w-full md:w-auto px-10 py-5 bg-white text-slate-400 hover:text-slate-900 border border-slate-100 rounded-2xl font-black text-sm uppercase tracking-widest transition-all text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-8 text-center">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em]">Tindakan ini tidak dapat dibatalkan</p>
            </div>
        </div>
    </div>
</x-app-layout>