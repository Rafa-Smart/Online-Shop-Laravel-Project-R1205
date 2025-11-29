<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <p>Memproses pembayaran — akan membuka popup Midtrans...</p>

    <script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        (function() {
            var snapToken = @json($snapToken);
            if (!snapToken) {
                alert('Gagal membuat pembayaran. Silakan coba lagi.');
                window.location.href = "{{ route('home') }}";
                return;
            }

            snap.pay(snapToken, {
                onSuccess: function(result){
                    // bisa diarahkan ke halaman success
                    window.location.href = "/payment/success";
                },
                onPending: function(result){
                    window.location.href = "/payment/pending";
                },
                onError: function(result){
                    window.location.href = "/payment/error";
                },
                onClose: function(){
                    // jika user close popup
                    window.location.href = "/payment/pending";
                }
            });
        })();
    </script>
</body>
</html>
