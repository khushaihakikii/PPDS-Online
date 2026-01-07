<x-app-layout>
    {{-- Header Section --}}
    <div class="bg-white border-b border-slate-100">
        <div class="max-w-[90rem] mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        Manajemen <span class="text-blue-600">User</span>
                    </h2>
                    <p class="text-slate-500 mt-1 text-sm font-medium">Kelola hak akses dan pantau aktivitas pengguna
                        sistem.</p>
                </div>
                <a href="{{ route('admin.users.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl transition-all shadow-lg shadow-blue-200 hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah User Baru
                </a>
            </div>
        </div>
    </div>

    <div class="py-12 bg-[#fcfcfd] min-h-screen">
        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-8">
            {{-- Flash Message Section --}}
            @if (session('success') || session('error'))
                {{-- Tambahkan id="flash-container" --}}
                <div id="flash-container" class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 mt-2 mb-4">
                    @if (session('success'))
                        <div
                            class="flex items-center justify-between p-4 bg-emerald-50 border border-emerald-100 rounded-[1.5rem] shadow-sm animate-in fade-in slide-in-from-top-2 duration-400">
                            {{-- ... konten success sama seperti sebelumnya ... --}}
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-9 h-9 bg-emerald-500 rounded-xl flex items-center justify-center text-white shadow-md shadow-emerald-200 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="text-[10px] font-black text-emerald-800 uppercase tracking-widest leading-none mb-1">
                                        Berhasil</p>
                                    <p class="text-sm font-bold text-emerald-700/90 leading-tight">
                                        {{ session('success') }}</p>
                                </div>
                            </div>
                            {{-- Update onclick untuk menghapus container utama --}}
                            <button onclick="document.getElementById('flash-container').remove()"
                                class="p-2 text-emerald-400 hover:text-emerald-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div
                            class="flex items-center justify-between p-4 bg-rose-50 border border-rose-100 rounded-[1.5rem] shadow-sm animate-in fade-in slide-in-from-top-2 duration-400">
                            {{-- ... konten error ... --}}
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-9 h-9 bg-rose-500 rounded-xl flex items-center justify-center text-white shadow-md shadow-rose-200 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="text-[10px] font-black text-rose-800 uppercase tracking-widest leading-none mb-1">
                                        Dihapus</p>
                                    <p class="text-sm font-bold text-rose-700/90 leading-tight">{{ session('error') }}
                                    </p>
                                </div>
                            </div>
                            {{-- Update onclick untuk menghapus container utama --}}
                            <button onclick="document.getElementById('flash-container').remove()"
                                class="p-2 text-rose-400 hover:text-rose-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            @endif

            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $user_stats = [
                        [
                            'label' => 'Total User',
                            'value' => $stats['total_users'],
                            'color' => 'blue',
                            'icon' =>
                                'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z',
                        ],
                        [
                            'label' => 'Admin Sistem',
                            'value' => $stats['admin_users'],
                            'color' => 'rose',
                            'icon' =>
                                'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        ],
                        [
                            'label' => 'User Biasa',
                            'value' => $stats['regular_users'],
                            'color' => 'emerald',
                            'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                        ],
                    ];
                @endphp

                @foreach ($user_stats as $stat)
                    <div
                        class="bg-white border border-slate-100 p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 flex items-center">
                        <div
                            class="w-14 h-14 bg-{{ $stat['color'] }}-50 rounded-2xl flex items-center justify-center mr-5">
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

            {{-- Search and Filter --}}
            <div
                class="bg-white/80 backdrop-blur-xl border border-white p-6 rounded-[2.5rem] shadow-xl shadow-slate-200/50">
                <form method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama atau email pengguna..."
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-medium text-slate-600 placeholder-slate-400">
                    </div>
                    <div class="md:w-64">
                        <select name="role"
                            class="w-full py-3 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold text-slate-600">
                            <option value="">Semua Role</option>
                            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User Biasa
                            </option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-8 py-3 bg-slate-900 hover:bg-black text-white font-bold rounded-2xl transition-all">
                            Filter
                        </button>
                        <a href="{{ route('admin.users.index') }}"
                            class="px-8 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-2xl transition-all text-center">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            {{-- Users Table --}}
            <div
                class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th
                                    class="px-8 py-5 text-left text-xs font-black text-slate-400 uppercase tracking-[0.15em]">
                                    Informasi User</th>
                                <th
                                    class="px-8 py-5 text-left text-xs font-black text-slate-400 uppercase tracking-[0.15em]">
                                    Role & Akses</th>
                                <th
                                    class="px-8 py-5 text-left text-xs font-black text-slate-400 uppercase tracking-[0.15em]">
                                    Tgl Bergabung</th>
                                <th
                                    class="px-8 py-5 text-left text-xs font-black text-slate-400 uppercase tracking-[0.15em]">
                                    Pendaftaran</th>
                                <th
                                    class="px-8 py-5 text-right text-xs font-black text-slate-400 uppercase tracking-[0.15em]">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($users as $user)
                                <tr class="hover:bg-slate-50/80 transition-colors group">
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-11 h-11 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mr-4 shadow-lg shadow-blue-100 text-white font-black text-sm">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-black text-slate-900">{{ $user->name }}
                                                </div>
                                                <div class="text-xs font-medium text-slate-400">{{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <span
                                            class="inline-flex px-3 py-1 text-[10px] font-black uppercase tracking-widest rounded-lg
                                            {{ $user->role === 'admin' ? 'bg-rose-50 text-rose-600 border border-rose-100' : 'bg-emerald-50 text-emerald-600 border border-emerald-100' }}">
                                            {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap text-sm font-bold text-slate-600">
                                        {{ $user->created_at->format('d M, Y') }}
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <div class="flex items-center text-sm font-black text-slate-700">
                                            <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
                                            {{ $user->studentRegistrations->count() }} <span
                                                class="ml-1 text-slate-400 font-medium text-xs text-uppercase tracking-tighter">BERKAS</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end items-center gap-2">
                                            <a href="{{ route('admin.users.show', $user) }}"
                                                class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all"
                                                title="Detail">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-xl transition-all"
                                                title="Edit">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            @if ($user->id !== auth()->id())
                                                <form method="POST"
                                                    action="{{ route('admin.users.toggle-role', $user) }}"
                                                    class="inline form-confirm-role">
                                                    @csrf
                                                    <button type="button"
                                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all btn-toggle-role"
                                                        data-name="{{ $user->name }}" title="Ganti Role">
                                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <form method="POST"
                                                    action="{{ route('admin.users.destroy', $user) }}"
                                                    class="inline form-delete-user">
                                                    @csrf @method('DELETE')
                                                    <button type="button"
                                                        class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all btn-delete-user"
                                                        data-name="{{ $user->name }}" title="Hapus">
                                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mb-4 text-slate-300">
                                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                                </svg>
                                            </div>
                                            <p class="text-slate-400 font-bold italic text-sm">Tidak ada user
                                                ditemukan.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($users->hasPages())
                    <div class="bg-slate-50/50 px-8 py-6 border-t border-slate-100">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flashContainer = document.getElementById('flash-container');

            if (flashContainer) {
                // Hilangkan otomatis setelah 5 detik
                setTimeout(() => {
                    // Tambahkan efek fade out halus sebelum dihapus
                    flashContainer.style.transition = "all 0.5s ease";
                    flashContainer.style.opacity = "0";
                    flashContainer.style.transform = "translateY(-10px)";

                    // Hapus elemen secara permanen dari DOM setelah animasi selesai
                    setTimeout(() => {
                        flashContainer.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Konfigurasi Standar SweetAlert Modern
            const swalConfig = {
                customClass: {
                    popup: 'rounded-[2rem] border-none shadow-2xl',
                    confirmButton: 'px-8 py-3 bg-slate-900 text-white font-bold rounded-2xl transition-all mx-2',
                    cancelButton: 'px-8 py-3 bg-slate-100 text-slate-600 font-bold rounded-2xl transition-all mx-2'
                },
                buttonsStyling: false
            };

            // Handle Toggle Role
            document.querySelectorAll('.btn-toggle-role').forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const form = this.closest('form');

                    Swal.fire({
                        ...swalConfig,
                        title: 'Ubah Role?',
                        text: `Apakah Anda yakin ingin mengubah hak akses untuk ${name}?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Ubah Role',
                        cancelButtonText: 'Batal',
                        iconColor: '#6366f1' // Indigo
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Handle Delete User
            document.querySelectorAll('.btn-delete-user').forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const form = this.closest('form');

                    Swal.fire({
                        ...swalConfig,
                        title: 'Hapus User?',
                        text: `Data ${name} akan dihapus permanen dan tidak bisa dikembalikan!`,
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus Sekarang',
                        cancelButtonText: 'Batal',
                        iconColor: '#e11d48' // Rose
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</x-app-layout>
