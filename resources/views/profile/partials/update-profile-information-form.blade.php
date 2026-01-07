<section>
    {{-- Form Hidden untuk Verifikasi Email --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-8" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Profile Photo Section --}}
        <div class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100 flex flex-col sm:flex-row items-center gap-6">
            <div class="relative group">
                <div class="w-24 h-24 rounded-3xl overflow-hidden ring-4 ring-white shadow-xl shadow-slate-200 bg-white">
                    @if($user->profile_photo)
                        <img id="preview" src="{{ asset('storage/' . $user->profile_photo) }}" class="w-full h-full object-cover">
                    @else
                        <div id="preview-placeholder" class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-3xl font-black">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    @endif
                </div>
                
                <label for="profile_photo" class="absolute -bottom-2 -right-2 w-10 h-10 bg-white rounded-2xl shadow-lg flex items-center justify-center cursor-pointer border border-slate-100 text-slate-600 hover:text-blue-600 hover:scale-110 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                    </svg>
                    <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*" onchange="previewImage(event)">
                </label>
            </div>

            <div class="text-center sm:text-left">
                <h4 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-1">Foto Profil</h4>
                <p class="text-xs text-slate-500 font-medium leading-relaxed">
                    Klik ikon kamera untuk mengubah foto.<br>Format: JPG, PNG (Maks. 2MB).
                </p>
                <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
            </div>
        </div>

        {{-- Input Data --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Name --}}
            <div class="space-y-2">
                <x-input-label for="name" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-4" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text" class="block w-full px-6 py-4 bg-slate-50 border-slate-100 rounded-2xl focus:ring-blue-500 focus:border-blue-500 font-bold text-slate-700" :value="old('name', $user->name)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            {{-- Email --}}
            <div class="space-y-2">
                <x-input-label for="email" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-4" :value="__('Alamat Email')" />
                <x-text-input id="email" name="email" type="email" class="block w-full px-6 py-4 bg-slate-50 border-slate-100 rounded-2xl focus:ring-blue-500 focus:border-blue-500 font-bold text-slate-700" :value="old('email', $user->email)" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100 mt-4">
                        <p class="text-xs font-bold text-amber-800 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            {{ __('Email belum diverifikasi.') }}
                        </p>
                        <button form="send-verification" class="text-[10px] uppercase tracking-widest font-black text-amber-600 hover:text-amber-700 mt-2 block underline">
                            {{ __('Kirim Ulang Verifikasi') }}
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="px-10 py-4 bg-blue-600 text-white font-black rounded-2xl shadow-xl shadow-blue-200 hover:scale-105 transition-all">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-emerald-600 font-bold text-sm"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ __('Berhasil diperbarui.') }}
                </div>
            @endif
        </div>
    </form>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                let output = document.getElementById('preview');
                const placeholder = document.getElementById('preview-placeholder');
                
                if (!output) {
                    output = document.createElement('img');
                    output.id = 'preview';
                    output.className = 'w-full h-full object-cover';
                    if (placeholder) placeholder.replaceWith(output);
                }
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</section>