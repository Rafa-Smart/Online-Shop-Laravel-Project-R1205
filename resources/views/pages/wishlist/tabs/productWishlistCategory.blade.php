@if ($products->sum(fn($c) => $c->wishlists->count()) === 0)
    <div class="alert alert-info text-center py-4">
        <strong>Anda belum memiliki wishlist</strong>
    </div>
@else
    <div class="row g-4">

        @foreach ($products as $product)
            {{-- {{ dd($product) }} --}}

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="product-card">
                    <div class="product-image">
                        <a href="{{ route('product.detail', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->img) }}"
                                onerror="this.onerror=null; this.src='{{ asset('img/product-3.png') }}'">
                        </a>
                        <span class="product-badge">New</span>
                        <div class="product-hover">
                            <a href="{{ route('addCart', $product->id) }}" class="btn-add">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <form action="{{ route('wishlist.destroyByProduct', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete-wishlist">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="product-info">
                        <a href="#" class="product-category">
                            {{ $product->category->category_name ?? 'Uncategorized' }}
                        </a>
                        <h5 class="product-name">{{ $product->product_name }}</h5>

                        <div class="product-sales-info mt-1 mb-2">

                            @if (isset($product->monthly_sales) && $product->monthly_sales > 0)
                                <p class="text-success mb-0" style="font-size: 0.85rem;">
                                    <i class="fas fa-fire"></i> Terjual
                                    {{ number_format((int) $product->monthly_sales) }} kali bulan
                                    ini
                                </p>
                            @endif

                            @if (isset($product->total_sales) && $product->total_sales > 0)
                                <p class="text-muted mb-0" style="font-size: 0.75rem;">
                                    Total terjual: {{ number_format((int) $product->total_sales) }}
                                </p>
                            @endif
                        </div>
                        <div class="product-pricing">
                            @php
                                // Ambil harga yang sudah disiapkan di Controller
                                $originalPrice = (int) $product->original_price;
                                $currentPrice = (int) $product->price;
                                $isDiscounted = $originalPrice > $currentPrice;
                                $discountPercentage = $isDiscounted
                                    ? round((($originalPrice - $currentPrice) / $originalPrice) * 100)
                                    : 0;
                            @endphp

                            @if ($isDiscounted)
                                <del class="price-old">
                                    Rp.{{ number_format($originalPrice, 0, ',', '.') }}
                                </del>
                                <span class="badge bg-danger ms-2">{{ $discountPercentage }}%
                                    OFF</span>
                            @else
                                <span class="price-old" style="visibility: hidden;">&nbsp;</span>
                            @endif

                            <span class="price-new">
                                Rp.{{ number_format($currentPrice, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="product-rating">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            <div class="pagination-wrapper">
                {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

    </div>
@endif