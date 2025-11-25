<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->user()->is_verified) {
            return redirect('/login')->with('error', 'Akun Anda belum terverifikasi. Periksa email Anda.');
        }

        return $next($request);
    }
}
