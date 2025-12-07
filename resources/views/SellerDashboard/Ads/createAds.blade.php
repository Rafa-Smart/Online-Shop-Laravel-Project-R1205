@extends('SellerDashboard.layouts.app')

@section('title', 'Create Advertisement')

@section('content')

<style>
    .ads-card {
        background: #ffffff;
        border-radius: 22px;
        padding: 30px;
        box-shadow: 0px 10px 25px rgba(0,0,0,0.07);
        border: 1px solid #eef2f6;
        max-width: 900px;
        margin: auto;
    }

    .ads-title {
        font-weight: 700;
        font-size: 1.8rem;
        letter-spacing: -0.5px;
        color: #1b1b1b;
    }

    .form-label {
        font-weight: 600;
        margin-top: 12px;
        color: #2c3e50;
    }

    .preview-box {
        border-radius: 14px;
        padding: 10px;
        border: 1px solid #e1e5ea;
        background: #fafbff;
    }

    .preview-box img {
        width: 100%;
        max-height: 220px;
        object-fit: contain;
    }

    .btn-primary {
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 1rem;
    }

    .btn-back {
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 600;
    }
</style>

<div class="container py-4">

    <div class="ads-card">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="ads-title">Create New Advertisement</h2>
            <a href="{{ route('ads.index') }}" class="btn btn-secondary btn-back">
                ← Back
            </a>
        </div>

        <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-md-7">

                    {{-- SELECT PRODUCT --}}
                    <label class="form-label">Select Product</label>
                    <select name="product_id" class="form-control" required>
                        <option value="">-- Choose Product --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->product_name }}
                            </option>
                        @endforeach
                    </select>

                    {{-- TITLE --}}
                    <label class="form-label">Title (Small Text)</label>
                    <input type="text" name="title" class="form-control">

                    {{-- HEADLINE --}}
                    <label class="form-label">Headline (Large Text)</label>
                    <input type="text" name="headline" class="form-control" required>

                    {{-- DESCRIPTION --}}
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>

                    {{-- BUTTON TEXT --}}
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="Shop Now">

                    {{-- ACTIVE --}}
                    <label class="form-label mt-3 d-block">Active?</label>
                    <input type="checkbox" name="is_active" checked>
                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-md-5">

                    {{-- PREVIEW --}}
                    <label class="form-label">Background Preview</label>
                    <div class="preview-box mb-3">
                        <img id="newPreviewImage" src="">
                    </div>

                    {{-- UPLOAD --}}
                    <label class="form-label">Upload Background PNG</label>
                    <input type="file" name="bg_image" class="form-control" accept="image/png" required onchange="previewNewBg(event)">
                    <small class="text-danger">*PNG transparent only</small>

                </div>
            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    Create Advertisement
                </button>
            </div>

        </form>

    </div>

</div>

<script>
function previewNewBg(event) {
    const img = document.getElementById('newPreviewImage');
    img.src = URL.createObjectURL(event.target.files[0]);
}
</script>

@endsection
