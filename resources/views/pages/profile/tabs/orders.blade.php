<div id="content-orders" class="tab-content">
    <h3>Riwayat Pesanan</h3>

    @if($orders->count() == 0)
        <p>Belum ada pesanan.</p>
    @else
        <div style="max-height: 400px; overflow-y: auto;">
            @foreach($orders as $order)
            <div class="card mb-3 p-3 shadow-sm">
                <div class="d-flex justify-content-between">
                    <strong>Order #{{ $order->id }}</strong>
                    <span>{{ $order->created_at->format('d M Y') }}</span>
                </div>

                <ul class="list-unstyled mt-2 mb-2">
                    @foreach($order->details as $detail)
                        <li>{{ $detail->product->name }} - {{ $detail->quantity }} pcs - Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</li>
                    @endforeach
                </ul>

                <div class="d-flex justify-content-between align-items-center">
                    <strong>Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                    <a href="https://wa.me/{{ $order->seller->phone_number }}?text=Halo, saya ingin menanyakan pesanan #{{ $order->id }}" target="_blank" class="btn btn-success btn-sm">
                        Hubungi Seller
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
