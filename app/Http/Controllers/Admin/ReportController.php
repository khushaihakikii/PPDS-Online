<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;
use App\Exports\RegistrationsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Statistik umum
        $totalRegistrations = StudentRegistration::count();
        $approvedRegistrations = StudentRegistration::where('status', 'approved')->count();
        $pendingRegistrations = StudentRegistration::where('status', 'pending')->count();
        $rejectedRegistrations = StudentRegistration::where('status', 'rejected')->count();

        // Statistik per bulan (6 bulan terakhir)
        $monthlyStats = StudentRegistration::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(CASE WHEN status = "approved" THEN 1 ELSE 0 END) as approved'),
            DB::raw('SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending'),
            DB::raw('SUM(CASE WHEN status = "rejected" THEN 1 ELSE 0 END) as rejected')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Statistik berdasarkan jenis pendaftaran
        $registrationTypes = StudentRegistration::select('registration_type', DB::raw('COUNT(*) as count'))
            ->groupBy('registration_type')
            ->get();

        // Top users dengan pendaftaran terbanyak
        $topUsers = User::withCount('studentRegistrations')
            ->orderBy('student_registrations_count', 'desc')
            ->take(10)
            ->get();

        return view('admin.reports.index', compact(
            'totalRegistrations',
            'approvedRegistrations',
            'pendingRegistrations',
            'rejectedRegistrations',
            'monthlyStats',
            'registrationTypes',
            'topUsers'
        ));
    }

    public function export()
    {
        $fileName = 'Laporan_Pendaftaran_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new RegistrationsExport, $fileName);
    }

    public function exportPdf()
    {
        $registrations = StudentRegistration::with('user')->latest()->get();

        // Data tambahan untuk header laporan
        $data = [
            'title' => 'Laporan Pendaftaran Siswa Baru',
            'date' => date('d/m/Y'),
            'registrations' => $registrations
        ];

        // Load view khusus PDF dan set ukuran kertas
        $pdf = Pdf::loadView('admin.reports.pdf', $data)
            ->setPaper('a4', 'landscape'); // Landscape agar kolom muat banyak

        return $pdf->download('Laporan_Pendaftaran_' . date('Y-m-d') . '.pdf');
    }
}
