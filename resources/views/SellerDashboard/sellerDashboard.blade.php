@extends('SellerDashboard.layouts.app')

@section('title', 'Dashboard Seller')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">


{{-- Esthetic Custom Styles --}}
<style>
    body {
        background: linear-gradient(135deg, #eef2f7, #f8f9fb) !important;
    }

    .dashboard-title {
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 20px;
        background: linear-gradient(45deg, #4158d0, #c850c0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stats-card {
        border-radius: 22px;
        padding: 32px;
        background: #ffffff;
        box-shadow:
            8px 8px 18px rgba(0,0,0,0.08),
            -5px -5px 15px rgba(255,255,255,0.8);
        transition: all .25s ease-in-out;
        position: relative;
        overflow: hidden;
    }

    .stats-card:hover {
        transform: translateY(-6px);
        box-shadow:
            15px 15px 28px rgba(0,0,0,0.1),
            -10px -10px 25px rgba(255,255,255,0.9);
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 18px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: white;
        margin-bottom: 18px;
        box-shadow: 0 7px 20px rgba(0,0,0,0.1);
    }

    .chart-wrapper {
        border-radius: 22px;
        padding: 30px;
        background: #ffffff;
        box-shadow:
            8px 8px 18px rgba(0,0,0,0.08),
            -5px -5px 15px rgba(255,255,255,0.8);
    }

    .select-modern {
        border-radius: 12px;
        padding: 10px 14px;
        border: 1px solid #e2e6ef;
        background: #f5f7fb;
        box-shadow: inset 3px 3px 8px rgba(0,0,0,0.08),
                    inset -3px -3px 8px rgba(255,255,255,1);
    }
</style>

<div class="container-fluid py-4">

    <h2 class="dashboard-title">✨ Seller Performance Dashboard</h2>

    {{-- Statistic Cards --}}
    <div class="row g-4 mb-4">

        {{-- Revenue --}}
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg,#4e73df,#224abe)">
                    <i class="fas fa-wallet"></i>
                </div>
                <h6 class="text-muted">Total Pendapatan</h6>
                <h2 class="fw-bold">Rp {{ number_format($totalRevenue ?? 0) }}</h2>
                <small class="text-success">⬆ 12.4% bulan ini</small>
            </div>
        </div>

        {{-- Sold --}}
            <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg,#1cc88a,#108f5b)">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <h6 class="text-muted">Produk Terjual</h6>
                <h2 class="fw-bold">{{ $totalSold ?? 0 }}</h2>
                <small class="text-primary">Stabil minggu ini</small>
            </div>
        </div>

        {{-- Products --}}
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg,#f6c23e,#d39e00)">
                    <i class="fas fa-box"></i>
                </div>
                <h6 class="text-muted">Total Produk Toko</h6>
                <h2 class="fw-bold">{{ $totalProducts ?? 0 }}</h2>
                <small class="text-warning">Inventaris aman</small>
            </div>
        </div>

    </div>

    {{-- Chart --}}
    <div class="chart-wrapper mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">📈 Statistik Penjualan</h5>

            <select id="rangeSelect" class="form-select select-modern w-auto">
                <option value="daily">Harian</option>
                <option value="monthly">Bulanan</option>
                <option value="yearly">Tahunan</option>
            </select>
        </div>

        <canvas id="salesChart" height="110"></canvas>
    </div>

</div>

{{-- Chart JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let chart;

    async function loadChart(type = 'daily') {
        const res = await fetch(`/seller/dashboard/statistics?type=${type}`);
        const json = await res.json();

        let labels = [];
        let values = [];

        json.data.forEach(item => {
            labels.push(item.label);
            values.push(item.total);
        });

        if (chart) chart.destroy();

        const ctx = document.getElementById('salesChart');

        const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, "rgba(78,115,223,0.5)");
        gradient.addColorStop(1, "rgba(78,115,223,0)");

        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels,
                datasets: [{
                    label: "Total Penjualan",
                    data: values,
                    borderWidth: 3,
                    borderColor: "#4e73df",
                    backgroundColor: gradient,
                    tension: 0.35,
                    fill: true,
                    pointRadius: 4,
                    pointBackgroundColor: "#4e73df",
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: "#2e59d9"
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: "#e3e6f0" }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    }

    document.getElementById('rangeSelect').addEventListener('change', function () {
        loadChart(this.value);
    });

    loadChart();
</script>

@endsection
