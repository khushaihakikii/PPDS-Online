<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Pengaturan <span class="text-blue-600">Sistem</span>
            </h2>
            <p class="text-slate-500 mt-1 text-sm font-medium">Konfigurasi parameter global dan fungsionalitas aplikasi.</p>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-8">
                @csrf
                @method('PUT')

                {{-- App Settings Card --}}
                <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden">
                    <div class="p-8 border-b border-slate-50 flex items-center gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-black text-slate-900">Identitas Aplikasi</h3>
                    </div>
                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-[0.15em] ml-1">Nama Aplikasi</label>
                            <input type="text" name="app_name" value="{{ old('app_name', $settings['app_name']) }}"
                                   class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold text-slate-700">
                            @error('app_name') <p class="text-xs text-rose-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-[0.15em] ml-1">Deskripsi Sistem</label>
                            <input type="text" name="app_description" value="{{ old('app_description', $settings['app_description']) }}"
                                   class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold text-slate-700">
                            @error('app_description') <p class="text-xs text-rose-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Functional Settings --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Registration --}}
                    <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 p-8 space-y-6">
                        <h3 class="text-lg font-black text-slate-900 mb-4 flex items-center gap-2">
                            <span class="w-2 h-6 bg-blue-600 rounded-full"></span>
                            Konfigurasi Pendaftaran
                        </h3>
                        
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-[0.15em] ml-1">Maks. Pendaftaran / User</label>
                            <input type="number" name="max_registrations_per_user" value="{{ old('max_registrations_per_user', $settings['max_registrations_per_user']) }}"
                                   class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-black text-slate-700">
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                            <span class="text-sm font-bold text-slate-600">Status Pendaftaran Terbuka</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="registration_enabled" value="0">
                                <input type="checkbox" name="registration_enabled" value="1" {{ old('registration_enabled', $settings['registration_enabled']) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>

                    {{-- System --}}
                    <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 p-8 space-y-6">
                        <h3 class="text-lg font-black text-slate-900 mb-4 flex items-center gap-2">
                            <span class="w-2 h-6 bg-indigo-600 rounded-full"></span>
                            Otomasi & Keamanan
                        </h3>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                            <div>
                                <span class="text-sm font-bold text-slate-600 block">Notifikasi Email</span>
                                <span class="text-[10px] text-slate-400 font-medium uppercase tracking-tighter">Kirim pembaruan status ke user</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="email_notifications" value="0">
                                <input type="checkbox" name="email_notifications" value="1" {{ old('email_notifications', $settings['email_notifications']) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-rose-50/50 rounded-2xl border border-rose-100">
                            <div>
                                <span class="text-sm font-bold text-rose-600 block">Mode Maintenance</span>
                                <span class="text-[10px] text-rose-400 font-medium uppercase tracking-tighter">Hanya admin yang bisa akses</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="maintenance_mode" value="0">
                                <input type="checkbox" name="maintenance_mode" value="1" {{ old('maintenance_mode', $settings['maintenance_mode']) ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-rose-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-rose-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-center md:justify-end pb-12">
                    <button type="submit" class="w-full md:w-auto px-12 py-4 bg-slate-900 hover:bg-black text-white font-black rounded-2xl transition-all shadow-xl shadow-slate-200 hover:-translate-y-1 flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>