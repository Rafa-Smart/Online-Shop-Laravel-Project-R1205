@php
    $products = \App\Models\Wishlist::where('wishlist_category_id', $category_id)
                ->where('buyer_id', auth()->user()->buyer->id)
                ->with('product')
                ->get()
                ->pluck('product');
@endphp

<div id="content-{{ $category_id }}" class="tab-content">
    <div class="row g-4">
        @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3">
                @include('pages.wishlist.productCard', ['product' => $product])
            </div>
        @endforeach
    </div>
</div>
