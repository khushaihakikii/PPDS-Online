<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Status Badge --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Pendaftaran {{ $registration->student_name }}</h3>
                            <p class="text-gray-600 mt-1">Diajukan pada {{ $registration->created_at->format('d F Y, H:i') }}</p>
                        </div>
                        <div>
                            {!! $registration->status_badge !!}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Detail Pendaftaran --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-6">Informasi Pendaftaran</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Tipe Pendaftaran --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipe Pendaftaran</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->registration_type_label }}</p>
                        </div>

                        {{-- Tahun Ajaran --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->school_year }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Siswa --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-6">Data Siswa</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Siswa --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->student_name }}</p>
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->student_birth_date->format('d F Y') }}</p>
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->student_gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>

                        {{-- Usia --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Usia</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->student_birth_date->age }} tahun</p>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $registration->student_address }}</p>
                    </div>
                </div>
            </div>

            {{-- Data Wali --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-6">Data Wali Murid</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Wali --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Wali</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->parent_name ?: 'Tidak ada (pendaftaran siswa)' }}</p>
                        </div>

                        {{-- Telepon --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->parent_phone }}</p>
                        </div>

                        {{-- Email --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $registration->parent_email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Catatan Admin --}}
            @if($registration->notes)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Catatan Admin</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-700">{{ $registration->notes }}</p>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Action Buttons --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('registrations.index') }}"
                            class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali ke Daftar
                        </a>

                        @if($registration->status === 'pending')
                            <div class="text-sm text-gray-500">
                                Pendaftaran sedang diproses. Mohon tunggu konfirmasi dari admin.
                            </div>
                        @elseif($registration->status === 'approved')
                            <div class="text-sm text-green-600 font-medium">
                                ✓ Pendaftaran telah disetujui
                            </div>
                        @else
                            <div class="text-sm text-red-600 font-medium">
                                ✗ Pendaftaran ditolak. Silakan hubungi admin untuk informasi lebih lanjut.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>