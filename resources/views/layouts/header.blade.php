<style>
    /* 🌟 Teks dan ikon pada tombol All Categories */

    .content-section {
        background-color: whitesmoke !important;
    }
    .navbar-toggler h4,
    .navbar-toggler i {
        color: #ffffff !important;
        /* putih elegan */
        transition: color 0.3s ease;
    }

    /* Efek hover agar tetap elegan */
    .navbar-toggler:hover h4,
    .navbar-toggler:hover i {
        color: #1e90ff !important;
        /* biru terang saat hover */
    }

    /* 🌟 FONT & RESET */
    body {
        font-family: "Poppins", sans-serif;
        /* background-color: #edf6f9 !important; */
        /* ✅ Konten utama: putih bersih */
        color: #212529;
        /* teks default abu gelap profesional */
    }

    /* 🌌 Navbar utama seluruh baris */
    .nav-bar,
    .nav-bar .row {
        background-color: #0e1624 !important;
        /* biru tua elegan */
        color: #ffffff !important;
        border: none !important;
    }

    /* 🌌 NAVBAR & FOOTER THEME */
    .nav-bar,
    .navbar,
    footer {
        background-color: #0e1624 !important;
        /* biru gelap elegan */
        color: #ffffff !important;
    }

    /* 🔹 Navbar Link Styling */
    .navbar .nav-link {
        color: #ffffff !important;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .navbar .nav-link:hover,
    .navbar .nav-link.active {
        color: #1e90ff !important;
    }

    /* 🔹 Brand Title */
    .navbar-brand h1,
    .navbar-brand .display-5 {
        color: #ffffff !important;
    }

    /* 🔹 Tombol nomor telepon / tombol di navbar */
    .btn-secondary {
        background-color: #1e90ff !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #187bcd !important;
    }

    /* 🌟 Profil & Dropdown */
    .profile-img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
        transition: all 0.25s ease-in-out;
        border: 2px solid #1e90ff;
    }

    .profile-wrapper:hover .profile-img {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(30, 144, 255, 0.5);
    }

    .dropdown-menu {
        background-color: #0e1624;
        border: 1px solid #1e2a3d;
        color: #f8f9fa;
        animation: fadeIn 0.25s ease-in-out;
        border-radius: 8px;
    }

    .dropdown-item {
        color: #adb5bd !important;
        transition: all 0.2s ease-in-out;
    }

    .dropdown-item:hover {
        background-color: #273043 !important;
        color: #1e90ff !important;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 🌟 Konten utama (card, produk, dsb) */
    .content-section {
        background-color: #ffffff;
        color: #212529;
        padding: 50px 0;
    }

    /* 🔹 Tombol utama di konten */
    .btn-primary {
        background-color: #1e90ff !important;
        border: none !important;
        color: #fff !important;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #187bcd !important;
    }

    /* 🔹 Input di konten */
    .form-control,
    .form-select {
        background-color: #ffffff;
        border: 1px solid #ced4da;
        color: #212529;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #1e90ff;
        box-shadow: 0 0 5px rgba(30, 144, 255, 0.4);
    }

    /* 🔹 Tombol "All Categories" */
    .navbar-light.position-relative {
        background-color: #0e1624 !important;
        color: #ffffff !important;
        border: 1px solid #1e2a3d !important;
        border-radius: 6px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    }

    /* Tombol toggler All Categories */
    .navbar-light.position-relative .navbar-toggler {
        background-color: #0e1624 !important;
        color: #ffffff !important;
        border: 1px solid #1e2a3d;
        border-radius: 8px;
        padding: 10px 12px;
        transition: all 0.3s ease;
    }

    .navbar-light.position-relative .navbar-toggler:hover {
        background-color: #1a2740 !important;
        color: #1e90ff !important;
        border-color: #1e90ff !important;
    }

    /* 🔹 Dropdown kategori */
    #allCat {
        background-color: #0e1624 !important;
        border: 1px solid #1e2a3d;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 5px 12px rgba(0, 0, 0, 0.3);
    }

    /* 🔹 Item di dalam daftar kategori */
    .categorie-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 14px;
        border-bottom: 1px solid #1e2a3d;
        transition: background-color 0.25s ease;
    }

    .categorie-bar:last-child {
        border-bottom: none;
    }

    .categorie-bar a {
        color: #ffffff !important;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .categorie-bar a:hover {
        color: #1e90ff !important;
    }

    .categorie-bar span {
        color: #b0c4ff;
        font-size: 14px;
    }

    .categorie-bar:hover {
        background-color: #1a2740;
    }

    /* 🔹 Tombol biru elegan */
    .btn-blue-elegant {
        background-color: #1e90ff !important;
        /* biru elegan */
        color: #ffffff !important;
        /* teks putih */
        border: none !important;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-blue-elegant:hover {
        background-color: #187bcd !important;
        /* biru lebih gelap saat hover */
        color: #ffffff !important;
        box-shadow: 0 0 10px rgba(30, 144, 255, 0.5);
    }

    /* 🔹 Warna biru brand utama */
    .text-brand-blue {
        color: #1e90ff !important;
        /* biru elegan */
    }

    /* 🔹 Gaya teks brand */
    .navbar-brand h1 {
        color: #ffffff !important;
        /* teks putih */
        font-weight: 600;
        letter-spacing: 1px;
    }

    /* 🔹 Tombol biru elegan (search button) */
    .btn-blue-elegant {
        background-color: #1e90ff !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 50px !important;
        transition: all 0.3s ease;
    }

    .btn-blue-elegant:hover {
        background-color: #187bcd !important;
        box-shadow: 0 0 8px rgba(30, 144, 255, 0.5);
    }

    /* 🔹 Ikon kanan atas */
    .icon-link {
        color: #ffffff !important;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .icon-link:hover {
        color: #1e90ff !important;
        transform: scale(1.1);
    }

    .categorie-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .categorie-bar a {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .categorie-bar span {
        color: #777;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    /* 🌟 Efek Hover Biru Elegan */
    .categorie-bar:hover {
        background-color: #007bff;
        /* biru elegan */
    }

    .categorie-bar:hover a,
    .categorie-bar:hover span {
        color: #fff;
        /* teks jadi putih */
    }

    /* 🌟 Header Elegan */
    .header-elegant {
        background: #0d1b2a;
        /* biru tua elegan */
        color: white;
    }

    /* 🔹 Brand text dan ikon */
    .brand-text {
        font-size: 2rem;
        color: #ffffff;
        letter-spacing: 1px;
    }

    .brand-icon {
        color: #1e90ff;
        /* biru cerah */
    }

    /* 🔹 Ikon kanan */
    . {
        color: #ffffff;
        font-size: 1px;
        transition: all 0.3s ease;
    }

    .:hover {
        color: #1e90ff;
        transform: scale(1.15);
    }

    /* 🔹 Text pada keranjang */
    .cart-text {
        color: #ffffff;
        font-weight: 500;
    }

    /* 🔹 Tombol biru elegan (re-useable) */
    .btn-blue-elegant {
        background-color: #007bff;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-blue-elegant:hover {
        background-color: #0056b3;
        transform: scale(1.03);
    }

    /* 🌟 Search Bar Elegan */
    .search-bar-elegant {
        background: #ffffff;
        border: 1.5px solid #1e90ff;
        border-radius: 50px;
        box-shadow: 0 0 12px rgba(30, 144, 255, 0.15);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .search-bar-elegant:focus-within {
        box-shadow: 0 0 14px rgba(30, 144, 255, 0.3);
        border-color: #1e90ff;
    }

    /* 🔹 Input */
    .search-input {
        padding: 6px 10px;
        font-size: 16px;
        color: #212529;
        background: transparent;
    }

    .search-input::placeholder {
        color: #6c757d;
    }

    /* 🔹 Dropdown */
    .search-select {
        width: 200px;
        font-size: 15px;
        color: #0d1b2a;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .search-select:hover {
        background-color: #e9f3ff;
    }

    /* 🔹 Tombol Search */
    .search-btn {
        padding: 12px 25px;
        background: #1e90ff;
        border: none;
        color: white;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        background: #187bcd;
        box-shadow: 0 0 10px rgba(30, 144, 255, 0.4);
        transform: scale(1.05);
    }

    .brand-text {
        color: #ffffff;
    }

    .brand-icon {
        color: #1e90ff;
    }

    /* Warna dan efek ikon kanan */
    . {
        color: #ffffff;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .:hover {
        color: #1e90ff;
        transform: scale(1.1);
    }

    /* Profil elegan */
    .profile-img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        transition: all 0.25s;
        border-radius: 50%;
        border: 2px solid #1e90ff;
    }

    .profile-wrapper:hover .profile-img {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(30, 144, 255, 0.5);
    }

    /* Dropdown */
    .dropdown-menu {
        background: #ffffff;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: #1e90ff;
        color: #fff;
    }

    .dropdown-item i {
        width: 20px;
        text-align: center;
    }

    .navbar-toggler {
        border: none;
        /* hilangkan border default */
        background: transparent;
        /* biar tidak ada warna latar */
    }

    .navbar-toggler .fa-bars {
        color: white;
        /* 🔥 ubah warna ikon jadi putih */
        font-size: 22px;
        transition: color 0.3s ease;
    }

    /* Efek saat hover */
    .navbar-toggler:hover .fa-bars {
        color: #cccccc;
        /* sedikit abu-abu saat diarahkan */
    }

    .search-wrapper {
        position: relative;
        transition: all 0.3s ease;
    }

    /* 🩵 Form utama */
    .search-form {
        margin-top: 1.3rem;
        background: #fff;
        border-radius: 50px;
        height: 40px;
        transition: box-shadow 0.3s ease, transform 0.2s ease;
    }

    .search-form:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    /* 📂 Dropdown kategori */
    .category-select {
        width: 160px;
        font-size: 0.9rem;
        background: transparent;
        cursor: pointer;
        color: #555;
    }

    .category-select:focus {
        box-shadow: none;
        outline: none;
    }

    /* 🔍 Input pencarian */
    .search-input {
        font-size: 0.95rem;
        color: #333;
    }

    .search-input:focus {
        outline: none;
        box-shadow: none;
    }

    /* 💠 Tombol Search */
    .btn-search {
        background-color: #1a2740;
        border: none;
        color: #fff;
        width: 60px;
        height: 48px;
        border-radius: 50%;
        margin-right: 0px;
        transition: all 0.3s ease;
        font-size: 1rem;
        position: relative;
        left: 7;
    }

    .btn-search:hover {
        transform: scale(1.05);
    }


    /* Responsif */
    @media (max-width: 768px) {
        .category-select {
            display: none;
        }

        .search-form {
            height: 50px;
        }

        .btn-search {
            width: 100px;
            height: 44px;
        }
    }

    :root {
        --primary-blue: #1a2740;
        --accent-blue: #0099ff;
    }

    /* ✨ Wrapper utama */
    .elegant-navbar-icons {
        background: transparent;
    }

    /* 💠 Ikon elegan */
    . {
        color: #dfe6f2;
        font-size: 20px;
        position: relative;
        transition: all 0.3s ease;
    }

    .:hover {
        color: var(--accent-blue);
        transform: translateY(-2px);
        text-shadow: 0 0 10px rgba(0, 153, 255, 0.4);
    }

    /* 🔔 Badge notifikasi kecil */
    .badge-cart {
        position: absolute;
        left: 14px;
        bottom: -244px;
        background: var(--accent-blue);
        color: #fff;
        font-size: 9px;
        font-weight: 600;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 10px rgba(0, 153, 255, 0.5);
    }

    /* 🧿 Profil */
    .profile-img {
        width: 42px;
        height: 42px;
        object-fit: cover;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-img:hover {
        transform: scale(1.08);
        box-shadow: 0 0 15px rgba(0, 153, 255, 0.4);
    }

    /* 📋 Dropdown elegan */
    .elegant-dropdown {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.05);
        backdrop-filter: blur(6px);
        animation: fadeIn 0.3s ease;
    }

    /* 🌊 Efek animasi muncul dropdown */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 🔹 Efek hover di dalam dropdown */
    .hover-blue:hover {
        background: rgba(26, 39, 64, 0.05);
        color: var(--accent-blue);
        transform: translateX(4px);
        transition: all 0.3s ease;
    }

    .hover-red:hover {
        background: rgba(255, 0, 0, 0.05);
        color: #e63946 !important;
        transform: translateX(4px);
    }

    /* 🌈 Dropdown icon */
    .dropdown-item i {
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .dropdown-item:hover i {
        transform: rotate(10deg);
        color: var(--accent-blue);
    }

    /* 📱 Responsif */
    @media (max-width: 576px) {
        .profile-img {
            width: 36px;
            height: 36px;
        }

        . {
            font-size: 18px;
            margin-right: 0.6rem;
        }

        .ms-2.d-none.d-xl-block {
            display: none !important;
        }
    }

    . {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: whitesmoke;
        /* warna ikon */
        background: transparent;
        /* hilangkan background */
        border-radius: 0;
        /* hilangkan lingkaran */
        width: auto;
        /* biar ukurannya menyesuaikan ikon */
        height: auto;
        font-size: 20px;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: none;
        /* hilangkan shadow */
        margin-right: 5px;
    }

    .:hover {
        color: #1e90ff;
        /* efek hover warna */
        transform: scale(1.1);
        /* efek hover */
    }


    /* Badge notifikasi */
    .badge-cart {
        position: absolute;
        top: -7px;
        right: 7px;
        background: #ff4757;
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        padding: 2px 6px;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }




    .notif-dropdown {
        display: none;
        position: absolute;
        top: 110%;
        right: 0;
        width: 300px;
        background: white;
        z-index: 9999999;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .:hover .notif-dropdown {
        display: block;
        z-index: 9999999;
    }

    /* Pastikan ini ada atau sesuaikan dengan gaya framework Anda */
. {
    /* Gaya untuk ikon utama */
    color: #495057; /* Contoh warna ikon */
    font-size: 1.2rem;
    position: relative; /* Penting untuk positioning dropdown */
    display: inline-block;
}

. i {
    transition: color 0.2s;
}

.:hover i {
    color: #007bff; /* Contoh warna hover */
}

.badge-cart {
    /* Gaya untuk badge notifikasi (lingkaran merah) */
    position: absolute;
    top: -5px;
    right: -10px;
    padding: 3px 6px;
    border-radius: 50%;
    background-color: #dc3545; /* Merah */
    color: white;
    font-size: 0.7em;
    font-weight: bold;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    z-index: 10;
}

.dropdown-menu {
    /* Kelas umum untuk popup (notifikasi, favorit, keranjang) */
    position: absolute !important;
    top: 100% !important;
    right: 0 !important;
    width: 300px;
    background: white;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 0.5rem;
    z-index: 9999;
}

/* Penyesuaian khusus untuk item di dalam Cart Popup */
.cart-item:last-child {
    border-bottom: none !important;
}


.icon-pokoknya{
    font-size: 19px;
}

 /* Dropdown wrapper */
    .notif-dropdown {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        width: 330px;
        background: #ffffff;
        border-radius: 14px;
        padding: 10px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        z-index: 9999;
        max-height: 430px;
        overflow-y: auto;
        border: 1px solid #eee;
    }

    /* Notif item */
    .notif-item {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.25s ease;
    }

    .notif-item:hover {
        background: #eef2ff;
        border-color: #c7d2fe;
        transform: translateX(3px);
        cursor: pointer;
    }

    .notif-left {
        max-width: 220px;
    }

    .notif-title {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 3px;
    }

    .notif-time {
        font-size: 12px;
        color: #6b7280;
    }

    .badge-status {
        font-size: 11px;
        padding: 2px 6px;
        border-radius: 6px;
        font-weight: 500;
    }

    .badge-approved {
        background: #dcfce7;
        color: #166534;
    }

    .badge-cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .notif-ok-btn {
        background: #4f46e5;
        color: #fff;
        border: none;
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 6px;
        transition: 0.2s;
    }

    .notif-ok-btn:hover {
        background: #4338ca;
    }

    .view-all-btn {
        margin-top: 5px;
        border-radius: 10px;
    }

    
</style>





<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->





<!-- 🌟 Header Elegan -->
<div class="header-elegant container-fluid   d-none d-lg-block">

    <div class="row gx-0 align-items-center text-center">

        <!-- 🔹 Brand / Logo -->
        <div class="col-md-4 col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex align-items-center">
                <a href="#" class="navbar-brand p-0 d-flex align-items-center">
                    <h5 class="display-5 m-0 fw-bold brand-text">
                        <i class="fas fa-shopping-bag me-2 brand-icon"></i> KhadafiShop
                    </h5>
                </a>
            </div>
        </div>

        <!-- 🔹 Search bar -->
        <div class="col-md-8 col-lg-6 mx-auto" >
            <div class="search-wrapper" style="margin-right: 2rem">
                <form action="{{ route('home') }}" method="get"
                    class="search-form d-flex align-items-center rounded-pill shadow-sm bg-white overflow-hidden">

                    <input type="text" class="form-control search-input border-0 px-3 py-2"
                        placeholder="Search for products, brands, or categories..." name="search-input-home"
                        value="{{ request('search-input-home') }}">

                    <button type="submit" class="btn btn-search d-flex align-items-center justify-content-center">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- 🔹 Icons kanan + Dropdown Profil -->
        <div class="col-md-4 col-lg-3 text-center text-lg-end mt-4">
            <div class="d-inline-flex align-items-center elegant-navbar-icons">

                <!-- ❤️ Ikon Notif Pesan dari Seller -->
<div class="icon-pokoknya me-4 position-relative" id="notifContainer" style="cursor:pointer;">
    <i class="fas fa-bell"></i>
    @php
        $notifications = \App\Models\Order::where('buyer_id', auth()->user()->buyer->id)
            ->whereIn('status', ['completed', 'cancelled'])
            ->where('is_read', false)
            ->orderBy('updated_at', 'desc')
            ->get();
        $notifCount = $notifications->count();
        // return $notifications;
    @endphp

    @if ($notifCount > 0)
        <span class="badge-cart">{{ $notifCount }}</span>
    @endif

<style>
    /* Dropdown wrapper */
.notif-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    width: 340px;
    max-height: 440px;
    overflow-y: auto;
    background: #ffffff;
    border-radius: 16px;
    padding: 12px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.18);
    z-index: 9999;
    border: 1px solid #e5e7eb;
}

/* Scrollbar */
.notif-dropdown::-webkit-scrollbar {
    width: 6px;
}
.notif-dropdown::-webkit-scrollbar-thumb {
    background-color: #0e1624;
    border-radius: 3px;
}
.notif-dropdown::-webkit-scrollbar-track {
    background: #f0f2f5;
}

/* Notif item */
.notif-item {
    background: #f3f4f6;
    border-radius: 12px;
    padding: 12px 14px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.25s ease;
}
.notif-item:hover {
    background-color: #e0e7ff;
    transform: translateX(3px);
    cursor: pointer;
}

.notif-left {
    max-width: 220px;
}

.notif-title {
    font-weight: 600;
    font-size: 14px;
    color: #0e1624;
    margin-bottom: 4px;
}

.notif-time {
    font-size: 12px;
    color: #6b7280;
    margin-top: 2px;
}

.badge-status {
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 6px;
    font-weight: 500;
}

.badge-approved {
    background: #dcfce7;
    color: #166534;
}

.badge-cancelled {
    background: #fee2e2;
    color: #991b1b;
}

/* OK button */
.notif-ok-btn {
    background: #0e1624;
    color: #fff;
    border: none;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 8px;
    transition: 0.2s;
}
.notif-ok-btn:hover {
    background: #162438;
}

/* Optional: make last item margin-bottom 0 */
.notif-item:last-child {
    margin-bottom: 0;
}


    /* test */
.wishlist-item:hover {
    background-color: #f0f2f5;
    transform: translateX(2px);
}

/* Badge style */
.badge-cart {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #e4200a;
    color: white;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 7px;
    border-radius: 50%;
    z-index: 10;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}


</style>

<div class="notif-dropdown" id="notifDropdown">
    @forelse($notifications as $order)
        <div class="notif-item" data-id="{{ $order->id }}">
            <div class="notif-left" onclick="window.location.href='{{ route('buyer.notifications.read', $order->id) }}'">
                <div class="notif-title">
                    Order #{{ $order->id }}
                </div>

                <span class="badge-status 
                    {{ $order->status == 'completed' ? 'badge-approved' : 'badge-cancelled' }}">
                    {{ $order->status == 'completed' ? 'Approved' : 'Cancelled' }}
                </span>

                <div class="notif-time">
                    {{ $order->updated_at->diffForHumans() }}
                </div>
            </div>

            <form action="{{ route('buyer.notifications.read', $order) }}" method="POST">
                @csrf
                <button class="notif-ok-btn">OK</button>
            </form>
        </div>
    @empty
        <div class="text-center text-muted p-3">
            No new notifications
        </div>
    @endforelse
</div>

</div>



<div class="icon-pokoknya me-3 position-relative" id="favoriteContainer" style="cursor:pointer;">
    <i class="fas fa-heart" style="color:white; font-size:20px;"></i>
    
    @php
        $wishlist = session('wishlist') ?? collect();
    @endphp

    @if ($wishlist->count() > 0)
        <span class="badge-cart">{{ $wishlist->count() }}</span>
    @endif

    <div class="favorite-dropdown dropdown-menu shadow rounded"
        style="display:none; position:absolute; top:110%; right:0; width:340px; max-height:420px; overflow-y:auto; background:white; z-index:9999999999; padding:12px; box-sizing:border-box; border:2px solid #0e1624;">
        
        @if ($wishlist->count() > 0)
            @foreach ($wishlist as $item)
                <div class="wishlist-item d-flex align-items-start mb-2 p-2 rounded"
                    style="cursor:pointer; transition:all 0.2s;"
                    onclick="window.location='{{ route('product.detail', ['id' => $item->id]) }}'">

                    <img src="{{ $item->image_url ?? asset('img/product-1.png') }}"
                        alt="{{ $item->product_name }}"
                        style="width:55px; height:55px; object-fit:cover; border-radius:6px; margin-right:12px; flex-shrink:0; border:1px solid #0e1624;">

                    <div class="item-details flex-grow-1">
                        <p class="fw-semibold mb-1 text-truncate"
                            style="color:#0e1624; font-size:14px; line-height:1.2;">
                            {{ $item->product_name }}</p>
                        <p class="mb-1" style="font-size:12px; color:#6c757d;">
                            {{ $item->variant_name ?? 'Default' }}</p>

                        <p class="mb-0 fw-bold" style="color:#0e1624; font-size:14px;">
                            Rp{{ number_format($item->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('wishlist.index') }}" class="btn btn-dark w-100 mt-2 py-2"
                style="background-color:#0e1624; border:none; transition:0.3s;">Go to Wishlist</a>
        @else
            <div class="text-center text-muted p-3">Daftar Wishlist masih kosong.</div>
        @endif
    </div>
</div>



<div class="icon-pokoknya me-4 position-relative" id="cartContainer" style="cursor:pointer;">
    <i class="fas fa-cart-plus" style="color:white; font-size:20px;"></i>
    
    @php
        $carts = session('carts') ?? collect();
    @endphp

    @if ($carts->count() > 0)
        <span class="badge-cart">{{ $carts->count() }}</span>
    @endif

    <div class="cart-popup dropdown-menu shadow rounded"
        style="display:none; position:absolute; top:110%; right:0; width:340px; max-height:420px; overflow-y:auto; background:white; z-index:9999999999; padding:12px; box-sizing:border-box; border:2px solid #0e1624;">
        
        @if ($carts->count() > 0)
            @foreach ($carts as $cart)
                <div class="cart-item d-flex align-items-start mb-2 p-2 rounded"
                    style="cursor:pointer; transition:all 0.2s;"
                    onclick="window.location='{{ route('product.detail', ['id' => $cart->product->id]) }}'">

                    <img src="{{ $cart->product->image_url ?? asset('img/product-1.png') }}"
                        alt="{{ $cart->product->product_name }}"
                        style="width:55px; height:55px; object-fit:cover; border-radius:6px; margin-right:12px; flex-shrink:0; border:1px solid #0e1624;">

                    <div class="item-details flex-grow-1">
                        <p class="fw-semibold mb-1 text-truncate"
                            style="color:#0e1624; font-size:14px; line-height:1.2;">
                            {{ $cart->product->product_name }}</p>
                        <p class="mb-1" style="font-size:12px; color:#6c757d;">
                            {{ $cart->product_variant->variant_name ?? 'Default' }}</p>

                        <p class="mb-0 fw-bold" style="color:#0e1624; font-size:14px;">
                            {{ $cart->quantity }} x Rp{{ number_format($cart->product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            @endforeach

            <a onclick="window.location='{{ route('showCarts')}}'" class="btn btn-dark w-100 mt-2 py-2"
                style="background-color:#0e1624; border:none; transition:0.3s;">Go to Cart (Checkout)</a>
        @else
            <div class="text-center text-muted p-3">Your cart is empty.</div>
        @endif
    </div>
</div>
                <!-- 👤 Dropdown Profil -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown">
                        <div class="profile-wrapper position-relative">

                            <img src="{{ asset('storage/profile_photos/' . auth()->user()->buyer->img) }}"
                                class="rounded-circle border border-2 border-info shadow-sm profile-img" width="50"
                                height="50">
                        </div>
                        <div class="ms-2 text-start d-none d-xl-block">
                            <div class="fw-semibold text-white fs-6" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 120px; text-align: center">{{ auth()->user()->buyer->fullname }}</div>
                            <small class="text-light opacity-75 fst-italic">My Account</small>
                        </div>
                    </a>

                    <!-- 📂 Dropdown Menu -->
                    <div class="dropdown-menu dropdown-menu-end mt-3 border-0 shadow-lg rounded-4 p-3 elegant-dropdown">
                        <div class="d-flex align-items-center mb-3">

                            <img src="{{ asset('storage/profile_photos/' . auth()->user()->buyer->img) }}"
                                class="rounded-circle me-2" width="50" height="50">
                            <div>
                                <h6 class="fw-semibold mb-0 text-dark">{{ auth()->user()->buyer->fullname }}</h6>
                                <small class="text-muted">rafa@example.com</small>
                            </div>
                        </div>
                        <hr class="my-2">
                        <a href="{{ route('profile') }}"
                            class="dropdown-item py-2 rounded d-flex align-items-center hover-blue">
                            <i class="fa fa-user text-primary me-3"></i> My Profile
                        </a>
                        <a href="#" class="dropdown-item py-2 rounded d-flex align-items-center hover-blue">
                            <i class="fa fa-cog text-primary me-3"></i> Settings
                        </a>
                        <a href="#" class="dropdown-item py-2 rounded d-flex align-items-center hover-blue">
                            <i class="fa fa-heart text-primary me-3"></i> Wishlist
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit"
                                class="dropdown-item py-2 rounded d-flex align-items-center text-danger hover-red"
                                style="border: none; background: none; width: 100%;">
                                <i class="fa fa-sign-out-alt me-3"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0" style="background-color: #0e1624 !important; z-index: 1;">
    <div class="row gx-0 align-items-center px-5" style="background-color: #0e1624 !important;">

        <div class="col-lg-3 d-none d-lg-block">
            <nav class="navbar navbar-light position-relative custom-cat-navbar">
                <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                    data-bs-toggle="collapse" data-bs-target="#allCat">
                    <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
                </button>
                <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                    <div class="navbar-nav ms-auto py-0">
                        <ul class="list-unstyled categories-bars">


                            @foreach (App\Models\Categorie::get() as $category)
                                <div class="categorie-bar"
                                    onclick="window.location='{{ route('home', ['category' => $category->id]) }}'"
                                    style="cursor: pointer;">
                                    {{ $category->category_name }}
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-12 col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                <a href="" class="navbar-brand d-block d-lg-none">
                    <h1 class="display-5 text-secondary m-0"><i
                            class="fas fa-shopping-bag text-white me-2"></i>KhadafiShop</h1>
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars fa-1x"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                        @if (!Auth::user()->seller)
                            <a href="{{ route('seller.create') }}" class="nav-item nav-link">
                                Buka Toko
                            </a>
                        @else
                            <a href="{{ route('seller.dashboard') }}" class="nav-item nav-link">
                                Dashboard Toko
                            </a>
                        @endif

                        <a href="{{ route('landingPage') }}" class="nav-item nav-link">Single Page</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="bestseller.html" class="dropdown-item">Bestseller</a>
                                <a href="cart.html" class="dropdown-item">Cart Page</a>
                                <a href="cheackout.html" class="dropdown-item">Cheackout</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link me-2">Contact</a>
                        <div class="nav-item dropdown d-block d-lg-none mb-3">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">All
                                Category</a>
                            <div class="dropdown-menu m-0">
                                <ul class="list-unstyled categories-bars">
                                    <li>
                                        <div class="categorie-bar">
                                            <a href="#">Accessories</a>
                                            <span>(3)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="categorie-bar">
                                            <a href="#">Electronics & Computer</a>
                                            <span>(5)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="categorie-bar">
                                            <a href="#">Laptops & Desktops</a>
                                            <span>(2)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="categorie-bar">
                                            <a href="#">Mobiles & Tablets</a>
                                            <span>(8)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="categorie-bar">
                                            <a href="#">SmartPhone & Smart TV</a>
                                            <span>(5)</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href=""
                        class="btn btn-blue-elegant rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">
                        <i class="fa fa-mobile-alt me-2"></i> +0123 456 7890
                    </a>

                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    //  const favContainer = document.getElementById('favoriteContainer');
    // const favDropdown = favContainer.querySelector('.favorite-dropdown');
    // console.log(favContainer, favDropdown);
    // favContainer.addEventListener('click', (e) => {
    //     e.stopPropagation();
    //     favDropdown.style.display = favDropdown.style.display === 'block' ? 'none' : 'block';
    // });

    // document.addEventListener('click', () => {
    //     favDropdown.style.display = 'none';
    // });


    const searchInput = document.querySelector('.search-input');
    const searchForm = document.querySelector('.search-form');

    let timeout;
    searchInput.addEventListener('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            searchForm.submit();
        }, 1000);
    });

    // Auto-submit saat mengetik
    searchInput.addEventListener('keyup', function() {
        searchForm.submit();
    });


document.addEventListener('DOMContentLoaded', function() {
    const notifContainer = document.getElementById('notifContainer');
    const notifDropdown = notifContainer ? notifContainer.querySelector('.notif-dropdown') : null;

    const favoriteContainer = document.getElementById('favoriteContainer');
    const favoriteDropdown = favoriteContainer ? favoriteContainer.querySelector('.favorite-dropdown') : null;

    const cartContainer = document.getElementById('cartContainer');
    const cartPopup = cartContainer ? cartContainer.querySelector('.cart-popup') : null;

    // Array dari semua dropdown dan containernya
    const dropdowns = [
        { container: notifContainer, element: notifDropdown },
        { container: favoriteContainer, element: favoriteDropdown },
        { container: cartContainer, element: cartPopup }
    ].filter(item => item.container && item.element); // Filter yang ada

    /**
     * Fungsi untuk menutup semua dropdown kecuali yang dikecualikan
     * @param {HTMLElement} excludeElement - Dropdown yang tidak ingin ditutup
     */
    function closeAllDropdowns(excludeElement = null) {
        dropdowns.forEach(item => {
            if (item.element && item.element !== excludeElement) {
                item.element.style.display = 'none';
            }
        });
    }

    /**
     * Fungsi universal untuk toggle dropdown
     * @param {Event} event - Event klik
     * @param {HTMLElement} dropdownElement - Elemen dropdown yang akan di-toggle
     */
    function toggleDropdown(event, dropdownElement) {
        // Mencegah klik menyebar ke window/document handler
        event.stopPropagation();

        // Cek status saat ini
        const isCurrentlyOpen = dropdownElement.style.display === 'block';

        // Tutup semua dropdown lain terlebih dahulu
        closeAllDropdowns(dropdownElement);

        // Toggle status display dropdown yang diklik
        dropdownElement.style.display = isCurrentlyOpen ? 'none' : 'block';
    }

    // Pasang event listener untuk setiap container
    dropdowns.forEach(item => {
        item.container.addEventListener('click', function(event) {
            // Jika container Cart diklik, jangan pindah halaman (sudah diubah dari <a> ke <div>)
            if (item.container === cartContainer) {
                event.preventDefault(); // Mencegah default action (meski sudah <div>, ini menjaga jika ada tag <a> di dalamnya)
            }
            toggleDropdown(event, item.element);
        });
    });


    // Event listener untuk menutup dropdown saat klik di luar area dropdown
    document.addEventListener('click', function(event) {
        // Tutup semua dropdown jika klik TIDAK berada di dalam container manapun
        let isInsideAnyContainer = false;
        dropdowns.forEach(item => {
            if (item.container && item.container.contains(event.target)) {
                isInsideAnyContainer = true;
            }
        });

        if (!isInsideAnyContainer) {
            closeAllDropdowns();
        }
    });


    // Optional: Untuk notifikasi yang sudah dibaca, tambahkan AJAX call di sini
    if (notifContainer) {
        notifContainer.querySelectorAll('.notif-item').forEach(item => {
            item.addEventListener('click', function() {
                const orderId = this.dataset.id;
                // Di sini Anda bisa menambahkan AJAX call untuk menandai notifikasi sebagai "dibaca"
                console.log('Notification clicked, marking as read for order ID:', orderId);
                // Contoh: $.post('/api/mark-notification-read/' + orderId, ...);
                // Setelah berhasil, Anda mungkin ingin menghapus item dari tampilan atau mereload badge.
            });
        });
    }
});
</script>
