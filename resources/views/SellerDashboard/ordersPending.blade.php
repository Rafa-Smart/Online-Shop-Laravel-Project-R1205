@extends('SellerDashboard.layouts.app')

@section('title', 'Orders Dashboard')

@section('content')

<style>
    .orders-wrapper {
        background: #f8f9fa;
        min-height: 100vh;
        padding: 30px 0;
    }
    
    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 8px;
    }
    
    .page-subtitle {
        color: #718096;
        font-size: 15px;
        margin-bottom: 30px;
    }
    
    .status-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        height: 100%;
    }
    
    .status-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .status-card.pending {
        border-left-color: #f59e0b;
    }
    
    .status-card.completed {
        border-left-color: #10b981;
    }
    
    .status-card.cancelled {
        border-left-color: #ef4444;
    }
    
    .status-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 16px;
    }
    
    .status-icon.pending {
        background: #fef3c7;
        color: #f59e0b;
    }
    
    .status-icon.completed {
        background: #d1fae5;
        color: #10b981;
    }
    
    .status-icon.cancelled {
        background: #fee2e2;
        color: #ef4444;
    }
    
    .status-label {
        font-size: 13px;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    
    .status-count {
        font-size: 36px;
        font-weight: 800;
        color: #1f2937;
        line-height: 1;
    }
    
    .content-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 24px;
    }
    
    .card-header-custom {
        padding: 24px 28px;
        border-bottom: 1px solid #e5e7eb;
        background: #fafafa;
    }
    
    .card-title-custom {
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .table-custom {
        margin: 0;
    }
    
    .table-custom thead {
        background: #f9fafb;
    }
    
    .table-custom thead th {
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 20px;
        border: none;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .table-custom tbody td {
        padding: 18px 20px;
        vertical-align: middle;
        color: #374151;
        font-size: 14px;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .table-custom tbody tr {
        transition: background-color 0.2s ease;
    }
    
    .table-custom tbody tr:hover {
        background: #f9fafb;
    }
    
    .order-id {
        font-weight: 700;
        color: #4f46e5;
        font-size: 15px;
    }
    
    .buyer-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .buyer-avatar {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 14px;
    }
    
    .buyer-name {
        font-weight: 600;
        color: #1f2937;
        font-size: 14px;
    }
    
    .product-list {
        max-width: 200px;
    }
    
    .product-item {
        display: inline-block;
        padding: 4px 10px;
        background: #f3f4f6;
        border-radius: 6px;
        font-size: 13px;
        margin: 2px;
        color: #4b5563;
    }
    
    .qty-badge {
        display: inline-block;
        padding: 4px 10px;
        background: #e0e7ff;
        color: #4f46e5;
        border-radius: 6px;
        font-weight: 600;
        font-size: 13px;
        margin: 2px;
    }
    
    .price-text {
        font-weight: 700;
        color: #059669;
        font-size: 15px;
    }
    
    .status-badge {
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    
    .status-badge.pending {
        background: #fef3c7;
        color: #92400e;
    }
    
    .status-badge.paid {
        background: #dbeafe;
        color: #1e40af;
    }
    
    .status-badge.shipped {
        background: #e0e7ff;
        color: #3730a3;
    }
    
    .status-badge.completed {
        background: #d1fae5;
        color: #065f46;
    }
    
    .status-badge.cancelled {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 13px;
        border: none;
        transition: all 0.2s ease;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    
    .btn-approve {
        background: #10b981;
        color: white;
    }
    
    .btn-approve:hover {
        background: #059669;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
    }
    
    .btn-cancel {
        background: #ef4444;
        color: white;
    }
    
    .btn-cancel:hover {
        background: #dc2626;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
    }
    
    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }
    
    .empty-icon {
        font-size: 64px;
        margin-bottom: 16px;
        opacity: 0.4;
    }
    
    .empty-text {
        color: #9ca3af;
        font-size: 15px;
        font-weight: 500;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
    }
    
    @media (max-width: 768px) {
        .action-buttons {
            flex-direction: column;
        }
        
        .btn-action {
            width: 100%;
        }
    }
</style>

<div class="orders-wrapper">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="mb-4">
            <h1 class="page-title">📦 Orders Dashboard</h1>
            <p class="page-subtitle">Kelola dan pantau semua pesanan Anda</p>
        </div>

        <!-- Status Cards -->
        <div class="row g-3 mb-4">
            @php
                $statuses = [
                    'pending' => ['label' => 'Pending', 'icon' => '⏳'],
                    'completed' => ['label' => 'Completed', 'icon' => '✅'],
                    'cancelled' => ['label' => 'Cancelled', 'icon' => '❌']
                ];
            @endphp

            @foreach($statuses as $status => $data)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="status-card {{ $status }}">
                        <div class="status-icon {{ $status }}">
                            {{ $data['icon'] }}
                        </div>
                        <div class="status-label">{{ $data['label'] }}</div>
                        <div class="status-count">{{ $orders->where('status', $status)->count() }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pending Orders Table -->
        <div class="content-card">
            <div class="card-header-custom">
                <h5 class="card-title-custom">
                    <span>⏳</span>
                    <span>Pending Orders</span>
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Buyer</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders->where('status', 'pending') as $order)
                            <tr>
                                <td>
                                    <span class="order-id">#{{ $order->id }}</span>
                                </td>
                                <td>
                                    <div class="buyer-info">
                                        <div class="buyer-avatar">
                                            {{ strtoupper(substr($order->buyer->fullname ?? 'NA', 0, 2)) }}
                                        </div>
                                        <span class="buyer-name">{{ $order->buyer->fullname ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="price-text">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <span class="status-badge pending">{{ ucfirst($order->status) }}</span>
                                </td>
                                <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <form action="{{ route('seller.orders.approve', $order->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-action btn-approve">Approve</button>
                                        </form>
                                        <form action="{{ route('seller.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-action btn-cancel">Cancel</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">📭</div>
                                        <div class="empty-text">Tidak ada pending orders</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="content-card">
            <div class="card-header-custom">
                <h5 class="card-title-custom">
                    <span>🕒</span>
                    <span>Recent Orders</span>
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Buyer</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders->sortByDesc('created_at')->take(10) as $order)
                            <tr>
                                <td>
                                    <span class="order-id">#{{ $order->id }}</span>
                                </td>
                                <td>
                                    <div class="buyer-info">
                                        <div class="buyer-avatar">
                                            {{ strtoupper(substr($order->buyer->fullname ?? 'NA', 0, 2)) }}
                                        </div>
                                        <span class="buyer-name">{{ $order->buyer->fullname ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-list">
                                        @foreach($order->details->take(2) as $detail)
                                            <span class="product-item">{{ Str::limit($detail->product->product_name ?? 'N/A', 15) }}</span>
                                        @endforeach
                                        @if($order->details->count() > 2)
                                            <span class="product-item">+{{ $order->details->count() - 2 }} more</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @foreach($order->details as $detail)
                                        <span class="qty-badge">{{ $detail->quantity }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <span class="price-text">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <span class="status-badge {{ $order->status }}">{{ ucfirst($order->status) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">📦</div>
                                        <div class="empty-text">Belum ada pesanan</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection