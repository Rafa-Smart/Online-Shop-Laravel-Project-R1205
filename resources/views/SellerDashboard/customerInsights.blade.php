@extends('SellerDashboard.layouts.app')

@section('title', 'Customer Insights')

@section('content')
<div class="container py-5">

    <h3 class="mb-4">📊 Customer Insights</h3>

    {{-- Row 1: Customer Repeat --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm p-4 text-center">
                <h5>Customer Repeat</h5>
                <h2 class="text-primary">{{ $repeatCustomers }}</h2>
                <p class="text-muted">Pembeli yang membeli lebih dari sekali</p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h5 class="text-center mb-3">New vs Returning Customers</h5>
                <canvas id="customerDoughnut"></canvas>
            </div>
        </div>
    </div>

    {{-- Row 2: Top Buyer --}}
    <div class="card shadow-sm p-4">
        <h5 class="mb-3">🏆 Top Buyers</h5>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Nama Pembeli</th>
                    <th>Total Pembelian</th>
                    <th>Total Belanja</th>
                </tr>
            </thead>
            <tbody>
                @forelse($topBuyers as $buyer)
                    <tr>
                        <td>{{ $buyer->fullname }}</td>
                        <td>{{ $buyer->total_orders }}</td>
                        <td>Rp {{ number_format($buyer->total_spent) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection
