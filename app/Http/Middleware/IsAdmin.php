<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // pastikan user sudah login dan role-nya 1
        if (Auth::check() && Auth::user()->role == "1") {
            return $next($request);
        }

        // kalau bukan admin, arahkan ke halaman lain atau kasih error
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
