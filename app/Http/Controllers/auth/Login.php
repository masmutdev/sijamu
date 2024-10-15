<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    // Fungsi login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil user dari database menggunakan query builder
        $user = DB::table('users')->where('email', $request->email)->first();

        // Jika user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user menggunakan Auth
            Auth::loginUsingId($user->id);

            // Redirect ke halaman dashboard atau halaman lain dengan pesan sukses
            return redirect()->route('BerandaSIJAMUFIP')->with('success', 'Login berhasil!');
        } else {
            // Jika email atau password salah, kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Email atau password salah!');
        }
    }

    // Fungsi logout
    public function logout()
    {
        // Logout user
        Auth::logout();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('auth.login')->with('success', 'Logout berhasil!');
    }


}
