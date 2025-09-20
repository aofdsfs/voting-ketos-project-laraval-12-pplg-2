<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Misal, field is_admin = 1 untuk admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman home
        return redirect('/home')->with('error', 'Hanya admin yang bisa mengakses halaman ini.');
    }
}
