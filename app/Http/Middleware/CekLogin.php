<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah user sudah login atau belum
        if (!Auth::check()) {
            // Jika belum login, redirect ke halaman login dengan pesan error
            return redirect()->route('auth.login')->with('error', 'Silahkan Login Dulu');
        }

        // Jika sudah login, lanjutkan ke permintaan berikutnya
        return $next($request);
    }
}
