<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Success</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Animasi Card Muncul */
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi Check Icon */
        .pop {
            animation: pop 0.5s ease-out forwards;
        }

        @keyframes pop {
            0% { transform: scale(0); }
            70% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8 fade-in">

        <!-- Icon sukses -->
        <div class="flex justify-center mb-6">
            <div class="bg-green-100 text-green-600 rounded-full p-4 pop">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
            Pembayaran Berhasil!
        </h2>

        <!-- Subjudul -->
        <p class="text-center text-gray-600 mb-6">
            Terima kasih! Pembayaran Anda telah diproses dengan sukses.
        </p>

        <!-- Informasi order -->
        <div class="bg-gray-50 rounded-xl p-4 mb-6 border border-gray-200">
            <p class="text-gray-700">
                <span class="font-semibold">Status:</span>
                <span class="text-green-600 font-semibold">{{ ucfirst($status ?? 'success') }}</span>
            </p>

            @if(isset($order_id))
            <p class="text-gray-700 mt-2">
                <span class="font-semibold">Order ID:</span>
                <span class="text-gray-900">{{ $order_id }}</span>
            </p>
            @endif
        </div>

        <!-- Tombol -->
        <div class="flex justify-center">
            <a href="/home"
               class="bg-blue-600 hover:bg-blue-700 text-white py-2.5 px-6 rounded-xl shadow-md transition-all">
               Kembali ke Home
            </a>
        </div>

    </div>

</body>
</html>
