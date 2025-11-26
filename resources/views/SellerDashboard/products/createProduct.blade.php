@extends('SellerDashboard.layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="container py-4">
    <h3 class="mb-4">Tambah Produk</h3>

<form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- NAMA PRODUK --}}
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="product_name" class="form-control" required>
    </div>

    {{-- HARGA --}}
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    {{-- STOK --}}
    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" required>
    </div>

    {{-- CATEGORY --}}
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- KONDISI PRODUK --}}
<div class="mb-3">
    <label class="form-label fw-bold">Kondisi Produk</label> <br>

    <label class="me-3">
        <input type="radio" name="condition" value="new" checked>
        Barang Baru
    </label>

    <label>
        <input type="radio" name="condition" value="used">
        Barang Bekas
    </label>
</div>

{{-- HARGA AWAL --}}
<div class="mb-3">
    <label class="form-label">Harga Awal (sebelum diskon) — optional</label>
    <input type="number" name="starting_price" class="form-control">
</div>

{{-- HARGA SETELAH DISKON --}}
<div class="mb-3">
    <label class="form-label">Harga Setelah Diskon</label>
    <input type="number" name="price" class="form-control" required>
</div>


    {{-- THUMBNAIL UPLOAD --}}
    <div class="mb-3">
        <label class="form-label">Thumbnail Produk</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*" required onchange="previewThumbnail(event)">
    </div>
    <p>preview new Photo:</p>
        <img id="thumbnail-preview" class="mt-3 rounded border" width="150" style="display:none;">
        
        {{-- DETAIL PHOTOS UPLOAD --}}
        <div class="mb-3">
            <label class="form-label">Foto Detail (Banyak)</label>
            <input type="file" name="detail_photos[]" class="form-control" accept="image/*" multiple multiple onchange="previewMultiple(event)">
        </div>
        <p>preview new photos:</p>
        <div id="multiple-preview" class="mt-3 d-flex flex-wrap gap-2"></div>

    {{-- SPESIFIKASI --}} 
    <h5 class="mt-4">Spesifikasi Produk</h5>
    <div id="specifications-wrapper">
        <div class="spec-item border p-3 rounded mb-2">
            <label>Judul</label>
            <input type="text" name="specifications[0][title]" class="form-control mb-2">
            <label>Isi / Deskripsi</label>
            <textarea type="text" name="specifications[0][value]" class="form-control"></textarea>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-spec d-none">Hapus</button>
        </div>
    </div>
    <button type="button" id="add-spec" class="btn btn-secondary btn-sm mb-3 mt-2">+ Tambah Field</button>

    <button class="btn btn-primary">Simpan Produk</button>
</form>

</div>


<script>
    let index = 1;

    document.getElementById('add-spec').addEventListener('click', function () {
        const wrapper = document.getElementById('specifications-wrapper');

        const html = `
            <div class="spec-item border p-3 rounded mb-2">
                <label>Judul</label>
                <input type="text" name="specifications[${index}][title]" class="form-control mb-2">

                <label>Isi / Deskripsi</label>
                <input type="text" name="specifications[${index}][value]" class="form-control">

                <button type="button" class="btn btn-danger btn-sm mt-2 remove-spec">
                    Hapus
                </button>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
        index++;
    });

    // Hapus field spesifikasi
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-spec')) {
            e.target.parentElement.remove();
        }
    });

        function previewThumbnail(event) {
        const img = document.getElementById('thumbnail-preview');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = 'block';
    }
     function previewMultiple(event) {
        const preview = document.getElementById('multiple-preview');
        preview.innerHTML = "";

        for (let file of event.target.files) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.width = 120;
            img.classList.add("rounded", "border");
            preview.appendChild(img);
        }
    }
</script>

@endsection
