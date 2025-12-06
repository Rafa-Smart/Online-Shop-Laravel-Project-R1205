<style>
    /* 1. WARNA UTAMA SIDEBAR */
    .app-sidebar {
        /* Warna latar belakang gelap yang sangat pekat */
        background-color: #0e1624 !important;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.4) !important;
        /* Tambahkan shadow gelap */
        border-right: 1px solid rgba(255, 255, 255, 0.05);
        /* Garis tipis pemisah */
    }

    /* 2. LOGO DAN BRANDING */
    .sidebar-brand {
        padding: 1rem 1.5rem;
        /* Padding yang lebih baik */
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        /* Garis pemisah yang halus */
    }

    .brand-link .brand-text {
        color: #ffffff !important;
        /* Pastikan teks logo berwarna putih */
        font-size: 1.6rem !important;
        letter-spacing: 0.5px;
        /* Sedikit spasi antar huruf agar terlihat premium */
    }

    /* 3. SEARCH BAR */
    .form-inline {
        padding: 0 1rem;
        margin-bottom: 7px;
    }

    .form-control-sidebar {
        background-color: #1a2436 !important;
        /* Warna input yang sedikit lebih terang */
        border: 1px solid #1a2436 !important;
        color: #e2e8f0 !important;
        /* Warna teks input */
        border-radius: 8px 0 0 8px !important;
    }

    .btn-sidebar {
        background-color: #1a2436 !important;
        color: #94a3b8 !important;
        /* Warna ikon yang lembut */
        /* border-radius: 0 8px 8px 0 !important; */
    }

    .btn-sidebar:hover {
        background-color: #2d3748 !important;
    }

    /* Membuat sidebar bisa di-scroll */
.sidebar-wrapper {
    max-height: calc(100vh - 80px); /* Sesuaikan tinggi area */
    overflow-y: auto;               /* Tambahkan scroll vertikal */
    overflow-x: hidden;             /* Hindari scroll horizontal */
    padding-bottom: 20px;           /* Biar tidak mepet bawah */
}

/* Tambahkan efek saat scroll */
.sidebar-wrapper::-webkit-scrollbar {
    width: 6px;
}

.sidebar-wrapper::-webkit-scrollbar-thumb {
    background-color: rgba(255,255,255,0.2);
    border-radius: 10px;
}

.sidebar-wrapper::-webkit-scrollbar-thumb:hover {
    background-color: rgba(255,255,255,0.35);
}

</style>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="./index.html" class="brand-link">
            <span class="brand-text fw-bold" style="font-size:1.5rem">Seller | KhadafiShop</span>
        </a>
    </div>

    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Cari Produk..."
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <div class="sidebar-search-results">
            <div class="list-group">
            </div>
        </div>
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
              
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="bi bi-shop nav-icon"></i>
                        <p>Market</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('seller.dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Seller Dashboard</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="bi bi-boxes nav-icon"></i>
                        @php
                            $seller = Auth::user()->seller;
                            $threshold = $seller->low_stock_threshold ?? 5;

                            $lowStockCount = \App\Models\Product::where('seller_id', $seller->id)
                                ->where('stock', '<=', $threshold)
                                ->count();

                       
                        @endphp
                        <p>
                            Products
                            <i class="nav-arrow bi bi-chevron-right"></i>
                            @if ($lowStockCount > 0)
                                <span class="nav-badge badge text-bg-secondary me-3">{{ $lowStockCount }}</span>
                            @endif
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('seller.products.index') }}" class="nav-link ">
                                <i class="bi bi-database nav-icon"></i>
                                <p>Products Datas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('seller.products.show') }}" class="nav-link">
                                <i class="bi bi-bag-check nav-icon"></i>
                                <p>Products Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ads.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ads</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('seller.stock.management') }}" class="nav-link">
                                <i class="nav-icon bi bi-box-seam-fill"></i>
                                <p>
                                    Stock Management

                                    @if ($lowStockCount > 0)
                                        <span class="nav-badge badge text-bg-danger me-3">
                                            {{ $lowStockCount }}
                                        </span>
                                    @endif

                                </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Orders
                            <?php
                            $pendingOrdersCount = \App\Models\Order::where('seller_id', Auth::user()->seller->id)
                                ->where('status', 'pending')
                                ->count();
                            ?>
                            @if ($pendingOrdersCount <= 0)
                            @else
                                <span class="nav-badge badge text-bg-secondary me-3">{{ $pendingOrdersCount }}</span>
                            @endif
                            <i class="nav-arrow bi bi-chevron-right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('seller.orders.pending') }}" class="nav-link">
                                @if ($pendingOrdersCount <= 0)
                                @else
                                    <span
                                        class="nav-badge badge text-bg-secondary me-3">{{ $pendingOrdersCount }}</span>
                                @endif
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Orders Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('seller.customer.insights') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Orders Insights</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('seller.profile') }}" class="nav-link ">
                        <i class="nav-icon bi bi-tree-fill "></i>
                        <p>
                            Profile
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('seller.logout') }}" class="nav-link">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            LogOut

                        </p>
                    </a>
                </li>
               
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
