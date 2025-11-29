@extends('SellerDashboard.layouts.app')

@section('title', 'Orders Dashboard')

@section('content')
<div class="container-fluid py-4">
    <h2 class="dashboard-title">📦 Orders Dashboard</h2>

    {{-- Orders Status Cards --}}
    <div class="row g-4 mb-4">
        @php
            $statuses = [
                'pending' => ['label' => 'Pending', 'icon' => 'fas fa-hourglass-half', 'color' => 'linear-gradient(135deg,#f6c23e,#d39e00)'],
                
                'completed' => ['label' => 'Completed', 'icon' => 'fas fa-check-circle', 'color' => 'linear-gradient(135deg,#4e73df,#224abe)'],
                'cancelled' => ['label' => 'Cancelled', 'icon' => 'fas fa-times-circle', 'color' => 'linear-gradient(135deg,#e74a3b,#c12d1d)']
            ];
        @endphp

        @foreach($statuses as $status => $data)
            <div class="col-md-2 col-6">
                <div class="stats-card text-center">
                    <div class="stats-icon" style="background: {{ $data['color'] }}">
                        <i class="{{ $data['icon'] }}"></i>
                    </div>
                    <h6 class="text-muted">{{ $data['label'] }}</h6>
                    <h3 class="fw-bold">{{ $orders->where('status', $status)->count() }}</h3>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Last Orders Mini Table --}}
    

    {{-- Main Pending Orders Table --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pending Orders</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Buyer ID</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders->where('status', 'pending') as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->buyer_id }}</td>
                            <td>{{ number_format($order->total_price) }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <form action="{{ route('seller.orders.approve', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('seller.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary">Tidak ada pending orders</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">🕒 Pesanan Terakhir</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Buyer</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders->sortByDesc('created_at')->take(5) as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->buyer->fullname ?? 'N/A' }}</td>
                            <td>
                                @foreach($order->details as $detail)
                                    {{ $detail->product->name ?? 'N/A' }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($order->details as $detail)
                                    {{ $detail->quantity }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>Rp {{ number_format($order->total_price) }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status == 'pending') bg-warning
                                    @elseif($order->status == 'paid') bg-info
                                    @elseif($order->status == 'shipped') bg-primary
                                    @elseif($order->status == 'completed') bg-success
                                    @elseif($order->status == 'cancelled') bg-danger
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary">Belum ada pesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Tambahkan style tambahan untuk cards --}}
<style>
    .dashboard-title {
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 20px;
        background: linear-gradient(45deg, #4158d0, #c850c0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .stats-card {
        border-radius: 18px;
        padding: 20px;
        background: #fff;
        box-shadow: 4px 4px 15px rgba(0,0,0,0.08), -4px -4px 15px rgba(255,255,255,0.8);
        transition: all .25s ease-in-out;
    }
    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: 6px 6px 20px rgba(0,0,0,0.1), -6px -6px 20px rgba(255,255,255,0.9);
    }
    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #fff;
        margin: 0 auto 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
</style>
@endsection
