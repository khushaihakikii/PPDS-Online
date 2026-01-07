<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user dengan pencarian dan filter.
     */
    public function index(Request $request)
    {
        $query = User::query()->orderBy('created_at', 'desc');

        // Fitur Pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter Berdasarkan Role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(15)->appends($request->query());

        $stats = [
            'total_users' => User::count(),
            'admin_users' => User::where('role', 'admin')->count(),
            'regular_users' => User::where('role', 'user')->count(),
        ];

        return view('admin.users.index', compact('users', 'stats'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Simpan user baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,user'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "Akun untuk {$user->name} berhasil dibuat.");
    }

    public function show(User $user)
    {
        $user->load(['studentRegistrations' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update data user.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,user'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.users.index')
            ->with('success', "Profil {$user->name} berhasil diperbarui.");
    }

    /**
     * Hapus user dengan proteksi keamanan tambahan.
     */
    public function destroy(User $user)
    {
        // Cegah admin menghapus diri sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Keamanan Sistem: Anda dilarang menghapus akun Anda sendiri.');
        }

        // Cegah penghapusan jika ini admin terakhir
        if ($user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Akses Ditolak: Sistem membutuhkan minimal satu Administrator.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "Data user {$userName} telah dihapus dari sistem.");
    }

    /**
     * Ubah role secara cepat dari tabel.
     */
    public function toggleRole(User $user)
    {
        // Proteksi jika admin terakhir mencoba mengubah rolenya sendiri menjadi user biasa
        if ($user->id === auth()->id() && $user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Gagal: Anda adalah admin terakhir. Berikan akses admin ke user lain sebelum mengubah role Anda.');
        }

        $oldRole = $user->role;
        $newRole = $user->role === 'admin' ? 'user' : 'admin';

        $user->update(['role' => $newRole]);

        return redirect()->route('admin.users.index')
            ->with('success', "Hak akses {$user->name} diubah dari " . strtoupper($oldRole) . " menjadi " . strtoupper($newRole) . ".");
    }
}
