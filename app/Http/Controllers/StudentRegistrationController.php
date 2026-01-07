<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the user's registrations.
     */
    public function index()
    {
        $registrations = Auth::user()->studentRegistrations()->latest()->get();

        return view('registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new registration.
     */
    public function create()
    {
        return view('registrations.create');
    }

    /**
     * Store a newly created registration in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_type' => 'required|in:student,parent',
            'student_name' => 'required|string|max:255',
            'student_birth_date' => 'required|date|before:today',
            'student_gender' => 'required|in:male,female',
            'student_address' => 'required|string',
            'parent_name' => 'nullable|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'parent_email' => 'required|email|max:255',
            'school_year' => 'required|integer|min:2020|max:' . (date('Y') + 1),
            // Validasi File Baru
            'birth_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'family_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Cek manual jika tipe parent tapi nama kosong
        if ($validated['registration_type'] === 'parent' && empty($validated['parent_name'])) {
            return back()->withErrors(['parent_name' => 'Nama wali wajib diisi untuk pendaftaran wali.'])->withInput();
        }

        // Proses Upload File
        if ($request->hasFile('birth_certificate')) {
            // Disimpan di storage/app/public/registrations/akta
            $aktaPath = $request->file('birth_certificate')->store('registrations/akta', 'public');
            $validated['birth_certificate_path'] = $aktaPath;
        }

        if ($request->hasFile('family_card')) {
            // Disimpan di storage/app/public/registrations/kk
            $kkPath = $request->file('family_card')->store('registrations/kk', 'public');
            $validated['family_card_path'] = $kkPath;
        }

        // Simpan data pendaftaran melalui relasi user
        Auth::user()->studentRegistrations()->create($validated);

        return redirect()->route('registrations.index')->with('success', 'Pendaftaran dan dokumen berhasil diajukan!');
    }

    /**
     * Display the specified registration.
     */
    public function show(StudentRegistration $registration)
    {
        // Keamanan: Pastikan user hanya bisa lihat pendaftarannya sendiri
        if ($registration->user_id !== Auth::id()) {
            abort(403);
        }

        return view('registrations.show', compact('registration'));
    }
}