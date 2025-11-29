@php
    $products = \App\Models\Wishlist::where('wishlist_category_id', $id)
        ->where('buyer_id', auth()->user()->buyer->id)
        ->with('product')
        ->get()
        ->pluck('product');
@endphp

{{-- <div id="content-{{ $category_id }}" class="tab-content">
    <div class="row g-4">
        @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3">
                @include('pages.wishlist.productCard', ['product' => $product])
            </div>
        @endforeach
    </div>
</div> --}}



@extends('layouts.head')

@section('title', 'Wishlist - Electro Laravel')

@section('content')

    <style>
        .top-tabs {
            display: flex;
            gap: 40px;
            position: relative;
            border-bottom: 2px solid #e6e6e6;
            margin-bottom: 20px;
            padding-bottom: 8px;
        }

        .top-tab {
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            padding-bottom: 8px;
            color: #333;
        }

        .top-tab.active {
            color: #0d6efd;
        }

        .tab-indicator {
            position: absolute;
            bottom: -2px;
            height: 3px;
            background: #0d6efd;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>

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



        .btn-delete-wishlist {
            background: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .btn-delete-wishlist i {
            color: #ff4d4d;
            /* warna merah ikon (bisa ganti) */
            font-size: 20px;
            transition: 0.2s;
            /* position: relative;
                        right: 3px; */
        }

        .btn-delete-wishlist:hover i {
            color: #d93636;
            transform: scale(1.1);
        }

        .btn-add {
            background: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-add i {
            color: #1e88e5;
            /* warna biru ikon (bisa diganti) */
            font-size: 20px;
            transition: 0.2s ease;
            position: relative;
            right: 1px;
            bottom: 3px;
        }

        .btn-add:hover i {
            color: #0d6efd;
            transform: scale(1.1);
        }



        .product-card {
            position: relative;
            overflow: hidden;
        }

        .product-hover {
            position: absolute;
            right: 10px;
            /* top: 90px; */
            width: 42px;
            background: rgba(0, 0, 0, 0.7);
            padding: 12px 0;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            height: 90px;

            /* ANIMASI BARU */
            opacity: 1;
            /* langsung kelihatan */
            transform: translateY(40px);
            /* muncul dari bawah */
            transition: transform 0.50s ease;
        }

        /* Saat hover product, batang naik */
        .product-card:hover .product-hover {
            transform: translateY(0);
            /* naik ke posisi normal */
        }

        /* Button transparan */
        .btn-add,
        .btn-delete-wishlist {
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .btn-add i,
        .btn-delete-wishlist i {
            color: #fff;
            font-size: 15px;
            transition: 0.25s ease;
        }

        /* efek hover ikon */
        .btn-add:hover i,
        .btn-delete-wishlist:hover i {
            transform: scale(1.15);
            opacity: 0.8;
        }
    </style>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="fw-bold">Wishlist</h3>
                </div>

                {{-- ================= TAB ATAS ================= --}}
                <?php
                $nameWishlistCategory = \App\Models\WishlistCategory::where('buyer_id', auth()->user()->buyer->id)->first()->name ?? 'Kategori Tidak Ditemukan';
                ?>

                <div class="top-tabs">
                    <div class="top-tab active" data-tab="all">Wishlist -> {{ $nameWishlistCategory }}</div>

                    @foreach ($categories as $category)
                        <div class="top-tab" data-tab="{{ $category->id }}">
                            {{ $category->name }}
                        </div>
                    @endforeach

                    <!-- TAB SETTINGS -->
                    <div class="top-tab" data-tab="settings">
                        Settings
                    </div>

                    <div class="tab-indicator" id="indicator"></div>
                </div>

                {{-- ================= ALL WISHLIST TAB ================= --}}
                <div id="content-all" class="tab-content active">
                    @if ($products->sum(fn($c) => $c->wishlists->count()) === 0)
                        <div class="alert alert-info text-center py-4">
                            <strong>Anda belum memiliki wishlist</strong>
                        </div>
                    @else
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
                                                <form action="{{ route('wishlist.destroyByProduct', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-delete-wishlist">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="product-info">
                                            <a href="#" class="product-category">
                                                {{ $product->category->category_name ?? 'Uncategorized' }}
                                            </a>
                                            <h5 class="product-name">{{ $product->product_name }}</h5>

                                            <div class="product-sales-info mt-1 mb-2">
                                                @if (isset($product->monthly_sales) && $product->monthly_sales > 0)
                                                    <p class="text-success mb-0" style="font-size: 0.85rem;">
                                                        <i class="fas fa-fire"></i> Terjual
                                                        {{ number_format((int) $product->monthly_sales) }} kali bulan ini
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
                                                    $originalPrice = (int) $product->original_price;
                                                    $currentPrice = (int) $product->price;
                                                    $isDiscounted = $originalPrice > $currentPrice;
                                                    $discountPercentage = $isDiscounted
                                                        ? round(
                                                            (($originalPrice - $currentPrice) / $originalPrice) * 100,
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
                        </div>
                    @endif
                </div>

                {{-- ================= SETTINGS TAB ================= --}}
                <div id="content-settings" class="tab-content">
                    <h4 class="mb-3">Kelola Kategori Wishlist</h4>

                    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        + Tambah Kategori
                    </button>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryWishlist as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->category->name }}</td>
                                    <td>{{ $category->category->description }}</td>
                                    <td>
                                        <!-- EDIT BUTTON -->
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal{{ $category->id }}">
                                            Edit
                                        </button>

                                        <!-- DELETE FORM -->
                                        <form action="{{ route('wishlist.category.destroy', $category->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah yakin ingin menghapus kategori ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

                                <!-- MODAL EDIT KATEGORI -->
                                <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('wishlist.category.update', $category->id) }}"
                                            method="POST" class="modal-content">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Kategori</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $category->name }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea name="description" class="form-control" rows="3" required>{{ $category->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>



    {{-- ================= JAVASCRIPT UNTUK TAB ================= --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const topTabs = document.querySelectorAll('.top-tab');
            const contents = document.querySelectorAll('.tab-content');
            const indicator = document.getElementById("indicator");

            function activateTab(tabName) {

                topTabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                const selected = document.querySelector(`.top-tab[data-tab="${tabName}"]`);
                const content = document.getElementById(`content-${tabName}`);

                if (selected) selected.classList.add('active');
                if (content) content.classList.add('active');

                // indicator bergerak
                indicator.style.width = selected.offsetWidth + "px";
                indicator.style.left = selected.offsetLeft + "px";
            }

            topTabs.forEach(tab => {
                tab.addEventListener('click', () => activateTab(tab.dataset.tab));
            });

            // posisi awal
            const activeTab = document.querySelector(".top-tab.active");
            indicator.style.width = activeTab.offsetWidth + "px";
            indicator.style.left = activeTab.offsetLeft + "px";

        });
    </script>



    <!-- =================== MODAL TAMBAH KATEGORI =================== -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('wishlist.category.store') }}" method="POST" class="modal-content">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori Wishlist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>


@endsection
