@extends('SellerDashboard.layouts.app')

@section('title', 'Chart Penjualan Produk')

@section('content')

<style>
    .stat-card {
        border-radius: 20px;
        border: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
        transition: all 0.6s ease;
        opacity: 0;
    }
    
    .stat-card:hover::before {
        opacity: 1;
        transform: scale(1.1);
    }
    
    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
    }
    
    .stat-card.green {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        box-shadow: 0 10px 30px rgba(17, 153, 142, 0.3);
    }
    
    .stat-card.green:hover {
        box-shadow: 0 20px 40px rgba(17, 153, 142, 0.4);
    }
    
    .stat-card.orange {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        box-shadow: 0 10px 30px rgba(240, 147, 251, 0.3);
    }
    
    .stat-card.orange:hover {
        box-shadow: 0 20px 40px rgba(240, 147, 251, 0.4);
    }
    
    .stat-card.blue {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);
    }
    
    .stat-card.blue:hover {
        box-shadow: 0 20px 40px rgba(79, 172, 254, 0.4);
    }
    
    .stat-icon {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin-bottom: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
        background: rgba(255, 255, 255, 0.35);
    }
    
    .stat-card .card-body {
        padding: 30px;
        position: relative;
        z-index: 1;
    }
    
    .stat-number {
        font-size: 36px;
        font-weight: 800;
        letter-spacing: -1px;
        margin: 10px 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .stat-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.9;
        font-weight: 600;
    }
    
    .stat-change {
        font-size: 13px;
        margin-top: 8px;
        padding: 4px 12px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        display: inline-block;
    }
    
    .chart-container {
        background: white;
        border-radius: 24px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .chart-container:hover {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }
    
    .filter-section {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
        margin-bottom: 30px;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .form-select {
        border-radius: 12px;
        border: 2px solid #e8eaf6;
        padding: 14px 18px;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }
    
    .table-custom {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .table-custom thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .table-custom thead th {
        color: white;
        font-weight: 700;
        padding: 20px 18px;
        border: none;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
    }
    
    .table-custom tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .table-custom tbody tr:hover {
        background: linear-gradient(90deg, #f8f9ff 0%, #ffffff 100%);
        transform: scale(1.005);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    .table-custom tbody td {
        padding: 20px 18px;
        vertical-align: middle;
        font-size: 14px;
    }
    
    .badge-stock {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .badge-stock.high {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
    }
    
    .badge-stock.medium {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        color: #856404;
    }
    
    .badge-stock.low {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
    }
    
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 45px;
        border-radius: 24px;
        margin-bottom: 35px;
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.35);
        position: relative;
        overflow: hidden;
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    .chart-type-btn {
        padding: 10px 24px;
        border-radius: 30px;
        border: 2px solid #667eea;
        background: white;
        color: #667eea;
        font-weight: 700;
        transition: all 0.3s ease;
        cursor: pointer;
        margin-right: 12px;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .chart-type-btn.active,
    .chart-type-btn:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.4);
    }
    
    .search-box {
        position: relative;
    }
    
    .search-box input {
        border-radius: 12px;
        border: 2px solid #e8eaf6;
        padding: 14px 18px 14px 50px;
        width: 100%;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .search-box input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
        outline: none;
        transform: translateY(-2px);
    }
    
    .search-box i {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-in;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .export-btn {
        padding: 12px 28px;
        border-radius: 14px;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        border: none;
        font-weight: 700;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .export-btn:hover {
        background: linear-gradient(135deg, #20c997 0%, #28a745 100%);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(40, 167, 69, 0.4);
    }
    
    .btn-detail {
        padding: 8px 16px;
        border-radius: 10px;
        background: white;
        color: #667eea;
        border: 2px solid #667eea;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 12px;
    }
    
    .btn-detail:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }
    
    .reset-btn {
        border-radius: 12px;
        padding: 14px;
        border: 2px solid #e8eaf6;
        background: white;
        transition: all 0.3s ease;
        font-weight: 600;
    }
    
    .reset-btn:hover {
        border-color: #667eea;
        background: #f8f9ff;
        transform: translateY(-2px);
    }
    
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    
    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 6px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>

<div class="container-fluid py-4 animate-fade-in">
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="text-center">
            <div class="loading-spinner"></div>
            <p class="text-white mt-3 fw-bold">Mengekspor data...</p>
        </div>
    </div>

    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center position-relative">
            <div>
                <h2 class="mb-2 fw-bold">📊 Dashboard Penjualan</h2>
                <p class="mb-0 opacity-90">Analisis performa produk Anda secara real-time</p>
            </div>
            <div>
                <button class="export-btn" onclick="exportToExcel()">
                    <i>📥</i> Export Excel
                </button>
                <button class="export-btn ms-2" onclick="exportToPDF()" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);">
                    <i>📄</i> Export PDF
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="card-body position-relative">
                    <div class="stat-icon">📦</div>
                    <div class="stat-label">Total Produk</div>
                    <div class="stat-number">{{ count($products) }}</div>
                    <div class="stat-change">
                        <i>📈</i> Produk Aktif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card green">
                <div class="card-body position-relative">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-label">Total Terjual</div>
                    <div class="stat-number">{{ number_format($products->sum('total_sold')) }}</div>
                    <div class="stat-change">
                        <i>🔥</i> Total Penjualan
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card orange">
                <div class="card-body position-relative">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-label">Produk Terlaris</div>
                    <div class="stat-number" style="font-size: 20px; line-height: 1.3;">
                        {{ Str::limit($products->sortByDesc('total_sold')->first()->product_name ?? '-', 25) }}
                    </div>
                    <div class="stat-change">
                        <i>🏆</i> Best Seller
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card blue">
                <div class="card-body position-relative">
                    <div class="stat-icon">💰</div>
                    <div class="stat-label">Rata-rata Harga</div>
                    <div class="stat-number" style="font-size: 22px;">
                        Rp {{ number_format($products->avg('price'), 0, ',', '.') }}
                    </div>
                    <div class="stat-change">
                        <i>💵</i> Average Price
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="chart-container mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h4 class="mb-0 fw-bold">📈 Grafik Penjualan Per Produk</h4>
            <div class="mt-3 mt-md-0">
                <button class="chart-type-btn active" onclick="changeChartType('bar')" id="barBtn">📊 Bar</button>
                <button class="chart-type-btn" onclick="changeChartType('line')" id="lineBtn">📈 Line</button>
                <button class="chart-type-btn" onclick="changeChartType('pie')" id="pieBtn">🥧 Pie</button>
            </div>
        </div>
        <canvas id="salesChart" height="100"></canvas>
    </div>

    <!-- Filter & Search Section -->
    <div class="filter-section">
        <form method="GET" id="filterForm">
            <div class="row align-items-end">
                <div class="col-md-4 mb-3 mb-md-0">
                    <label class="form-label fw-bold mb-2">🔍 Cari Produk</label>
                    <div class="search-box">
                        <i>🔎</i>
                        <input type="text" id="searchInput" class="form-control" placeholder="Ketik nama produk..." onkeyup="searchTable()">
                    </div>
                </div>
                
                <div class="col-md-4 mb-3 mb-md-0">
                    <label class="form-label fw-bold mb-2">📊 Urutkan Berdasarkan</label>
                    <select name="filter" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Pilih Urutan --</option>
                        <option value="top" {{ $filter == 'top' ? 'selected' : '' }}>🔥 Penjualan Terbanyak</option>
                        <option value="low" {{ $filter == 'low' ? 'selected' : '' }}>📉 Penjualan Terdikit</option>
                        <option value="expensive" {{ $filter == 'expensive' ? 'selected' : '' }}>💎 Harga Termahal</option>
                        <option value="cheap" {{ $filter == 'cheap' ? 'selected' : '' }}>💵 Harga Termurah</option>
                    </select>
                </div>
                
                <div class="col-md-4">
                    <button type="button" class="btn reset-btn w-100" onclick="resetFilter()">
                        🔄 Reset Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="table-custom">
        <table class="table mb-0" id="productTable">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 40%;">Nama Produk</th>
                    <th style="width: 20%;">Harga</th>
                    <th style="width: 12%;">Stok</th>
                    <th style="width: 13%;">Total Terjual</th>
                    <th style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="fw-bold">{{ $product->product_name }}</div>
                                    <small class="text-muted">SKU: PRD-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            @if($product->stock > 50)
                                <span class="badge-stock high">{{ $product->stock }} Unit</span>
                            @elseif($product->stock > 20)
                                <span class="badge-stock medium">{{ $product->stock }} Unit</span>
                            @else
                                <span class="badge-stock low">{{ $product->stock }} Unit</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold text-success me-2" style="font-size: 18px;">{{ $product->total_sold }}</span>
                                @if($product->total_sold > $products->avg('total_sold'))
                                    <span style="font-size: 14px;">🔥</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail({{ $product->id }})">
                                👁️ Detail
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- CHART.JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- SheetJS untuk Export Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<!-- jsPDF untuk Export PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

<script>
    const labels = {!! $labels !!};
    const soldData = {!! $soldData !!};
    const productsData = {!! json_encode($products->values()) !!};
    const ctx = document.getElementById('salesChart').getContext('2d');
    let currentChart;

    // Generate colors
    function generateColors(count) {
        const colors = [
            'rgba(102, 126, 234, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(255, 99, 132, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)',
            'rgba(46, 213, 115, 0.8)',
            'rgba(245, 87, 108, 0.8)',
            'rgba(0, 242, 254, 0.8)'
        ];
        
        let result = [];
        for (let i = 0; i < count; i++) {
            result.push(colors[i % colors.length]);
        }
        return result;
    }

    function createChart(type) {
        if (currentChart) {
            currentChart.destroy();
        }

        const config = {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Terjual',
                    data: soldData,
                    backgroundColor: type === 'pie' ? generateColors(labels.length) : 'rgba(102, 126, 234, 0.7)',
                    borderColor: type === 'pie' ? generateColors(labels.length).map(c => c.replace('0.8', '1')) : 'rgb(102, 126, 234)',
                    borderWidth: 2,
                    borderRadius: type === 'bar' ? 10 : 0,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: type === 'pie',
                        position: 'right',
                        labels: {
                            padding: 20,
                            font: {
                                size: 13,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.85)',
                        padding: 15,
                        titleFont: {
                            size: 15,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 14
                        },
                        borderColor: 'rgba(102, 126, 234, 0.5)',
                        borderWidth: 2,
                        displayColors: true,
                        cornerRadius: 8
                    }
                },
                scales: type !== 'pie' ? {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            font: {
                                size: 12,
                                weight: '600'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 11,
                                weight: '600'
                            },
                            maxRotation: 45,
                            minRotation: 45
                        },
                        grid: {
                            display: false
                        }
                    }
                } : {}
            }
        };

        currentChart = new Chart(ctx, config);
    }

    function changeChartType(type) {
        createChart(type);
        
        document.querySelectorAll('.chart-type-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        document.getElementById(type + 'Btn').classList.add('active');
    }

    function searchTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('productTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName('td')[1];
            if (td) {
                const txtValue = td.textContent || td.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    }

    function resetFilter() {
        window.location.href = window.location.pathname;
    }

    function viewDetail(productId) {
        // Redirect ke route product.detail
        window.location.href = "{{ url('/product') }}/" + productId;
    }

    // Export to Excel
    function exportToExcel() {
        document.getElementById('loadingOverlay').style.display = 'flex';
        
        setTimeout(() => {
            const data = productsData.map((product, index) => ({
                'No': index + 1,
                'Nama Produk': product.product_name,
                'SKU': 'PRD-' + String(product.id).padStart(5, '0'),
                'Harga': 'Rp ' + new Intl.NumberFormat('id-ID').format(product.price),
                'Stok': product.stock + ' Unit',
                'Total Terjual': product.total_sold
            }));

            // Tambahkan summary di akhir
            data.push({});
            data.push({
                'No': '',
                'Nama Produk': 'RINGKASAN',
                'SKU': '',
                'Harga': '',
                'Stok': '',
                'Total Terjual': ''
            });
            data.push({
                'No': '',
                'Nama Produk': 'Total Produk',
                'SKU': '',
                'Harga': '',
                'Stok': '',
                'Total Terjual': productsData.length
            });
            data.push({
                'No': '',
                'Nama Produk': 'Total Penjualan',
                'SKU': '',
                'Harga': '',
                'Stok': '',
                'Total Terjual': productsData.reduce((sum, p) => sum + p.total_sold, 0)
            });
            data.push({
                'No': '',
                'Nama Produk': 'Rata-rata Harga',
                'SKU': '',
                'Harga': 'Rp ' + new Intl.NumberFormat('id-ID').format(productsData.reduce((sum, p) => sum + p.price, 0) / productsData.length),
                'Stok': '',
                'Total Terjual': ''
            });

            const ws = XLSX.utils.json_to_sheet(data);
            
            // Set column widths
            ws['!cols'] = [
                { wch: 5 },  // No
                { wch: 35 }, // Nama Produk
                { wch: 15 }, // SKU
                { wch: 20 }, // Harga
                { wch: 12 }, // Stok
                { wch: 15 }  // Total Terjual
            ];

            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Data Penjualan');
            
            const date = new Date().toISOString().split('T')[0];
            XLSX.writeFile(wb, `Laporan_Penjualan_${date}.xlsx`);
            
            document.getElementById('loadingOverlay').style.display = 'none';
            
            // Show success notification
            showNotification('✅ Data berhasil diekspor ke Excel!', 'success');
        }, 500);
    }

    // Export to PDF
    function exportToPDF() {
        document.getElementById('loadingOverlay').style.display = 'flex';
        
        setTimeout(() => {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('l', 'mm', 'a4'); // landscape orientation
            
            // Header
            doc.setFillColor(102, 126, 234);
            doc.rect(0, 0, 297, 40, 'F');
            
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(24);
            doc.setFont(undefined, 'bold');
            doc.text('📊 LAPORAN PENJUALAN PRODUK', 148.5, 15, { align: 'center' });
            
            doc.setFontSize(12);
            doc.setFont(undefined, 'normal');
            const date = new Date().toLocaleDateString('id-ID', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            doc.text('Tanggal: ' + date, 148.5, 25, { align: 'center' });
            
            // Statistics
            doc.setTextColor(0, 0, 0);
            doc.setFontSize(10);
            let yPos = 50;
            
            const totalProducts = productsData.length;
            const totalSold = productsData.reduce((sum, p) => sum + p.total_sold, 0);
            const avgPrice = productsData.reduce((sum, p) => sum + p.price, 0) / productsData.length;
            const bestSeller = productsData.reduce((max, p) => p.total_sold > max.total_sold ? p : max, productsData[0]);
            
            doc.setFillColor(240, 240, 255);
            doc.roundedRect(10, yPos - 5, 277, 25, 3, 3, 'F');
            
            doc.setFont(undefined, 'bold');
            doc.text(`Total Produk: ${totalProducts}`, 20, yPos + 5);
            doc.text(`Total Terjual: ${new Intl.NumberFormat('id-ID').format(totalSold)}`, 85, yPos + 5);
            doc.text(`Rata-rata Harga: Rp ${new Intl.NumberFormat('id-ID').format(avgPrice)}`, 160, yPos + 5);
            doc.text(`Produk Terlaris: ${bestSeller.product_name}`, 20, yPos + 15);
            
            // Table
            const tableData = productsData.map((product, index) => [
                index + 1,
                product.product_name,
                'PRD-' + String(product.id).padStart(5, '0'),
                'Rp ' + new Intl.NumberFormat('id-ID').format(product.price),
                product.stock + ' Unit',
                product.total_sold
            ]);
            
            doc.autoTable({
                startY: yPos + 25,
                head: [['No', 'Nama Produk', 'SKU', 'Harga', 'Stok', 'Total Terjual']],
                body: tableData,
                theme: 'grid',
                headStyles: {
                    fillColor: [102, 126, 234],
                    textColor: 255,
                    fontStyle: 'bold',
                    halign: 'center',
                    fontSize: 10
                },
                bodyStyles: {
                    fontSize: 9
                },
                alternateRowStyles: {
                    fillColor: [248, 249, 255]
                },
                columnStyles: {
                    0: { halign: 'center', cellWidth: 15 },
                    1: { cellWidth: 80 },
                    2: { halign: 'center', cellWidth: 35 },
                    3: { halign: 'right', cellWidth: 40 },
                    4: { halign: 'center', cellWidth: 25 },
                    5: { halign: 'center', cellWidth: 30 }
                },
                margin: { left: 10, right: 10 }
            });
            
            // Footer
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.setTextColor(128, 128, 128);
                doc.text(`Halaman ${i} dari ${pageCount}`, 148.5, 200, { align: 'center' });
                doc.text('Generated by Dashboard Penjualan', 148.5, 205, { align: 'center' });
            }
            
            const fileName = `Laporan_Penjualan_${new Date().toISOString().split('T')[0]}.pdf`;
            doc.save(fileName);
            
            document.getElementById('loadingOverlay').style.display = 'none';
            
            showNotification('✅ Data berhasil diekspor ke PDF!', 'success');
        }, 500);
    }

    // Show notification
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 20px 30px;
            background: ${type === 'success' ? 'linear-gradient(135deg, #28a745 0%, #20c997 100%)' : 'linear-gradient(135deg, #dc3545 0%, #c82333 100%)'};
            color: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            z-index: 10000;
            font-weight: 600;
            animation: slideIn 0.3s ease-out;
        `;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Add animations to style
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Initialize chart
    createChart('bar');
</script>

@endsection