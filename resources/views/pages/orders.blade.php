@extends('profile.layout')

@section('profile-content')

<h2 style="margin-bottom:20px;">Daftar Orders</h2>

@if ($orders->count() == 0)
    <p style="color:#777;">Belum ada order.</p>
@else
<table width="100%" cellpadding="10" style="border-collapse:collapse;">
    <tr style="background:#f5f5f5;">
        <th>Order ID</th>
        <th>Status</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    @foreach ($orders as $order)
    <tr style="border-bottom:1px solid #ddd;">
        <td>#{{ $order->id }}</td>
        <td>{{ $order->status }}</td>
        <td>Rp {{ number_format($order->total) }}</td>
        <td>{{ $order->created_at->format('d M Y') }}</td>
    </tr>
    @endforeach
</table>

<div style="margin-top:20px;">
    {{ $orders->links() }}
</div>
@endif

@endsection
