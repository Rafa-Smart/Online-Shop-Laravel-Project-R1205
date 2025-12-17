@extends('layouts.app')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gray-100 p-6">
    <div class="bg-white shadow-xl rounded-xl p-8 max-w-lg text-center border-t-4 border-yellow-500">

        <div class="mb-4">
            <svg width="70" height="70" fill="#FBBF24" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm.75 5v6.25H8.5v1.5h5.25V7h-1z"/>
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">Pembayaran Pending</h2>
        <p class="text-gray-600 mb-6">
            Pembayaran Anda telah dibuat, tetapi <strong>belum diselesaikan</strong>.
            Silakan selesaikan pembayaran sesuai instruksi dari Midtrans.
        </p>

        <a href="{{ url('/') }}"
           class="inline-block bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 transition">
           Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
