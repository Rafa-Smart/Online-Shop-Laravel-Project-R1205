<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('SellerDashboard.contact'); // sesuaikan dengan nama file kamu
    }
    public function indexForBuyer()
    {
        return view('pages.contact'); // sesuaikan dengan nama file kamu
    }

    public function send(Request $request)
    {
        // VALIDATION
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // KIRIM EMAIL KE EMAIL ADMIN (diganti sesuai kebutuhanmu)
        $adminEmail = "rafatesting1@gmail.com";

        Mail::to($adminEmail)->send(new ContactMail($validated));

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }  
}
