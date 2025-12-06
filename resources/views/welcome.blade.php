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
    /* ======= GLOBAL ======= */
body {
    font-family: 'Inter', sans-serif;
    background: #f4f7fa;
    color: #1e293b;
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
}

/* ======= NAVBAR ======= */
.navbar {
    background: rgba(14, 22, 36, 0.85);
    backdrop-filter: blur(14px);
    padding: 15px 0;
    transition: 0.3s ease;
}

.navbar-brand {
    font-weight: 800;
    color: #ffffff !important;
    display: flex;
    font-size: 2rem;
    align-items: center;
    gap: 10px;
}

.navbar-brand img {
    width: 40px;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.25));
    color: white;
}

.nav-link {
    color: #e2e8f0 !important;
    font-weight: 600;
    transition: 0.2s;
}

.nav-link:hover {
    color: #60a5fa !important;
}

.btn-primary {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    border: none;
    box-shadow: 0px 4px 14px rgba(37, 99, 235, 0.3);
    transition: 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1d4ed8, #1e40af);
}

.btn-outline-primary {
    border: 2px solid #2563eb;
    color: #2563eb;
    transition: 0.3s ease;
}

.btn-outline-primary:hover {
    background: #2563eb;
    color: white;
}

/* ======= HERO ======= */
.hero {
    background: radial-gradient(circle at top, #0e1624, #0a1220 60%, #0a1220);
    padding: 180px 20px 150px;
    color: white;
    text-align: center;
    position: relative;
}

/* LIGHT GLOW */
.hero::before {
    content: "";
    position: absolute;
    top: -120px;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(59,130,246,0.25), transparent 70%);
    filter: blur(80px);
    z-index: 0;
}

.hero-glass {
    background: rgba(255, 255, 255, 0.08);
    padding: 50px 40px;
    border-radius: 24px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    display: inline-block;
    z-index: 2;
    position: relative;
    animation: fadeUp 1.5s ease;
}

.hero h1 {
    font-weight: 900;
    font-size: 3.6rem;
    letter-spacing: -1px;
}

.hero p {
    margin-top: 15px;
    color: #cdd5e1;
    font-size: 1.25rem;
}

/* ANIMATION */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ======= FEATURES ======= */
.feature-card {
    padding: 40px 25px;
    border-radius: 25px;
    background: white;
    box-shadow: 0 6px 30px rgba(0,0,0,0.07);
    transition: 0.35s ease;
    text-align: center;
    border: 1px solid #e5e7eb;
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.12);
}

.feature-card i {
    font-size: 55px;
    color: #2563eb;
    margin-bottom: 15px;
}

.feature-card h5 {
    color: #0f172a;
    font-weight: 700;
}

.feature-card p {
    color: #64748b;
}

/* ======= KATEGORI / PROMO ======= */
.promo-card {
    border-radius: 20px;
    overflow: hidden;
    background: white;
    box-shadow: 0 10px 35px rgba(0,0,0,0.07);
    transition: 0.35s ease;
}

.promo-card:hover {
    transform: scale(1.03);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

.promo-card img {
    width: 100%;
    height: 230px;
    object-fit: cover;
}

/* ======= TESTIMONIAL ======= */
.testimonial-card {
    background: white;
    padding: 35px 25px;
    border-radius: 20px;
    box-shadow: 0 6px 24px rgba(0,0,0,0.08);
    border: 1px solid #e2e8f0;
    transition: 0.35s;
    text-align: center;
}

.testimonial-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 40px rgba(0,0,0,0.12);
}

.testimonial-card i {
    color: #2563eb;
}

/* ======= FOOTER ======= */
footer {
    background: #0e1624;
    padding: 60px 0 25px;
    color: #cbd5e1;
    text-align: center;
}

footer a {
    color: #60a5fa;
}

footer a:hover {
    text-decoration: underline;
}

footer i {
    color: #60a5fa;
    transition: 0.3s ease;
}

footer i:hover {
    transform: scale(1.2);
}

</style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
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
    <section class="hero">
        <div class="hero-glass">
            <h1>Marketplace Modern dengan<br>Desain Premium</h1>
            <p>Belanja lebih nyaman, aman, dan lebih keren dari marketplace lainnya.</p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-5">Masuk</a>
            </div>
        </div>
    </section>

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
