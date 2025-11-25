<div id="content-orders" class="tab-content">
    <h3 class="mb-3">Pesanan Masuk</h3>

    <div class="card p-3 shadow-sm">

        @forelse ($orders as $order)
            <div class="border rounded p-3 mb-3">

                <div class="d-flex justify-content-between">
                    <div>
                        <strong>ID Pesanan:</strong> {{ $order->id }} <br>
                        <strong>Pembeli:</strong> {{ $order->buyer->fullname ?? '-' }} <br>
                        <strong>Status:</strong> {{ $order->status }}
                    </div>
                    <div>
                        <strong>Total:</strong>
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </div>
                </div>

                <hr>

                @foreach ($order->details as $detail)
                    <div class="d-flex mb-2">
                        <img src="{{ asset('storage/'.$detail->product->img) }}" width="60" class="rounded me-3">
                        <div>
                            <strong>{{ $detail->product->name }}</strong><br>
                            {{ $detail->qty }} × Rp {{ number_format($detail->price) }}
                        </div>
                    </div>
                @endforeach

            </div>
        @empty
            <p class="text-muted">Tidak ada pesanan masuk.</p>
        @endforelse

    </div>
</div>
