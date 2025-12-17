@extends('SellerDashboard.layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<style>
/* ===========================
   GLOBAL MODERN STYLE
=========================== */
.page-title {
    font-size: 28px;
    font-weight: 700;
    color: #1a2b49;
}

.card-modern {
    background: #ffffff;
    padding: 30px;
    border-radius: 18px;
    border: 1px solid #e8edf5;
    box-shadow: 0 8px 22px rgba(0,0,0,0.06);
}

.section-heading {
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 14px;
    color: #1c2d48;
}

/* GRID 2 KOLOM */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 26px;
}

/* LABEL */
.form-label {
    font-weight: 600;
    color: #1f2d3d;
}

/* INPUT */
.form-control, .form-select {
    padding: 12px 14px;
    border-radius: 12px;
    border: 1px solid #d4dbe5;
    transition: .2s;
}

.form-control:focus,
.form-select:focus {
    border-color: #2362d1;
    box-shadow: 0 0 0 4px rgba(35,98,209,0.15);
}

/* RADIO */
.modern-radio {
    transform: scale(1.2);
    accent-color: #2362d1;
    margin-right: 6px;
}

/* IMAGE PREVIEW */
.image-preview {
    padding: 6px;
    border-radius: 12px;
    border: 1px solid #dfe5ef;
    background: #f7f9fc;
}

/* SPEC */
.spec-item {
    background: #f3f7ff;
    border-radius: 14px;
    border: 1px solid #d8e5ff;
}

/* BUTTONS */
.btn-primary {
    background: #2362d1;
    border: none;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
}

.btn-primary:hover {
    background: #1b4fa8;
}

.btn-secondary {
    background: #e9eefb;
    color: #2362d1;
    border: none;
    padding: 10px 16px;
    border-radius: 10px;
}

.btn-secondary:hover {
    background: #d9e4fa;
}
</style>


<div class="container py-4">

    <h3 class="page-title mb-4">➕ Tambah Produk</h3>

    <div class="card-modern">

<form action="{{ route('seller.products.store') }}" 
      method="POST" enctype="multipart/form-data">

    @csrf

    {{-- =====================
         FORM GRID
    ===================== --}}
    <div class="form-grid">

        {{-- Nama Produk --}}
        <div>
            <label class="form-label">Nama Produk</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        {{-- Stok --}}
        <div>
            <label class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Kondisi --}}
        <div>
            <label class="form-label">Kondisi Produk</label>
            <div class="mt-1">
                <label class="me-4">
                    <input type="radio" name="condition" value="new" class="modern-radio" checked>
                    Baru
                </label>
                <label>
                    <input type="radio" name="condition" value="used" class="modern-radio">
                    Bekas
                </label>
            </div>
        </div>

        {{-- Harga Awal --}}
        <div>
            <label class="form-label">Harga Awal (optional)</label>
            <input type="number" name="starting_price" class="form-control">
        </div>

        {{-- Harga Setelah Diskon --}}
        <div>
            <label class="form-label">Harga Setelah Diskon</label>
            <input type="number" name="price" class="form-control" required>
        </div>

    </div> {{-- end grid --}}



    {{-- =====================
        MEDIA SECTION
    ===================== --}}
    <h5 class="section-heading mt-4">🖼 Thumbnail Produk</h5>

    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Upload Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" accept="image/*" required onchange="previewThumbnail(event)">
        </div>

        <div class="col-md-6">
            <p class="fw-bold">Preview Thumbnail:</p>
            <img id="thumbnail-preview" width="150" class="image-preview" style="display:none;">
        </div>

    </div>


    {{-- DETAIL PHOTOS --}}
    <h5 class="section-heading mt-4">📸 Foto Detail Produk</h5>

    <div>
        <label class="form-label">Upload Foto (banyak)</label>
        <input type="file" name="detail_photos[]" class="form-control"
               accept="image/*" multiple onchange="previewMultiple(event)">

        <p class="fw-bold mt-3">Preview Foto Baru:</p>
        <div id="multiple-preview" class="d-flex gap-2 flex-wrap"></div>
    </div>



    {{-- =====================
        SPESIFIKASI
    ===================== --}}
    <h5 class="section-heading mt-4">📒 Spesifikasi Produk</h5>

    <div id="specifications-wrapper">
        <div class="spec-item p-3 mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="specifications[0][title]" class="form-control mb-2">

            <label class="form-label">Isi / Deskripsi</label>
            <textarea name="specifications[0][value]" class="form-control" rows="2"></textarea>

            <button type="button" class="btn btn-danger btn-sm mt-2 remove-spec d-none">Hapus</button>
        </div>
    </div>

    <button id="add-spec" type="button" class="btn btn-secondary mt-2">+ Tambah Spesifikasi</button>



    <button class="btn btn-primary w-100 mt-4">
        💾 Simpan Produk
    </button>

</form>

    </div><!-- end card -->
</div><!-- end container -->



<script>
    let index = 1;

    document.getElementById("add-spec").addEventListener("click", () => {
        document.getElementById("specifications-wrapper").insertAdjacentHTML(
            "beforeend",
            `
            <div class="spec-item p-3 mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control mb-2"
                       name="specifications[${index}][title]">

                <label class="form-label">Isi / Deskripsi</label>
                <textarea class="form-control" rows="2"
                          name="specifications[${index}][value]"></textarea>

                <button type="button" class="btn btn-danger btn-sm mt-2 remove-spec">Hapus</button>
            </div>
            `
        );
        index++;
    });

    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-spec")) {
            e.target.parentElement.remove();
        }
    });

    function previewThumbnail(event) {
        const img = document.getElementById("thumbnail-preview");
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = "block";
    }

    function previewMultiple(event) {
        const wrap = document.getElementById("multiple-preview");
        wrap.innerHTML = "";
        [...event.target.files].forEach(file => {
            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.classList.add("image-preview");
            img.width = 120;
            wrap.appendChild(img);
        });
    }
</script>

@endsection
