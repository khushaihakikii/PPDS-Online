<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentRegistration extends Model
{
    protected $fillable = [
        'user_id',
        'registration_type',
        'student_name',
        'student_birth_date',
        'student_gender',
        'student_address',
        'parent_name',
        'parent_phone',
        'parent_email',
        'school_year',
        'status',
        'notes',
        'birth_certificate_path',
        'family_card_path',
    ];

    protected $casts = [
        'student_birth_date' => 'date',
        'school_year' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk status badge
    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'pending' => '<span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Menunggu</span>',
            'approved' => '<span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Disetujui</span>',
            'rejected' => '<span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Ditolak</span>',
        };
    }

    // Accessor untuk tipe pendaftaran
    public function getRegistrationTypeLabelAttribute()
    {
        return $this->registration_type === 'student' ? 'Siswa' : 'Wali Murid';
    }
}
