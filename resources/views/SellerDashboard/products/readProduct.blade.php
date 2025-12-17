@extends('SellerDashboard.layouts.app')

@section('title', 'Daftar Produk')

@section('content')

<style>
    .product-list-container {
        /* background: linear-gradient(135deg, #24378e 0%, #446998 100%); */
        min-height: 100vh;
        padding: 1rem 0;
    }

    .content-wrapper {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 1.5rem;
        border-radius: 15px;
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-card.green {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .stat-card.orange {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .stat-card.blue {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .stat-label {
        font-size: 0.875rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
    }

    .filters-container {
        background: #f7fafc;
        padding: 1.5rem;
        border-radius: 15px;
        margin-bottom: 2rem;
    }

    .filter-row {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: end;
    }

    .filter-group {
        flex: 1;
        min-width: 200px;
    }

    .filter-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }

    .filter-input,
    .filter-select {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .filter-input:focus,
    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .btn-custom {
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary-custom {
        background: #e2e8f0;
        color: #4a5568;
    }

    .btn-secondary-custom:hover {
        background: #cbd5e0;
    }

    .view-toggle {
        display: flex;
        gap: 0.5rem;
        background: #e2e8f0;
        padding: 0.25rem;
        border-radius: 10px;
    }

    .view-btn {
        padding: 0.5rem 1rem;
        border: none;
        background: transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #4a5568;
    }

    .view-btn.active {
        background: white;
        color: #667eea;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        border-color: #667eea;
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: #f7fafc;
    }

    .product-body {
        padding: 1.25rem;
    }

    .product-name {
        font-size: 1.125rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .product-meta {
        display: flex;
        gap: 1rem;
        font-size: 0.875rem;
        color: #718096;
        margin-bottom: 1rem;
    }

    .product-meta-item {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .product-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .badge-new {
        background: #d4f4dd;
        color: #22543d;
    }

    .badge-used {
        background: #fef5e7;
        color: #975a16;
    }

    .badge-low-stock {
        background: #ffe5e5;
        color: #c53030;
    }

    .product-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action {
        flex: 1;
        padding: 0.5rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: #fbbf24;
        color: white;
        text-decoration: none;
    }

    .btn-edit:hover {
        background: #f59e0b;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
    }

    .table-view {
        overflow-x: auto;
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 0.875rem;
    }

    .custom-table thead {
        background: #f7fafc;
    }

    .custom-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #4a5568;
        border-bottom: 2px solid #e2e8f0;
        white-space: nowrap;
    }

    .custom-table td {
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }

    .custom-table tbody tr {
        transition: all 0.3s ease;
    }

    .custom-table tbody tr:hover {
        background: #f7fafc;
    }

    .product-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }

    .rating-stars {
        color: #fbbf24;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-icon {
        font-size: 4rem;
        color: #cbd5e0;
        margin-bottom: 1rem;
    }

    .empty-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }

    .empty-text {
        color: #718096;
        margin-bottom: 2rem;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-row {
            flex-direction: column;
        }

        .products-grid {
            grid-template-columns: 1fr;
        }
    }

    .specs-list {
        font-size: 0.75rem;
        color: #718096;
    }

    .specs-item {
        margin-bottom: 0.25rem;
    }

    .hidden {
        display: none;
    }
</style>

<div class="product-list-container">
    <div class="container">
        <div class="content-wrapper">
            <!-- Header -->
            <div class="page-header">
                <h1 class="page-title">
                    📦 Daftar Produk
                </h1>
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <div class="view-toggle">
                        <button class="view-btn active" id="gridViewBtn" onclick="switchView('grid')">
                            🔲 Grid
                        </button>
                        <button class="view-btn" id="tableViewBtn" onclick="switchView('table')">
                            📋 Table
                        </button>
                    </div>
                    <a href="{{ route('seller.products.create') }}" class="btn-custom btn-primary-custom" style="text-transform: none;text-decoration: none;">
                        ➕ Tambah Produk
                    </a>
                </div>
            </div>

            <!-- Statistics -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-label">Total Produk</div>
                    <div class="stat-value" id="totalProducts">{{ $products->count() }}</div>
                </div>
                <div class="stat-card green">
                    <div class="stat-label">Produk Aktif</div>
                    <div class="stat-value" id="activeProducts">{{ $products->where('stock', '>', 0)->count() }}</div>
                </div>
                <div class="stat-card orange">
                    <div class="stat-label">Stok Menipis</div>
                    <div class="stat-value" id="lowStockProducts">{{ $products->where('stock', '<=', 10)->where('stock', '>', 0)->count() }}</div>
                </div>
                <div class="stat-card blue">
                    <div class="stat-label">Rata-rata Rating</div>
                    <div class="stat-value">{{ $products->avg('average_rating') ? number_format($products->avg('average_rating'), 1) : '0.0' }}</div>
                </div>
            </div>

            <!-- Filters -->
            <div class="filters-container">
                <div class="filter-row">
                    <div class="filter-group">
                        <label class="filter-label">🔍 Cari Produk</label>
                        <input type="text" class="filter-input" id="searchInput" placeholder="Nama produk...">
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">📂 Kondisi</label>
                        <select class="filter-select" id="conditionFilter">
                            <option value="">Semua Kondisi</option>
                            <option value="new">Baru</option>
                            <option value="used">Bekas</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">📊 Stok</label>
                        <select class="filter-select" id="stockFilter">
                            <option value="">Semua Stok</option>
                            <option value="available">Tersedia</option>
                            <option value="low">Stok Menipis (≤10)</option>
                            <option value="out">Habis</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">💰 Urutkan</label>
                        <select class="filter-select" id="sortFilter">
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="price-high">Harga Tertinggi</option>
                            <option value="price-low">Harga Terendah</option>
                            <option value="name-az">Nama A-Z</option>
                            <option value="name-za">Nama Z-A</option>
                            <option value="rating">Rating Tertinggi</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <button class="btn-custom btn-secondary-custom" onclick="resetFilters()">
                            🔄 Reset
                        </button>
                    </div>
                </div>
            </div>

            @if ($products->count() > 0)
                <!-- Grid View -->
                <div class="products-grid" id="gridView">
                    @foreach ($products as $product)
                        <div class="product-card" 
                             data-name="{{ strtolower($product->product_name) }}"
                             data-condition="{{ $product->condition }}"
                             data-stock="{{ $product->stock }}"
                             data-price="{{ $product->price }}"
                             data-rating="{{ $product->average_rating }}"
                             data-created="{{ $product->created_at->timestamp }}">
                            <img src="{{ asset('storage/'.$product->img) }}" alt="{{ $product->product_name }}" class="product-image" onerror="this.src='{{ asset('img/avatar.jpg') }}'">
                            <div class="product-body">
                                <h3 class="product-name">{{ $product->product_name }}</h3>
                                <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                                
                                <div class="product-meta">
                                    <div class="product-meta-item">
                                        📦 {{ $product->stock }} unit
                                    </div>
                                    @if($product->average_rating > 0)
                                    <div class="product-meta-item">
                                        ⭐ {{ number_format($product->average_rating, 1) }}
                                    </div>
                                    @endif
                                </div>

                                <div>
                                    <span class="product-badge {{ $product->condition == 'new' ? 'badge-new' : 'badge-used' }}">
                                        {{ $product->condition == 'new' ? 'Baru' : 'Bekas' }}
                                    </span>
                                    @if($product->stock <= 10 && $product->stock > 0)
                                    <span class="product-badge badge-low-stock">
                                        ⚠️ Stok Menipis
                                    </span>
                                    @endif
                                </div>

                                <div class="product-actions">
                                    <a href="{{ route('seller.products.edit', $product->id) }}" class="btn-action btn-edit">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" style="width: 100%;">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Table View -->
                <div class="table-view hidden" id="tableView">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kondisi</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="table-row"
                                    data-name="{{ strtolower($product->product_name) }}"
                                    data-condition="{{ $product->condition }}"
                                    data-stock="{{ $product->stock }}"
                                    data-price="{{ $product->price }}"
                                    data-rating="{{ $product->average_rating }}"
                                    data-created="{{ $product->created_at->timestamp }}">
                                    <td>
                                        <img src="{{ asset($product->img) }}" alt="{{ $product->product_name }}" class="product-thumbnail" onerror="this.src='{{ asset('img/avatar.jpg') }}'">
                                    </td>
                                    <td>
                                        <strong>{{ $product->product_name }}</strong>
                                    </td>
                                    <td>
                                        <strong style="color: #667eea;">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                                    </td>
                                    <td>
                                        <span class="product-badge {{ $product->stock > 10 ? 'badge-new' : ($product->stock > 0 ? 'badge-low-stock' : 'badge-used') }}">
                                            {{ $product->stock }} unit
                                        </span>
                                    </td>
                                    <td>
                                        <span class="product-badge {{ $product->condition == 'new' ? 'badge-new' : 'badge-used' }}">
                                            {{ $product->condition == 'new' ? 'Baru' : 'Bekas' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($product->average_rating > 0)
                                        <div class="rating-stars">
                                            ⭐ {{ number_format($product->average_rating, 1) }}
                                            <small>({{ $product->rating_count }})</small>
                                        </div>
                                        @else
                                        <small class="text-muted">Belum ada rating</small>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 0.5rem;">
                                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn-action btn-edit" style="flex: initial; padding: 0.5rem 0.75rem;">
                                                ✏️
                                            </a>
                                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete" style="padding: 0.5rem 0.75rem;">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Empty State -->
                <div class="empty-state">
                    <div class="empty-icon">📦</div>
                    <h2 class="empty-title">Belum Ada Produk</h2>
                    <p class="empty-text">Mulai tambahkan produk pertama Anda untuk ditampilkan di sini.</p>
                    <a style="text-transform: none;" href="{{ route('seller.products.create') }}" class="btn-custom btn-primary-custom">
                        Tambah Produk Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    let currentView = 'grid';

    function switchView(view) {
        const gridView = document.getElementById('gridView');
        const tableView = document.getElementById('tableView');
        const gridBtn = document.getElementById('gridViewBtn');
        const tableBtn = document.getElementById('tableViewBtn');

        if (view === 'grid') {
            gridView.classList.remove('hidden');
            tableView.classList.add('hidden');
            gridBtn.classList.add('active');
            tableBtn.classList.remove('active');
        } else {
            gridView.classList.add('hidden');
            tableView.classList.remove('hidden');
            gridBtn.classList.remove('active');
            tableBtn.classList.add('active');
        }
        currentView = view;
    }

    function applyFilters() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const condition = document.getElementById('conditionFilter').value;
        const stockFilter = document.getElementById('stockFilter').value;
        const sortFilter = document.getElementById('sortFilter').value;

        let items = currentView === 'grid' 
            ? Array.from(document.querySelectorAll('.product-card'))
            : Array.from(document.querySelectorAll('.table-row'));

        // Filter
        items.forEach(item => {
            const name = item.dataset.name;
            const itemCondition = item.dataset.condition;
            const stock = parseInt(item.dataset.stock);

            let show = true;

            // Search filter
            if (searchTerm && !name.includes(searchTerm)) {
                show = false;
            }

            // Condition filter
            if (condition && itemCondition !== condition) {
                show = false;
            }

            // Stock filter
            if (stockFilter === 'available' && stock <= 0) {
                show = false;
            } else if (stockFilter === 'low' && (stock > 10 || stock <= 0)) {
                show = false;
            } else if (stockFilter === 'out' && stock > 0) {
                show = false;
            }

            item.style.display = show ? '' : 'none';
        });

        // Sort
        const visibleItems = items.filter(item => item.style.display !== 'none');
        
        visibleItems.sort((a, b) => {
            switch(sortFilter) {
                case 'newest':
                    return parseInt(b.dataset.created) - parseInt(a.dataset.created);
                case 'oldest':
                    return parseInt(a.dataset.created) - parseInt(b.dataset.created);
                case 'price-high':
                    return parseInt(b.dataset.price) - parseInt(a.dataset.price);
                case 'price-low':
                    return parseInt(a.dataset.price) - parseInt(b.dataset.price);
                case 'name-az':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'name-za':
                    return b.dataset.name.localeCompare(a.dataset.name);
                case 'rating':
                    return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                default:
                    return 0;
            }
        });

        // Reorder
        const container = currentView === 'grid' 
            ? document.getElementById('gridView')
            : document.querySelector('.custom-table tbody');

        visibleItems.forEach(item => {
            container.appendChild(item);
        });

        // Update count
        document.getElementById('totalProducts').textContent = visibleItems.length;
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('conditionFilter').value = '';
        document.getElementById('stockFilter').value = '';
        document.getElementById('sortFilter').value = 'newest';
        applyFilters();
    }

    // Event listeners
    document.getElementById('searchInput').addEventListener('input', applyFilters);
    document.getElementById('conditionFilter').addEventListener('change', applyFilters);
    document.getElementById('stockFilter').addEventListener('change', applyFilters);
    document.getElementById('sortFilter').addEventListener('change', applyFilters);
</script>

@endsection