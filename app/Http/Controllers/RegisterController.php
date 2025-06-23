<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan form register (jika pakai view terpisah)
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Simpan data registrasi
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:donatur,penggalang',
        ]);

        // Debugging untuk melihat isi input
        \Log::info('Register request data:', $request->all());

        $user = Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        \Log::info('User created:', [$user]);

        Auth::login($user);

        return redirect()->route($user->role . '.home');
    }


}
