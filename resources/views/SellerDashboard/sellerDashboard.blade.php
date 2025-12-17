@extends('SellerDashboard.layouts.app')

@section('title', 'Dashboard Seller')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />

<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1e40af;
        --primary-light: #3b82f6;
        --success: #10b981;
        --success-dark: #059669;
        --warning: #f59e0b;
        --warning-dark: #d97706;
        --danger: #ef4444;
        --purple: #8b5cf6;
        --purple-dark: #7c3aed;
        --pink: #ec4899;
        --pink-dark: #db2777;
        --text-dark: #111827;
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --text-light: #9ca3af;
        --bg-light: #f8fafc;
        --bg-white: #ffffff;
        --border: #e5e7eb;
        --border-light: #f3f4f6;
        --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.03);
        --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.06);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.08);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.12);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
    }

    body {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
        color: var(--text-primary);
        line-height: 1.6;
        /* background: linear-gradient(135deg, #24378e 0%, #446998 100%); */
        min-height: 100vh;
        /* padding: 2rem 0; */
    }

    /* ============================================
       DASHBOARD HEADER
       ============================================ */
    .dashboard-header {
        margin-bottom: 2rem;
        animation: fadeInDown 0.5s ease-out;
    }

    .dashboard-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        letter-spacing: -0.03em;
        background: linear-gradient(135deg, var(--primary) 0%, var(--purple) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .dashboard-subtitle {
        color: var(--text-secondary);
        font-size: 0.938rem;
        font-weight: 500;
    }

    /* ============================================
       STATISTICS CARDS
       ============================================ */
    .stats-card {
        background: var(--bg-white);
        border-radius: 1.25rem;
        padding: 1.75rem;
        border: 1px solid var(--border-light);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--card-gradient);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .stats-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, var(--card-color-alpha) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .stats-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-xl);
        border-color: var(--card-color);
    }

    .stats-card:hover::before {
        transform: scaleX(1);
    }

    .stats-card:hover::after {
        opacity: 0.15;
    }

    .stats-card.revenue {
        --card-color: #2563eb;
        --card-gradient: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
        --card-color-alpha: rgba(37, 99, 235, 0.1);
    }

    .stats-card.sales {
        --card-color: #10b981;
        --card-gradient: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        --card-color-alpha: rgba(16, 185, 129, 0.1);
    }

    .stats-card.products {
        --card-color: #f59e0b;
        --card-gradient: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        --card-color-alpha: rgba(245, 158, 11, 0.1);
    }

    /* Animation delays for cards */
    .stats-card:nth-child(1) { animation: fadeInUp 0.6s ease-out 0.1s backwards; }
    .stats-card:nth-child(2) { animation: fadeInUp 0.6s ease-out 0.2s backwards; }
    .stats-card:nth-child(3) { animation: fadeInUp 0.6s ease-out 0.3s backwards; }

    .stats-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.25rem;
    }

    .stats-icon {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        background: var(--card-gradient);
        box-shadow: 0 8px 16px -4px var(--card-color-alpha);
        position: relative;
        overflow: hidden;
    }

    .stats-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }

    .stats-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 0.75rem;
    }

    .stats-value {
        font-size: 2.25rem;
        font-weight: 800;
        color: var(--text-dark);
        line-height: 1;
        margin-bottom: 0.75rem;
        letter-spacing: -0.03em;
    }

    .stats-change {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.813rem;
        font-weight: 600;
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
    }

    .stats-change i {
        font-size: 0.75rem;
    }

    .stats-change.positive {
        color: #047857;
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    }

    .stats-change.neutral {
        color: #0369a1;
        background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
    }

    .stats-change.warning {
        color: #b45309;
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    }

    /* ============================================
       CHART SECTIONS
       ============================================ */
    .chart-section {
        background: var(--bg-white);
        border-radius: 1.25rem;
        padding: 2rem;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-md);
        margin-bottom: 1.75rem;
        animation: fadeInUp 0.6s ease-out 0.4s backwards;
        position: relative;
        overflow: hidden;
    }

    .chart-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(180deg, rgba(37, 99, 235, 0.02) 0%, transparent 100%);
        pointer-events: none;
    }

    .chart-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.75rem;
        flex-wrap: wrap;
        gap: 1rem;
        position: relative;
        z-index: 1;
    }

    .chart-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .chart-icon {
        width: 2.5rem;
        height: 2.5rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .select-wrapper {
        position: relative;
    }

    .select-modern {
        appearance: none;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 2px solid var(--border);
        border-radius: 0.75rem;
        padding: 0.75rem 3rem 0.75rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--text-primary);
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 160px;
    }

    .select-modern:hover {
        border-color: var(--primary);
        background: white;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
    }

    .select-modern:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .select-wrapper::after {
        content: '\f078';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: var(--primary);
        font-size: 0.75rem;
    }

    /* ============================================
       CATEGORY GRID
       ============================================ */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.25rem;
        margin-top: 1.5rem;
    }

    .category-item {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 2px solid var(--border-light);
        border-radius: 1rem;
        padding: 1.5rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .category-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: var(--category-color);
        transform: scaleY(0);
        transform-origin: top;
        transition: transform 0.4s ease;
    }

    .category-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at top right, var(--category-color), transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .category-item:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: var(--shadow-lg);
        border-color: var(--category-color);
    }

    .category-item:hover::before {
        transform: scaleY(1);
    }

    .category-item:hover::after {
        opacity: 0.08;
    }

    .category-rank {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 2.5rem;
        height: 2.5rem;
        background: var(--category-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 1rem;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        z-index: 1;
    }

    .category-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
        padding-right: 3rem;
        position: relative;
        z-index: 1;
    }

    .category-stats {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        position: relative;
        z-index: 1;
    }

    .category-stat {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.875rem;
    }

    .category-stat-label {
        color: var(--text-secondary);
        font-weight: 600;
    }

    .category-stat-value {
        color: var(--text-dark);
        font-weight: 700;
    }

    .category-stat-value.revenue-text {
        color: var(--success);
    }

    /* ============================================
       PRODUCTS TABLE
       ============================================ */
    .products-table-container {
        background: var(--bg-white);
        border-radius: 1.25rem;
        padding: 2rem;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-md);
        overflow-x: auto;
        animation: fadeInUp 0.6s ease-out 0.5s backwards;
    }

    .products-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 1rem;
    }

    .products-table thead th {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 1.125rem 1.25rem;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        border-bottom: 2px solid var(--border);
        white-space: nowrap;
    }

    .products-table thead th:first-child {
        border-top-left-radius: 0.75rem;
    }

    .products-table thead th:last-child {
        border-top-right-radius: 0.75rem;
    }

    .products-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid var(--border-light);
    }

    .products-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%);
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .products-table tbody tr:last-child {
        border-bottom: none;
    }

    .products-table tbody td {
        padding: 1.25rem;
        font-size: 0.938rem;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        min-width: 280px;
    }

    .product-img {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 0.875rem;
        object-fit: cover;
        border: 2px solid var(--border);
        flex-shrink: 0;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.1);
        box-shadow: var(--shadow-md);
    }

    .product-details {
        flex: 1;
        min-width: 0;
    }

    .product-name {
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.375rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 0.938rem;
    }

    .product-category {
        font-size: 0.75rem;
        color: var(--text-secondary);
        font-weight: 600;
        display: inline-block;
        padding: 0.25rem 0.625rem;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        border-radius: 0.375rem;
    }

    .rank-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.75rem;
        font-weight: 800;
        font-size: 1rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .rank-badge::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
        transform: rotate(45deg);
        animation: shine 2s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }

    .rank-badge.gold {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #d97706 100%);
        box-shadow: 0 6px 20px rgba(251, 191, 36, 0.5);
    }

    .rank-badge.silver {
        background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 50%, #94a3b8 100%);
        box-shadow: 0 6px 20px rgba(203, 213, 225, 0.5);
    }

    .rank-badge.bronze {
        background: linear-gradient(135deg, #fdba74 0%, #fb923c 50%, #f97316 100%);
        box-shadow: 0 6px 20px rgba(253, 186, 116, 0.5);
    }

    .rank-badge.default {
        background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        color: var(--text-secondary);
        box-shadow: var(--shadow-sm);
    }

    .quantity-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #1e40af;
        border-radius: 0.75rem;
        font-weight: 700;
        font-size: 0.875rem;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.15);
    }

    .revenue-text {
        color: var(--success);
        font-weight: 700;
        font-size: 1rem;
    }

    .price-text {
        color: var(--text-secondary);
        font-size: 0.875rem;
        font-weight: 600;
    }

    /* ============================================
       EMPTY STATE & LOADING
       ============================================ */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--text-secondary);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        opacity: 0.3;
        color: var(--text-light);
    }

    .empty-state p {
        font-size: 1rem;
        font-weight: 600;
    }

    .chart-loading {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 350px;
        color: var(--text-secondary);
        gap: 1rem;
    }

    .spinner {
        width: 3rem;
        height: 3rem;
        border: 4px solid var(--border-light);
        border-top-color: var(--primary);
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* ============================================
       ANIMATIONS
       ============================================ */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ============================================
       RESPONSIVE DESIGN
       ============================================ */
    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 1.5rem;
        }

        .stats-value {
            font-size: 1.75rem;
        }

        .chart-section {
            padding: 1.5rem;
        }

        .chart-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .select-modern {
            width: 100%;
        }

        .category-grid {
            grid-template-columns: 1fr;
        }

        .product-info {
            min-width: 200px;
        }

        .products-table {
            font-size: 0.813rem;
        }

        .products-table thead th,
        .products-table tbody td {
            padding: 0.875rem;
        }
    }
</style>

<div class="container-fluid py-4">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1 class="dashboard-title">📊 Dashboard Seller</h1>
        <p class="dashboard-subtitle">Pantau performa penjualan dan statistik toko Anda secara real-time</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <!-- Revenue Card -->
        <div class="col-lg-4 col-md-6">
            <div class="stats-card revenue">
                <div class="stats-header">
                    <div class="stats-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
                <div class="stats-label">Total Pendapatan</div>
                <div class="stats-value">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</div>
                <span class="stats-change positive">
                    <i class="fas fa-arrow-up"></i>
                    12.4% bulan ini
                </span>
            </div>
        </div>

        <!-- Sales Card -->
        <div class="col-lg-4 col-md-6">
            <div class="stats-card sales">
                <div class="stats-header">
                    <div class="stats-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>
                <div class="stats-label">Produk Terjual</div>
                <div class="stats-value">{{ number_format($totalSold ?? 0, 0, ',', '.') }}</div>
                <span class="stats-change neutral">
                    <i class="fas fa-minus"></i>
                    Stabil minggu ini
                </span>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-lg-4 col-md-6">
            <div class="stats-card products">
                <div class="stats-header">
                    <div class="stats-icon">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
                <div class="stats-label">Total Produk</div>
                <div class="stats-value">{{ number_format($totalProducts ?? 0, 0, ',', '.') }}</div>
                <span class="stats-change warning">
                    <i class="fas fa-check-circle"></i>
                    Inventaris aman
                </span>
            </div>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="chart-section">
        <div class="chart-header">
            <div class="chart-title">
                <div class="chart-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                Statistik Penjualan
            </div>
            <div class="select-wrapper">
                <select id="rangeSelect" class="select-modern">
                    <option value="daily">📅 Harian</option>
                    <option value="monthly">📊 Bulanan</option>
                    <option value="yearly">📈 Tahunan</option>
                </select>
            </div>
        </div>
        <div id="chartContainer">
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>

    <!-- Top Categories Section -->
    <div class="chart-section">
        <div class="chart-header">
            <div class="chart-title">
                <div class="chart-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);">
                    <i class="fas fa-trophy"></i>
                </div>
                Kategori Terpopuler
            </div>
        </div>

        @if($topCategories->count() > 0)
            <div class="category-grid">
                @foreach($topCategories as $index => $category)
                    <div class="category-item" style="--category-color: {{ ['#2563eb', '#10b981', '#f59e0b',  '#ec48','#8b5cf6', '#ec4899'][$index % 6] }}">
                        <div class="category-rank" style="background: {{ ['#2563eb', '#10b981', '#f59e0b',  '#ec48','#8b5cf6', '#ec4899'][$index % 6] }}">
                            {{ $index + 1 }}
                        </div>
                        <div class="category-name">{{ $category->category_name }}</div>
                        <div class="category-stats">
                            <div class="category-stat">
                                <span class="category-stat-label">Total Order</span>
                                <span class="category-stat-value">{{ number_format($category->total_orders) }}</span>
                            </div>
                            <div class="category-stat">
                                <span class="category-stat-label">Qty Terjual</span>
                                <span class="category-stat-value">{{ number_format($category->total_quantity) }}</span>
                            </div>
                            <div class="category-stat">
                                <span class="category-stat-label">Pendapatan</span>
                                <span class="category-stat-value revenue-text">Rp {{ number_format($category->total_revenue, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Category Bar Chart -->
            <div style="margin-top: 2.5rem; position: relative; z-index: 1;">
                <canvas id="categoryChart" height="80"></canvas>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <p>Belum ada data kategori</p>
            </div>
        @endif
    </div>

    <!-- Top Products Section -->
    <div class="products-table-container">
        <div class="chart-header" style="padding: 0; margin-bottom: 1.5rem;">
            <div class="chart-title">
                <div class="chart-icon" style="background: linear-gradient(135deg, #ec4899 0%, #db2777 100%); box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);">
                    <i class="fas fa-fire"></i>
                </div>
                Produk Terlaris
            </div>
        </div>

        @if($topProducts->count() > 0)
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Terjual</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topProducts as $index => $product)
                        <tr>
                            <td>
                                <div class="rank-badge {{ $index === 0 ? 'gold' : ($index === 1 ? 'silver' : ($index === 2 ? 'bronze' : 'default')) }}">
                                    {{ $index + 1 }}
                                </div>
                            </td>
                            <td>
                                <div class="product-info">
                                    <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->product_name }}" class="product-img" />
                                    <div class="product-details">
                                        <div class="product-name">{{ $product->product_name }}</div>
                                        <span class="product-category">{{ $product->category_name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="price-text">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <div class="quantity-badge">
                                    <i class="fas fa-box"></i>
                                    {{ number_format($product->total_sold) }}
                                </div>
                            </td>
                            <td>
                                <span class="revenue-text">Rp {{ number_format($product->revenue, 0, ',', '.') }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <i class="fas fa-shopping-cart"></i>
                <p>Belum ada produk terjual</p>
            </div>
        @endif
    </div>

</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let salesChart;
    let categoryChart;

    // ============================================
    // LOAD SALES CHART (daily / monthly / yearly)
    // ============================================
    async function loadChart(type = 'daily') {
        const chartContainer = document.getElementById('chartContainer');
        chartContainer.innerHTML = `
            <div class="chart-loading">
                <div class="spinner"></div>
                <p style="font-weight: 600; margin-top: 0.5rem;">Memuat data...</p>
            </div>`;

        try {
            const res = await fetch(`/seller/dashboard/statistics?type=${type}`);
            const json = await res.json();

            let labels = [];
            let values = [];

            json.data.forEach(item => {
                labels.push(item.label);
                values.push(item.total);
            });

            chartContainer.innerHTML = `<canvas id="salesChart" height="100"></canvas>`;

            if (salesChart) salesChart.destroy();

            const ctx = document.getElementById('salesChart');
            const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 350);
            gradient.addColorStop(0, "rgba(37, 99, 235, 0.2)");
            gradient.addColorStop(0.5, "rgba(37, 99, 235, 0.1)");
            gradient.addColorStop(1, "rgba(37, 99, 235, 0)");

            salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [{
                        label: "Total Penjualan",
                        data: values,
                        borderWidth: 3,
                        borderColor: "#2563eb",
                        backgroundColor: gradient,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 6,
                        pointBackgroundColor: "#ffffff",
                        pointBorderColor: "#2563eb",
                        pointBorderWidth: 3,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: "#2563eb",
                        pointHoverBorderColor: "#ffffff",
                        pointHoverBorderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(17, 24, 39, 0.95)',
                            padding: 16,
                            borderRadius: 12,
                            titleFont: {
                                size: 14,
                                weight: '700',
                                family: 'Inter'
                            },
                            bodyFont: {
                                size: 15,
                                weight: '600',
                                family: 'Inter'
                            },
                            titleColor: '#f3f4f6',
                            bodyColor: '#ffffff',
                            displayColors: false,
                            callbacks: {
                                title: function(context) {
                                    return '📅 ' + context[0].label;
                                },
                                label: function(context) {
                                    return '💰 Rp ' + context.parsed.y.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: "#f1f5f9",
                                drawBorder: false,
                                lineWidth: 1
                            },
                            ticks: {
                                color: "#6b7280",
                                font: {
                                    size: 12,
                                    weight: '600',
                                    family: 'Inter'
                                },
                                padding: 12,
                                callback: function(value) {
                                    if (value >= 1000000) {
                                        return 'Rp ' + (value / 1000000).toFixed(1) + 'Jt';
                                    } else if (value >= 1000) {
                                        return 'Rp ' + (value / 1000).toFixed(0) + 'K';
                                    }
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            },
                            border: {
                                display: false
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                color: "#6b7280",
                                font: {
                                    size: 12,
                                    weight: '600',
                                    family: 'Inter'
                                },
                                padding: 12
                            },
                            border: {
                                display: false
                            }
                        }
                    }
                }
            });

        } catch (error) {
            chartContainer.innerHTML = `
                <div class="chart-loading">
                    <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: #ef4444; margin-bottom: 1rem;"></i>
                    <p style="font-weight: 600; color: #ef4444;">Gagal memuat data grafik</p>
                    <p style="font-size: 0.875rem; color: #6b7280; margin-top: 0.5rem;">Silakan refresh halaman atau coba lagi nanti</p>
                </div>`;
            console.error('Error loading chart:', error);
        }
    }

    // ============================================
    // LOAD CATEGORY CHART (Top 5 kategori)
    // ============================================
    function loadCategoryChart() {
        const ctx = document.getElementById('categoryChart');
        if (!ctx) return;

        const categories = @json($topCategories ?? []);

        if (categories.length === 0) return;

        const labels = categories.map(c => c.category_name);
        const data = categories.map(c => c.total_orders);
        const colors = ['#2563eb', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899'];
        const hoverColors = ['#1e40af', '#059669', '#d97706', '#7c3aed', '#db2777'];

        if (categoryChart) categoryChart.destroy();

        categoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    label: 'Total Order',
                    data,
                    backgroundColor: colors.slice(0, labels.length),
                    hoverBackgroundColor: hoverColors.slice(0, labels.length),
                    borderRadius: 10,
                    borderWidth: 0,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: "rgba(17, 24, 39, 0.95)",
                        borderRadius: 10,
                        padding: 14,
                        titleFont: {
                            size: 14,
                            weight: '700',
                            family: 'Inter'
                        },
                        bodyFont: {
                            size: 14,
                            weight: '600',
                            family: 'Inter'
                        },
                        titleColor: '#f3f4f6',
                        bodyColor: '#ffffff',
                        displayColors: true,
                        boxWidth: 12,
                        boxHeight: 12,
                        boxPadding: 6,
                        callbacks: {
                            title: function(context) {
                                return '📦 ' + context[0].label;
                            },
                            label: function(context) {
                                return " Total: " + context.raw.toLocaleString('id-ID') + " pesanan";
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: "#f1f5f9",
                            drawBorder: false,
                            lineWidth: 1
                        },
                        ticks: {
                            color: "#6b7280",
                            font: {
                                size: 12,
                                weight: '600',
                                family: 'Inter'
                            },
                            padding: 10
                        },
                        border: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            color: "#6b7280",
                            font: {
                                size: 12,
                                weight: '600',
                                family: 'Inter'
                            },
                            padding: 10
                        },
                        border: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // ============================================
    // AUTO LOAD CHART ON PAGE LOAD
    // ============================================
    document.addEventListener("DOMContentLoaded", function() {
        // Add slight delay for smooth animation
        setTimeout(() => {
            loadChart('daily');
            loadCategoryChart();
        }, 300);
    });

    // ============================================
    // HANDLE RANGE SELECT CHANGE
    // ============================================
    document.getElementById('rangeSelect').addEventListener('change', function() {
        const selectedRange = this.value;
        loadChart(selectedRange);
    });
</script>

@endsection