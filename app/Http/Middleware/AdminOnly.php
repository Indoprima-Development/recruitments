<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle($request, Closure $next)
    {
        // dd("MASUK SINI");
        // Cek login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek role (case-insensitive)
        if (strtoupper(Auth::user()->role) !== 'ADMIN') {
            abort(403, 'Akses ditolak. Hanya untuk Admin.');
        }

        return $next($request);
    }
}
