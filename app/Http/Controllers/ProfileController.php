<?php

namespace App\Http\Controllers;

use App\Mail\VerifyNewEmail;
use App\Models\Buyer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $buyer = $user->buyer;

        // Ambil semua order buyer dengan relasi details & product & seller
        $orders = Order::with(['details.product', 'seller'])
            ->where('buyer_id', $buyer->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.profile.profile', compact('user', 'buyer', 'orders'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $buyer = $user->buyer;

        $request->validate([
            'fullname' => 'required|string|max:150',
            'phone_number' => 'nullable|string|max:20',
            'name' => 'required|string|max:100',
        ]);

        $user->update([
            'name' => $request->name,
        ]);

        $buyer->update([
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePhoto(Request $request)
    {
        $user = auth()->user();
        $buyer = Buyer::where('user_id', $user->id)->first();

        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        // Hapus foto lama
        // return $buyer;
        if ($buyer->img) {
            Storage::disk('public')->delete('profile_photos/'.$buyer->img);
        }

        // Buat nama file sesuai nama buyer
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filename = str_replace(' ', '_', strtolower($buyer->fullname)).'.'.$extension;

        // Simpan foto dengan nama yang kita tentukan
        $request->file('photo')->storeAs('profile_photos', $filename, 'public');

        // Simpan NAMA FILE saja di database
        $buyer->update(['img' => $filename]);
        // return $filename;
        // return $buyer;

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();

        // Jika user tidak memiliki password (akun Google)
        $isNewPassword = is_null($user->password);

        if ($isNewPassword) {

            // Validasi tanpa old_password
            $request->validate([
                'new_password' => 'required|min:8|confirmed',
            ]);

            // Set password baru pertama kali
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return back()->with('success', 'Password berhasil dibuat! Sekarang kamu bisa login pakai email + password.');
        }

        // Jika user sudah punya password → validasi full
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Cek old password
        if (! Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        // Update password biasa
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }

    public function requestChangeEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|unique:users,email|unique:users,new_email',
        ]);

        $user = auth()->user();

        $token = Str::random(40);

        $user->update([
            'new_email' => $request->new_email,
            'new_email_verification_token' => $token,
            'new_email_requested_at' => now(),
        ]);

        $verificationUrl = route('profile.verifyNewEmail', $token);

        Mail::to($request->new_email)->send(new VerifyNewEmail($user, $verificationUrl));

        return back()->with('success', 'Email verifikasi sudah dikirim. Silakan cek inbox Anda.');
    }

    public function verifyNewEmail($token)
    {
        $user = User::where('new_email_verification_token', $token)->first();

        // return'test';
        if (! $user) {
            return redirect()->route('profile')
                ->with('error', 'Token tidak valid.');
        }

        if ($user->new_email_requested_at < now()->subMinutes(60)) {
            return redirect()->route('profile')
                ->with('error', 'Token sudah kedaluwarsa.');
        }

        $user->update([
            'email' => $user->new_email,
            'new_email' => null,
            'new_email_verification_token' => null,
            'new_email_requested_at' => null,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('profile')
            ->with('success', 'Email berhasil diperbarui & sudah diverifikasi!');
    }

    public function deleteAccount(Request $request)
    {
        $user = auth()->user();

        // Hapus foto profil jika ada
        if ($user->buyer && $user->buyer->img) {
            Storage::disk('public')->delete('profile_photos/'.$user->buyer->img);
        }

        // Hapus data buyer (relasi)
        if ($user->buyer) {
            $user->buyer->delete();
        }

        // Hapus user
        $user->delete();
        // Logout user
        Auth::logout();

        // Redirect ke landing page
        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }




    // ini untuk yang seller

    





}
