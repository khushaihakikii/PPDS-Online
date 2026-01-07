<?php

namespace Database\Seeders;

use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa user dummy jika belum ada
        $user1 = User::firstOrCreate(
            ['email' => 'ahmad@example.com'],
            ['name' => 'Ahmad Siswa', 'password' => bcrypt('password')]
        );
        $user2 = User::firstOrCreate(
            ['email' => 'siti@example.com'],
            ['name' => 'Siti Wali', 'password' => bcrypt('password')]
        );
        $user3 = User::firstOrCreate(
            ['email' => 'budi@example.com'],
            ['name' => 'Budi Murid', 'password' => bcrypt('password')]
        );

        // Data dummy untuk pendaftaran
        $registrations = [
            [
                'user_id' => $user1->id,
                'registration_type' => 'student',
                'student_name' => 'Ahmad Rahman',
                'student_birth_date' => '2010-05-15',
                'student_gender' => 'male',
                'student_address' => 'Jl. Sudirman No. 123, Jakarta Pusat',
                'parent_name' => null,
                'parent_phone' => '081234567890',
                'parent_email' => 'ahmad@example.com',
                'school_year' => 2026,
                'status' => 'approved',
                'notes' => 'Pendaftaran disetujui. Selamat bergabung!',
            ],
            [
                'user_id' => $user2->id,
                'registration_type' => 'parent',
                'student_name' => 'Siti Aminah',
                'student_birth_date' => '2011-08-20',
                'student_gender' => 'female',
                'student_address' => 'Jl. Thamrin No. 456, Jakarta Selatan',
                'parent_name' => 'Siti Wali',
                'parent_phone' => '081987654321',
                'parent_email' => 'siti@example.com',
                'school_year' => 2026,
                'status' => 'pending',
                'notes' => null,
            ],
            [
                'user_id' => $user3->id,
                'registration_type' => 'student',
                'student_name' => 'Budi Santoso',
                'student_birth_date' => '2009-12-10',
                'student_gender' => 'male',
                'student_address' => 'Jl. Gatot Subroto No. 789, Jakarta Barat',
                'parent_name' => null,
                'parent_phone' => '081345678901',
                'parent_email' => 'budi@example.com',
                'school_year' => 2026,
                'status' => 'pending',
                'notes' => null,
            ],
            [
                'user_id' => $user1->id,
                'registration_type' => 'parent',
                'student_name' => 'Fatimah Zahra',
                'student_birth_date' => '2012-03-25',
                'student_gender' => 'female',
                'student_address' => 'Jl. Malioboro No. 321, Yogyakarta',
                'parent_name' => 'Ahmad Rahman',
                'parent_phone' => '081234567891',
                'parent_email' => 'ahmad@example.com',
                'school_year' => 2026,
                'status' => 'rejected',
                'notes' => 'Kuota penuh untuk tahun ajaran ini.',
            ],
        ];

        foreach ($registrations as $registration) {
            StudentRegistration::create($registration);
        }
    }
}
