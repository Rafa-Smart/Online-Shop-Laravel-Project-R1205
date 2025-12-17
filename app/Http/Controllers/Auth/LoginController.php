<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            if (! Auth::user()->is_verified) {
                Auth::logout();

                return back()->with('error', 'Email belum diverifikasi.');
            }

            return redirect()->route('home');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logOut(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Menggunakan flash message success saat logout
        return redirect('/')->with('success', 'Anda telah berhasil keluar (Logout).');
    }
}
