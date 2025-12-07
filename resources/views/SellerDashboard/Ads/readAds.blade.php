@extends('SellerDashboard.layouts.app')

@section('title', 'Advertisements')

@section('content')

<style>
    .ads-table img {
        border-radius: 10px;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0,0,0,0.18);
    }

    .ads-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0px 8px 25px rgba(0,0,0,0.08);
        border: 1px solid #eef1f5;
    }

    .ads-header {
        border-bottom: 1px solid #eef1f5;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .btn-create {
        border-radius: 12px;
        padding: 9px 18px;
        font-weight: 600;
        background: #0d6efd;
    }

    .table-hover tbody tr:hover {
        background: rgba(13,110,253,0.06);
        transition: 0.2s ease-in-out;
    }

    .badge-active {
        background: #28a745 !important;
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
    }

    .badge-inactive {
        background: #dc3545 !important;
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
    }

    .btn-action {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
    }
</style>


<div class="container py-4">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="ads-card">
        
        <div class="d-flex justify-content-between align-items-center ads-header">
            <h3 class="fw-bold m-0 text-dark">Your Advertisements</h3>

            <a href="{{ route('ads.create') }}" class="btn btn-primary btn-create shadow">
                + Create New Ad
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover ads-table align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="90">Background</th>
                        <th>Product</th>
                        <th>Headline</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($ads->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No advertisements found.
                            </td>
                        </tr>
                    @else
                        @foreach($ads as $ad)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$ad->bg_image) }}" width="80" height="80">
                            </td>

                            <td class="fw-semibold">
                                {{ $ad->product->product_name }}
                            </td>

                            <td>{{ $ad->headline }}</td>

                            <td>
                                <span class="badge {{ $ad->is_active ? 'badge-active' : 'badge-inactive' }}">
                                    {{ $ad->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    {{-- EDIT --}}
                                    <a href="{{ route('ads.edit', ['id'=>$ad->id]) }}"
                                       class="btn btn-warning btn-action text-dark">
                                        Edit
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('ads.destroy', $ad->id) }}" 
      method="POST"
      onsubmit="return confirm('Delete this advertisement?')">

    @csrf
    @method('DELETE')

    <button class="btn btn-danger btn-action">
        Delete
    </button>
</form>


                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
