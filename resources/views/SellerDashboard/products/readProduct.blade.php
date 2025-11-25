@extends('SellerDashboard.layouts.app')

@section('title', 'Daftar Produk')

@section('content')


<style>
    table td {
        white-space: normal !important;
        word-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 200px; /* bisa disesuaikan */
    }
</style>

    <div class="container py-4">
        <h3 class="mb-4">Daftar Produk</h3>

        <a href="{{ route('seller.products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

        @if ($products->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Spesifikasi Singkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td class="wrap-text">{{ $index + 1 }}</td>
                            <td class="wrap-text">{{ $product->product_name }}</td>
                            <td class="wrap-text">Rp {{ number_format($product->price) }}</td>
                            <td class="wrap-text">{{ $product->stock }}</td>
                            <td class="wrap-text">
                                @if (is_array($product->product_specifications))
    @foreach ($product->product_specifications as $spec)
        @if(isset($spec['title']) && isset($spec['value']))
            <small>{{ $spec['title'] }}: {{ $spec['value'] }}</small><br>
        @endif
    @endforeach
@else
    <small class="text-muted">Tidak ada</small>
@endif


                            </td>
                            <td class="wrap-text">
                                <a href="{{ route('seller.products.edit', $product->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>

                                {{-- <a href="{{ route('product.detail', $product->id) }}" class="btn btn-sm btn-info">Detail</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">Belum ada produk.</p>
        @endif
    </div>
@endsection
