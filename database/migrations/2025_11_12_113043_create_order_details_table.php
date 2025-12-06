@extends('SellerDashboard.layouts.app')

@section('title', 'Dashboard Seller')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="" crossorigin="anonymous" />

<style>
    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --purple-color: #8b5cf6;
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --bg-light: #f9fafb;
        --border-color: #e5e7eb;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    body {
        background-color: var(--bg-light) !important;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: var(--text-primary);
    }

    .dashboard-header {
        margin-bottom: 32px;
    }

    .dashboard-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 4px;
        letter-spacing: -0.02em;
    }

    .dashboard-subtitle {
        color: var(--text-secondary);
        font-size: 14px;
        font-weight: 400;
    }

    /* Stats Cards */
    .stats-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid var(--border-color);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--card-color), var(--card-color-light));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--card-color);
    }

    .stats-card:hover::before {
        opacity: 1;
    }

    .stats-card.revenue {
        --card-color: #2563eb;
        --card-color-light: #60a5fa;
    }

    .stats-card.sales {
        --card-color: #10b981;
        --card-color-light: #34d399;
    }

    .stats-card.products {
        --card-color: #f59e0b;
        --card-color-light: #fbbf24;
    }

    .stats-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .stats-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        background: var(--card-color);
    }

    .stats-card.revenue .stats-icon {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    }

    .stats-card.sales .stats-icon {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .stats-card.products .stats-icon {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .stats-label {
        font-size: 13px;
        font-weight: 500;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 8px;
    }

    .stats-value {
        font-size: 32px;
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1;
        margin-bottom: 8px;
        letter-spacing: -0.02em;
    }

    .stats-change {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 13px;
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 6px;
    }

    .stats-change.positive {
        color: #059669;
        background-color: #d1fae5;
    }

    .stats-change.neutral {
        color: #0284c7;
        background-color: #e0f2fe;
    }

    .stats-change.warning {
        color: #d97706;
        background-color: #fef3c7;
    }

    /* Chart Section */
    .chart-section {
        background: white;
        border-radius: 16px;
        padding: 28px;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }

    .chart-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .chart-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .chart-icon {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
    }

    .select-wrapper {
        position: relative;
    }

    .select-modern {
        appearance: none;
        background: var(--bg-light);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        padding: 10px 40px 10px 16px;
        font-size: 14px;
        font-weight: 500;
        color: var(--text-primary);
        cursor: pointer;
        transition: all 0.2s ease;
        min-width: 140px;
    }

    .select-modern:hover {
        border-color: var(--primary-color);
        background: white;
    }

    .select-modern:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .select-wrapper::after {
        content: '\f078';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: var(--text-secondary);
        font-size: 12px;
    }

    /* Category Orders Chart */
    .category-chart-section {
        background: white;
        border-radius: 16px;
        padding: 28px;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        height: 100%;
    }

    .category-chart-icon {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    }

    /* Best Selling Products Section */
    .bestseller-section {
        background: white;
        border-radius: 16px;
        padding: 28px;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }

    .bestseller-icon {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .product-table {
        width: 100%;
        margin-top: 20px;
    }

    .product-table thead {
        background: var(--bg-light);
    }

    .product-table th {
        padding: 12px 16px;
        font-size: 13px;
        font-weight: 600;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 2px solid var(--border-color);
    }

    .product-table td {
        padding: 16px;
        font-size: 14px;
        color: var(--text-primary);
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .product-table tbody tr {
        transition: background-color 0.2s ease;
    }

    .product-table tbody tr:hover {
        background-color: var(--bg-light);
    }

    .product-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid var(--border-color);
    }

    .product-name {
        font-weight: 500;
        color: var(--text-primary);
        max-width: 250px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .product-category {
        display: inline-block;
        padding: 4px 12px;
        background: var(--bg-light);
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        color: var(--text-secondary);
    }

    .badge-rank {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        font-weight: 700;
        font-size: 14px;
    }

    .badge-rank.rank-1 {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(251, 191, 36, 0.3);
    }

    .badge-rank.rank-2 {
        background: linear-gradient(135deg, #94a3b8 0%, #64748b 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(148, 163, 184, 0.3);
    }

    .badge-rank.rank-3 {
        background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(251, 146, 60, 0.3);
    }

    .badge-rank.rank-other {
        background: var(--bg-light);
        color: var(--text-secondary);
        font-weight: 600;
    }

    .sales-count {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: var(--success-color);
    }

    .price-text {
        font-weight: 600;
        color: var(--text-primary);
    }

    /* Loading State */
    .chart-loading {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 300px;
        color: var(--text-secondary);
        flex-direction: column;
        gap: 12px;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 3px solid var(--border-color);
        border-top-color: var(--primary-color);
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-secondary);
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.5;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 24px;
        }

        .stats-value {
            font-size: 28px;
        }

        .chart-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .select-modern {
            width: 100%;
        }

        .product-table {
            font-size: 13px;
        }

        .product-name {
            max-width: 150px;
        }
    }
</style>

<div class="container-fluid py-4">

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1 class="dashboard-title">Dashboard Seller</h1>
        <p class="dashboard-subtitle">Pantau performa penjualan dan statistik toko Anda</p>
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

    <!-- Charts Row -->
    <div class="row g-4 mb-4">
        <!-- Sales Statistics Chart -->
        <div class="col-lg-7">
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
                            <option value="daily">Harian</option>
                            <option value="monthly">Bulanan</option>
                            <option value="yearly">Tahunan</option>
                        </select>
                    </div>
                </div>

                <div id="chartContainer">
                    <canvas id="salesChart" height="80"></canvas>
                </div>
            </div>
        </div>

        <!-- Category Orders Chart -->
        <div class="col-lg-5">
            <div class="category-chart-section">
                <div class="chart-header">
                    <div class="chart-title">
                        <div class="chart-icon category-chart-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        Order per Kategori
                    </div>
                </div>

                <div id="categoryChartContainer">
                    <canvas id="categoryChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Selling Products -->
    <div class="bestseller-section">
        <div class="chart-header">
            <div class="chart-title">
                <div class="chart-icon bestseller-icon">
                    <i class="fas fa-fire"></i>
                </div>
                Produk Terlaris
            </div>
        </div>

        <div id="bestsellerContainer">
            <div class="table-responsive">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Rank</th>
                            <th style="width: 80px;">Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th style="text-align: center;">Terjual</th>
                            <th style="text-align: right;">Harga</th>
                            <th style="text-align: right;">Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody id="bestsellerTableBody">
                        <tr>
                            <td colspan="7">
                                <div class="chart-loading">
                                    <div class="spinner"></div>
                                    <span>Memuat data...</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let salesChart;
    let categoryChart;

    // Load Sales Chart
    async function loadSalesChart(type = 'daily') {
        const chartContainer = document.getElementById('chartContainer');
        
        chartContainer.innerHTML = '<div class="chart-loading"><div class="spinner"></div></div>';

        try {
            const res = await fetch(`/seller/dashboard/statistics?type=${type}`);
            const json = await res.json();

            let labels = [];
            let values = [];

            json.data.forEach(item => {
                labels.push(item.label);
                values.push(item.total);
            });

            chartContainer.innerHTML = '<canvas id="salesChart" height="80"></canvas>';

            if (salesChart) salesChart.destroy();

            const ctx = document.getElementById('salesChart');
            const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 350);
            gradient.addColorStop(0, "rgba(37, 99, 235, 0.2)");
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
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            borderRadius: 8,
                            titleFont: {
                                size: 13,
                                weight: '600'
                            },
                            bodyFont: {
                                size: 14,
                                weight: '500'
                            },
                            callbacks: {
                                label: function(context) {
                                    return 'Penjualan: Rp ' + context.parsed.y.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: "#f3f4f6",
                                drawBorder: false
                            },
                            ticks: {
                                color: "#6b7280",
                                font: {
                                    size: 12,
                                    weight: '500'
                                },
                                padding: 8,
                                callback: function(value) {
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
                                    weight: '500'
                                },
                                padding: 8
                            },
                            border: {
                                display: false
                            }
                        }
                    }
                }
            });
        } catch (error) {
            chartContainer.innerHTML = '<div class="chart-loading"><p>Gagal memuat data grafik</p></div>';
            console.error('Error loading sales chart:', error);
        }
    }

    // Load Category Chart
    async function loadCategoryChart() {
        const chartContainer = document.getElementById('categoryChartContainer');
        
        chartContainer.innerHTML = '<div class="chart-loading"><div class="spinner"></div></div>';

        try {
            const res = await fetch('/seller/dashboard/category-orders');
            const json = await res.json();

            let labels = [];
            let values = [];
            let colors = [
                '#2563eb', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6',
                '#ec4899', '#06b6d4', '#84cc16', '#f97316', '#6366f1'
            ];

            json.data.forEach(item => {
                labels.push(item.category_name);
                values.push(item.total_orders);
            });

            chartContainer.innerHTML = '<canvas id="categoryChart" height="80"></canvas>';

            if (categoryChart) categoryChart.destroy();

            const ctx = document.getElementById('categoryChart');

            categoryChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels,
                    datasets: [{
                        data: values,
                        backgroundColor: colors.slice(0, values.length),
                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: {
                                    size: 12,
                                    weight: '500'
                                },
                                color: '#6b7280',
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            borderRadius: 8,
                            titleFont: {
                                size: 13,
                                weight: '600'
                            },
                            bodyFont: {
                                size: 14,
                                weight: '500'
                            },
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return `${context.label}: ${context.parsed} order (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        } catch (error) {
            chartContainer.innerHTML = '<div class="chart-loading"><p>Gagal memuat data kategori</p></div>';
            console.error('Error loading category chart:', error);
        }
    }

    // Load Best Selling Products
    async function loadBestSellers() {
        const tbody = document.getElementById('bestsellerTableBody');
        
        try {
            const res = await fetch('/seller/dashboard/best-sellers');
            const json = await res.json();

            if (json.data.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="fas fa-box-open"></i>
                                <p>Belum ada produk terjual</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }

            let html = '';
            json.data.forEach((product, index) => {
                const rank = index + 1;
                let rankClass = 'rank-other';
                if (rank === 1) rankClass = 'rank-1';
                else if (rank === 2) rankClass = 'rank-2';
                else if (rank === 3) rankClass = 'rank-3';

                const totalRevenue = product.price * product.total_sold;

                html += `
                    <tr>
                        <td>
                            <div class="badge-rank ${rankClass}">${rank}</div>
                        </td>
                        <td>
                            <img src="${product.img || '/images/no-image.png'}" alt="${product.product_name}" class="product-img">
                        </td>
                        <td>
                            <div class="product-name" title="${product.product_name}">${product.product_name}</div>
                        </td>
                        <td>
                            <span class="product-category">${product.category_name || 'N/A'}</span>
                        </td>
                        <td style="text-align: center;">
                            <div class="sales-count">
                                <i class="fas fa-shopping-cart"></i>
                                ${product.total_sold}
                            </div>
                        </td>
                        <td style="text-align: right;">
                            <span class="price-text">Rp ${product.price.toLocaleString('id-ID')}</span>
                        </td>
                        <td style="text-align: right;">
                            <span class="price-text">Rp ${totalRevenue.toLocaleString('id-ID')}</span>
                        </td>
                    </tr>
                `;
            });

            tbody.innerHTML = html;
        } catch (error) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <p>Gagal memuat data produk terlaris</p>
                        </div>
                    </td>
                </tr>
            `;
            console.error('Error loading best sellers:', error);
        }
    }

    // Event Listeners
    document.getElementById('rangeSelect').addEventListener('change', function () {
        loadSalesChart(this.value);
    });

    // Load all data on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadSalesChart();
        loadCategoryChart();
        loadBestSellers();
    });
</script>

@endsection