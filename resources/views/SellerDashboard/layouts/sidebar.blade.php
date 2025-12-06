<style>
    /* ============================================
       SIDEBAR UTAMA - Premium Dark Theme
       ============================================ */
    .app-sidebar {
        background: linear-gradient(180deg, #0a0e1a 0%, #111827 100%) !important;
        box-shadow: 4px 0 24px rgba(0, 0, 0, 0.3) !important;
        border-right: 1px solid rgba(59, 130, 246, 0.1);
        width: 280px;
        position: fixed;
        height: 100vh;
        overflow: hidden;
        z-index: 1000;
    }

    /* Overlay gradient untuk efek premium */
    .app-sidebar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 200px;
        background: radial-gradient(circle at top, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0;
    }

    /* ============================================
       LOGO & BRANDING - Premium Style
       ============================================ */
    .sidebar-brand {
        padding: 1.5rem 1.5rem 1.25rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, transparent 100%);
        position: relative;
        z-index: 1;
    }

    .brand-link {
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }

    .brand-link:hover {
        transform: translateX(4px);
    }

    .brand-icon {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        flex-shrink: 0;
    }

    .brand-text {
        color: #ffffff !important;
        font-size: 1.25rem !important;
        font-weight: 800 !important;
        letter-spacing: -0.02em;
        line-height: 1.2;
    }

    .brand-subtitle {
        color: #94a3b8;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* ============================================
       SEARCH BAR - Modern Design
       ============================================ */
    .form-inline {
        padding: 1rem 1.25rem;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
    }

    .input-group {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .form-control-sidebar {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%) !important;
        border: 2px solid rgba(59, 130, 246, 0.2) !important;
        color: #e2e8f0 !important;
        border-radius: 12px 0 0 12px !important;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .form-control-sidebar::placeholder {
        color: #64748b;
        font-weight: 500;
    }

    .form-control-sidebar:focus {
        background: #1e293b !important;
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        color: #ffffff !important;
    }

    .btn-sidebar {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%) !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 0 12px 12px 0 !important;
        padding: 0.75rem 1.25rem;
        transition: all 0.3s ease;
    }

    .btn-sidebar:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%) !important;
        transform: scale(1.05);
    }

    /* ============================================
       SIDEBAR WRAPPER - Scrollable Area
       ============================================ */
    .sidebar-wrapper {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
        overflow-x: hidden;
        padding: 0.5rem 0 2rem;
        position: relative;
        z-index: 1;
    }

    .sidebar-wrapper::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-wrapper::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.2);
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, rgba(59, 130, 246, 0.5) 0%, rgba(37, 99, 235, 0.5) 100%);
        border-radius: 10px;
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, rgba(59, 130, 246, 0.8) 0%, rgba(37, 99, 235, 0.8) 100%);
    }

    /* ============================================
       NAVIGATION MENU - Premium Items
       ============================================ */
    .sidebar-menu {
        padding: 0 1rem;
    }

    .nav-item {
        margin-bottom: 0.25rem;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.875rem 1rem;
        color: #94a3b8 !important;
        font-size: 0.938rem;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: 1px solid transparent;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .nav-link:hover {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(37, 99, 235, 0.1) 100%);
        color: #60a5fa !important;
        transform: translateX(4px);
        border-color: rgba(59, 130, 246, 0.2);
    }

    .nav-link:hover::before {
        transform: scaleY(1);
    }

    .nav-link.active {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.15) 100%);
        color: #3b82f6 !important;
        border-color: rgba(59, 130, 246, 0.3);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
    }

    .nav-link.active::before {
        transform: scaleY(1);
    }

    /* ============================================
       NAVIGATION ICONS - Styled
       ============================================ */
    .nav-icon {
        font-size: 1.25rem;
        margin-right: 0.875rem;
        width: 24px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .nav-link:hover .nav-icon {
        transform: scale(1.15);
    }

    /* ============================================
       BADGES - Notification Indicators
       ============================================ */
    .nav-badge {
        margin-left: auto;
        padding: 0.25rem 0.625rem;
        font-size: 0.75rem;
        font-weight: 700;
        border-radius: 6px;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
        /* animation: pulse 2s infinite; */
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
        }
    }

    .nav-badge.text-bg-secondary {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        box-shadow: 0 2px 8px rgba(99, 102, 241, 0.4);
    }

    /* ============================================
       TREEVIEW - Submenu
       ============================================ */
    .nav-treeview {
        padding-left: 0;
        margin-top: 0.25rem;
        margin-bottom: 0.25rem;
    }

    .nav-treeview .nav-item {
        margin-bottom: 0.125rem;
    }

    .nav-treeview .nav-link {
        padding: 0.75rem 1rem 0.75rem 3rem;
        font-size: 0.875rem;
        color: #64748b !important;
    }

    .nav-treeview .nav-link:hover {
        color: #94a3b8 !important;
    }

    .nav-treeview .nav-link .nav-icon {
        font-size: 0.625rem;
        margin-right: 0.75rem;
    }

    /* ============================================
       ARROW INDICATOR - Dropdown
       ============================================ */
    .nav-arrow {
        margin-left: auto;
        font-size: 0.75rem;
        transition: transform 0.3s ease;
    }

    .nav-item.menu-open > .nav-link .nav-arrow {
        transform: rotate(90deg);
    }

    /* ============================================
       ACTION BUTTONS - Profile & Logout
       ============================================ */
    .sidebar-actions {
        padding: 1rem 1.25rem;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.2) 100%);
        /* position: absolute; */
        /* bottom: 2%; */
        /* width: 100%;     */

        z-index: 1;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1.25rem;
        margin-bottom: 0.5rem;
        border-radius: 12px;
        font-size: 0.938rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid;
        position: relative;
        overflow: hidden;
    }

    .action-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .action-btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .action-btn-icon {
        font-size: 1.25rem;
        z-index: 1;
    }

    .action-btn-text {
        z-index: 1;
    }

    /* Profile Button */
    .action-btn.profile {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(37, 99, 235, 0.1) 100%);
        border-color: rgba(59, 130, 246, 0.3);
        color: #3b82f6;
    }

    .action-btn.profile:hover {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border-color: #3b82f6;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
    }

    /* Logout Button */
    .action-btn.logout {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.15) 0%, rgba(220, 38, 38, 0.1) 100%);
        border-color: rgba(239, 68, 68, 0.3);
        color: #ef4444;
        margin-bottom: 0;
    }

    .action-btn.logout:hover {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        border-color: #ef4444;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
    }

    /* ============================================
       RESPONSIVE - Mobile Adjustments
       ============================================ */
    @media (max-width: 768px) {
        .app-sidebar {
            width: 260px;
        }

        .brand-text {
            font-size: 1.125rem !important;
        }

        .nav-link {
            font-size: 0.875rem;
            padding: 0.75rem 0.875rem;
        }

        .action-btn {
            font-size: 0.875rem;
            padding: 0.75rem 1rem;
        }
    }
</style>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="brand-link">
            <div class="brand-icon">
                <i class="bi bi-shop-window"></i>
            </div>
            <div>
                <div class="brand-text">KhadafiShop</div>
                <div class="brand-subtitle">Seller Dashboard</div>
            </div>
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Search Bar-->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="🔍 Cari menu..."
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
    <!--end::Search Bar-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false">
              
                <!-- Market -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="bi bi-shop nav-icon"></i>
                        <p>Market</p>
                    </a>
                </li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('seller.dashboard') }}" class="nav-link">
                        <i class="bi bi-speedometer2 nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Products Menu -->
                <li class="nav-item">
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
                            @if ($lowStockCount > 0)
                                <span class="nav-badge badge text-bg-danger">{{ $lowStockCount }}</span>
                            @endif
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('seller.products.index') }}" class="nav-link">
                                <i class="bi bi-circle-fill nav-icon"></i>
                                <p>Products Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('seller.products.show') }}" class="nav-link">
                                <i class="bi bi-circle-fill nav-icon"></i>
                                <p>Products Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ads.index') }}" class="nav-link">
                                <i class="bi bi-circle-fill nav-icon"></i>
                                <p>Advertisements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('seller.stock.management') }}" class="nav-link">
                                <i class="bi bi-circle-fill nav-icon"></i>
                                <p>
                                    Stock Management
                                    @if ($lowStockCount > 0)
                                        <span class="nav-badge badge text-bg-danger">{{ $lowStockCount }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Orders Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-clipboard-check nav-icon"></i>
                        <p>
                            Orders
                            @php
                                $pendingOrdersCount = \App\Models\Order::where('seller_id', Auth::user()->seller->id)
                                    ->where('status', 'pending')
                                    ->count();
                            @endphp
                            @if ($pendingOrdersCount > 0)
                                <span class="nav-badge badge text-bg-secondary">{{ $pendingOrdersCount }}</span>
                            @endif
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('seller.orders.pending') }}" class="nav-link">
                                <i class="bi bi-circle-fill nav-icon"></i>
                                <p>
                                    Pending Orders
                                    @if ($pendingOrdersCount > 0)
                                        <span class="nav-badge badge text-bg-secondary">{{ $pendingOrdersCount }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('seller.customer.insights') }}" class="nav-link">
                                <i class="bi bi-circle-fill nav-icon"></i>
                                <p>Customer Insights</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <div class="sidebar-actions">
            <a href="{{ route('seller.profile') }}" class="action-btn profile">
                <i class="bi bi-person-circle action-btn-icon"></i>
                <span class="action-btn-text">My Profile</span>
            </a>
            <a href="{{ route('seller.logout') }}" class="action-btn logout">
                <i class="bi bi-box-arrow-right action-btn-icon"></i>
                <span class="action-btn-text">Logout</span>
            </a>
        </div>
    </div>
    <!--end::Sidebar Wrapper-->

    <!--begin::Action Buttons-->
    <!--end::Action Buttons-->
</aside>