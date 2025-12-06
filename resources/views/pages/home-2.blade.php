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
    }

    /* ===========================
       CAROUSEL SECTION
    =========================== */
    .dua {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
        margin-bottom: 40px;
        padding: 0 20px;
    }

    .ad-slider-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .ad-slider-track {
        display: flex;
        transition: transform 0.45s ease;
    }

    .ad-slide {
        min-width: 100%;
        flex-shrink: 0;
    }

    .slide-inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        padding: 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        position: relative;
    }

    .discount-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #ff416c;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .slide-left img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .slide-right {
        padding: 0 20px;
    }

    .slide-sub {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 10px;
    }

    .slide-headline {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .slide-desc {
        font-size: 1.1rem;
        margin-bottom: 20px;
        opacity: 0.95;
    }

    .price-box {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
    }

    .price-now {
        font-size: 2rem;
        font-weight: 800;
    }

    .price-old {
        font-size: 1.3rem;
        text-decoration: line-through;
        opacity: 0.7;
    }

    .btn-slide {
        display: inline-block;
        padding: 15px 40px;
        background: white;
        color: #667eea;
        border-radius: 30px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-slide:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .slider-buttons {
        position: absolute;
        bottom: 20px;
        right: 20px;
        display: flex;
        gap: 10px;
        z-index: 10;
    }

    .nav-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        cursor: pointer;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .nav-btn:hover {
        background: white;
        transform: scale(1.1);
    }

    .satulagi img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    /* ===========================
       FILTERS SECTION
    =========================== */
    .filters-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px 0;
        margin-bottom: 40px;
    }

    .filters-container {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        max-width: 1400px;
        margin: 0 auto;
    }

    .filter-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .filter-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #19253d;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .filter-label {
        font-size: 0.9rem;
        font-weight: 600;
        color: #4a5568;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .filter-input,
    .filter-select {
        padding: 12px 15px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
        width: 100%;
    }

    .filter-input:focus,
    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .price-range-container {
        padding: 10px 0;
    }

    .price-range-values {
        display: flex;
        justify-content: space-between;
        font-size: 1rem;
        font-weight: 600;
        color: #19253d;
        margin-bottom: 15px;
    }

    .filter-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-filter {
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
    }

    .btn-apply {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-apply:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-reset {
        background: #f7fafc;
        color: #4a5568;
        border: 2px solid #e2e8f0;
    }

    .btn-reset:hover {
        background: #e2e8f0;
    }

    .active-filters {
        display: none;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #e2e8f0;
    }

    .filter-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: #f0f4ff;
        color: #667eea;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .filter-tag-remove {
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 20px;
        height: 20px;
        background: #667eea;
        color: white;
        border-radius: 50%;
        font-size: 0.75rem;
        transition: all 0.2s ease;
    }

    .filter-tag-remove:hover {
        background: #5568d3;
        transform: rotate(90deg);
    }

    /* ===========================
       RESULTS INFO
    =========================== */
    .results-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 20px 25px;
        background: #f7fafc;
        border-radius: 15px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .results-count {
        font-size: 1.1rem;
        font-weight: 600;
        color: #19253d;
    }

    .view-options {
        display: flex;
        gap: 10px;
    }

    .view-btn {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #4a5568;
    }

    .view-btn.active,
    .view-btn:hover {
        background: #667eea;
        color: white;
        border-color: #667eea;
    }

    /* ===========================
       PRODUCT CARDS
    =========================== */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .product-card-enhanced {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(25, 37, 61, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        border: 1px solid rgba(25, 37, 61, 0.06);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card-enhanced:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(25, 37, 61, 0.15);
        border-color: #667eea;
    }

    .product-image-wrapper {
        position: relative;
        overflow: hidden;
        background: #f8f9fa;
        aspect-ratio: 1 / 1;
    }

    .product-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .product-card-enhanced:hover .product-image-wrapper img {
        transform: scale(1.08);
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
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .badge-new {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .badge-used {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .badge-discount {
        background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
        color: white;
    }

    .badge-trending {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
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
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #19253d;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quick-action-btn:hover {
        background: #667eea;
        color: white;
        transform: scale(1.1);
    }

    .product-info-enhanced {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-category-link {
        color: #667eea;
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
        color: #19253d;
    }

    .product-title-enhanced {
        font-size: 1rem;
        font-weight: 700;
        color: #19253d;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-decoration: none;
        min-height: 2.8em;
    }

    .product-title-enhanced:hover {
        color: #667eea;
    }

    .sales-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        border-radius: 15px;
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
        color: #fbbf24;
        font-size: 0.85rem;
    }

    .stars i.text-muted {
        color: #e0e0e0;
    }

    .rating-text {
        font-size: 0.8rem;
        color: #666;
    }

    .price-section {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .price-current {
        font-size: 1.4rem;
        font-weight: 800;
        color: #19253d;
    }

    .price-original {
        font-size: 0.95rem;
        color: #999;
        text-decoration: line-through;
    }

    .discount-percent {
        padding: 4px 8px;
        background: #ff416c;
        color: white;
        border-radius: 10px;
        font-size: 0.7rem;
        font-weight: 700;
    }

    .stock-indicator {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        font-size: 0.8rem;
    }

    .stock-bar {
        flex: 1;
        height: 5px;
        background: #e9ecef;
        border-radius: 3px;
        overflow: hidden;
    }

    .stock-fill {
        height: 100%;
        background: linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
        transition: width 0.3s ease;
    }

    .stock-fill.low {
        background: linear-gradient(90deg, #ff416c 0%, #ff4b2b 100%);
    }

    .add-to-cart-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #19253d 0%, #667eea 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
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
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(25, 37, 61, 0.3);
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
        font-size: 5rem;
        margin-bottom: 20px;
    }

    .empty-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #19253d;
        margin-bottom: 10px;
    }

    .empty-text {
        color: #718096;
        font-size: 1.1rem;
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
    @media (max-width: 1200px) {
        .dua {
            grid-template-columns: 1fr;
        }

        .satulagi {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .slide-inner {
            grid-template-columns: 1fr;
            padding: 30px 20px;
        }

        .slide-headline {
            font-size: 1.8rem;
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
    <div class="dua">
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
        <div class="satulagi">
            <img src="{{ asset('img/carousel-2.png') }}" alt="">
        </div>
    </div>

    <!-- Advanced Filters Section -->
    <div class="filters-section">
        <div class="container">
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
                                {{ $product->category->name ?? 'Uncategorized' }}
                            </a>

                            <a href="{{ route('product.detail', $product->id) }}" class="product-title-enhanced">
                                {{ $product->product_name }}
                            </a>

                            <!-- Sales Info -->
                            @if(isset($product->monthly_sales) && $product->monthly_sales > 0)
                                <div class="sales-badge">
                                    <i class="fas fa-fire"></i>
                                    Terjual {{ number_format($product->monthly_sales) }} bulan ini
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
                                <span style="font-weight: 600; color: {{ $product->stock <= 10 ? '#ff416c' : '#11998e' }}">
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
                    track.style.transition = "transform 0.45s ease";
                    track.style.transform = `translateX(-${slideWidth * index}px)`;
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener("click", () => {
                    if (index <= 0) return;
                    index--;
                    track.style.transition = "transform 0.45s ease";
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

            // Auto slide
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

    // View toggle
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