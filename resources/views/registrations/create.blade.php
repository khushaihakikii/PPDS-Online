<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        Formulir <span class="text-blue-600">Pendaftaran</span>
                    </h2>
                    <p class="text-slate-500 mt-1 text-sm font-medium">Lengkapi data dan unggah dokumen untuk proses verifikasi seleksi.</p>
                </div>
                <div class="hidden md:block">
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-2xl text-xs font-black uppercase tracking-widest border border-blue-100">
                        Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-50/50 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-50/50 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[3rem] overflow-hidden">
                
                {{-- Form dengan enctype untuk upload file --}}
                <form method="POST" action="{{ route('registrations.store') }}" enctype="multipart/form-data" class="divide-y divide-slate-50">
                    @csrf

                    {{-- Section 1: Tipe Pendaftaran --}}
                    <div class="p-8 md:p-14 space-y-8">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Langkah 01</h3>
                                <p class="text-xl font-black text-slate-900">Pilih Peran Pendaftar</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <label class="relative flex items-center p-8 border-2 border-slate-50 rounded-[2rem] cursor-pointer hover:bg-slate-50 hover:border-blue-200 transition-all group">
                                <input type="radio" name="registration_type" value="student" class="w-6 h-6 text-blue-600 border-slate-200 focus:ring-blue-500" required>
                                <div class="ml-6">
                                    <span class="block text-lg font-black text-slate-900 group-hover:text-blue-600 transition-colors">Pendaftaran Siswa</span>
                                    <span class="block text-sm font-medium text-slate-500">Saya mendaftar sebagai calon siswa mandiri</span>
                                </div>
                            </label>
                            
                            <label class="relative flex items-center p-8 border-2 border-slate-50 rounded-[2rem] cursor-pointer hover:bg-slate-50 hover:border-blue-200 transition-all group">
                                <input type="radio" name="registration_type" value="parent" class="w-6 h-6 text-blue-600 border-slate-200 focus:ring-blue-500" required>
                                <div class="ml-6">
                                    <span class="block text-lg font-black text-slate-900 group-hover:text-blue-600 transition-colors">Orang Tua / Wali</span>
                                    <span class="block text-sm font-medium text-slate-500">Saya mendaftarkan anak atau anggota keluarga</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Section 2: Data Siswa --}}
                    <div class="p-8 md:p-14 space-y-10">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                            <div>
                                <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Langkah 02</h3>
                                <p class="text-xl font-black text-slate-900">Informasi Dasar Siswa</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <div class="space-y-3 lg:col-span-2">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap Siswa</label>
                                <input type="text" name="student_name" value="{{ old('student_name') }}" required
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700"
                                    placeholder="Masukkan nama sesuai ijazah/akta" />
                            </div>

                            <div class="space-y-3">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Tanggal Lahir</label>
                                <input type="date" name="student_birth_date" value="{{ old('student_birth_date') }}" required
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700" />
                            </div>

                            <div class="space-y-3">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Jenis Kelamin</label>
                                <select name="student_gender" required
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700">
                                    <option value="">Pilih Gender</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>

                            <div class="space-y-3">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Tahun Ajaran</label>
                                <select name="school_year" required
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700">
                                    <option value="">Pilih Tahun</option>
                                    @for($year = date('Y'); $year <= date('Y') + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }} / {{ $year + 1 }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="space-y-3 lg:col-span-3">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Domisili Lengkap</label>
                                <textarea name="student_address" rows="2" required
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700"
                                    placeholder="Jl. Nama Jalan, No. Rumah, Kelurahan, Kecamatan...">{{ old('student_address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Section 3: Data Wali --}}
                    <div class="p-8 md:p-14 bg-slate-50/30 space-y-10">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-blue-600 shadow-sm border border-slate-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Langkah 03</h3>
                                <p class="text-xl font-black text-slate-900">Kontak Orang Tua / Wali</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <div class="space-y-3">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Nama Wali</label>
                                <input type="text" name="parent_name" class="block w-full px-6 py-4 bg-white border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all font-bold text-sm" placeholder="Nama lengkap wali" />
                            </div>

                            <div class="space-y-3">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">No. WhatsApp</label>
                                <input type="tel" name="parent_phone" class="block w-full px-6 py-4 bg-white border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all font-bold text-sm" placeholder="08xxxxxxxxxx" />
                            </div>

                            <div class="space-y-3">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Email</label>
                                <input type="email" name="parent_email" class="block w-full px-6 py-4 bg-white border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 transition-all font-bold text-sm" placeholder="alamat@email.com" />
                            </div>
                        </div>
                    </div>

                    {{-- Section 4: Unggah Dokumen --}}
                    <div class="p-8 md:p-14 space-y-10">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                            </div>
                            <div>
                                <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Langkah 04</h3>
                                <p class="text-xl font-black text-slate-900">Dokumen Pendukung</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            {{-- Akta Kelahiran --}}
                            <div class="space-y-4">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Akta Kelahiran (PDF/JPG, Max 2MB)</label>
                                <div class="relative group">
                                    <input type="file" name="birth_certificate" required
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        onchange="document.getElementById('file-name-akta').textContent = this.files[0].name">
                                    <div class="p-8 border-2 border-dashed border-slate-200 rounded-[2rem] bg-slate-50/50 group-hover:border-blue-400 group-hover:bg-blue-50 transition-all text-center">
                                        <svg class="w-10 h-10 text-slate-300 mx-auto mb-3 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        <p id="file-name-akta" class="text-sm font-black text-slate-600 tracking-tight">Pilih File Akta</p>
                                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-black tracking-widest">Klik atau seret file</p>
                                    </div>
                                </div>
                                @error('birth_certificate') <p class="text-xs text-rose-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Kartu Keluarga --}}
                            <div class="space-y-4">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Kartu Keluarga (PDF/JPG, Max 2MB)</label>
                                <div class="relative group">
                                    <input type="file" name="family_card" required
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        onchange="document.getElementById('file-name-kk').textContent = this.files[0].name">
                                    <div class="p-8 border-2 border-dashed border-slate-200 rounded-[2rem] bg-slate-50/50 group-hover:border-blue-400 group-hover:bg-blue-50 transition-all text-center">
                                        <svg class="w-10 h-10 text-slate-300 mx-auto mb-3 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        <p id="file-name-kk" class="text-sm font-black text-slate-600 tracking-tight">Pilih File KK</p>
                                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-black tracking-widest">Klik atau seret file</p>
                                    </div>
                                </div>
                                @error('family_card') <p class="text-xs text-rose-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Actions Section --}}
                    <div class="p-8 md:p-14 bg-white flex flex-col md:flex-row items-center justify-between gap-6">
                        <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 text-slate-400 hover:text-slate-900 transition-all">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center group-hover:bg-slate-100 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            </div>
                            <span class="text-sm font-black uppercase tracking-widest">Batal</span>
                        </a>
                        
                        <button type="submit"
                            class="w-full md:w-auto px-12 py-5 bg-slate-900 hover:bg-black text-white rounded-2xl shadow-xl shadow-slate-200 font-black text-sm uppercase tracking-widest transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                            <span>Kirim Pendaftaran</span>
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-12 text-center pb-12">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em]">System Secure Connection &bull; Data Encrypted</p>
            </div>
        </div>
    </div>
</x-app-layout>