<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil settings dari config atau cache
        $settings = [
            'app_name' => config('app.name', 'PPDS Online'),
            'app_description' => config('app.description', 'Platform Pendaftaran Sekolah Online'),
            'registration_enabled' => config('app.registration_enabled', true),
            'max_registrations_per_user' => config('app.max_registrations_per_user', 5),
            'email_notifications' => config('app.email_notifications', true),
            'maintenance_mode' => config('app.maintenance_mode', false),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'app_description' => 'nullable|string|max:500',
            'registration_enabled' => 'boolean',
            'max_registrations_per_user' => 'required|integer|min:1|max:20',
            'email_notifications' => 'boolean',
            'maintenance_mode' => 'boolean',
        ]);

        // Update config values (dalam production, ini bisa disimpan di database)
        foreach ($validated as $key => $value) {
            config(['app.' . $key => $value]);
        }

        // Cache settings for better performance
        Cache::put('app_settings', $validated, now()->addHours(24));

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
