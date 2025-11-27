@extends('SellerDashboard.layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container">

    <h2>Your Advertisemaents</h2>
    <a href="{{ route('ads.create') }}" class="btn btn-primary mb-3">Create Ad</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Background</th>
                <th>Product</th>
                <th>Headline</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
           @if ($ads->count() == 0)
                <tr>
                    <td colspan="4" class="text-center">No advertisements found.</td>
                </tr>
           @else
                @foreach($ads as $ad)
            <tr>
                ddd
                <td><img src="{{ asset('storage/'.$ad->bg_image) }}" width="150"></td>
                <td>{{ $ad->product->name }}</td>
                <td>{{ $ad->headline }}</td>
                <td>{{ $ad->is_active ? 'Active' : 'Inactive' }}</td>
            </tr>
            @endforeach
           @endif
        </tbody>
    </table>

</div>
@endsection
