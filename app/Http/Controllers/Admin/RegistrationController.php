<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationApproved;
use App\Mail\RegistrationRejected;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    /**
     * Display a listing of all registrations for admin.
     */
    public function index(Request $request)
    {
        $query = StudentRegistration::with('user')
            ->orderBy('created_at', 'desc');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('student_name', 'like', "%{$search}%")
                  ->orWhere('institution', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Type filter
        if ($request->filled('type')) {
            $query->where('registration_type', $request->type);
        }

        $registrations = $query->paginate(15)->appends($request->query());

        $stats = [
            'total' => StudentRegistration::count(),
            'pending' => StudentRegistration::where('status', 'pending')->count(),
            'approved' => StudentRegistration::where('status', 'approved')->count(),
            'rejected' => StudentRegistration::where('status', 'rejected')->count(),
        ];

        return view('admin.registrations.index', compact('registrations', 'stats'));
    }

    /**
     * Display the specified registration.
     */
    public function show(StudentRegistration $registration)
    {
        $registration->load('user');
        return view('admin.registrations.show', compact('registration'));
    }

    /**
     * Approve a registration.
     */
    public function approve(StudentRegistration $registration)
    {
        $registration->update([
            'status' => 'approved',
            'notes' => 'Pendaftaran telah disetujui oleh admin.'
        ]);

        // Send approval email
        Mail::to($registration->email)->send(new RegistrationApproved($registration));

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Pendaftaran berhasil disetujui dan email notifikasi telah dikirim.');
    }

    /**
     * Reject a registration.
     */
    public function reject(Request $request, StudentRegistration $registration)
    {
        $request->validate([
            'notes' => 'required|string|max:500'
        ]);

        $registration->update([
            'status' => 'rejected',
            'notes' => $request->notes
        ]);

        // Send rejection email
        Mail::to($registration->email)->send(new RegistrationRejected($registration));

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Pendaftaran berhasil ditolak dan email notifikasi telah dikirim.');
    }

    /**
     * Show form to reject with reason.
     */
    public function rejectForm(StudentRegistration $registration)
    {
        return view('admin.registrations.reject', compact('registration'));
    }
}
