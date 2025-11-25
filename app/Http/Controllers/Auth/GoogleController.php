<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Buyer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect ke Google untuk autentikasi.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Callback setelah login Google.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $avatar = $googleUser->getAvatar(); 

            // 1. Update atau buat user baru di tabel 'users' berdasarkan email
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'is_verified' => true,
                    'email_verified_at' => now(),
                    'role' => 'buyer',
                    'avatar'=> $avatar
                ]
            );
            
            // 2. Cek dan buat entri buyer jika belum ada.
            // Jika user sudah ada, ini hanya akan mengambil data Buyer yang sudah ada.
            // Jika user baru, ini akan membuat entri Buyer baru.
            Buyer::firstOrCreate( // <-- PERUBAHAN UTAMA DI SINI
                ['user_id' => $user->id], // Kriteria pencarian: cek apakah user_id sudah ada
                ['fullname' => $user->name] // Data yang akan dibuat jika tidak ditemukan
            );

            // 3. Login user
            Auth::login($user);
            
            // Note: Mengirim email verifikasi setiap kali login Google mungkin tidak perlu, 
            // karena is_verified sudah diatur true di atas. Namun, saya biarkan sesuai kode asli Anda.
            Mail::to($user->email)->send(new VerifyEmail($user));

            return redirect()->back()->with('success', 'Registrasi berhasil! Silahkan cek email untuk verifikasi akun.');

            // return redirect()->route('home'); // redirect ke halaman home
        } catch (\Exception $e) {
            // Anda bisa log $e untuk debugging lebih lanjut
            // \Log::error("Google Login Error: " . $e->getMessage()); 
            
            return redirect()->route('login')->with('error', 'Gagal login dengan Google.');
        }
    }
}