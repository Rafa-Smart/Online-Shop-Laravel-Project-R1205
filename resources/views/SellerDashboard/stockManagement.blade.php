@extends('SellerDashboard.layouts.app')

@section('title', 'Stock Management')

@section('content')

<style>
    .stock-wrapper {
        background: #f8f9fa;
        min-height: 100vh;
        padding: 30px 0;
    }
    
    .page-header-stock {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 40px;
        border-radius: 20px;
        margin-bottom: 30px;
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .page-header-stock::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    .page-header-stock h2 {
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 8px;
    }
    
    .filter-card {
        background: white;
        border-radius: 16px;
        padding: 28px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 24px;
    }
    
    .filter-title {
        font-size: 16px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-control-custom {
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .form-control-custom:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }
    
    .btn-filter {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    }
    
    .btn-reset {
        background: white;
        color: #6b7280;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .btn-reset:hover {
        border-color: #667eea;
        color: #667eea;
        background: #f8f9ff;
    }
    
    .products-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .products-header {
        padding: 24px 28px;
        border-bottom: 2px solid #f3f4f6;
        background: #fafafa;
    }
    
    .products-title {
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .stock-table {
        margin: 0;
    }
    
    .stock-table thead {
        background: #f9fafb;
    }
    
    .stock-table thead th {
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 18px 20px;
        border: none;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .stock-table tbody td {
        padding: 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .stock-table tbody tr {
        transition: background-color 0.2s ease;
    }
    
    .stock-table tbody tr:hover {
        background: #f9fafb;
    }
    
    .product-img-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid #f3f4f6;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .product-name {
        font-weight: 600;
        color: #1f2937;
        font-size: 15px;
    }
    
    .product-sku {
        font-size: 12px;
        color: #9ca3af;
        margin-top: 4px;
    }
    
    .stock-badge {
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .stock-badge.critical {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .stock-badge.low {
        background: #fef3c7;
        color: #92400e;
    }
    
    .stock-badge.normal {
        background: #d1fae5;
        color: #065f46;
    }
    
    .stock-form {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .stock-input {
        width: 90px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        padding: 8px 12px;
        font-weight: 600;
        text-align: center;
        font-size: 14px;
    }
    
    .stock-input:focus {
        border-color: #667eea;
        outline: none;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .btn-update {
        background: #10b981;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 700;
        font-size: 13px;
        transition: all 0.2s ease;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    
    .btn-update:hover {
        background: #059669;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }
    
    .empty-state {
        padding: 80px 20px;
        text-align: center;
    }
    
    .empty-icon {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.4;
    }
    
    .empty-title {
        font-size: 20px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 8px;
    }
    
    .empty-text {
        color: #9ca3af;
        font-size: 15px;
    }
    
    .stats-mini {
        display: flex;
        gap: 16px;
        margin-top: 16px;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        font-size: 14px;
    }
    
    .stat-item strong {
        font-weight: 700;
    }
    
    .alert-info {
        background: #e0f2fe;
        border: 2px solid #7dd3fc;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .alert-info-icon {
        font-size: 24px;
    }
    
    .alert-info-text {
        flex: 1;
        color: #075985;
        font-weight: 600;
        font-size: 14px;
    }
</style>

<div class="stock-wrapper">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header-stock">
            <div class="position-relative">
                <h2>📦 Stock Management</h2>
                <p class="mb-0 opacity-90" style="font-size: 16px;">Kelola inventori dan stok produk Anda dengan mudah</p>
                
                <div class="stats-mini">
                    <div class="stat-item">
                        <span>📊</span>
                        <span>Total: <strong>{{ $products->count() }}</strong> produk</span>
                    </div>
                    <div class="stat-item">
                        <span>⚠️</span>
                        <span>Stok Rendah: <strong>{{ $products->where('stock', '<=', $filterStock)->count() }}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Info -->
        @if($products->where('stock', '<=', $filterStock)->count() > 0)
        <div class="alert-info">
            <div class="alert-info-icon">⚠️</div>
            <div class="alert-info-text">
                Ada {{ $products->where('stock', '<=', $filterStock)->count() }} produk dengan stok rendah yang memerlukan perhatian Anda
            </div>
        </div>
        @endif

        <!-- Filter Card -->
        <div class="filter-card">
            <div class="filter-title">
                <span>🔍</span>
                <span>Filter Produk Berdasarkan Stok</span>
            </div>
            
            <form method="GET">
                <div class="row align-items-end g-3">
                    <div class="col-md-4">
                        <label class="form-label" style="font-weight: 600; font-size: 13px; color: #6b7280; margin-bottom: 8px;">
                            Tampilkan produk dengan stok ≤
                        </label>
                        <input 
                            type="number" 
                            name="stock_filter" 
                            class="form-control form-control-custom"
                            value="{{ $filterStock }}" 
                            min="0"
                            placeholder="Masukkan jumlah stok">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-filter w-100">
                            🔎 Terapkan Filter
                        </button>
                    </div>
                    <div class="col-md-3">
                        <a href="" class="btn btn-reset w-100">
                            🔄 Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Products Table -->
        <div class="products-card">
            <div class="products-header">
                <h5 class="products-title">
                    <span>📋</span>
                    <span>Daftar Produk (Stok ≤ {{ $filterStock }})</span>
                </h5>
            </div>
            
            <div class="table-responsive">
                <table class="table stock-table">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Gambar</th>
                            <th>Nama Produk</th>
                            <th style="width: 150px;">Stok Tersedia</th>
                            <th style="width: 200px;">Update Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>
                                <div class="product-img-wrapper">
                                    <img src="{{ asset($product->img) }}" alt="{{ $product->product_name }}">
                                </div>
                            </td>
                            <td>
                                <div class="product-name">{{ $product->product_name }}</div>
                                <div class="product-sku">SKU: PRD-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</div>
                            </td>
                            <td>
                                @if($product->stock == 0)
                                    <span class="stock-badge critical">
                                        <span>🚫</span>
                                        <span>{{ $product->stock }} Unit</span>
                                    </span>
                                @elseif($product->stock <= $defaultThreshold)
                                    <span class="stock-badge low">
                                        <span>⚠️</span>
                                        <span>{{ $product->stock }} Unit</span>
                                    </span>
                                @else
                                    <span class="stock-badge normal">
                                        <span>✅</span>
                                        <span>{{ $product->stock }} Unit</span>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('seller.stock.update', $product->id) }}" method="POST" class="stock-form">
                                    @csrf
                                    <input 
                                        type="number" 
                                        name="stock" 
                                        class="form-control stock-input"
                                        value="{{ $product->stock }}" 
                                        min="0">
                                    <button type="submit" class="btn btn-update">Update</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <div class="empty-icon">✨</div>
                                    <div class="empty-title">Semua Produk Dalam Kondisi Baik</div>
                                    <div class="empty-text">Tidak ada produk dengan stok rendah saat ini</div>
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