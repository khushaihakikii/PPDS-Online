<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.registrations.index');
        }

        return redirect()->route('dashboard');
    }

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::view('/panduan', 'pages.panduan')->name('pages.panduan');

    // Routes untuk pendaftaran
    Route::resource('registrations', \App\Http\Controllers\StudentRegistrationController::class);

    // Routes untuk admin
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        // User Management
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::post('/users/{user}/toggle-role', [\App\Http\Controllers\Admin\UserController::class, 'toggleRole'])->name('users.toggle-role');

        // Registration Management
        Route::get('/registrations', [\App\Http\Controllers\Admin\RegistrationController::class, 'index'])->name('registrations.index');
        Route::get('/registrations/{registration}', [\App\Http\Controllers\Admin\RegistrationController::class, 'show'])->name('registrations.show');
        Route::post('/registrations/{registration}/approve', [\App\Http\Controllers\Admin\RegistrationController::class, 'approve'])->name('registrations.approve');
        Route::get('/registrations/{registration}/reject', [\App\Http\Controllers\Admin\RegistrationController::class, 'rejectForm'])->name('registrations.reject-form');
        Route::post('/registrations/{registration}/reject', [\App\Http\Controllers\Admin\RegistrationController::class, 'reject'])->name('registrations.reject');

        // Reports & Analytics
        Route::get('/reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/export', [\App\Http\Controllers\Admin\ReportController::class, 'export'])->name('reports.export');
        Route::get('/reports/export-pdf', [\App\Http\Controllers\Admin\ReportController::class, 'exportPdf'])->name('reports.export-pdf');

        // System Settings
        // System Settings
        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        // Cukup satu baris ini saja, rute ini akan otomatis menjadi admin/settings karena ada di dalam grup prefix
        Route::put('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
});

require __DIR__.'/auth.php';
