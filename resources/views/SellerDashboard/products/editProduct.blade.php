@extends('SellerDashboard.layouts.app')

@section('title', 'Edit Produk')

@section('content')

<div class="container py-4">
    <h3 class="mb-4">Edit Produk</h3>

    {{-- ERROR VALIDATION --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali inputan anda:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- NAMA PRODUK --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Nama Produk</label>
        <input type="text" name="product_name" class="form-control"
               value="{{ old('product_name', $product->product_name) }}" required>
    </div>



    {{-- HARGA
    <div class="mb-3">
        <label class="form-label fw-bold">Harga</label>
        <input type="number" name="price" class="form-control"
               value="{{ old('price', $product->price) }}" required>
    </div> --}}

    {{-- STOK --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Stok</label>
        <input type="number" name="stock" class="form-control"
               value="{{ old('stock', $product->stock) }}" required>
    </div>

    {{-- CATEGORY --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Kategori</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ $product->category_id == $category->id ? 'selected':'' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>
    {{-- KONDISI PRODUK --}}
<div class="mb-3">
    <label class="form-label fw-bold">Kondisi Produk</label><br>

    <label class="me-3">
        <input type="radio" name="condition" value="new"
            {{ $product->condition == 'new' ? 'checked' : '' }}>
        Barang Baru
    </label>

    <label>
        <input type="radio" name="condition" value="used"
            {{ $product->condition == 'used' ? 'checked' : '' }}>
        Barang Bekas
    </label>
</div>

{{-- HARGA AWAL --}}
<div class="mb-3">
    <label class="form-label fw-bold">Harga Awal (sebelum diskon)</label>
    <input type="number" name="starting_price" class="form-control"
           value="{{ old('starting_price', $product->starting_price) }}">
</div>

{{-- HARGA DISKON (price) --}}
<div class="mb-3">
    <label class="form-label fw-bold">Harga Setelah Diskon</label>
    <input type="number" name="price" class="form-control"
           value="{{ old('price', $product->price) }}" required>
</div>


    {{-- THUMBNAIL --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Thumbnail Produk</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*" onchange="previewThumbnail(event)">
        
        <p class="mt-2 mb-1">Thumbnail saat ini:</p>
        <img src="{{ asset('storage/'.$product->img) }}" class="border rounded" width="150">
        <p>preview new Photo:</p>
        <img id="thumbnail-preview" class="mt-3 rounded border" width="150" style="display:none;">
    </div>

    {{-- DETAIL PHOTOS --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Foto Detail (Baru)</label>
        <input type="file" name="detail_photos[]" class="form-control" accept="image/*" multiple onchange="previewMultiple(event)">
        <p>preview new Photos:</p>
        <div id="multiple-preview" class="mt-3 d-flex flex-wrap gap-2"></div>

        <p class="mt-3 fw-bold">Foto saat ini:</p>
        <div class="d-flex flex-wrap gap-2">
            @foreach ($product->photos as $photo)
           
                <div class="position-relative">
                    <img src="{{ asset('storage/'.$photo->photo_path) }}" width="120" class="rounded border">
                </div>
            @endforeach
        </div>
    </div>

    {{-- SPESIFIKASI --}}
    <h5 class="fw-bold mt-4">Spesifikasi Produk</h5>
    <div id="specifications-wrapper">
        @foreach ($product->product_specifications ?? [] as $i => $spec)
            <div class="spec-item border p-3 rounded mb-2">
                <label class="fw-bold">Judul</label>
                <input type="text" name="specifications[{{ $i }}][title]" 
                       value="{{ $spec['title'] }}" class="form-control mb-2">

                <label class="fw-bold">Isi / Penjelasan</label>
                <textarea name="specifications[{{ $i }}][value]" class="form-control" rows="2">{{ $spec['value'] }}</textarea>

                <button type="button" class="btn btn-danger btn-sm mt-2 remove-spec">
                    Hapus
                </button>
            </div>
        @endforeach
    </div>

    {{-- Jika tidak ada spesifikasi sama sekali --}}
    @if (empty($product->product_specifications))
        <div class="spec-item border p-3 rounded mb-2">
            <label class="fw-bold">Judul</label>
            <input type="text" name="specifications[0][title]" class="form-control mb-2">

            <label class="fw-bold">Isi / Penjelasan</label>
            <textarea name="specifications[0][value]" class="form-control" rows="2"></textarea>

            <button type="button" class="btn btn-danger btn-sm mt-2 remove-spec d-none">Hapus</button>
        </div>
    @endif

    <button type="button" id="add-spec" class="btn btn-secondary btn-sm mb-3 mt-2">+ Tambah Field</button>

    <button class="btn btn-primary">Update Produk</button>
</form>

</div>


<script>
    let index = {{ count($product->product_specifications ?? []) }};

    document.getElementById('add-spec').addEventListener('click', function () {
        const wrapper = document.getElementById('specifications-wrapper');

        const html = `
            <div class="spec-item border p-3 rounded mb-2">
                <label class="fw-bold">Judul</label>
                <input type="text" name="specifications[${index}][title]" class="form-control mb-2">

                <label class="fw-bold">Isi / Penjelasan</label>
                <textarea name="specifications[${index}][value]" class="form-control" rows="2"></textarea>

                <button type="button" class="btn btn-danger btn-sm mt-2 remove-spec">Hapus</button>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
        index++;
    });

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
