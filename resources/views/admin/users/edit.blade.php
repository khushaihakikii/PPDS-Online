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
                        <span class="text-xs font-black text-amber-600 uppercase tracking-widest">Modifikasi Pengguna</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        Edit <span class="text-amber-600">Profil User</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-amber-50/40 rounded-full blur-3xl -z-10"></div>

        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[3rem] overflow-hidden">
                
                {{-- Form Content --}}
                <div class="p-8 md:p-12">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                            
                            {{-- SISI KIRI: Informasi Utama --}}
                            <div class="space-y-8">
                                <div class="flex items-center gap-3 border-b border-slate-50 pb-4">
                                    <span class="w-2 h-6 bg-amber-500 rounded-full"></span>
                                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Informasi Dasar</h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2 md:col-span-2">
                                        <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus
                                            class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all font-bold text-slate-700 placeholder:text-slate-300" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div class="space-y-2">
                                        <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Email</label>
                                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                                            class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all font-bold text-slate-700" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="space-y-2">
                                        <label for="role" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Role / Hak Akses</label>
                                        <div class="relative">
                                            <select id="role" name="role" required
                                                class="block w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all font-bold text-slate-700 appearance-none">
                                                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User Biasa</option>
                                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrator</option>
                                            </select>
                                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            {{-- SISI KANAN: Keamanan --}}
                            <div class="space-y-8">
                                <div class="flex items-center gap-3 border-b border-slate-50 pb-4">
                                    <span class="w-2 h-6 bg-amber-500 rounded-full"></span>
                                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Update Password</h3>
                                </div>

                                <div class="p-8 bg-slate-50 rounded-[2.5rem] border border-slate-100 space-y-6">
                                    <div class="flex items-start gap-4 mb-2">
                                        <div class="p-2 bg-amber-100 text-amber-600 rounded-xl">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        </div>
                                        <p class="text-xs font-bold text-slate-500 leading-relaxed uppercase tracking-tight">
                                            Kosongkan bagian ini jika Anda tidak ingin mengganti password user.
                                        </p>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="password" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Password Baru</label>
                                        <input id="password" type="password" name="password"
                                            class="block w-full px-6 py-4 bg-white border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all font-bold text-slate-700 shadow-sm"
                                            placeholder="••••••••" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="space-y-2">
                                        <label for="password_confirmation" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Konfirmasi Password Baru</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            class="block w-full px-6 py-4 bg-white border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all font-bold text-slate-700 shadow-sm"
                                            placeholder="••••••••" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mt-12 pt-8 border-t border-slate-100">
                            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">Terakhir diperbarui: {{ $user->updated_at->diffForHumans() }}</p>
                            
                            <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
                                <a href="{{ route('admin.users.index') }}"
                                    class="w-full md:w-auto px-8 py-4 text-xs font-black text-slate-400 hover:text-slate-900 uppercase tracking-widest transition-all text-center">
                                    Batalkan Perubahan
                                </a>
                                <button type="submit"
                                    class="w-full md:w-auto px-12 py-5 bg-slate-900 hover:bg-black text-white rounded-2xl shadow-xl shadow-slate-200 font-black text-sm uppercase tracking-widest transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3">
                                    <span>Simpan Perubahan</span>
                                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>