<style>
    /* Badge "New" */
    .product-new {
        background-color: #19253d !important;
        color: #fff !important;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 12px;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .product-details {
        background-color: red;
    }

    .product-details a i {
        color: #19253d !important;
        transition: all 0.3s ease;
    }

    /* ✨ Efek hover agar lebih interaktif */
    .product-details a:hover i {
        color: #22345a !important;
        /* sedikit lebih terang */
        transform: scale(1.1);
    }

    /* 🎨 Warna dasar untuk teks dalam card produk */
    .product-item .text-center {
        color: #19253d !important;
    }

    /* 🔹 Warna link kategori (teks kecil di atas nama produk) */
    .product-item .text-center a.d-block.mb-2 {
        color: #19253d !important;
        font-weight: 600;
        opacity: 0.85;
        transition: all 0.3s ease;
    }

    .product-item .text-center a.d-block.mb-2:hover {
        opacity: 1;
        text-decoration: underline;
    }

    /* 🔹 Warna nama produk (judul besar) */
    .product-item .text-center a.d-block.h4 {
        color: #19253d !important;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .product-item .text-center a.d-block.h4:hover {
        color: #22345a !important;
    }

    /* 🔹 Harga coret (harga lama) */
    .product-item .text-center del {
        color: #6c757d !important;
        /* abu-abu lembut agar tetap kontras */
    }

    /* 🔹 Harga utama (harga sekarang) */
    .product-item .text-center {
        color: #19253d !important;
        font-weight: 700;
    }

    .pagination-wrapper nav {
        display: inline-block;
        background: rgba(255, 255, 255, 0.7);
        padding: 10px 25px;
        border-radius: 60px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .pagination-wrapper nav:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* 🌿 Pagination List */
    .pagination-wrapper .pagination {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    /* 🎨 Tombol Pagination */
    .pagination-wrapper .page-link {
        border: none;
        color: #444;
        font-weight: 500;
        font-size: 15px;
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 50%;
        width: 44px;
        height: 44px;
        line-height: 44px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    /* 🌟 Hover Effect */
    .pagination-wrapper .page-link:hover {
        background: linear-gradient(135deg, #007bff, #00bcd4);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    /* 💎 Tombol Aktif */
    .pagination-wrapper .active .page-link {
        background: linear-gradient(135deg, #007bff, #00bcd4);
        color: #fff;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4);
        transform: scale(1.1);
    }

    /* 🚫 Tombol Disabled */
    .pagination-wrapper .disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
        box-shadow: none;
    }

    /* ✨ Efek Transition Halus */
    .pagination-wrapper .page-item {
        transition: transform 0.2s ease;
    }

    .pagination-wrapper .page-item:hover:not(.active):not(.disabled) {
        transform: scale(1.05);
    }

    /* 📱 Responsive Mobile */
    @media (max-width: 576px) {
        .pagination-wrapper nav {
            padding: 6px 16px;
            border-radius: 40px;
        }

        .pagination-wrapper .page-link {
            width: 36px;
            height: 36px;
            line-height: 36px;
            font-size: 13px;
        }
    }



    .product-heading {
        font-size: 2rem;
        font-weight: 700;
        color: #19253d;
        position: relative;
    }

    .product-heading::after {
        content: "";
        display: block;
        width: 50px;
        height: 4px;
        background-color: #19253d;
        margin-top: 8px;
        border-radius: 2px;
    }

    /* 🔹 Custom Tab Navigation */
    .custom-nav {
        list-style: none;
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .costume-tab {
        cursor: pointer;
        padding: 0.6rem 1.4rem;
        border: 2px solid #19253d;
        border-radius: 30px;
        background-color: #ffffff;
        color: #19253d;
        font-weight: 600;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
    }

    .costume-tab:hover {
        background-color: #19253d;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(25, 37, 61, 0.25);
    }

    .costume-tab.active {
        background-color: #19253d;
        color: #fff;
        box-shadow: 0 3px 8px rgba(25, 37, 61, 0.3);
    }

    /* 🔹 Konten Tab */
    .tab-content {
        margin-top: 2rem;
    }

    .tab-pane {
        display: none;
        animation: fadeIn 0.3s ease-in-out;
    }

    .tab-pane.active {
        display: block;
    }

    /* 🔹 Animasi transisi */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 🔹 Responsif */
    @media (max-width: 768px) {
        .custom-nav {
            justify-content: flex-start;
        }

        .costume-tab {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
    }



    .product-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(25, 37, 61, 0.08);
        transition: all 0.3s ease;
        position: relative;
        border: 1px solid rgba(25, 37, 61, 0.1);
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 24px rgba(25, 37, 61, 0.18);
    }

    /* ===========================
   IMAGE AREA
   =========================== */
    .product-image {
        position: relative;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        border-radius: 16px 16px 0 0;
        transition: transform 0.4s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.07);
    }

    /* Badge */
    .product-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background-color: #3282b8;
        color: #fff;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 12px;
        letter-spacing: 0.3px;
        box-shadow: 0 3px 8px rgba(50, 130, 184, 0.3);
    }

    /* Hover action buttons */
    .product-hover {
        position: absolute;
        bottom: -60px;
        right: 12px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .product-card:hover .product-hover {
        bottom: 12px;
        opacity: 1;
    }

    .btn-add,
    .btn-fav {
        background: #19253d;
        color: #fff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 3px 8px rgba(25, 37, 61, 0.25);
    }

    .btn-add:hover,
    .btn-fav:hover {
        background: #3282b8;
        transform: scale(1.1);
    }

    /* ===========================
   PRODUCT INFO AREA
   =========================== */
    .product-info {
        padding: 1rem 1.2rem 1.5rem;
        text-align: center;
    }

    .product-category {
        color: #3282b8;
        font-weight: 500;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 4px;
        text-decoration: none;
    }

    .product-name {
        color: #19253d;
        font-weight: 700;
        font-size: 1.05rem;
        margin-bottom: 8px;
        transition: color 0.3s ease;
    }

    .product-name:hover {
        color: #3282b8;
    }

    /* Pricing */
    .product-pricing {
        margin-bottom: 10px;
    }

    .price-old {
        color: #777;
        font-size: 0.9rem;
        margin-right: 6px;
    }

    .price-new {
        color: #19253d;
        font-weight: 700;
        font-size: 1.1rem;
    }

    /* Rating */
    .product-rating i {
        color: #fbbf24;
        font-size: 0.9rem;
    }

    .header-carousel-item {
        padding-top: -90px;
        position: relative;
        top: -48px;
    }

    .tulisan-gede {
        font-size: 2rem;
    }

    /* ===========================
   AD SLIDER WRAPPER
   =========================== */
    .ad-slider-wrapper {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
        padding: 20px 0;
    }

    /* ===========================
   TRACK
   =========================== */
    .ad-slider-track {
        display: flex;
        transition: transform 0.45s ease;
        gap: 20px;
    }

    /* ===========================
   EACH SLIDE
   =========================== */
    .ad-slide {
        min-width: 100%;
        display: flex;
        justify-content: center;
    }

    /* ===========================
   SLIDE INNER CARD
   =========================== */
    .slide-inner {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 30px;
        padding: 30px;
        width: 95%;
        border-radius: 16px;
        background: linear-gradient(135deg, #e8f1ff, #ffffff);
        box-shadow: 0 10px 25px rgba(0, 75, 200, 0.1);
        position: relative;
        overflow: hidden;
    }

    /* ===========================
   DISCOUNT BADGE
   =========================== */
    .discount-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #ff3b3b;
        color: #fff;
        font-weight: 700;
        padding: 8px 16px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
    }

    /* ===========================
   LEFT IMAGE
   =========================== */
    .slide-left {
        flex: 0 0 40%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .slide-left img {
        width: 100%;
        height: auto;
        max-width: 350px;
        border-radius: 12px;
        object-fit: contain;
        box-shadow: 0 8px 20px rgba(0, 75, 200, 0.15);
        background: #f3f6ff;
        padding: 10px;
    }

    /* ===========================
   RIGHT TEXT
   =========================== */
    .slide-right {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 50%;
        min-width: 0;
        word-wrap: break-word;
    }

    .slide-sub {
        color: #0d6efd;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        margin-bottom: 5px;
    }

    .slide-headline {
        font-size: 1.8rem;
        font-weight: 800;
        color: #042f67;
        line-height: 1.25;
        margin-bottom: 10px;
    }

    .slide-desc {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 15px;
    }

    /* ===========================
   PRICE AREA
   =========================== */
    .price-box {
        display: flex;
        align-items: baseline;
        gap: 12px;
        margin-bottom: 15px;
    }

    .price-now {
        font-size: 1.5rem;
        font-weight: 900;
        color: #007bff;
    }

    .price-old {
        font-size: 1.1rem;
        color: #777;
        text-decoration: line-through;
    }

    /* ===========================
   BUTTON
   =========================== */
    .btn-slide {
        display: inline-block;
        background: linear-gradient(135deg, #0d6efd, #3c8dff);
        color: #fff;
        width:50%;
        text-align: center;
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 6px 18px rgba(0, 75, 200, 0.25);
        transition: 0.25s ease;
    }

    .btn-slide:hover {
        background: #084dc9;
        transform: translateY(-2px);
    }

    /* ===========================
   NAV BUTTONS
   =========================== */
    .slider-buttons {
        position: absolute;
        bottom: 20px;
        right: 20px;
        display: flex;
        gap: 10px;
    }

    .nav-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        background: #0d6efd;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        box-shadow: 0 6px 18px rgba(0, 75, 200, 0.25);
        transition: 0.2s ease;
    }

    .nav-btn:hover {
        background: #084dc9;
        transform: scale(1.1);
    }

    /* ===========================
   RESPONSIVE
   =========================== */
    @media (max-width: 992px) {
        .slide-inner {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }

        .slide-left {
            flex: 0 0 auto;
        }

        .slide-left img {
            max-width: 260px;
            height: auto;
        }

        .slide-right {
            max-width: 100%;
        }

        .slide-headline {
            font-size: 1.5rem;
        }

        .dua,
        .satulagi {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .slide-left img {
            max-width: 120px;
        }

        .slide-headline {
            font-size: 1.3rem;
        }

        .slide-desc {
            font-size: 0.9rem;
        }

        .btn-slide {
            padding: 8px 16px;
            font-size: 0.85rem;
        }

        .slider-buttons {
            bottom: 15px;
            right: 15px;
            gap: 8px;
        }

        .dua,
        .satulagi {
            display: none;
        }

        .ad-slider-wrapper {
            width: 100%;
            height: 40%;
            padding-top: 45px;
            padding-right: 30px;
        }

        .ad-slider-track {
            height: 60%;
            padding: 0;
        }
    }

    .dua {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-bottom: 40px;
        margin-top: -50px;
        background-color: #19253d;
        /* height */

    }
</style>


@extends('layouts.head')

@section('title', 'Home - Electro Laravel')

@section('content')
    <div class="content-section">

        <!-- Carousel Start -->
        <div class="dua">
            <div class="ad-slider-wrapper" style="margin-bottom:20px; margin-top: -40px;">
                <div class="ad-slider-track" id="adSliderTrack">
                    @foreach ($ads as $ad)
                        @php
                            $price = $ad->product->price;
                            $start = $ad->product->starting_price;
                            $discount = 0;
                            if ($start > $price) {
                                $discount = round((($start - $price) / $start) * 100);
                            }
                        @endphp <div class="ad-slide">
                            <div class="slide-inner"> <!-- BADGE DISKON -->
                                @if ($discount > 0)
                                    <div class="discount-badge"> -{{ $discount }}% </div>
                                @endif <!-- LEFT IMAGE -->
                                <div class="slide-left"> <img src="{{ asset('storage/' . $ad->bg_image) }}" alt="Ad Image">
                                </div> <!-- RIGHT -->
                                <div class="slide-right">
                                    <h4 class="slide-sub">{{ $ad->product->product_name }}</h4>
                                    <h1 class="slide-headline">{{ $ad->headline }}</h1>
                                    <p class="slide-desc">{{ $ad->description }}</p> <!-- PRICING -->
                                    <div class="price-box"> <span class="price-now">Rp
                                            {{ number_format($price, 0, ',', '.') }}</span>
                                        @if ($start > $price)
                                            <span class="price-old">Rp {{ number_format($start, 0, ',', '.') }}</span>
                                        @endif
                                    </div> <!-- BUTTON --> <a href="{{ $ad->button_link }}" class="btn-slide">
                                        {{ $ad->button_text }} </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="slider-buttons"> <button id="prevBtn" class="nav-btn">❮</button> <button id="nextBtn"
                        class="nav-btn">❯</button> </div>
            </div>
            
            <div class="satulagi">
                <img src="{{ asset('img/carousel-2.png') }}" alt="" width="'100%">
            </div>
        </div>






        <!-- Carousel End -->
        <!-- Searvices Start -->
        {{-- <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
                <div class="p-4">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-sync-alt fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Free Return</h6>
                            <p class="mb-0">30 days money back guarantee!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-telegram-plane fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Free Shipping</h6>
                            <p class="mb-0">Free shipping on all order</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-life-ring fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Support 24/7</h6>
                            <p class="mb-0">We support online 24 hrs a day</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-credit-card fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Receive Gift Card</h6>
                            <p class="mb-0">Recieve gift all over oder $50</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-lock fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Secure Payment</h6>
                            <p class="mb-0">We Value Your Security</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.6s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-blog fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Online Service</h6>
                            <p class="mb-0">Free return products in 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> --}}
        <!-- Searvices End -->
        <!-- Products Offer Start -->
        {{-- <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                        <div>
                            <p class="text-muted mb-3">Find The Best Camera for You!</p>
                            <h3 class="text-primary">Smart Camera</h3>
                            <h1 class="display-3 text-secondary mb-0">40% <span
                                    class="text-primary fw-normal">Off</span></h1>
                        </div>
                        <img src="img/product-1.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                        <div>
                            <p class="text-muted mb-3">Find The Best Whatches for You!</p>
                            <h3 class="text-primary">Smart Whatch</h3>
                            <h1 class="display-3 text-secondary mb-0">20% <span
                                    class="text-primary fw-normal">Off</span></h1>
                        </div>
                        <img src="img/product-2.png" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>
        </div> --}}
        <!-- Products Offer End -->
        <!-- Our Products Start -->



        <div class="container-fluid product ">
            <div class="container ">
                <div class="tab-class">
                    <div class="row align-items-center mb-5">
                        <!-- Judul -->
                        <div class="col-lg-4 text-start wow fadeInLeft" data-wow-delay="0.1s">
                            <h1 class="product-heading">Our Products</h1>
                        </div>

                        <!-- Navigasi Tabs -->
                        <div class="col-lg-8 text-end wow fadeInRight" data-wow-delay="0.1s">
                            <ul class="custom-nav">
                                <li class="costume-tab active" data-tab="tab-1">All Products</li>
                                <li class="costume-tab" data-tab="tab-2">New Arrivals</li>
                                <li class="costume-tab" data-tab="tab-3">Featured</li>
                                <li class="costume-tab" data-tab="tab-4">Top Selling</li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">

                            {{-- ini buat laptop --}}
                            <div class="row g-4">

                                @foreach ($products as $product)
                                    {{-- {{ dd($product) }} --}}

                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-card">
                                            <div class="product-image">
                                                <a href="{{ route('product.detail', $product->id) }}">
                                                    <img src="{{ asset('storage/' . $product->img) }}"
                                                        onerror="this.onerror=null; this.src='{{ asset('img/product-3.png') }}'">
                                                </a>
                                                <span class="product-badge">{{ $product->condition }}</span>
                                                <div class="product-hover">
                                                    <a href="{{ route('addCart', $product->id) }}" class="btn-add">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" class="btn-fav" data-bs-toggle="modal"
                                                        data-bs-target="#wishlistModal"
                                                        data-product-id="{{ $product->id }}">
                                                        <i class="fas fa-heart"></i>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="product-info">









                                                <h5 class="product-name">{{ $product->product_name }}</h5>

                                                <div class="product-sales-info mt-1 mb-2">

                                                    @if (isset($product->monthly_sales) && $product->monthly_sales > 0)
                                                        <p class="text-success mb-0" style="font-size: 0.85rem;">
                                                            <i class="fas fa-fire"></i> Terjual
                                                            {{ number_format((int) $product->monthly_sales) }} kali bulan
                                                            ini
                                                        </p>
                                                    @endif

                                                    @if (isset($product->total_sales) && $product->total_sales > 0)
                                                        <p class="text-muted mb-0" style="font-size: 0.75rem;">
                                                            Total terjual: {{ number_format((int) $product->total_sales) }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="product-pricing">
                                                    @php
                                                        // Ambil harga yang sudah disiapkan di Controller
                                                        $originalPrice = (int) $product->starting_price;
                                                        $currentPrice = (int) $product->price;
                                                        $isDiscounted = $originalPrice > $currentPrice;
                                                        $discountPercentage = $isDiscounted
                                                            ? round(
                                                                (($originalPrice - $currentPrice) / $originalPrice) *
                                                                    100,
                                                            )
                                                            : 0;
                                                    @endphp

                                                    @if ($isDiscounted)
                                                        <del class="price-old">
                                                            Rp.{{ number_format($originalPrice, 0, ',', '.') }}
                                                        </del>
                                                        <span class="badge bg-danger ms-2">{{ $discountPercentage }}%
                                                            OFF</span>
                                                    @else
                                                        <span class="price-old" style="visibility: hidden;">&nbsp;</span>
                                                    @endif

                                                    <span class="price-new">
                                                        Rp.{{ number_format($currentPrice, 0, ',', '.') }}
                                                    </span>
                                                </div>

                                                <div class="product-rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="far fa-star text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Pagination -->
                                <div class="mt-5 d-flex justify-content-center">
                                    <div class="pagination-wrapper">
                                        {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>

                            </div>
                        </div>


                        {{-- ini buat tablet --}}
                        {{-- <div id="tab-2" class="tab-pane fade  p-0">
                            <div class="row g-4">


                                @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="product-item-inner border rounded">
                                                <div class="product-item-inner-item">
                                                    <a href="{{ route('product.detail',  $product->id) }}">
                                                        <img src="img/product-3.png" class="img-fluid w-100 rounded-top"
                                                            alt="">
                                                    </a>
                                                    <div class="product-new">New</div>
                                                </div>
                                                <div class="text-center rounded-bottom p-4">
                                                    <a href="#"
                                                        class="d-block mb-2">{{ $product->category->category_name ?? 'test' }}</a>
                                                    <a href="#" class="d-block h4">{{ $product->product_name }}</a>
                                                    <del
                                                        class="me-2 fs-5">Rp.{{ number_format($product->price, 2, '.', ',') }}</del>
                                                    <span
                                                        class="text-primary fs-5">Rp.{{ number_format($product->price, 2, '.', ',') }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="product-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                                                <a href="#"
                                                    class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                        class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-random"></i></i></a>
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div> --}}


                        {{-- buat hp --}}

                        {{-- <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">


                                @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="product-item-inner border rounded">
                                                <div class="product-item-inner-item">
                                                    <a href="{{ route('product.detail', $product->id) }}">
                                                        <img src="img/product-3.png" class="img-fluid w-100 rounded-top"
                                                            alt="">
                                                    </a>

                                                </div>
                                                <div class="text-center rounded-bottom p-4">
                                                    <a href="#"
                                                        class="d-block mb-2">{{ $product->category->category_name ?? 'test' }}</a>
                                                    <a href="#" class="d-block h4">{{ $product->product_name }}</a>
                                                    <del
                                                        class="me-2 fs-5">Rp.{{ number_format($product->price, 2, '.', ',') }}</del>
                                                    <span
                                                        class="text-primary fs-5">Rp.{{ number_format($product->price, 2, '.', ',') }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="product-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                                                <a href="#"
                                                    class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                        class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-random"></i></i></a>
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div> --}}


                        {{-- buat apa dah tau hp kli --}}

                        {{-- <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">



                                @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="product-item-inner border rounded">
                                                <div class="product-item-inner-item">
                                                    <a href="{{ route('product.detail', $product->id) }}">
                                                        <img src="img/product-3.png" class="img-fluid w-100 rounded-top"
                                                            alt="">
                                                    </a>

                                                </div>
                                                <div class="text-center rounded-bottom p-4">
                                                    <a href="#"
                                                        class="d-block mb-2">{{ $product->category->category_name ?? 'test' }}</a>
                                                    <a href="#" class="d-block h4">{{ $product->product_name }}</a>
                                                    <del
                                                        class="me-2 fs-5">Rp.{{ number_format($product->price, 2, '.', ',') }}</del>
                                                    <span
                                                        class="text-primary fs-5">Rp.{{ number_format($product->price, 2, '.', ',') }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="product-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                                                <a href="#"
                                                    class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                        class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-random"></i></i></a>
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>




        <!-- Our Products End -->
        <!-- Product Banner Start -->
        {{-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <a href="#">
                        <div class="bg-primary rounded position-relative">
                            <img src="img/product-banner.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                                style="background: rgba(255, 255, 255, 0.5);">
                                <h3 class="display-5 text-primary">EOS Rebel <br> <span>T7i Kit</span></h3>
                                <p class="fs-4 text-muted">$899.99</p>
                                <a href="#" class="btn btn-primary rounded-pill align-self-start py-2 px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                    <a href="#">
                        <div class="text-center bg-primary rounded position-relative">
                            <img src="img/product-banner-2.jpg" class="img-fluid w-100" alt="">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                                style="background: rgba(242, 139, 0, 0.5);">
                                <h2 class="display-2 text-secondary">SALE</h2>
                                <h4 class="display-5 text-white mb-4">Get UP To 50% Off</h4>
                                <a href="#" class="btn btn-secondary rounded-pill align-self-center py-2 px-4">Shop
                                    Now</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- Product Banner End -->
        <!-- Product List Satrt -->
        {{-- <div class="container-fluid products productList overflow-hidden">
        <div class="container products-mini py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                    data-wow-delay="0.1s">Products</h4>
                <h1 class="mb-0 display-3 wow fadeInUp" data-wow-delay="0.3s">All Product Items</h1>
            </div>
            <div class="productList-carousel owl-carousel pt-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="productImg-carousel owl-carousel productList-item">
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-4.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-4.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-6.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-7.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="productImg-carousel owl-carousel productList-item">
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-8.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-9.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-10.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-11.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="productImg-carousel owl-carousel productList-item">
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-12.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-13.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-14.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-15.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="productImg-carousel owl-carousel productList-item">
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-16.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-17.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="productImg-item products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-3.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- Product List End -->
        <!-- Bestseller Products Start -->
        {{-- <div class="container-fluid products pb-5">
        <div class="container products-mini py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                    data-wow-delay="0.1s">Bestseller Products</h4>
                <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Modi, asperiores ducimus sint quos tempore officia similique quia? Libero, pariatur
                    consectetur?</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-3.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-4.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-5.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-6.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-7.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="products-mini-item border">
                        <div class="row g-0">
                            <div class="col-5">
                                <div class="products-mini-img border-end h-100">
                                    <img src="img/product-11.png" class="img-fluid w-100 h-100" alt="Image">
                                    <div class="products-mini-icon rounded-circle bg-primary">
                                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="products-mini-content p-3">
                                    <a href="#" class="d-block mb-2">SmartPhone</a>
                                    <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                                    <del class="me-2 fs-5">$1,250.00</del>
                                    <span class="text-primary fs-5">$1,050.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="products-mini-add border p-3">
                            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- Bestseller Products End -->
    </div>

    <!-- Modal Wishlist -->
    <div class="modal fade" id="wishlistModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                @php
                    $categories = auth()->user()->buyer->wishlistCategories;
                @endphp

                <!-- Jika belum punya category -->
                @if ($categories->count() == 0)
                    <div class="modal-header">
                        <h5 class="modal-title">Buat Kategori Wishlist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p>Kamu belum mempunyai kategori wishlist. Buat dulu ya!</p>

                        <form action="{{ route('wishlist.category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Nama Kategori</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">
                                Buat Kategori
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Jika sudah ada category -->
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Kategori Wishlist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="wishlistForm" method="POST" action="{{ route('wishlist.category.store') }}">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" id="wishlistProductId">

                            <label>Pilih kategori:</label>
                            <select name="wishlist_category_id" class="form-control" required>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100">Tambahkan ke Wishlist</button>
                        </div>
                    </form>

                @endif

            </div>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const track = document.getElementById("adSliderTrack");
            const slides = Array.from(track.children);
            const slideWidth = slides[0].clientWidth;

            let index = 1;
            let isDragging = false;
            let startX = 0;
            let currentTranslate = 0;
            let prevTranslate = 0;

            // CLONE FIRST & LAST SLIDE
            const firstClone = slides[0].cloneNode(true);
            const lastClone = slides[slides.length - 1].cloneNode(true);

            track.appendChild(firstClone);
            track.insertBefore(lastClone, slides[0]);

            const totalSlides = track.children.length;

            // Set start position
            track.style.transform = `translateX(-${slideWidth * index}px)`;


            // NEXT BUTTON
            document.getElementById("nextBtn").addEventListener("click", () => {
                if (index >= totalSlides - 1) return;
                index++;
                track.style.transition = ".45s ease";
                track.style.transform = `translateX(-${slideWidth * index}px)`;
            });

            // PREV BUTTON
            document.getElementById("prevBtn").addEventListener("click", () => {
                if (index <= 0) return;
                index--;
                track.style.transition = ".45s ease";
                track.style.transform = `translateX(-${slideWidth * index}px)`;
            });

            // LOOPING FIX
            track.addEventListener("transitionend", () => {
                if (track.children[index].isEqualNode(firstClone)) {
                    track.style.transition = "none";
                    index = 1;
                    track.style.transform = `translateX(-${slideWidth * index}px)`;
                }
                if (track.children[index].isEqualNode(lastClone)) {
                    track.style.transition = "none";
                    index = totalSlides - 2;
                    track.style.transform = `translateX(-${slideWidth * index}px)`;
                }
            });

            /* DRAG / SWIPE */
            track.addEventListener("mousedown", dragStart);
            track.addEventListener("touchstart", dragStart);

            track.addEventListener("mousemove", dragging);
            track.addEventListener("touchmove", dragging);

            track.addEventListener("mouseup", dragEnd);
            track.addEventListener("mouseleave", dragEnd);
            track.addEventListener("touchend", dragEnd);

            function dragStart(e) {
                isDragging = true;
                startX = e.pageX || e.touches[0].clientX;
                prevTranslate = -slideWidth * index;
            }

            function dragging(e) {
                if (!isDragging) return;
                const x = e.pageX || e.touches[0].clientX;
                const diff = x - startX;
                currentTranslate = prevTranslate + diff;
                track.style.transform = `translateX(${currentTranslate}px)`;
            }

            function dragEnd() {
                isDragging = false;

                const moved = currentTranslate - prevTranslate;

                if (moved < -80) {
                    index++;
                } else if (moved > 80) {
                    index--;
                }

                track.style.transition = ".45s ease";
                track.style.transform = `translateX(-${slideWidth * index}px)`;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('wishlistModal');

            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const productId = button.getAttribute('data-product-id');

                const form = document.getElementById('wishlistForm');

                if (form) {
                    form.action = "/wishlist/store/" + productId;
                }
            });
        });

        let selectedProductId = null;

        function openWishlistModal(productId) {
            selectedProductId = productId;

            const categories = @json(auth()->user()->buyer->wishlistCategories);

            document.querySelector('#choose-category-box').classList.add('d-none');
            document.querySelector('#no-category-box').classList.add('d-none');
            document.querySelector('#add-category-box').classList.add('d-none');

            // Jika kategori kosong
            if (categories.length === 0) {
                document.querySelector('#no-category-box').classList.remove('d-none');
            } else {
                let html = "";
                categories.forEach(cat => {
                    html += `
                <div class="form-check mb-2">
                    <input type="radio" name="wishlist_category_id" class="form-check-input" value="${cat.id}">
                    <label class="form-check-label">${cat.name}</label>
                </div>
            `;
                });

                document.querySelector('#category-list').innerHTML = html;

                let form = document.querySelector('#choose-category-box');
                form.action = "/wishlist/store/" + selectedProductId;

                form.classList.remove('d-none');
            }

            new bootstrap.Modal(document.getElementById('wishlistModal')).show();
        }

        function showCategoryForm() {
            document.querySelector('#choose-category-box').classList.add('d-none');
            document.querySelector('#no-category-box').classList.add('d-none');
            document.querySelector('#add-category-box').classList.remove('d-none');
        }

        function showCategoryChoose() {
            openWishlistModal(selectedProductId);
        }
    </script>


@endsection

<script>
    // HORIZONTAL SLIDER
    const horizontalSlider = document.getElementById('horizontalSlider');
    let hIndex = 0;

    document.getElementById('prevHorizontal').addEventListener('click', () => {
        const slides = horizontalSlider.children.length;
        hIndex = (hIndex - 1 + slides) % slides;
        horizontalSlider.style.transform = `translateX(-${hIndex * 100}%)`;
    });

    document.getElementById('nextHorizontal').addEventListener('click', () => {
        const slides = horizontalSlider.children.length;
        hIndex = (hIndex + 1) % slides;
        horizontalSlider.style.transform = `translateX(-${hIndex * 100}%)`;
    });

    // VERTICAL SLIDER
    const verticalSlider = document.getElementById('verticalSlider');
    let vIndex = 0;

    document.getElementById('prevVertical').addEventListener('click', () => {
        const slides = verticalSlider.children.length;
        vIndex = (vIndex - 1 + slides) % slides;
        verticalSlider.style.transform = `translateY(-${vIndex * 270}px)`; // 250px tinggi + 20 margin
    });

    document.getElementById('nextVertical').addEventListener('click', () => {
        const slides = verticalSlider.children.length;
        vIndex = (vIndex + 1) % slides;
        verticalSlider.style.transform = `translateY(-${vIndex * 270}px)`;
    });




    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".costume-tab");
        console.log(tabs);
        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                tabs.forEach((t) => t.classList.remove("active"));
                tab.classList.add("active");
            });
        });
    });
</script>
