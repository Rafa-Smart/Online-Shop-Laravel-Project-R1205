@extends('SellerDashboard.layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container">
    <h2>Create New Advertisement</h2>

    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="mt-3">Select Product</label>
        <select name="product_id" class="form-control" required>
            <option value="">-- Choose Product --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->product_name }}
                </option>
            @endforeach
        </select>

        <label class="mt-3">Title (Small Text)</label>
        <input type="text" name="title" class="form-control">

        <label class="mt-3">Headline (Large Text)</label>
        <input type="text" name="headline" class="form-control" required>

        <label class="mt-3">Description</label>
        <textarea name="description" class="form-control"></textarea>

        <label class="mt-3">Button Text</label>
        <input type="text" name="button_text" class="form-control" value="Shop Now">

        <label class="mt-3">Background Transparent PNG</label>
        <input type="file" name="bg_image" class="form-control" accept="image/png" required>
        <small class="text-danger">*Only PNG with transparent background allowed</small>

        <label class="mt-3">Active?</label>
        <input type="checkbox" name="is_active" checked>

        <br><br>

        <button class="btn btn-primary">Create Ad</button>
    </form>
</div>
@endsection
