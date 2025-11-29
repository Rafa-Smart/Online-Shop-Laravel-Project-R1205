@extends('layouts.head')

@section('title', 'Home - Electro Laravel')

@section('content')
<style>
    /* ===========================
        GENERAL STYLES
    =========================== */
    body {
        font-family: 'Inter', sans-serif;
    }

    /* Badge "New" */
    .product-new, .product-badge {
        background-color: #3282b8;
        color: #fff;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 12px;
        position: absolute;
        top: 10px;
        left: 10px;
        letter-spacing: 0.3px;
        box-shadow: 0 3px 8px rgba(50,130,184,0.3);
        z-index: 10;
    }

    /* PRODUCT CARD */
    .product-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(25,37,61,0.08);
        transition: all 0.3s ease;
        position: relative;
        border: 1px solid rgba(25,37,61,0.1);
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 24px rgba(25,37,61,0.18);
    }

    .product-image img {
        width: 100%;
        border-radius: 16px 16px 0 0;
        transition: transform 0.4s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.07);
    }

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

    .btn-add, .btn-fav {
        background: #19253d;
        color: #fff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 3px 8px rgba(25,37,61,0.25);
    }

    .btn-add:hover, .btn-fav:hover {
        background: #3282b8;
        transform: scale(1.1);
    }

    /* PRODUCT INFO */
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

    .product-pricing .price-old {
        text-decoration: line-through;
        color: #777;
        font-size: 0.9rem;
        margin-right: 6px;
    }

    .product-pricing .price-new {
        color: #19253d;
        font-weight: 700;
        font-size: 1.1rem;
    }

    /* Rating */
    .product-rating i {
        color: #fbbf24;
        font-size: 0.9rem;
    }

    /* ===========================
        DUAL SLIDER
    =========================== */
    .dual-slider-wrapper {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }

    .slider-horizontal {
        flex: 1 1 60%;
        position: relative;
        overflow: hidden;
    }

    .slider-horizontal .ad-slider-track {
        display: flex;
        transition: transform 0.5s ease;
    }

    .ad-slide {
        min-width: 100%;
        display: flex;
        justify-content: center;
        padding: 10px;
    }

    .slider-vertical {
        flex: 1 1 35%;
        position: relative;
        height: 600px;
        overflow: hidden;
    }

    .slider-vertical .ad-slider-track.vertical {
        display: flex;
        flex-direction: column;
        transition: transform 0.5s ease;
    }

    .ad-slide-vertical {
        height: 250px;
        margin-bottom: 20px;
    }

    .slide-inner {
        background: linear-gradient(135deg, #e8f1ff, #ffffff);
        border-radius: 20px;
        padding: 20px;
        display: flex;
        gap: 20px;
        box-shadow: 0 15px 30px rgba(0,93,255,0.15);
        align-items: center;
    }

    .slide-left img {
        width: 150px;
        height: 120px;
        object-fit: contain;
        border-radius: 12px;
        background: #f3f7ff;
    }

    .slide-right {
        flex: 1;
    }

    .slide-sub {
        font-size: 0.85rem;
        font-weight: 700;
        color: #0d6efd;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .slide-headline {
        font-size: 1.4rem;
        font-weight: 800;
        color: #042f67;
        margin-bottom: 10px;
    }

    .slide-desc {
        font-size: 0.9rem;
        color: #555;
    }

    .price-box {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .price-now {
        font-weight: 900;
        color: #007bff;
    }

    .btn-slide {
        margin-top: 10px;
        display: inline-block;
        background: linear-gradient(135deg, #0d6efd, #3c8dff);
        color: white;
        padding: 10px 20px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.25s ease;
    }

    .btn-slide:hover {
        transform: translateY(-3px);
        background: #0a54d6;
    }

    .nav-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: none;
        background: #0d6efd;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: .2s ease;
    }

    .nav-btn:hover {
        transform: scale(1.1);
        background: #084dc9;
    }

    .slider-buttons.horizontal-buttons {
        bottom: 15px;
        right: 15px;
        position: absolute;
    }

    .slider-buttons.vertical-buttons {
        top: 15px;
        right: 15px;
        position: absolute;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    /* RESPONSIVE */
    @media(max-width: 992px) {
        .dual-slider-wrapper {
            flex-direction: column;
        }

        .slider-horizontal, .slider-vertical {
            flex: 1 1 100%;
        }

        .slider-vertical {
            height: auto;
        }
    }

    /* ===========================
        TABS PRODUCT
    =========================== */
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
        box-shadow: 0 4px 10px rgba(25,37,61,0.25);
    }

    .costume-tab.active {
        background-color: #19253d;
        color: #fff;
        box-shadow: 0 3px 8px rgba(25,37,61,0.3);
    }

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

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="content-section">

    <!-- DUAL SLIDER -->
    <div class="dual-slider-wrapper">

        <!-- HORIZONTAL SLIDER -->
        <div class="slider-horizontal">
            <div class="ad-slider-track" id="horizontalSlider">
                @foreach ($ads as $ad)
                <div class="ad-slide">
                    <div class="slide-inner">
                        <div class="slide-left">
                            <img src="{{ asset('storage/'.$ad->bg_image) }}" alt="Ad Image">
                        </div>
                        <div class="slide-right">
                            <h4 class="slide-sub">{{ $ad->product->product_name }}</h4>
                            <h1 class="slide-headline">{{ $ad->headline }}</h1>
                            <p class="slide-desc">{{ $ad->description }}</p>
                            <div class="price-box">
                                <span class="price-now">Rp {{ number_format($ad->product->price,0,',','.') }}</span>
                                @if($ad->product->starting_price > $ad->product->price)
                                <span class="price-old">Rp {{ number_format($ad->product->starting_price,0,',','.') }}</span>
                                @endif
                            </div>
                            <a href="{{ $ad->button_link }}" class="btn-slide">{{ $ad->button_text }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-buttons horizontal-buttons">
                <button id="prevHorizontal" class="nav-btn">❮</button>
                <button id="nextHorizontal" class="nav-btn">❯</button>
            </div>
        </div>

        <!-- VERTICAL SLIDER -->
        <div class="slider-vertical">
            <div class="ad-slider-track vertical" id="verticalSlider">
                @foreach ($ads as $ad)
                <div class="ad-slide-vertical">
                    <div class="slide-inner">
                        <div class="slide-left">
                            <img src="{{ asset('storage/'.$ad->bg_image) }}" alt="Ad Image">
                        </div>
                        <div class="slide-right">
                            <h4 class="slide-sub">{{ $ad->product->product_name }}</h4>
                            <h1 class="slide-headline">{{ $ad->headline }}</h1>
                            <p class="slide-desc">{{ $ad->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-buttons vertical-buttons">
                <button id="prevVertical" class="nav-btn">▲</button>
                <button id="nextVertical" class="nav-btn">▼</button>
            </div>
        </div>

    </div>

    <!-- PRODUCT TABS -->
    <div class="container-fluid product mt-5">
        <div class="container">
            <div class="tab-class">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-4 text-start">
                        <h1 class="product-heading">Our Products</h1>
                    </div>
                    <div class="col-lg-8 text-end">
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
                        <div class="row g-4">
                            @foreach ($products as $product)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product-card">
                                    <div class="product-image">
                                        <a href="{{ route('product.detail', $product->id) }}">
                                            <img src="{{ asset('storage/' . $product->img) }}"
                                                 onerror="this.onerror=null; this.src='{{ asset('img/product-3.png') }}'">
                                        </a>
                                        <span class="product-badge">New</span>
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
                                        <div class="product-pricing">
                                            @php
                                                $originalPrice = (int)$product->starting_price;
                                                $currentPrice = (int)$product->price;
                                                $isDiscounted = $originalPrice > $currentPrice;
                                                $discountPercentage = $isDiscounted ? round((($originalPrice-$currentPrice)/$originalPrice)*100) : 0;
                                            @endphp
                                            @if($isDiscounted)
                                                <del class="price-old">Rp.{{ number_format($originalPrice,0,',','.') }}</del>
                                                <span class="badge bg-danger ms-2">{{ $discountPercentage }}% OFF</span>
                                            @endif
                                            <span class="price-new">Rp.{{ number_format($currentPrice,0,',','.') }}</span>
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
                        </div>

                        <!-- Pagination -->
                        <div class="mt-5 d-flex justify-content-center">
                            <div class="pagination-wrapper">
                                {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Wishlist -->
    <div class="modal fade" id="wishlistModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                @php $categories = auth()->user()->buyer->wishlistCategories; @endphp

                @if($categories->count() == 0)
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
                    <form id="wishlistForm" method="POST" action="{{ route('wishlist.category.store') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="wishlistProductId">
                            <label>Pilih kategori:</label>
                            <select name="wishlist_category_id" class="form-control" required>
                                @foreach($categories as $cat)
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
</div>

<!-- JS SCRIPTS -->
<script>
    // --------------------------
    // HORIZONTAL SLIDER
    // --------------------------
    const horizontalSlider = document.getElementById('horizontalSlider');
    let hIndex = 0;
    document.getElementById('prevHorizontal').addEventListener('click', ()=>{
        const slides = horizontalSlider.children.length;
        hIndex = (hIndex-1+slides)%slides;
        horizontalSlider.style.transform = `translateX(-${hIndex*100}%)`;
    });
    document.getElementById('nextHorizontal').addEventListener('click', ()=>{
        const slides = horizontalSlider.children.length;
        hIndex = (hIndex+1)%slides;
        horizontalSlider.style.transform = `translateX(-${hIndex*100}%)`;
    });

    // --------------------------
    // VERTICAL SLIDER
    // --------------------------
    const verticalSlider = document.getElementById('verticalSlider');
    let vIndex = 0;
    document.getElementById('prevVertical').addEventListener('click', ()=>{
        const slides = verticalSlider.children.length;
        vIndex = (vIndex-1+slides)%slides;
        verticalSlider.style.transform = `translateY(-${vIndex*270}px)`;
    });
    document.getElementById('nextVertical').addEventListener('click', ()=>{
        const slides = verticalSlider.children.length;
        vIndex = (vIndex+1)%slides;
        verticalSlider.style.transform = `translateY(-${vIndex*270}px)`;
    });

    // --------------------------
    // PRODUCT TABS
    // --------------------------
    const tabs = document.querySelectorAll('.costume-tab');
    tabs.forEach(tab=>{
        tab.addEventListener('click', ()=>{
            tabs.forEach(t=>t.classList.remove('active'));
            tab.classList.add('active');
            const tabId = tab.getAttribute('data-tab');
            document.querySelectorAll('.tab-pane').forEach(pane=>pane.classList.remove('active','show'));
            document.getElementById(tabId).classList.add('active','show');
        });
    });

    // --------------------------
    // WISHLIST MODAL
    // --------------------------
    const wishlistModal = document.getElementById('wishlistModal');
    wishlistModal.addEventListener('show.bs.modal', function(event){
        const button = event.relatedTarget;
        const productId = button.getAttribute('data-product-id');
        const form = document.getElementById('wishlistForm');
        if(form){
            form.action = "/wishlist/store/"+productId;
        }
    });
</script>
@endsection
