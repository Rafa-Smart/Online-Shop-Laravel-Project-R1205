<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SellerProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $seller = $user->seller;

        // Ambil semua order yang masuk ke toko seller
        $orders = Order::with(['details.product', 'buyer'])
            ->where('seller_id', $seller->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('SellerDashboard.profile.profile', compact('user', 'seller', 'orders'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $seller = $user->seller;

        $request->validate([
            'store_name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:20',
            'name' => 'required|string|max:100',
        ]);

        // Update user name
        $user->update([
            'name' => $request->name,
        ]);

        // Update seller data
        $seller->update([
            'store_name' => $request->store_name,
            'description' => $request->description,
            'phone_number' => $request->phone_number,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePhoto(Request $request)
    {
        $user = auth()->user();
        $seller = $user->seller;

        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        // Hapus foto lama jika ada
        if ($seller->img) {
            Storage::disk('public')->delete('profile_photos/'.$seller->img);
        }

        // Nama file sesuai nama toko
        $extension = $request->photo->getClientOriginalExtension();
        $filename = str_replace(' ', '_', strtolower($seller->store_name)).'.'.$extension;

        // Simpan
        $request->photo->storeAs('profile_photos', $filename, 'public');

        $seller->update([
            'img' => $filename,
        ]);

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();
        $isNew = is_null($user->password);

        if ($isNew) {
            $request->validate([
                'new_password' => 'required|min:8|confirmed',
            ]);

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return back()->with('success', 'Password berhasil dibuat!');
        }

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }

    public function deleteAccount()
    {
        $user = auth()->user();
        $seller = $user->seller;

        // Hapus foto jika ada
        if ($seller && $seller->img) {
            Storage::disk('public')->delete('profile_photos/'.$seller->img);
        }

        // Hapus seller
        if ($seller) {
            $seller->delete();
        }

        // Hapus user
        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}
