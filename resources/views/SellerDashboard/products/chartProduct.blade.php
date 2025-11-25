@extends('SellerDashboard.layouts.app')

@section('title', 'Chart Penjualan Produk')

@section('content')

<div class="container py-4">

    <h3 class="mb-4">Grafik Penjualan Per Produk</h3>

    <div class="card p-4 shadow-sm mb-4">
        <canvas id="salesChart" height="120"></canvas>
    </div>

    <h4 class="mt-4">Detail Penjualan Produk</h4>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Total Terjual</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td class="text-success fw-bold">{{ $product->total_sold }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- CHART.JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = {!! $labels !!};
    const soldData = {!! $soldData !!};

    const ctx = document.getElementById('salesChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Terjual',
                data: soldData,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 2,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>

@endsection
