<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di KhadafiShop</title>

    <!-- Link ke Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Custom CSS -->
    <style>
        body {
            background: linear-gradient(to bottom, #ebf8ff, #ffffff);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        header {
            flex-grow: 1;
            text-align: center;
            padding: 120px 20px 60px;
        }

        header h2 {
            color: #2563eb;
            font-weight: 800;
            font-size: 2.8rem;
        }

        header span {
            color: #3b82f6;
        }

        .feature-card {
            transition: all 0.3s ease;
            border-radius: 20px;
        }

        .feature-card:hover {
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }

        footer {
            background: white;
            border-top: 1px solid #ddd;
            padding: 20px 0;
        }

        .illustration {
            width: 220px;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-light">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <h1 class="fw-bold fs-3 text-primary">KhadafiShop</h1>
            <div>
                <a href="{{ route('login') }}" class="text-dark fw-medium me-4">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary fw-semibold px-4">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header>
        <div class="container">
            <h2>Belanja & Jualan Mudah di <span>KhadafiShop</span></h2>
            <p class="text-muted fs-5 mt-3 mb-4">
                Temukan berbagai produk menarik dari penjual terpercaya.  
                Mulailah perjalanan belanja online yang nyaman dan aman bersama kami.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg shadow-sm">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">Masuk</a>
            </div>
            <div class="mt-5">
                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/online-shopping-6339455-5218443.png" 
                     alt="Ilustrasi belanja online" class="illustration">
            </div>
        </div>
    </header>

    <!-- Feature Highlights -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="bg-white p-4 shadow-sm feature-card">
                        <img src="https://cdn-icons-png.flaticon.com/512/4341/4341139.png" alt="Cepat" width="60" class="mb-3">
                        <h5 class="fw-bold text-primary">Transaksi Cepat</h5>
                        <p class="text-muted small">Nikmati proses belanja dan jualan dengan sistem pembayaran yang cepat dan aman.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bg-white p-4 shadow-sm feature-card">
                        <img src="https://cdn-icons-png.flaticon.com/512/4144/4144727.png" alt="Produk" width="60" class="mb-3">
                        <h5 class="fw-bold text-primary">Produk Terpercaya</h5>
                        <p class="text-muted small">Semua produk telah diverifikasi untuk memastikan kualitas terbaik bagi Anda.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bg-white p-4 shadow-sm feature-card">
                        <img src="https://cdn-icons-png.flaticon.com/512/1041/1041916.png" alt="Dukungan" width="60" class="mb-3">
                        <h5 class="fw-bold text-primary">Dukungan 24/7</h5>
                        <p class="text-muted small">Tim kami siap membantu Anda kapan pun dibutuhkan, setiap hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <p class="text-muted small mb-0">
            © {{ date('Y') }} <span class="fw-semibold text-primary">KhadafiShop</span>. Semua hak dilindungi.
        </p>
    </footer>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
