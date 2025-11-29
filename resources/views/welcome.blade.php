<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di KhadafiShop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 800;
            color: #0e1624;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand img {
            width: 40px;
        }

        .nav-link {
            color: #0e1624 !important;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #0e1624;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #16253c;
        }

        .btn-outline-primary {
            border-color: #0e1624;
            color: #0e1624;
        }

        .btn-outline-primary:hover {
            background-color: #0e1624;
            color: white;
        }

        /* Hero */
        header {
            background: linear-gradient(135deg, #0e1624 0%, #1f2d45 100%);
            color: white;
            text-align: center;
            padding: 160px 20px 100px;
        }

        header h1 {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
        }

        header span {
            color: #3b82f6;
        }

        header p {
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 40px;
            color: #d1d5db;
        }

        .illustration {
            width: 300px;
            margin-top: 40px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* Feature Cards */
        .feature-card {
            border-radius: 20px;
            padding: 40px 20px;
            transition: all 0.4s ease;
            background: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }

        .feature-card i {
            font-size: 50px;
            color: #0e1624;
        }

        .feature-card h5 {
            color: #0e1624;
            font-weight: 700;
            margin-top: 15px;
        }

        .feature-card p {
            color: #6b7280;
            margin-top: 10px;
        }

        /* Promo / Categories */
        .promo-card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .promo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

        .promo-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Testimonial */
        .testimonial-card {
            background: #f1f5f9;
            padding: 30px 20px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .testimonial-card i {
            color: #3b82f6;
        }

        /* Footer */
        footer {
            background: #0e1624;
            color: #d1d5db;
            padding: 50px 0 20px;
            text-align: center;
        }

        footer a {
            color: #3b82f6;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.2rem;
            }

            .illustration {
                width: 200px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="Logo">
                KhadafiShop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item ms-3"><a href="{{ route('register') }}" class="btn btn-primary">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header>
        <div class="container">
            <h1>Belanja & Jualan Mudah di <span>KhadafiShop</span></h1>
            <p>Temukan berbagai produk menarik dari penjual terpercaya. Mulailah perjalanan belanja online yang nyaman dan aman bersama kami.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-5">Masuk</a>
            </div>
        
        </div>
    </header>

    <!-- Feature Highlights -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kenapa Memilih KhadafiShop?</h2>
                <p class="text-muted">Nikmati pengalaman belanja online yang mudah, cepat, dan aman</p>
            </div>
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-bolt"></i>
                        <h5>Transaksi Cepat</h5>
                        <p>Nikmati proses belanja dan jualan dengan sistem pembayaran yang cepat dan aman.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-box"></i>
                        <h5>Produk Terpercaya</h5>
                        <p>Semua produk telah diverifikasi untuk memastikan kualitas terbaik bagi Anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-headset"></i>
                        <h5>Dukungan 24/7</h5>
                        <p>Tim kami siap membantu Anda kapan pun dibutuhkan, setiap hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo / Kategori -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kategori Produk Populer</h2>
                <p class="text-muted">Temukan produk favorit Anda dengan mudah</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="promo-card">
                        <img src="{{ asset('img/produk-elektronik.jpg') }}" alt="Elektronik">
                        <div class="p-3 text-center">
                            <h5>Elektronik</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="promo-card">
                        <img src="{{ asset('img/produk-fashion.jpg') }}" alt="Fashion">
                        <div class="p-3 text-center">
                            <h5>Fashion</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="promo-card">
                        <img src="{{ asset('img/produk-mainan.jpg') }}" alt="Mainan">
                        <div class="p-3 text-center">
                            <h5>Mainan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Apa Kata Pelanggan Kami</h2>
                <p class="text-muted">Kami selalu memberikan layanan terbaik untuk semua pelanggan</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card text-center">
                        <i class="fas fa-quote-left fa-2x mb-3"></i>
                        <p>"Belanja di KhadafiShop sangat mudah dan cepat. Produk yang dikirim selalu sesuai dengan gambar."</p>
                        <h6 class="fw-bold mt-3">- Siti Aminah</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card text-center">
                        <i class="fas fa-quote-left fa-2x mb-3"></i>
                        <p>"Customer service yang ramah dan responsif. Saya selalu puas berbelanja di sini."</p>
                        <h6 class="fw-bold mt-3">- Rudi Santoso</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card text-center">
                        <i class="fas fa-quote-left fa-2x mb-3"></i>
                        <p>"Transaksi cepat dan aman. Produk sampai tepat waktu dengan kualitas yang bagus."</p>
                        <h6 class="fw-bold mt-3">- Dewi Lestari</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© {{ date('Y') }} <a href="#">KhadafiShop</a>. Semua hak dilindungi.</p>
            <div class="mt-3">
                <i class="fab fa-facebook-f me-3"></i>
                <i class="fab fa-twitter me-3"></i>
                <i class="fab fa-instagram me-3"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
