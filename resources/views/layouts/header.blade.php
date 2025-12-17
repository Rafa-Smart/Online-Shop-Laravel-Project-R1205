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


    /* WRAPPER UTAMA */.whiteblue-dropdown {
    width: 280px !important;
    background: #ffffff !important;
    border-radius: 18px !important;
    box-shadow: 0 10px 30px rgba(14, 22, 36, 0.12) !important;
    overflow: hidden !important;
    border: 1px solid rgba(14, 22, 36, 0.08) !important;
    backdrop-filter: blur(10px);
}

/* PROFILE AREA */
.whiteblue-profile {
    background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 100%) !important;
    border-bottom: 1px solid rgba(14, 22, 36, 0.06) !important;
}

.whiteblue-photo {
    width: 88px !important;
    height: 88px !important;
    object-fit: cover !important;
    border: 3px solid #2563eb !important;
    box-shadow: 0 6px 16px rgba(37, 99, 235, 0.25) !important;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
}

.whiteblue-photo:hover {
    transform: scale(1.05) !important;
    box-shadow: 0 8px 22px rgba(37, 99, 235, 0.35) !important;
}

.whiteblue-name {
    font-size: 16px !important;
    color: #0e1624 !important;
    letter-spacing: -0.2px !important;
}

.whiteblue-email {
    color: #5a6b82 !important;
    font-size: 13px !important;
}

/* DIVIDER */
.divider {
    height: 1px !important;
    background: rgba(14, 22, 36, 0.08) !important;
    margin: 0 !important;
}

/* MENU */
.whiteblue-menu {
    padding: 12px !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 6px !important;
}

/* MENU ITEM */
.whiteblue-item {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 13px 16px !important;
    font-size: 15px !important;
    font-weight: 600 !important;
    border-radius: 14px !important;
    color: #0e1624 !important;
    text-decoration: none !important;
    transition: all 0.25s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    width: 100% !important;
    background: transparent !important;
    text-align: center !important;
}

.whiteblue-item i {
    color: #2563eb !important;
    font-size: 16px !important;
    width: 20px !important;
    text-align: center !important;
}

/* HOVER EFFECT */
.whiteblue-item:hover {
    background: #eef5ff !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(14, 22, 36, 0.08) !important;
}

/* LOGOUT BUTTON */
.logout {
    color: #dc2626 !important;
    font-weight: 600 !important;
}

.logout i {
    color: #dc2626 !important;
}

.logout:hover {
    background: #ffebee !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.12) !important;
}

/* ============================================
   STYLING UNTUK MOBILE ICONS BAR
   ============================================ */
.mobile-icons-bar {
    display: none !important;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #0e1624;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    z-index: 999;
    padding: 10px 0;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
}

.mobile-icons-container {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
}

.mobile-icon-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #94a3b8;
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 5px;
    position: relative;
    flex: 1;
}

.mobile-icon-item:hover {
    color: #1e90ff;
}

.mobile-icon-item i {
    font-size: 22px;
    margin-bottom: 4px;
}

.mobile-icon-text {
    font-size: 10px;
    font-weight: 500;
}

.mobile-badge {
    position: absolute;
    top: -2px;
    right: 8px;
    background: #ef4444;
    color: white;
    font-size: 10px;
    font-weight: bold;
    padding: 2px 5px;
    border-radius: 50%;
    min-width: 16px;
    height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mobile-profile {
    position: relative;
    display: inline-block;
}

.mobile-profile-img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #1e90ff;
}

/* ============================================
   RESPONSIVE STYLES
   ============================================ */
@media (max-width: 991px) {
    /* Sembunyikan header elegan di mobile */
    .header-elegant {
        display: none !important;
    }
    
    /* Tampilkan mobile icons bar */
    .mobile-icons-bar {
        display: block !important;
    }
    
    /* Adjust navbar untuk mobile */
    .nav-bar .row {
        padding: 0 10px;
    }
    
    /* Make navbar toggler lebih besar di mobile */
    .navbar-toggler .fa-bars {
        font-size: 24px;
    }
    
    /* Adjust kategori dropdown untuk mobile */
    #allCat {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        overflow-y: auto;
        z-index: 1001;
        border-radius: 0;
    }
}

@media (max-width: 768px) {
    .mobile-icon-item i {
        font-size: 20px;
    }
    
    .mobile-icon-text {
        font-size: 9px;
    }
}

@media (max-width: 576px) {
    .mobile-icons-bar {
        padding: 8px 0;
    }
    
    .mobile-icon-item {
        padding: 4px;
    }
    
    .mobile-badge {
        font-size: 8px;
        padding: 1px 4px;
        min-width: 14px;
        height: 14px;
        top: -3px;
        right: 4px;
    }
}

/* ============================================
   MOBILE DROPDOWN STYLES
   ============================================ */
.mobile-dropdown-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 10000;
}

.mobile-dropdown-content {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: white;
    border-radius: 20px 20px 0 0;
    padding: 20px;
    z-index: 10001;
    max-height: 80vh;
    overflow-y: auto;
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from {
        transform: translateY(100%);
    }
    to {
        transform: translateY(0);
    }
}

.mobile-dropdown-header {
    text-align: center;
    padding-bottom: 15px;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 15px;
}

.mobile-dropdown-profile {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #2563eb;
    margin: 0 auto 10px;
}

.mobile-dropdown-name {
    font-size: 18px;
    font-weight: 600;
    color: #0e1624;
    margin-bottom: 5px;
}

.mobile-dropdown-email {
    font-size: 14px;
    color: #6b7280;
}

.mobile-dropdown-item {
    display: flex;
    align-items: center;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 8px;
    color: #0e1624;
    text-decoration: none;
    transition: all 0.3s ease;
}

.mobile-dropdown-item i {
    width: 24px;
    font-size: 18px;
    color: #2563eb;
    margin-right: 15px;
}

.mobile-dropdown-item:hover {
    background: #eef5ff;
}

.mobile-dropdown-logout {
    color: #dc2626;
}

.mobile-dropdown-logout i {
    color: #dc2626;
}

.mobile-dropdown-logout:hover {
    background: #ffebee;
}

/* ============================================
   MOBILE NOTIFICATIONS STYLES
   ============================================ */
.mobile-notifications-content {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: white;
    border-radius: 20px 20px 0 0;
    padding: 20px;
    z-index: 10001;
    max-height: 80vh;
    overflow-y: auto;
}

.mobile-notifications-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 15px;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 15px;
}

.mobile-notifications-title {
    font-size: 18px;
    font-weight: 600;
    color: #0e1624;
}

.mobile-notifications-close {
    background: none;
    border: none;
    font-size: 24px;
    color: #6b7280;
    cursor: pointer;
}

.mobile-notification-item {
    padding: 12px;
    border-radius: 12px;
    margin-bottom: 10px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
}

.mobile-notification-item:last-child {
    margin-bottom: 0;
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


/* DROPDOWN WRAPPER */
.whiteblue-dropdown {
    width: 300px !important;
    background: #ffffff !important;
    border-radius: 18px !important;
    box-shadow: 0 8px 35px rgba(0, 0, 0, 0.15) !important;
    overflow: hidden !important;
}

/* PROFILE AREA */
.whiteblue-profile {
    background: #f7f9fc !important;
}

.whiteblue-photo {
    width: 95px !important;
    height: 95px !important;
    border-radius: 50% !important;
    object-fit: cover !important;
    border: 3px solid #e4ecf5 !important;
    box-shadow: 0 5px 18px rgba(0, 0, 0, 0.1) !important;
    transition: transform .25s ease !important;
}

.whiteblue-photo:hover {
    transform: scale(1.05) !important;
}

.whiteblue-name {
    font-size: 16px !important;
    color: #0e1624 !important;
}

/* DIVIDER */
.divider {
    height: 1px !important;
    background: #e4e8ef !important;
    margin: 0 !important;
}

/* MENU */
.whiteblue-menu {
    padding: 12px !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 6px !important;
}

/* ITEM */
.whiteblue-item {
    display: flex !important;
    align-items: center !important;
    padding: 12px 14px !important;
    font-size: 15px !important;
    font-weight: 500 !important;
    border-radius: 10px !important;
    color: #0e1624 !important;
    text-decoration: none !important;
    transition: 0.22s ease !important;
}

.whiteblue-item i {
    color: #0e5cff !important;
    font-size: 16px !important;
}

/* HOVER */
.whiteblue-item:hover {
    background: #eaf2ff !important;
    transform: translateX(6px) !important;
}

/* LOGOUT */
.logout {
    color: #d62828 !important;
}

.logout i {
    color: #d62828 !important;
}

.logout:hover {
    background: #ffe8e8 !important;
    transform: translateX(6px) !important;
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

<!-- 📂 Dropdown Menu Column Elegant -->
<!-- 📂 Premium Dropdown White-Blue -->
<div class="dropdown-menu dropdown-menu-end border-0 p-0 whiteblue-dropdown">
    <!-- PROFILE AREA -->
    <div class="whiteblue-profile text-center py-5 px-4">
        <img src="{{ asset('storage/profile_photos/' . auth()->user()->buyer->img) }}" class="whiteblue-photo mb-3 rounded-circle border-3 border-primary shadow-sm">
        <h6 class="fw-bold mb-1 whiteblue-name">
            {{ auth()->user()->buyer->fullname }}
        </h6>
        <small class="text-muted whiteblue-email">{{ auth()->user()->email }}</small>
    </div>

    <div class="divider"></div>

    <!-- MENU -->
    <div class="whiteblue-menu p-2">
        <a href="{{ route('profile') }}" class="whiteblue-item d-flex align-items-center justify-content-center w-100 px-4 py-3 text-decoration-none">
            <i class="fa fa-user me-2"></i> Profile
        </a>

        <a href="#" class="whiteblue-item d-flex align-items-center justify-content-center w-100 px-4 py-3 text-decoration-none">
            <i class="fa fa-heart me-2"></i> Wishlist
        </a>

        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0 w-100">
            @csrf
            <button type="submit" class="whiteblue-item logout w-100 d-flex align-items-center justify-content-center px-4 py-3 border-0 bg-transparent text-start">
                <i class="fa fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
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
                        <a href="{{ route('contact.indexForBuyer') }}" class="nav-item nav-link me-2">Contact</a>
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
                    <a href="{{route('contact.indexForBuyer')}}"
                        class="btn btn-blue-elegant rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">
                        <i class="fa fa-mobile-alt me-2"></i> 0812-3456-7890
                    </a>

                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- ============================================
   MOBILE ICONS BAR - Untuk tampilan mobile
   ============================================ -->
<div class="mobile-icons-bar d-lg-none">
    <div class="mobile-icons-container">
        <!-- Home -->
        <a href="{{ route('home') }}" class="mobile-icon-item">
            <i class="fas fa-home"></i>
            <span class="mobile-icon-text">Home</span>
        </a>
        
        <!-- Notifications -->
        <div class="mobile-icon-item" id="mobileNotifBtn">
            <i class="fas fa-bell"></i>
            <span class="mobile-icon-text">Notif</span>
            @if($notifCount > 0)
                <span class="mobile-badge">{{ $notifCount }}</span>
            @endif
        </div>
        
        <!-- Cart -->
        <div class="mobile-icon-item" id="mobileCartBtn">
            <i class="fas fa-shopping-cart"></i>
            <span class="mobile-icon-text">Cart</span>
            @if($carts->count() > 0)
                <span class="mobile-badge">{{ $carts->count() }}</span>
            @endif
        </div>
        
        <!-- Wishlist -->
        <div class="mobile-icon-item" id="mobileWishlistBtn">
            <i class="fas fa-heart"></i>
            <span class="mobile-icon-text">Wishlist</span>
            @if($wishlist->count() > 0)
                <span class="mobile-badge">{{ $wishlist->count() }}</span>
            @endif
        </div>
        
        <!-- Profile -->
        <div class="mobile-icon-item mobile-profile" id="mobileProfileBtn">
            <img src="{{ asset('storage/profile_photos/' . auth()->user()->buyer->img) }}" 
                 class="mobile-profile-img" 
                 alt="Profile">
            <span class="mobile-icon-text">Profile</span>
        </div>
    </div>
</div>

<!-- ============================================
   MOBILE DROPDOWNS
   ============================================ -->
<!-- Mobile Profile Dropdown -->
<div class="mobile-dropdown-overlay" id="mobileProfileOverlay"></div>
<div class="mobile-dropdown-content" id="mobileProfileContent">
    <div class="mobile-dropdown-header">
        <img src="{{ asset('storage/profile_photos/' . auth()->user()->buyer->img) }}" 
             class="mobile-dropdown-profile" 
             alt="Profile">
        <div class="mobile-dropdown-name">{{ auth()->user()->buyer->fullname }}</div>
        <div class="mobile-dropdown-email">{{ auth()->user()->email }}</div>
    </div>
    
    <a href="{{ route('profile') }}" class="mobile-dropdown-item">
        <i class="fa fa-user"></i>
        <span>Profile</span>
    </a>
    
    <a href="{{ route('wishlist.index') }}" class="mobile-dropdown-item">
        <i class="fa fa-heart"></i>
        <span>Wishlist</span>
    </a>
    
    <a href="{{ route('showCarts') }}" class="mobile-dropdown-item">
        <i class="fa fa-shopping-cart"></i>
        <span>Cart</span>
    </a>
    
    <form action="{{ route('logout') }}" method="POST" class="m-0 p-0 w-100">
        @csrf
        <button type="submit" class="mobile-dropdown-item mobile-dropdown-logout w-100 border-0 bg-transparent text-start">
            <i class="fa fa-sign-out-alt"></i>
            <span>Logout</span>
        </button>
    </form>
</div>

<!-- Mobile Notifications Dropdown -->
<div class="mobile-dropdown-overlay" id="mobileNotifOverlay"></div>
<div class="mobile-dropdown-content" id="mobileNotifContent">
    <div class="mobile-notifications-header">
        <div class="mobile-notifications-title">Notifications</div>
        <button class="mobile-notifications-close" id="mobileNotifClose">×</button>
    </div>
    
    <div id="mobileNotificationsList">
        @forelse($notifications as $order)
            <div class="mobile-notification-item" data-id="{{ $order->id }}">
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
                
                <form action="{{ route('buyer.notifications.read', $order) }}" method="POST" class="mt-2">
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

<!-- Mobile Cart Dropdown -->
<div class="mobile-dropdown-overlay" id="mobileCartOverlay"></div>
<div class="mobile-dropdown-content" id="mobileCartContent">
    <div class="mobile-notifications-header">
        <div class="mobile-notifications-title">Shopping Cart</div>
        <button class="mobile-notifications-close" id="mobileCartClose">×</button>
    </div>
    
    <div id="mobileCartList">
        @if ($carts->count() > 0)
            @foreach ($carts as $cart)
                <div class="cart-item d-flex align-items-start mb-2 p-2 rounded"
                    onclick="window.location='{{ route('product.detail', ['id' => $cart->product->id]) }}'">
                    <img src="{{ $cart->product->image_url ?? asset('img/product-1.png') }}"
                        alt="{{ $cart->product->product_name }}"
                        style="width:55px; height:55px; object-fit:cover; border-radius:6px; margin-right:12px;">
                    <div class="item-details flex-grow-1">
                        <p class="fw-semibold mb-1 text-truncate" style="font-size:14px;">
                            {{ $cart->product->product_name }}</p>
                        <p class="mb-1" style="font-size:12px; color:#6c757d;">
                            {{ $cart->product_variant->variant_name ?? 'Default' }}</p>
                        <p class="mb-0 fw-bold" style="font-size:14px;">
                            {{ $cart->quantity }} x Rp{{ number_format($cart->product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            @endforeach
            <a onclick="window.location='{{ route('showCarts')}}'" class="btn btn-dark w-100 mt-2 py-2">
                Go to Cart (Checkout)
            </a>
        @else
            <div class="text-center text-muted p-3">Your cart is empty.</div>
        @endif
    </div>
</div>

<!-- Mobile Wishlist Dropdown -->
<div class="mobile-dropdown-overlay" id="mobileWishlistOverlay"></div>
<div class="mobile-dropdown-content" id="mobileWishlistContent">
    <div class="mobile-notifications-header">
        <div class="mobile-notifications-title">Wishlist</div>
        <button class="mobile-notifications-close" id="mobileWishlistClose">×</button>
    </div>
    
    <div id="mobileWishlistList">
        @if ($wishlist->count() > 0)
            @foreach ($wishlist as $item)
                <div class="wishlist-item d-flex align-items-start mb-2 p-2 rounded"
                    onclick="window.location='{{ route('product.detail', ['id' => $item->id]) }}'">
                    <img src="{{ $item->image_url ?? asset('img/product-1.png') }}"
                        alt="{{ $item->product_name }}"
                        style="width:55px; height:55px; object-fit:cover; border-radius:6px; margin-right:12px;">
                    <div class="item-details flex-grow-1">
                        <p class="fw-semibold mb-1 text-truncate" style="font-size:14px;">
                            {{ $item->product_name }}</p>
                        <p class="mb-1" style="font-size:12px; color:#6c757d;">
                            {{ $item->variant_name ?? 'Default' }}</p>
                        <p class="mb-0 fw-bold" style="font-size:14px;">
                            Rp{{ number_format($item->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('wishlist.index') }}" class="btn btn-dark w-100 mt-2 py-2">
                Go to Wishlist
            </a>
        @else
            <div class="text-center text-muted p-3">Daftar Wishlist masih kosong.</div>
        @endif
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
// ============================================
// FUNGSI UTAMA UNTUK MOBILE
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk membuka dropdown mobile
    function openMobileDropdown(overlayId, contentId) {
        document.getElementById(overlayId).style.display = 'block';
        document.getElementById(contentId).style.display = 'block';
        document.body.style.overflow = 'hidden'; // Mencegah scroll
    }

    // Fungsi untuk menutup semua dropdown mobile
    function closeAllMobileDropdowns() {
        const overlays = document.querySelectorAll('.mobile-dropdown-overlay');
        const contents = document.querySelectorAll('.mobile-dropdown-content');
        
        overlays.forEach(overlay => overlay.style.display = 'none');
        contents.forEach(content => content.style.display = 'none');
        document.body.style.overflow = 'auto'; // Mengembalikan scroll
    }

    // Event listeners untuk tombol mobile
    document.getElementById('mobileProfileBtn').addEventListener('click', function(e) {
        e.preventDefault();
        openMobileDropdown('mobileProfileOverlay', 'mobileProfileContent');
    });

    document.getElementById('mobileNotifBtn').addEventListener('click', function(e) {
        e.preventDefault();
        openMobileDropdown('mobileNotifOverlay', 'mobileNotifContent');
    });

    document.getElementById('mobileCartBtn').addEventListener('click', function(e) {
        e.preventDefault();
        openMobileDropdown('mobileCartOverlay', 'mobileCartContent');
    });

    document.getElementById('mobileWishlistBtn').addEventListener('click', function(e) {
        e.preventDefault();
        openMobileDropdown('mobileWishlistOverlay', 'mobileWishlistContent');
    });

    // Event listeners untuk tombol close
    document.getElementById('mobileNotifClose').addEventListener('click', closeAllMobileDropdowns);
    document.getElementById('mobileCartClose').addEventListener('click', closeAllMobileDropdowns);
    document.getElementById('mobileWishlistClose').addEventListener('click', closeAllMobileDropdowns);

    // Event listeners untuk overlay (menutup saat klik di luar)
    document.querySelectorAll('.mobile-dropdown-overlay').forEach(overlay => {
        overlay.addEventListener('click', closeAllMobileDropdowns);
    });

    // Event listener untuk mencegah klik di dalam dropdown menutup dropdown
    document.querySelectorAll('.mobile-dropdown-content').forEach(content => {
        content.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });

    // ============================================
    // FUNGSI UNTUK DESKTOP (tetap bekerja)
    // ============================================
    const notifContainer = document.getElementById('notifContainer');
    const notifDropdown = notifContainer ? notifContainer.querySelector('.notif-dropdown') : null;

    const favoriteContainer = document.getElementById('favoriteContainer');
    const favoriteDropdown = favoriteContainer ? favoriteContainer.querySelector('.favorite-dropdown') : null;

    const cartContainer = document.getElementById('cartContainer');
    const cartPopup = cartContainer ? cartContainer.querySelector('.cart-popup') : null;

    const dropdowns = [
        { container: notifContainer, element: notifDropdown },
        { container: favoriteContainer, element: favoriteDropdown },
        { container: cartContainer, element: cartPopup }
    ].filter(item => item.container && item.element);

    function closeAllDropdowns(excludeElement = null) {
        dropdowns.forEach(item => {
            if (item.element && item.element !== excludeElement) {
                item.element.style.display = 'none';
            }
        });
    }

    function toggleDropdown(event, dropdownElement) {
        event.stopPropagation();
        const isCurrentlyOpen = dropdownElement.style.display === 'block';
        closeAllDropdowns(dropdownElement);
        dropdownElement.style.display = isCurrentlyOpen ? 'none' : 'block';
    }

    dropdowns.forEach(item => {
        item.container.addEventListener('click', function(event) {
            if (item.container === cartContainer || item.container === favoriteContainer) {
                event.preventDefault();
            }
            toggleDropdown(event, item.element);
        });
    });

    document.addEventListener('click', function(event) {
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

    // ============================================
    // FITUR SEARCH AUTO-SUBMIT
    // ============================================
    const searchInput = document.querySelector('.search-input');
    const searchForm = document.querySelector('.search-form');

    if (searchInput && searchForm) {
        let timeout;
        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                searchForm.submit();
            }, 1000);
        });
    }
});

// ============================================
// FUNGSI UNTUK HANDLE NOTIFIKASI
// ============================================
function markNotificationAsRead(orderId) {
    // AJAX call untuk menandai notifikasi sebagai dibaca
    fetch(`/notifications/${orderId}/read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Hapus notifikasi dari tampilan
            const notificationItem = document.querySelector(`.notif-item[data-id="${orderId}"]`);
            if (notificationItem) {
                notificationItem.remove();
            }
            
            // Update badge count
            updateNotificationBadge();
        }
    })
    .catch(error => console.error('Error:', error));
}

function updateNotificationBadge() {
    // Hitung ulang jumlah notifikasi
    const notificationCount = document.querySelectorAll('.notif-item').length;
    const badge = document.querySelector('.badge-cart');
    
    if (notificationCount > 0) {
        badge.textContent = notificationCount;
        badge.style.display = 'flex';
    } else {
        badge.style.display = 'none';
    }
}
</script>