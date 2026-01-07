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
                        <span class="text-xs font-black text-blue-600 uppercase tracking-widest">Manajemen Pengguna</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        Tambah <span class="text-blue-600">User Baru</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-50/50 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[3rem] overflow-hidden">
                
                <div class="p-8 md:p-12">
                    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 gap-8">
                            {{-- Nama Lengkap --}}
                            <div class="space-y-2">
                                <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700 placeholder:text-slate-300"
                                    placeholder="Masukkan nama lengkap user" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            {{-- Email --}}
                            <div class="space-y-2">
                                <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700 placeholder:text-slate-300"
                                    placeholder="email@contoh.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            {{-- Role --}}
                            <div class="space-y-2">
                                <label for="role" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Role / Hak Akses</label>
                                <select id="role" name="role" required
                                    class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700 appearance-none">
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User Biasa (Pendaftar)</option>
                                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Password --}}
                                <div class="space-y-2">
                                    <label for="password" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                                    <input id="password" type="password" name="password" required
                                        class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700"
                                        placeholder="••••••••" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                {{-- Confirm Password --}}
                                <div class="space-y-2">
                                    <label for="password_confirmation" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Konfirmasi Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required
                                        class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-slate-700"
                                        placeholder="••••••••" />
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-slate-50">
                            <a href="{{ route('admin.users.index') }}"
                                class="w-full md:w-auto px-8 py-4 text-xs font-black text-slate-400 hover:text-slate-900 uppercase tracking-widest transition-all text-center">
                                Batal
                            </a>
                            <button type="submit"
                                class="w-full md:w-auto px-12 py-5 bg-slate-900 hover:bg-black text-white rounded-2xl shadow-xl shadow-slate-200 font-black text-sm uppercase tracking-widest transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3">
                                <span>Buat User Baru</span>
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em]">Administrator Security Module</p>
            </div>
        </div>
    </div>
</x-app-layout>