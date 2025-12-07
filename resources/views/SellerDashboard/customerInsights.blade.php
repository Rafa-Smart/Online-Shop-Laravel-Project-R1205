@extends('SellerDashboard.layouts.app')

@section('title', 'Customer Insights')

@section('content')

<style>
    .insights-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        padding: 40px 0;
    }
    
    .page-header-insights {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 50px;
        border-radius: 24px;
        margin-bottom: 40px;
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.4);
        position: relative;
        overflow: hidden;
    }
    
    .page-header-insights::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    .page-header-insights h2 {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 10px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    
    .stat-card-insights {
        background: white;
        border-radius: 24px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card-insights::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    }
    
    .stat-card-insights:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        border-color: #667eea;
    }
    
    .stat-icon-large {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        margin: 0 auto 25px;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }
    
    .stat-card-insights:hover .stat-icon-large {
        transform: scale(1.1) rotate(5deg);
    }
    
    .stat-number-large {
        font-size: 56px;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 20px 0;
        line-height: 1;
    }
    
    .stat-label-insights {
        font-size: 14px;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .chart-card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .chart-card:hover {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }
    
    .chart-title {
        font-size: 22px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 30px;
        text-align: center;
        position: relative;
        padding-bottom: 15px;
    }
    
    .chart-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        border-radius: 2px;
    }
    
    .table-card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .table-card:hover {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }
    
    .table-title {
        font-size: 24px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .custom-table {
        border-radius: 16px;
        overflow: hidden;
        border: none;
    }
    
    .custom-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .custom-table thead th {
        color: white;
        font-weight: 700;
        padding: 20px 18px;
        border: none;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
    }
    
    .custom-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #e9ecef;
    }
    
    .custom-table tbody tr:hover {
        background: linear-gradient(90deg, #f8f9ff 0%, #ffffff 100%);
        transform: scale(1.01);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    .custom-table tbody td {
        padding: 22px 18px;
        vertical-align: middle;
        font-size: 15px;
        color: #495057;
        font-weight: 500;
    }
    
    .rank-badge {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 18px;
        margin-right: 15px;
    }
    
    .rank-1 {
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4);
    }
    
    .rank-2 {
        background: linear-gradient(135deg, #C0C0C0 0%, #808080 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(192, 192, 192, 0.4);
    }
    
    .rank-3 {
        background: linear-gradient(135deg, #CD7F32 0%, #8B4513 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(205, 127, 50, 0.4);
    }
    
    .rank-other {
        background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
        color: #495057;
    }
    
    .buyer-info {
        display: flex;
        align-items: center;
    }
    
    .buyer-avatar {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 20px;
        margin-right: 15px;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }
    
    .buyer-name {
        font-weight: 700;
        color: #2d3748;
        font-size: 16px;
    }
    
    .badge-orders {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 14px;
        display: inline-block;
    }
    
    .badge-spent {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 16px;
        display: inline-block;
        box-shadow: 0 4px 12px rgba(17, 153, 142, 0.3);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    
    .empty-state-icon {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.5;
    }
    
    .empty-state-text {
        font-size: 18px;
        color: #6c757d;
        font-weight: 600;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .mini-stat {
        background: linear-gradient(135deg, #f8f9ff 0%, #e9ecef 100%);
        padding: 20px;
        border-radius: 16px;
        text-align: center;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .mini-stat:hover {
        border-color: #667eea;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    
    .mini-stat-value {
        font-size: 28px;
        font-weight: 800;
        color: #667eea;
        margin: 10px 0;
    }
    
    .mini-stat-label {
        font-size: 12px;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }
    
    .animate-fade-up {
        animation: fadeUp 0.6s ease-out;
    }
    
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="insights-container">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header-insights animate-fade-up">
            <div class="position-relative">
                <h2>📊 Customer Insights</h2>
                <p class="mb-0 opacity-90" style="font-size: 18px;">Analisis mendalam tentang perilaku dan loyalitas pelanggan Anda</p>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="stats-grid animate-fade-up">
            <div class="mini-stat">
                <div class="mini-stat-label">Total Customers</div>
                <div class="mini-stat-value">{{ $newCustomers + $returningCustomers }}</div>
            </div>
            <div class="mini-stat">
                <div class="mini-stat-label">Repeat Rate</div>
                <div class="mini-stat-value">
                    {{ $newCustomers + $returningCustomers > 0 ? number_format(($repeatCustomers / ($newCustomers + $returningCustomers)) * 100, 1) : 0 }}%
                </div>
            </div>
            <div class="mini-stat">
                <div class="mini-stat-label">Avg Orders/Customer</div>
                <div class="mini-stat-value">
                    {{ count($topBuyers) > 0 ? number_format($topBuyers->avg('total_orders'), 1) : 0 }}
                </div>
            </div>
            <div class="mini-stat">
                <div class="mini-stat-label">Top Spender</div>
                <div class="mini-stat-value" style="font-size: 16px;">
                    @if(count($topBuyers) > 0)
                        Rp {{ number_format($topBuyers->first()->total_spent / 1000, 0) }}K
                    @else
                        Rp 0
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row mb-4 animate-fade-up" style="animation-delay: 0.1s;">
            <!-- Customer Repeat Card -->
            <div class="col-lg-4 mb-4">
                <div class="stat-card-insights text-center">
                    <div class="stat-icon-large">
                        🔄
                    </div>
                    <div class="stat-label-insights">Customer Repeat</div>
                    <div class="stat-number-large">{{ $repeatCustomers }}</div>
                    <p class="stat-label-insights mt-3" style="text-transform: none; letter-spacing: 0;">
                        Pelanggan yang membeli lebih dari sekali
                    </p>
                    <div class="mt-4">
                        <div style="font-size: 14px; color: #6c757d;">
                            <strong>Tingkat Loyalitas:</strong>
                        </div>
                        <div class="progress mt-2" style="height: 10px; border-radius: 10px;">
                            <div class="progress-bar" style="width: {{ $newCustomers + $returningCustomers > 0 ? ($repeatCustomers / ($newCustomers + $returningCustomers)) * 100 : 0 }}%; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Card -->
            <div class="col-lg-8 mb-4">
                <div class="chart-card">
                    <h5 class="chart-title">👥 New vs Returning Customers</h5>
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <canvas id="customerDoughnut" height="280"></canvas>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <div style="width: 16px; height: 16px; background: #667eea; border-radius: 4px;"></div>
                                    <span style="font-weight: 600; color: #2d3748;">New Customers</span>
                                </div>
                                <div style="font-size: 32px; font-weight: 800; color: #667eea; margin-left: 26px;">
                                    {{ $newCustomers }}
                                </div>
                                <div style="font-size: 14px; color: #6c757d; margin-left: 26px;">
                                    {{ $newCustomers + $returningCustomers > 0 ? number_format(($newCustomers / ($newCustomers + $returningCustomers)) * 100, 1) : 0 }}% dari total
                                </div>
                            </div>
                            <div>
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <div style="width: 16px; height: 16px; background: #38ef7d; border-radius: 4px;"></div>
                                    <span style="font-weight: 600; color: #2d3748;">Returning Customers</span>
                                </div>
                                <div style="font-size: 32px; font-weight: 800; color: #38ef7d; margin-left: 26px;">
                                    {{ $returningCustomers }}
                                </div>
                                <div style="font-size: 14px; color: #6c757d; margin-left: 26px;">
                                    {{ $newCustomers + $returningCustomers > 0 ? number_format(($returningCustomers / ($newCustomers + $returningCustomers)) * 100, 1) : 0 }}% dari total
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Buyers Table -->
        <div class="table-card animate-fade-up" style="animation-delay: 0.2s;">
            <h5 class="table-title">🏆 Top Buyers - Pelanggan Terbaik Anda</h5>

            @if(count($topBuyers) > 0)
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Rank</th>
                                <th style="width: 40%;">Nama Pembeli</th>
                                <th>Total Pembelian</th>
                                <th>Total Belanja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topBuyers as $index => $buyer)
                                <tr>
                                    <td>
                                        <div class="rank-badge {{ $index == 0 ? 'rank-1' : ($index == 1 ? 'rank-2' : ($index == 2 ? 'rank-3' : 'rank-other')) }}">
                                            @if($index == 0)
                                                🥇
                                            @elseif($index == 1)
                                                🥈
                                            @elseif($index == 2)
                                                🥉
                                            @else
                                                {{ $index + 1 }}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="buyer-info">
                                            <div class="buyer-avatar">
                                                {{ strtoupper(substr($buyer->fullname, 0, 2)) }}
                                            </div>
                                            <div>
                                                <div class="buyer-name">{{ $buyer->fullname }}</div>
                                                <small style="color: #6c757d;">Pelanggan 
                                                    @if($buyer->total_orders >= 5)
                                                        VIP 💎
                                                    @elseif($buyer->total_orders >= 3)
                                                        Loyal 🌟
                                                    @else
                                                        Regular
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge-orders">{{ $buyer->total_orders }} Orders</span>
                                    </td>
                                    <td>
                                        <span class="badge-spent">Rp {{ number_format($buyer->total_spent, 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">📊</div>
                    <div class="empty-state-text">Belum ada data pelanggan</div>
                    <p style="color: #6c757d; margin-top: 10px;">Data akan muncul setelah ada transaksi pertama</p>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('customerDoughnut').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['New Customers', 'Returning Customers'],
            datasets: [{
                data: [{{ $newCustomers }}, {{ $returningCustomers }}],
                backgroundColor: [
                    'rgba(102, 126, 234, 0.9)',
                    'rgba(56, 239, 125, 0.9)'
                ],
                borderColor: [
                    'rgb(102, 126, 234)',
                    'rgb(56, 239, 125)'
                ],
                borderWidth: 3,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.85)',
                    padding: 15,
                    titleFont: {
                        size: 16,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 14
                    },
                    cornerRadius: 8,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.parsed || 0;
                            let total = context.dataset.data.reduce((a, b) => a + b, 0);
                            let percentage = ((value / total) * 100).toFixed(1);
                            return label + ': ' + value + ' (' + percentage + '%)';
                        }
                    }
                }
            },
            cutout: '65%'
        }
    });
</script>
@endsection