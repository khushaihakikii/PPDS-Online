<?php

namespace App\Exports;

use App\Models\StudentRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Mengambil semua data pendaftaran beserta data usernya
        return StudentRegistration::with('user')->latest()->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Tipe',
            'Gender',
            'Tahun Ajaran',
            'Nama Wali',
            'WhatsApp',
            'Status',
            'Tanggal Daftar',
        ];
    }

    public function map($registration): array
    {
        return [
            $registration->id,
            $registration->student_name,
            $registration->registration_type,
            $registration->student_gender,
            $registration->school_year,
            $registration->parent_name ?? '-',
            $registration->parent_phone,
            $registration->status,
            $registration->created_at->format('d-m-Y'),
        ];
    }
}