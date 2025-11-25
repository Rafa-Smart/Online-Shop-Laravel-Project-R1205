@if ($categories->count() > 0)
<div class="modal-header">
    <h5 class="modal-title">Pilih Kategori Wishlist</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body d-flex gap-4">

    <!-- LEFT: CATEGORY LIST -->
    <div class="w-50 border-end pe-3">

        <form id="addWishlistForm">
            <input type="hidden" name="product_id" value="{{ $product_id }}">

            @foreach ($categories as $category)
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="wishlist_category_id"
                        value="{{ $category->id }}">
                    <label class="form-check-label">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary mt-3 w-100">
                Tambahkan ke Wishlist
            </button>
        </form>

    </div>

    <!-- RIGHT: ADD CATEGORY -->
    <div class="w-50">
        <button onclick="openCreateCategoryModal()" class="btn btn-secondary w-100">
            + Buat Kategori Baru
        </button>
    </div>

</div>
@endif
