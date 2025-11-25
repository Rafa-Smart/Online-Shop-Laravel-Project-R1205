<style>
.horizontal-card {
    border-radius: 12px;
    overflow: hidden;
    transition: 0.3s;
}
.horizontal-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
}
.object-fit-cover {
    object-fit: cover;
}
</style>

@if ($categories->sum(fn($c) => $c->wishlists->count()) === 0)
    <div class="alert alert-info text-center py-4">
        <strong>Anda belum memiliki category wishlist</strong>
    </div>
@else
    @foreach($categories as $category)
        
        @if(!$category->wishlists->isEmpty())
            <h5 class="fw-bold mb-3">{{ $category->name }}</h5>
        @endif

        <div class="row mb-4">

            @foreach($category->wishlists as $wishlist)
                @php $product = $wishlist->product; @endphp

                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm border-0 horizontal-card">

                        <div class="row g-0">
                            
                            {{-- IMAGE --}}
                            <div class="col-4">
                                <img 
                                    src="{{ $product?->img ? asset('storage/' . $product->img) : asset('img/product-3.png') }}" 
                                    class="img-fluid rounded-start h-100 object-fit-cover" 
                                    alt="product">
                            </div>

                            {{-- INFO --}}
                            <div class="col-8">
                                <div class="card-body">

                                    <h5 class="card-title mb-1">
                                        {{ $product->product_name ?? 'Nama produk tidak tersedia' }}
                                    </h5>

                                    <p class="card-text small text-muted mb-2">
                                        {{ Str::limit($product->description ?? 'Tidak ada deskripsi', 60) }}
                                    </p>

                                    <p class="card-text fw-bold text-danger">
                                        @if($product)
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </p>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    @endforeach
@endif
