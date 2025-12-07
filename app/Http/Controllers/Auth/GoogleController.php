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

        Buyer::firstOrCreate(
            ['user_id' => $user->id],
            ['fullname' => $user->name]
        );

        // Login user
        Auth::login($user);

        //  Jangan kirim email verifikasi ke user Google
        // Mail::to($user->email)->send(new VerifyEmail($user));

        //  Arahkan langsung ke home
        return redirect()->route('home');

    } catch (\Exception $e) {
        \Log::error("Google Login Error: " . $e->getMessage());         
        return redirect()->route('login')->with('error', 'Gagal login dengan Google.');
    }
}

}