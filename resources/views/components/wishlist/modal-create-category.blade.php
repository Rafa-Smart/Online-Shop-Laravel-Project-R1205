<div class="modal-header">
    <h5 class="modal-title">Buat Kategori Wishlist</h5>
    <button class="btn-close" onclick="openWishlistModal({{ $product_id }})"></button>
</div>

<div class="modal-body">

    <form id="createCategoryForm">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea class="form-control" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-success w-100">Buat Kategori</button>
    </form>

</div>
