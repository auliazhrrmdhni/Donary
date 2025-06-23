<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,penggalang,donatur',
        ]);

        $user = Pengguna::where('email', $credentials['email'])
            ->where('role', $credentials['role'])
            ->first();

        if ($user && Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            if ($user->role === 'admin') {
                return redirect()->route('admin.home');
            } elseif ($user->role === 'penggalang') {
                return redirect()->route('penggalang.home');
            } elseif ($user->role === 'donatur') {
                return redirect()->route('donatur.home');
            }
        }

        return back()->with('error', 'Email, password, atau role salah')->withInput();
    }
}
