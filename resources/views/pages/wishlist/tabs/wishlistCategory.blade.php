<style>
/* === CARD WRAPPER === */
.category-card {
    border-radius: 14px;
    padding: 24px;
    background: #ffffff;
    border: 1px solid rgba(0, 102, 255, 0.12);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    transition: 0.25s ease;
    cursor: pointer;
}

/* === HOVER === */
.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 26px rgba(0, 0, 0, 0.12);
    border-color: rgba(0, 102, 255, 0.35);
}

/* === TITLE === */
.category-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #0d1b2a;
}

/* === DESCRIPTION === */
.category-description {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 14px;
}

/* === COUNT TEXT === */
.category-count {
    font-weight: 600;
    font-size: 1rem;
    color: #0a66ff;
}

/* === BADGE UNTUK KOSONG === */
.category-count.empty {
    color: #dc3545;
}
</style>



@if ($categories->count() === 0)
    <div class="alert alert-info text-center py-4">
        <strong>Anda belum memiliki kategori wishlist</strong>
    </div>
@else

    @foreach($categories as $category)

        @php
            $totalWishlist = $wishlists->where('wishlist_category_id', $category->id)->count();
        @endphp

        <div class="category-card mb-4"
             onclick="window.location='{{ route('wishlist.category.detail', ['id' => $category->id]) }}'">

            <h4 class="category-title">{{ $category->name }}</h4>

            <p class="category-description">
                {{ Str::limit($category->description, 130) }}
            </p>

            <p class="category-count {{ $totalWishlist == 0 ? 'empty' : '' }}">
                {{ $totalWishlist > 0 ? $totalWishlist . ' produk di kategori ini' : 'Masih kosong' }}
            </p>

        </div>

    @endforeach

@endif
