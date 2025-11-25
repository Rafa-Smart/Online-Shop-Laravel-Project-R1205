@extends('SellerDashboard.layouts.app')

@section('title', 'Pending Orders')

@section('content')
<div class="container py-5">
    <h3>Pending Orders</h3>
    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>Order ID</th>
                <th>Buyer ID</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->buyer_id }}</td>
                    <td>{{ number_format($order->total_price) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <form action="{{ route('seller.orders.approve', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('seller.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-secondary">No pending orders</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
