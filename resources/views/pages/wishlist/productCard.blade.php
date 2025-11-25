
<style>
    /* ================= PRODUCT CARD ================= */
.product-card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

/* ===== PRODUCT IMAGE ===== */
.product-card .product-image {
    position: relative;
    overflow: hidden;
}

.product-card .product-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

/* ===== BADGE ===== */
.product-card .product-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #ff3d00;
    color: #fff;
    font-size: 0.75rem;
    font-weight: bold;
    padding: 3px 8px;
    border-radius: 5px;
    text-transform: uppercase;
}

/* ===== HOVER BUTTONS ===== */
.product-card .product-hover {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    opacity: 0;
    transition: opacity 0.3s;
}

.product-card:hover .product-hover {
    opacity: 1;
}

.product-card .product-hover .btn-add,
.product-card .product-hover .btn-fav button {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #333;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s;
}

.product-card .product-hover .btn-add:hover,
.product-card .product-hover .btn-fav button:hover {
    background-color: #ff3d00;
    color: #fff;
    border-color: #ff3d00;
}

/* ===== PRODUCT INFO ===== */
.product-card .product-info {
    padding: 15px;
    text-align: left;
}

.product-card .product-category {
    display: block;
    font-size: 0.8rem;
    color: #888;
    margin-bottom: 5px;
    text-decoration: none;
}

.product-card .product-category:hover {
    text-decoration: underline;
}

.product-card .product-name {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 10px;
    height: 40px;
    overflow: hidden;
}

.product-card .product-pricing {
    font-size: 0.9rem;
    font-weight: bold;
    color: #333;
}

.product-card .price-old {
    text-decoration: line-through;
    color: #999;
    margin-right: 5px;
}

.product-card .price-new {
    color: #ff3d00;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .product-card .product-image img {
        height: 200px;
    }
}

@media (max-width: 576px) {
    .product-card .product-image img {
        height: 150px;
    }
}

</style>
<div class="product-card">
    <div class="product-image">
        <a href="{{ route('product.detail', $product->id) }}">
            <img src="{{ asset('storage/' . $product->img) }}"
                 onerror="this.onerror=null; this.src='{{ asset('img/product-3.png') }}'">
        </a>
        <span class="product-badge">New</span>
        <div class="product-hover">
            <a href="{{ route('addCart', $product->id) }}" class="btn-add"><i class="fas fa-shopping-cart"></i></a>
            <form action="{{ route('wishlist.store', ['product_id'=>$product->id]) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn-fav border-0 bg-transparent"><i class="fas fa-heart"></i></button>
            </form>
        </div>
    </div>
    <div class="product-info">
        <a href="#" class="product-category">{{ $product->category->category_name ?? 'Uncategorized' }}</a>
        <h5 class="product-name">{{ $product->product_name }}</h5>
        <div class="product-pricing">
            <span class="price-new">Rp.{{ number_format($product->price,0,',','.') }}</span>
        </div>
    </div>
</div>
