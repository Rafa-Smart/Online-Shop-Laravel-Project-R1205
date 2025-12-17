@extends('layouts.head')

@section('title', 'Home - Electro Laravel')

@section('content')
<style>
    /* ===========================
   RESET & BASE STYLES
=========================== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content-section {
    width: 100%;
    overflow-x: hidden;
    background: #f8f9fa;
    /* padding-top:-20px; */
    padding: 0px 0px 0px 0px;
}

/* ===========================
   CAROUSEL SECTION
=========================== *//* ===========================
   CAROUSEL SECTION (PREMIUM)
=========================== */

.ad-slider-wrapper {
    position: relative;
    top:-10;
    overflow: hidden;
    margin-bottom: 40px;
    background: #ffffff;
        box-shadow: 0 12px 40px rgba(0,0,0,0.08);
}

.ad-slider-track {
    display: flex;
    transition: transform 0.6s ease;
}

.ad-slide {
    min-width: 100%;
    flex-shrink: 0;
}

.slide-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    padding: 70px 80px;
    background: linear-gradient(135deg, #1a2536 0%, #2d3e50 100%);
    /* border-radius: 16px; */
    color: white;
    min-height: 480px;
    position: relative;
}

/* Diskon Badge Premium */
.discount-badge {
    position: absolute;
    top: 25px;
    right: 25px;
    background: #ff4757;
    padding: 13px 26px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1.2rem;
    color: #fff;
    box-shadow: 0 8px 24px rgba(255, 71, 87, 0.45);
}

/* GAMBAR PREMIUM */
.slide-left img {
    width: 100%;
    max-width: 520px;
    border-radius: 20px;
    object-fit: cover;

    /* Glow effect */
    box-shadow: 0 20px 45px rgba(0,0,0,0.35);

    transition: transform 0.35s ease, box-shadow 0.35s ease;
}

.slide-left img:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 28px 55px rgba(0,0,0,0.48);
}

/* TEXT PREMIUM */
.slide-sub {
    font-size: 1rem;
    text-transform: uppercase;
    opacity: 0.9;
    letter-spacing: 2px;
    margin-bottom: 12px;
    font-weight: 600;
    color: #c0d1e2;
}

.slide-headline {
    font-size: 3.1rem;
    font-weight: 800;
    margin-bottom: 18px;
    color: #ffffff;
    line-height: 1.2;
    letter-spacing: -1px;
    text-shadow: 0 3px 8px rgba(0,0,0,0.3);
}

.slide-desc {
    font-size: 1.1rem;
    color: #e6eef5;
    opacity: 0.92;
    margin-bottom: 30px;
    line-height: 1.55;
}

/* HARGA PREMIUM */
.price-box {
    display: flex;
    align-items: baseline;
    gap: 18px;
    margin-bottom: 28px;
}

.price-now {
    font-size: 2.5rem;
    font-weight: 800;
    color: #ffffff;
    text-shadow: 0 2px 6px rgba(0,0,0,0.4);
}

.price-old {
    font-size: 1.2rem;
    text-decoration: line-through;
    opacity: 0.7;
}

/* TOMBOL STYLISH */
.btn-slide {
    display: inline-block;
    padding: 14px 42px;
    background: #ffffff;
    color: #1a2536;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    transition: 0.3s ease;
    box-shadow: 0 6px 20px rgba(255,255,255,0.25);
}

.btn-slide:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(255,255,255,0.35);
}

/* NAV BUTTON PREMIUM */
.slider-buttons {
    position: absolute;
    bottom: 25px;
    right: 25px;
    display: flex;
    gap: 12px;
    z-index: 10;
}

.nav-btn {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    background: rgba(255,255,255,0.95);
    border: none;
    cursor: pointer;
    font-size: 1.3rem;
    color: #1a2536;

    display: flex;
    justify-content: center;
    align-items: center;
    
    transition: 0.3s ease;
}

.nav-btn:hover {
    background: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.25);
}

/* ===========================
   FILTERS SECTION
=========================== *//* ======================================================
      PREMIUM FILTER BAR — ULTRA MODERN EDITION
====================================================== */

.filters-section {
    background: #f5f7fa;
    padding: 35px 0 45px;
    margin-bottom: 40px;
}

.filters-container {
    max-width: 1350px;
    margin: auto;
    padding: 0 25px;
}

/* FLOATING CARD WRAPPER */
.filters-inner-box {
    background: white;
    padding: 28px;
    border-radius: 18px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.08);
    border: 1px solid #eef1f5;
}

/* HEADER */
.filter-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 18px;
}

.filter-title {
    font-size: 1.55rem;
    font-weight: 700;
    color: #1d2635;
    display: flex;
    gap: 12px;
    align-items: center;
}

.filter-title i {
    font-size: 1.4rem;
    color: #3b82f6;
}

/* GRID */
.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 24px;
    margin-bottom: 25px;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 9px;
}

.filter-label {
    font-size: 0.9rem;
    font-weight: 600;
    color: #4d5c72;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* INPUT & SELECT — SUPER PREMIUM */
.filter-input,
.filter-select {
    padding: 14px 16px;
    border: 1px solid #d8e0ea;
    background: #fbfcfe;
    border-radius: 12px;
    font-size: 0.95rem;

    transition: 0.25s ease;
    width: 100%;
    color: #1d2635;

    box-shadow: 0 3px 10px rgba(100, 116, 139, 0.08);
}

.filter-input:hover,
.filter-select:hover {
    background: #ffffff;
    border-color: #b5c4d5;
}

.filter-input:focus,
.filter-select:focus {
    background: #ffffff;
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.25);
    outline: none;
}

/* IOS STYLE SELECT */
.filter-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg stroke='gray' fill='none' stroke-width='2' viewBox='0 0 24 24'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 18px;
}

/* PRICE RANGE SLIDER - LUXURY */
.price-range-container {
    padding: 8px 2px;
}

.price-range-values {
    display: flex;
    justify-content: space-between;
    font-size: 0.88rem;
    font-weight: 700;
    color: #1d2635;
    margin-bottom: 14px;
}

input[type="range"] {
    width: 100%;
    height: 6px;
    background: #d8e0ea;
    border-radius: 10px;
    outline: none;
    cursor: pointer;
    transition: 0.2s ease;
}

input[type="range"]::-webkit-slider-thumb {
    appearance: none;
    height: 20px;
    width: 20px;
    background: #3b82f6;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 6px 14px rgba(59, 130, 246, 0.45);
    transition: 0.2s;
}

input[type="range"]:active::-webkit-slider-thumb {
    transform: scale(1.15);
}

/* BUTTONS */
.filter-actions {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.btn-filter {
    padding: 12px 30px;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.25s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    border: none;
    font-size: 0.95rem;
}

.btn-apply {
    background: #3b82f6;
    color: white;
    box-shadow: 0 5px 14px rgba(59, 130, 246, 0.35);
}

.btn-apply:hover {
    background: #2563eb;
    transform: translateY(-2px);
}

.btn-reset {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #d8e0ea;
}

.btn-reset:hover {
    background: #e2e8f0;
}

/* ACTIVE FILTER TAGS — ELEGANT */
.active-filters {
    display: none;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 20px;
    padding-top: 18px;
    border-top: 1px solid #e8edf3;
}

.filter-tag {
    padding: 8px 16px;
    background: #e8f1ff;
    color: #1d2635;
    border-radius: 30px;
    font-size: 0.88rem;
    font-weight: 600;
    border: 1px solid #cbdffb;
    display: flex;
    align-items: center;
    gap: 10px;
}

.filter-tag-remove {
    width: 18px;
    height: 18px;
    background: #3b82f6;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    border-radius: 50%;
    font-size: 0.7rem;
    cursor: pointer;
    transition: 0.2s ease;
}

.filter-tag-remove:hover {
    background: #ef4444;
    transform: rotate(90deg);
}


/* ===========================
   RESULTS INFO
=========================== */
.results-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding: 18px 20px;
    background: white;
    border-radius: 8px;
    flex-wrap: wrap;
    gap: 15px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.results-count {
    font-size: 1rem;
    font-weight: 600;
    color: #2c3e50;
}

.view-options {
    display: flex;
    gap: 8px;
}

.view-btn {
    width: 42px;
    height: 42px;
    border-radius: 6px;
    border: 1px solid #ddd;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #555;
}

.view-btn.active,
.view-btn:hover {
    background: #2c3e50;
    color: white;
    border-color: #2c3e50;
}

/* ===========================
   PRODUCT CARDS
=========================== */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.product-card-enhanced {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid #e8e8e8;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.product-card-enhanced:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    border-color: #2c3e50;
}

.product-image-wrapper {
    position: relative;
    overflow: hidden;
    background: #fafafa;
    aspect-ratio: 1 / 1;
}

.product-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-card-enhanced:hover .product-image-wrapper img {
    transform: scale(1.05);
}

.badge-group {
    position: absolute;
    top: 12px;
    left: 12px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    z-index: 2;
}

.product-badge-enhanced {
    display: inline-block;
    padding: 5px 11px;
    border-radius: 6px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.badge-new {
    background: #2c3e50;
    color: white;
}

.badge-used {
    background: #7f8c8d;
    color: white;
}

.badge-discount {
    background: #e74c3c;
    color: white;
}

.badge-trending {
    background: #f39c12;
    color: white;
}

.quick-actions {
    position: absolute;
    top: 12px;
    right: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.3s ease;
    z-index: 2;
}

.product-card-enhanced:hover .quick-actions {
    opacity: 1;
    transform: translateX(0);
}

.quick-action-btn {
    width: 38px;
    height: 38px;
    border-radius: 6px;
    background: white;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2c3e50;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    cursor: pointer;
}

.quick-action-btn:hover {
    background: #2c3e50;
    color: white;
    transform: scale(1.05);
}

.product-info-enhanced {
    padding: 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.product-category-link {
    color: #7f8c8d;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 8px;
    transition: color 0.3s ease;
}

.product-category-link:hover {
    color: #2c3e50;
}

.product-title-enhanced {
    font-size: 0.95rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 12px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-decoration: none;
    min-height: 2.6em;
}

.product-title-enhanced:hover {
    color: #34495e;
}

.sales-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    background: #27ae60;
    color: white;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    margin-bottom: 10px;
    align-self: flex-start;
}

.rating-section {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}

.stars {
    display: flex;
    gap: 2px;
}

.stars i {
    color: #f39c12;
    font-size: 0.8rem;
}

.stars i.text-muted {
    color: #ddd;
}

.rating-text {
    font-size: 0.75rem;
    color: #7f8c8d;
}

.price-section {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
    flex-wrap: wrap;
}

.price-current {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2c3e50;
}

.price-original {
    font-size: 0.9rem;
    color: #95a5a6;
    text-decoration: line-through;
}

.discount-percent {
    padding: 3px 8px;
    background: #e74c3c;
    color: white;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 600;
}

.stock-indicator {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
    font-size: 0.75rem;
}

.stock-bar {
    flex: 1;
    height: 4px;
    background: #ecf0f1;
    border-radius: 2px;
    overflow: hidden;
}

.stock-fill {
    height: 100%;
    background: #27ae60;
    transition: width 0.3s ease;
}

.stock-fill.low {
    background: #e74c3c;
}

.add-to-cart-btn {
    width: 100%;
    padding: 11px;
    background: #2c3e50;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    margin-top: auto;
}

.add-to-cart-btn:hover {
    background: #34495e;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(44, 62, 80, 0.3);
    color: white;
}

/* ===========================
   EMPTY STATE
=========================== */
.empty-products {
    text-align: center;
    padding: 80px 20px;
    grid-column: 1 / -1;
}

.empty-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-title {
    font-size: 1.6rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
}

.empty-text {
    color: #7f8c8d;
    font-size: 1rem;
}

/* ===========================
   PAGINATION
=========================== */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

/* ===========================
   RESPONSIVE
=========================== */
@media (max-width: 768px) {
    .slide-inner {
        grid-template-columns: 1fr;
        padding: 40px 30px;
        min-height: auto;
    }

    .slide-headline {
        font-size: 2rem;
    }

    .slide-left img {
        max-width: 350px;
        margin: 0 auto;
    }

    .filter-grid {
        grid-template-columns: 1fr;
    }

    .filter-header {
        flex-direction: column;
        align-items: stretch;
    }

    .filter-actions {
        flex-direction: column;
    }

    .btn-filter {
        width: 100%;
        justify-content: center;
    }

    .results-info {
        flex-direction: column;
        text-align: center;
    }

    .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
}
</style>
<div class="content-section">
    <!-- Carousel Section -->
    <div class="ad-slider-wrapper">
        <div class="ad-slider-track" id="adSliderTrack">
            @foreach ($ads as $ad)
                @php
                    $price = $ad->product->price;
                    $start = $ad->product->starting_price;
                    $discount = 0;
                    if ($start > $price) {
                        $discount = round((($start - $price) / $start) * 100);
                    }
                @endphp
                <div class="ad-slide">
                    <div class="slide-inner">
                        @if ($discount > 0)
                            <div class="discount-badge">-{{ $discount }}%</div>
                        @endif
                        <div class="slide-left">
                            <img src="{{ asset('storage/' . $ad->bg_image) }}" alt="Ad Image">
                        </div>
                        <div class="slide-right">
                            <h4 class="slide-sub">{{ $ad->product->product_name }}</h4>
                            <h1 class="slide-headline">{{ $ad->headline }}</h1>
                            <p class="slide-desc">{{ $ad->description }}</p>
                            <div class="price-box">
                                <span class="price-now">Rp {{ number_format($price, 0, ',', '.') }}</span>
                                @if ($start > $price)
                                    <span class="price-old">Rp {{ number_format($start, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <a href="{{ $ad->button_link }}" class="btn-slide">{{ $ad->button_text }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="slider-buttons">
            <button id="prevBtn" class="nav-btn">❮</button>
            <button id="nextBtn" class="nav-btn">❯</button>
        </div>
    </div>

    <!-- Advanced Filters Section -->
    <div class="filters-section">
        <div class="filters-container">
            <div class="filter-header">
                <h2 class="filter-title">
                    <i class="fas fa-filter"></i> Filter Produk
                </h2>
                <div class="filter-actions">
                    <button class="btn-filter btn-apply" id="applyFilters">
                        <i class="fas fa-check"></i> Terapkan
                    </button>
                    <button class="btn-filter btn-reset" id="resetFilters">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                </div>
            </div>

            <div class="filter-grid">
                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-search"></i> Cari Produk
                    </label>
                    <input type="text" id="searchInput" class="filter-input" placeholder="Nama produk...">
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-tag"></i> Kondisi
                    </label>
                    <select id="conditionFilter" class="filter-select">
                        <option value="">Semua Kondisi</option>
                        <option value="new">Baru</option>
                        <option value="used">Bekas</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-box"></i> Ketersediaan
                    </label>
                    <select id="stockFilter" class="filter-select">
                        <option value="">Semua</option>
                        <option value="in-stock">Tersedia</option>
                        <option value="low-stock">Stok Menipis</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-sort"></i> Urutkan
                    </label>
                    <select id="sortFilter" class="filter-select">
                        <option value="newest">Terbaru</option>
                        <option value="popular">Terpopuler</option>
                        <option value="price-low">Harga Terendah</option>
                        <option value="price-high">Harga Tertinggi</option>
                        <option value="rating">Rating Tertinggi</option>
                        <option value="name-az">Nama A-Z</option>
                    </select>
                </div>
            </div>

            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-dollar-sign"></i> Rentang Harga
                </label>
                <div class="price-range-container">
                    <div class="price-range-values">
                        <span id="minPriceDisplay">Rp 0</span>
                        <span id="maxPriceDisplay">Rp 10.000.000</span>
                    </div>
                    <input type="range" id="minPrice" class="filter-input" min="0" max="10000000" step="100000" value="0">
                    <input type="range" id="maxPrice" class="filter-input" min="0" max="10000000" step="100000" value="10000000">
                </div>
            </div>

            <div class="active-filters" id="activeFilters"></div>
        </div>
    </div>

    <!-- Results Info -->
    <div class="container">
        <div class="results-info">
            <div class="results-count">
                Menampilkan <strong id="productCount">{{ $products->total() }}</strong> produk
            </div>
            <div class="view-options">
                <button class="view-btn active" data-view="grid" title="Grid View">
                    <i class="fas fa-th"></i>
                </button>
                <button class="view-btn" data-view="list" title="List View">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="container">
        <div class="product-grid" id="productsGrid">
            @forelse ($products as $product)
                <div class="product-item" 
                     data-name="{{ strtolower($product->product_name) }}"
                     data-condition="{{ $product->condition }}"
                     data-price="{{ $product->price }}"
                     data-stock="{{ $product->stock }}"
                     data-rating="{{ $product->average_rating ?? 0 }}"
                     data-sales="{{ $product->monthly_sales ?? 0 }}">
                    
                    <div class="product-card-enhanced">
                        <!-- Image Section -->
                        <div class="product-image-wrapper">
                            <a href="{{ route('product.detail', $product->id) }}">
                                <img src="{{ asset('storage/' . $product->img) }}" 
                                     alt="{{ $product->product_name }}"
                                     onerror="this.src='{{ asset('img/product-3.png') }}'">
                            </a>

                            <!-- Badges -->
                            <div class="badge-group">
                                <span class="product-badge-enhanced {{ $product->condition == 'new' ? 'badge-new' : 'badge-used' }}">
                                    {{ $product->condition == 'new' ? 'Baru' : 'Bekas' }}
                                </span>
                                
                                @php
                                    $originalPrice = (int) $product->starting_price;
                                    $currentPrice = (int) $product->price;
                                    $discount = $originalPrice > $currentPrice ? round((($originalPrice - $currentPrice) / $originalPrice) * 100) : 0;
                                @endphp
                                
                                @if($discount > 0)
                                    <span class="product-badge-enhanced badge-discount">
                                        -{{ $discount }}%
                                    </span>
                                @endif

                                @if(isset($product->monthly_sales) && $product->monthly_sales > 50)
                                    <span class="product-badge-enhanced badge-trending">
                                        🔥 Trending
                                    </span>
                                @endif
                            </div>

                            <!-- Quick Actions -->
                            <div class="quick-actions">
                                <button class="quick-action-btn" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#wishlistModal"
                                        data-product-id="{{ $product->id }}"
                                        title="Tambah ke Wishlist">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="quick-action-btn" title="Quick View">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="product-info-enhanced">
                            <a href="#" class="product-category-link">
                                {{ $product->category->category_name ?? 'Uncategorized' }}
                            </a>

                            <a href="{{ route('product.detail', $product->id) }}" class="product-title-enhanced">
                                {{ $product->product_name }}
                            </a>

                            <!-- Sales Info -->
                            @if(isset($product->monthly_sales) && $product->monthly_sales > 0)
                                <div class="sales-badge">
                                    <i class="fas fa-fire"></i>
                                    Terjual {{ number_format($product->monthly_sales) }}
                                </div>
                            @endif

                            <!-- Rating -->
                            <div class="rating-section">
                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= ($product->average_rating ?? 0) ? '' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                                <span class="rating-text">
                                    {{ number_format($product->average_rating ?? 0, 1) }} 
                                    ({{ $product->rating_count ?? 0 }} ulasan)
                                </span>
                            </div>

                            <!-- Price -->
                            <div class="price-section">
                                <span class="price-current">
                                    Rp {{ number_format($currentPrice, 0, ',', '.') }}
                                </span>
                                @if($discount > 0)
                                    <span class="price-original">
                                        Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                    </span>
                                    <span class="discount-percent">-{{ $discount }}%</span>
                                @endif
                            </div>

                            <!-- Stock Indicator -->
                            @php
                                $stockPercentage = min(100, ($product->stock / 100) * 100);
                                $stockClass = $product->stock <= 10 ? 'low' : '';
                            @endphp
                            <div class="stock-indicator">
                                <span style="font-weight: 600; color: {{ $product->stock <= 10 ? '#e74c3c' : '#27ae60' }}">
                                    {{ $product->stock }} tersisa
                                </span>
                                <div class="stock-bar">
                                    <div class="stock-fill {{ $stockClass }}" style="width: {{ $stockPercentage }}%"></div>
                                </div>
                            </div>

                            <!-- Add to Cart Button -->
                            <a href="{{ route('addCart', $product->id) }}" class="add-to-cart-btn">
                                <i class="fas fa-shopping-cart"></i>
                                Tambah ke Keranjang
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-products">
                    <div class="empty-icon">📦</div>
                    <h2 class="empty-title">Produk Tidak Ditemukan</h2>
                    <p class="empty-text">Coba ubah filter pencarian Anda</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal Wishlist -->
<div class="modal fade" id="wishlistModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            @php
                $categories = auth()->check() ? (auth()->user()->buyer->wishlistCategories ?? collect()) : collect();
            @endphp

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
                        <button class="btn btn-primary w-100" type="submit">Buat Kategori</button>
                    </form>
                </div>
            @else
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Kategori Wishlist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="wishlistForm" method="POST">
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
    document.addEventListener("DOMContentLoaded", function() {
    
    // ===========================
    // AD SLIDER
    // ===========================
    const track = document.getElementById("adSliderTrack");
    if (track) {
        const slides = Array.from(track.children);
        if (slides.length > 0) {
            const slideWidth = slides[0].offsetWidth;
            let index = 1;

            const firstClone = slides[0].cloneNode(true);
            const lastClone = slides[slides.length - 1].cloneNode(true);
            track.appendChild(firstClone);
            track.insertBefore(lastClone, slides[0]);

            const totalSlides = track.children.length;
            track.style.transform = `translateX(-${slideWidth * index}px)`;

            const nextBtn = document.getElementById("nextBtn");
            const prevBtn = document.getElementById("prevBtn");

            if (nextBtn) {
                nextBtn.addEventListener("click", () => {
                    if (index >= totalSlides - 1) return;
                    index++;
                    track.style.transition = "transform 0.5s ease";
                    track.style.transform = `translateX(-${slideWidth * index}px)`;
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener("click", () => {
                    if (index <= 0) return;
                    index--;
                    track.style.transition = "transform 0.5s ease";
                    track.style.transform = `translateX(-${slideWidth * index}px)`;
                });
            }

            track.addEventListener("transitionend", () => {
                const currentSlide = track.children[index];
                if (currentSlide && currentSlide.isEqualNode(firstClone)) {
                    track.style.transition = "none";
                    index = 1;
                    track.style.transform = `translateX(-${slideWidth * index}px)`;
                }
                if (currentSlide && currentSlide.isEqualNode(lastClone)) {
                    track.style.transition = "none";
                    index = totalSlides - 2;
                    track.style.transform = `translateX(-${slideWidth * index}px)`;
                }
            });

            // Auto slide every 5 seconds
            setInterval(() => {
                if (nextBtn) nextBtn.click();
            }, 5000);
        }
    }

    // ===========================
    // ADVANCED FILTERS
    // ===========================
    const filterState = {
        search: '',
        condition: '',
        stock: '',
        sort: 'newest',
        minPrice: 0,
        maxPrice: 10000000
    };

    function formatRupiah(amount) {
        return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Price range inputs
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');
    const minPriceDisplay = document.getElementById('minPriceDisplay');
    const maxPriceDisplay = document.getElementById('maxPriceDisplay');

    if (minPriceInput && minPriceDisplay) {
        minPriceInput.addEventListener('input', function() {
            filterState.minPrice = parseInt(this.value);
            minPriceDisplay.textContent = formatRupiah(filterState.minPrice);
        });
    }

    if (maxPriceInput && maxPriceDisplay) {
        maxPriceInput.addEventListener('input', function() {
            filterState.maxPrice = parseInt(this.value);
            maxPriceDisplay.textContent = formatRupiah(filterState.maxPrice);
        });
    }

    // Collect filter values
    function collectFilters() {
        const searchInput = document.getElementById('searchInput');
        const conditionFilter = document.getElementById('conditionFilter');
        const stockFilter = document.getElementById('stockFilter');
        const sortFilter = document.getElementById('sortFilter');

        if (searchInput) filterState.search = searchInput.value.toLowerCase();
        if (conditionFilter) filterState.condition = conditionFilter.value;
        if (stockFilter) filterState.stock = stockFilter.value;
        if (sortFilter) filterState.sort = sortFilter.value;
    }

    // Apply filters
    function applyFilters() {
        collectFilters();
        
        const products = Array.from(document.querySelectorAll('.product-item'));
        let visibleCount = 0;

        products.forEach(product => {
            const name = product.dataset.name || '';
            const condition = product.dataset.condition || '';
            const price = parseInt(product.dataset.price) || 0;
            const stock = parseInt(product.dataset.stock) || 0;

            let show = true;

            // Search filter
            if (filterState.search && !name.includes(filterState.search)) {
                show = false;
            }

            // Condition filter
            if (filterState.condition && condition !== filterState.condition) {
                show = false;
            }

            // Stock filter
            if (filterState.stock === 'in-stock' && stock <= 0) {
                show = false;
            } else if (filterState.stock === 'low-stock' && stock > 10) {
                show = false;
            }

            // Price filter
            if (price < filterState.minPrice || price > filterState.maxPrice) {
                show = false;
            }

            product.style.display = show ? '' : 'none';
            if (show) visibleCount++;
        });

        // Sort products
        sortProducts(products.filter(p => p.style.display !== 'none'));

        // Update count
        const productCount = document.getElementById('productCount');
        if (productCount) {
            productCount.textContent = visibleCount;
        }

        // Show active filters
        updateActiveFilters();
    }

    // Sort products
    function sortProducts(visibleProducts) {
        const container = document.getElementById('productsGrid');
        if (!container) return;
        
        visibleProducts.sort((a, b) => {
            const priceA = parseInt(a.dataset.price) || 0;
            const priceB = parseInt(b.dataset.price) || 0;
            const ratingA = parseFloat(a.dataset.rating) || 0;
            const ratingB = parseFloat(b.dataset.rating) || 0;
            const salesA = parseInt(a.dataset.sales) || 0;
            const salesB = parseInt(b.dataset.sales) || 0;
            const nameA = a.dataset.name || '';
            const nameB = b.dataset.name || '';

            switch(filterState.sort) {
                case 'popular':
                    return salesB - salesA;
                case 'price-low':
                    return priceA - priceB;
                case 'price-high':
                    return priceB - priceA;
                case 'rating':
                    return ratingB - ratingA;
                case 'name-az':
                    return nameA.localeCompare(nameB);
                default:
                    return 0;
            }
        });

        visibleProducts.forEach(product => {
            container.appendChild(product);
        });
    }

    // Update active filters display
    function updateActiveFilters() {
        const activeFiltersDiv = document.getElementById('activeFilters');
        if (!activeFiltersDiv) return;

        const filters = [];

        if (filterState.search) {
            filters.push({ label: `Pencarian: "${filterState.search}"`, key: 'search' });
        }
        if (filterState.condition) {
            const condLabel = filterState.condition === 'new' ? 'Baru' : 'Bekas';
            filters.push({ label: `Kondisi: ${condLabel}`, key: 'condition' });
        }
        if (filterState.stock) {
            const stockLabel = filterState.stock === 'in-stock' ? 'Tersedia' : 'Stok Menipis';
            filters.push({ label: `Stok: ${stockLabel}`, key: 'stock' });
        }
        if (filterState.minPrice > 0 || filterState.maxPrice < 10000000) {
            filters.push({ 
                label: `Harga: ${formatRupiah(filterState.minPrice)} - ${formatRupiah(filterState.maxPrice)}`, 
                key: 'price' 
            });
        }

        if (filters.length > 0) {
            activeFiltersDiv.style.display = 'flex';
            activeFiltersDiv.innerHTML = filters.map(f => `
                <div class="filter-tag">
                    ${f.label}
                    <span class="filter-tag-remove" data-filter-key="${f.key}">×</span>
                </div>
            `).join('');

            // Add event listeners to remove buttons
            activeFiltersDiv.querySelectorAll('.filter-tag-remove').forEach(btn => {
                btn.addEventListener('click', function() {
                    removeFilter(this.dataset.filterKey);
                });
            });
        } else {
            activeFiltersDiv.style.display = 'none';
        }
    }

    // Remove individual filter
    function removeFilter(key) {
        const searchInput = document.getElementById('searchInput');
        const conditionFilter = document.getElementById('conditionFilter');
        const stockFilter = document.getElementById('stockFilter');

        switch(key) {
            case 'search':
                if (searchInput) searchInput.value = '';
                break;
            case 'condition':
                if (conditionFilter) conditionFilter.value = '';
                break;
            case 'stock':
                if (stockFilter) stockFilter.value = '';
                break;
            case 'price':
                if (minPriceInput) {
                    minPriceInput.value = 0;
                    minPriceDisplay.textContent = 'Rp 0';
                }
                if (maxPriceInput) {
                    maxPriceInput.value = 10000000;
                    maxPriceDisplay.textContent = 'Rp 10.000.000';
                }
                filterState.minPrice = 0;
                filterState.maxPrice = 10000000;
                break;
        }
        applyFilters();
    }

    // Reset all filters
    function resetFilters() {
        const searchInput = document.getElementById('searchInput');
        const conditionFilter = document.getElementById('conditionFilter');
        const stockFilter = document.getElementById('stockFilter');
        const sortFilter = document.getElementById('sortFilter');

        if (searchInput) searchInput.value = '';
        if (conditionFilter) conditionFilter.value = '';
        if (stockFilter) stockFilter.value = '';
        if (sortFilter) sortFilter.value = 'newest';
        if (minPriceInput) {
            minPriceInput.value = 0;
            minPriceDisplay.textContent = 'Rp 0';
        }
        if (maxPriceInput) {
            maxPriceInput.value = 10000000;
            maxPriceDisplay.textContent = 'Rp 10.000.000';
        }
        
        filterState.search = '';
        filterState.condition = '';
        filterState.stock = '';
        filterState.sort = 'newest';
        filterState.minPrice = 0;
        filterState.maxPrice = 10000000;
        
        applyFilters();
    }

    // Event listeners for filters
    const applyFiltersBtn = document.getElementById('applyFilters');
    const resetFiltersBtn = document.getElementById('resetFilters');
    const searchInput = document.getElementById('searchInput');
    const sortFilter = document.getElementById('sortFilter');

    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', applyFilters);
    }

    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', resetFilters);
    }

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    if (sortFilter) {
        sortFilter.addEventListener('change', applyFilters);
    }

    // View toggle (Grid/List)
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const view = this.dataset.view;
            const grid = document.getElementById('productsGrid');
            
            if (grid) {
                if (view === 'list') {
                    grid.style.gridTemplateColumns = '1fr';
                } else {
                    grid.style.gridTemplateColumns = '';
                }
            }
        });
    });

    // Wishlist modal
    const wishlistModal = document.getElementById('wishlistModal');
    if (wishlistModal) {
        wishlistModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            if (button) {
                const productId = button.getAttribute('data-product-id');
                const form = document.getElementById('wishlistForm');
                if (form && productId) {
                    form.action = "/wishlist/store/" + productId;
                }
            }
        });
    }
});
</script>

@endsection