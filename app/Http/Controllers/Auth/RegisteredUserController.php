<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Buyer;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan form pendaftaran.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Tangani permintaan pendaftaran yang masuk.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            // Pastikan email unik di tabel users
            'email'=> 'required|email|unique:users,email', 
            'password' => 'required|min:6',
        ]);

        $token = Str::random(64);

        // 1. Buat user baru di tabel 'users'
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => Hash::make($request->password),
            'verification_token' => $token,
            'is_verified'=> false,
            'role'  => 'buyer',
        ]);

        // 2. Buat entri buyer. Menggunakan firstOrCreate untuk memastikan
        // hanya SATU entri buyer yang terhubung ke user_id ini.
        Buyer::firstOrCreate(
            ['user_id' => $user->id], // Kriteria pencarian: cek berdasarkan user_id
            [
                'fullname' => $user->name,
                // 'phone_number' => $request->input('phone_number'), // Uncomment jika ada
            ]
        );

        // 3. Kirim Email Verifikasi
        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->back()->with('success', 'Registrasi berhasil! Silahkan cek email untuk verifikasi akun.');
    }

    /**
     * Tangani verifikasi email.
     */
    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return view('auth.verify-success')->with('message', 'Token tidak valid.');
        }

        $user->update([
            'is_verified'=> true,
            'verification_token' => null,
            'email_verified_at'=> now(),
        ]);

        return view('auth.verify-success')->with('message', 'Email berhasil diverifikasi! Silahkan login.');
    }
}