@extends('layouts.head')

@section('title', 'Keranjang - Electro Laravel')

@section('content')
    <style>
        /* 🎨 Tema Umum: Font Poppins, Latar Belakang Bersih */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            /* Latar belakang lebih terang */
        }

        /* Kontainer Utama */
        .cart-container {
            display: flex;
            gap: 2.5rem;
            /* Jarak lebih besar */
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: auto;
        }

        /* 🛒 Bagian Produk (Kiri) */
        .cart-left {
            flex: 2;
            background: #fff;
            border-radius: 16px;
            /* Lebih halus */
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            /* Bayangan lebih dalam & elegan */
        }

        .cart-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.75rem;
        }

        .select-all {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .select-all label {
            margin-left: 0.75rem;
            font-weight: 600;
            color: #343a40;
        }

        /* Item Produk */
        .product-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 0;
            border-bottom: 1px solid #e9ecef;
            transition: background-color 0.3s ease;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex: 2;
        }

        .product-info input[type="checkbox"] {
            transform: scale(1.3);
            /* Checkbox lebih besar */
            cursor: pointer;
            accent-color: #007bff;
            /* Warna checkbox biru elegan */
        }

        .product-info img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }

        .product-details {
            display: flex;
            flex-direction: column;
        }

        .product-details .store-name {
            color: #6c757d;
            font-weight: 500;
            font-size: 1.6rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-details .product-name {
            font-weight: 600;
            color: #343a40;
            font-size: 1.4rem;
            margin: 0.2rem 0;
        }

        .product-details .product-price {
            font-weight: 700;
            color: #1a1a1a;
            font-size: 1.05rem;
        }

        .product-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            /* Jarak lebih luas */
        }

        /* Kontrol Kuantitas */
        .quantity-control {
            display: flex;
            align-items: center;
            border: 1px solid #ced4da;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .quantity-control button {
            background-color: #e9ecef;
            border: none;
            color: #495057;
            padding: 0.5rem 0.8rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .quantity-control button:hover {
            background-color: #ced4da;
            color: #1a1a1a;
        }

        .quantity-control .qty {
            padding: 0 1rem;
            font-weight: 600;
            color: #1a1a1a;
            width: 40px;
            text-align: center;
        }

        /* Tombol Aksi */
        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.25rem;
            color: #6c757d;
            padding: 0.5rem;
            border-radius: 50%;
            transition: color 0.2s, background-color 0.2s;
        }

        .icon-btn:hover {
            color: #dc3545;
            /* Merah untuk hapus */
            background-color: #ffeaea;
        }

        .icon-btn.love:hover {
            color: #ff6b6b;
            /* Merah muda untuk love */
            background-color: #fff0f0;
        }


        /* 💳 Bagian Checkout (Kanan) - Ringkasan Pesanan */
        .cart-right {
            flex: 1;
            background: #fff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 5rem;
            height: fit-content;
        }

        .checkout-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1.5rem;
        }

        .checkout-list {
            margin-bottom: 1.5rem;
            min-height: 50px;
            /* Minimal tinggi */
        }

        .checkout-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: #495057;
            padding-bottom: 0.25rem;
            border-bottom: 1px dotted #e9ecef;
        }

        .checkout-item:last-child {
            border-bottom: none;
        }

        .checkout-item span:first-child {
            flex: 1;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            padding-right: 10px;
        }

        .checkout-item .qty-summary {
            font-style: italic;
            margin-right: 5px;
        }

        .empty-message {
            color: #adb5bd !important;
            font-size: 0.95rem !important;
            padding: 10px 0;
            text-align: center;
            border: 1px dashed #e9ecef;
            border-radius: 8px;
        }

        .checkout-total {
            font-weight: 700;
            color: #1a1a1a;
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            border-top: 2px solid #f0f0f0;
            padding-top: 1rem;
            font-size: 1.2rem;
        }

        .checkout-btn {
            background-color: #007bff;
            /* Warna biru primer */
            color: #fff;
            width: 100%;
            border: none;
            padding: 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-top: 1.5rem;
        }

        .checkout-btn:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4);
        }

        .checkout-btn:disabled {
            background-color: #adb5bd;
            cursor: not-allowed;
        }



        .cart-left {
            width: 100%;
            max-width: 800px;
            /* Lebar maksimum keranjang */
        }

        /* Header Keranjang Global */
        .cart-header h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        /* Pilih Semua Global */
        .select-all-global {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        /* Grup Toko */
        .cart-store-group {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        /* Header Toko (Luks.Store) */
        .store-header {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .store-header .store-checkbox {
            margin-right: 15px;
            transform: scale(1.3);
        }

        .store-header .store-name-label {
            font-weight: bold;
            font-size: 1.1rem;
            color: #333;
        }

        /* Item Produk */
        .product-item {
            display: flex;
            align-items: flex-start;
            padding: 15px;
            border-bottom: 1px solid #f9f9f9;
        }

        .product-item:last-child {
            border-bottom: none;
            /* Hilangkan garis bawah pada produk terakhir */
        }

        /* Checkbox Produk */
        .product-item>.product-checkbox {
            margin-right: 15px;
            margin-top: 5px;
            transform: scale(1.3);
        }

        /* Bagian Kiri (Gambar & Detail) */
        .product-info-left {
            display: flex;
            /* jangan pake space between nanti maalh makin kesamping tiap baragnya */
            /* justify-content: space-between; */
            /* Ambil ruang sebanyak mungkin */
            /* makanya pake ini */
            flex-grow: 1;
            /* IZINKAN ELEMEN INI MENGAMBIL SISA RUANG */
            align-items: center;

        }

        /* Visual Produk (Gambar dan Label Stok) */
        .product-visuals {
            position: relative;
            margin-right: 15px;
        }

        .product-visuals img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }

        .product-stock-label {
            position: absolute;
            top: -5px;
            left: 90px;
            background-color: #3385ab;
            /* Warna Orange */
            color: white;
            padding: 2px 6px;
            font-size: 11px;
            font-weight: bold;
            border-radius: 4px;
        }

        /* Detail Produk (Nama dan Varian) */
        .product-details-vertical {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Pusatkan vertikal */
            padding-right: 20px;
        }

        .product-details-vertical .product-name {
            font-size: 14px;
            line-height: 1.4;
            color: #333;
        }

        .product-details-vertical .product-variant {
            font-size: 13px;
            color: #777;
            margin-top: 4px;
        }


        /* Bagian Kanan (Harga dan Aksi) */
        .product-price-and-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
            /* Pisahkan harga dan aksi */
            min-width: 150px;
            height: 80px;
            /* Sesuaikan tinggi dengan gambar agar rapi */
        }

        .product-price-large {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            white-space: nowrap;
        }

        .product-actions-inline {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Kontrol Kuantitas */
        .quantity-control {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Styling Tombol Aksi */
        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #999;
            padding: 5px;
            font-size: 18px;
        }

        .icon-btn.delete:hover {
            color: #e31a0d;
        }

        .quantity-control button {
            background: #f0f0f0;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
        }

        .quantity-control .qty {
            padding: 5px 10px;
            font-size: 14px;
            min-width: 20px;
            text-align: center;
        }
    </style>

    <div class="cart-container">
        <div class="cart-left">
            <div class="cart-header">
                <h2>🛍️ Keranjang Belanja</h2>
            </div>

            <div class="select-all-global">
                <input type="checkbox" id="selectAll">
                <label for="selectAll">Pilih Semua Produk</label>
            </div>

            {{-- LOOP LUAR: ITERASI MELALUI GRUP PRODUK PER TOKO --}}
            @foreach ($groupedCarts as $sellerId => $productsBySeller)
                @php
                    // Ambil data Seller lengkap dari Collection $sellers
                    $seller = $sellers->get($sellerId);
                @endphp

                <div class="cart-store-group" data-seller-id="{{ $sellerId }}">
                    <div class="store-header">
                        {{-- Checkbox Toko --}}
                        <span class="store-name-label">{{ $seller->store_name ?? 'Toko Tidak Dikenal' }}</span>
                    </div>

                    {{-- LOOP DALAM: ITERASI MELALUI PRODUK HANYA UNTUK TOKO INI --}}
                    @foreach ($productsBySeller as $productCart)
                        {{-- Menggunakan $productCart untuk data cart, dan $productCart->product untuk data produk --}}
                        <div class="product-item" data-id="{{ $productCart->product->id }}"
                            data-cart-id="{{ $productCart->id }}">

                            <input type="checkbox" class="product-checkbox" data-id="{{ $productCart->product->id }}"
                                data-name="{{ $productCart->product->product_name }}"
                                data-price="{{ $productCart->product->price }}">

                            <div class="product-info-left">
                                <div class="product-visuals">
                                    <img src="{{ $productCart->product->img }}" ">
                                <span class="product-stock-label">Sisa&nbsp;2</span>
                            </div>

                            <div class="product-details-vertical">
                                <span class="product-name" style="font-size:1.1rem;">{{ $productCart->product->product_name }}</span>
                                {{-- Anda harus menyesuaikan bagian ini jika varian ada di data Cart atau Product --}}
                                <span class="product-variant">hitam putih, 39</span>
                            </div>
                        </div>

                        <div class="product-price-and-actions">
                            <span class="product-price-large">Rp{{ number_format($productCart->product->price, 0, ',', '.') }}</span>

                            <div class="product-actions-inline">
                                <button class="icon-btn love" type="button"><i class="fas fa-heart"></i></button>
                                <button onclick="window.location='{{ route('carts.delete', ['id'=>$productCart->id]) }}'" class="icon-btn delete" data-id="{{ $productCart->product->id }}" data-cart-id="{{ $productCart->id }}" type="button"><i
                                        class="fas fa-trash"></i></button>

                                <div class="quantity-control">
                                    <button class="decrease" data-id="{{ $productCart->product->id }}" data-cart-id="{{ $productCart->id }}" type="button">-</button>
                                    <span class="qty" data-id="{{ $productCart->product->id }}" data-cart-id="{{ $productCart->id }}">{{ $productCart->quantity }}</span>
                                    <button class="increase" data-id="{{ $productCart->product->id }}" data-cart-id="{{ $productCart->id }}" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
     @endforeach
                                </div>
                    @endforeach
                    {{-- END LOOP TOKO --}}

                </div>

                <div class="cart-right">
                    <div class="checkout-title">🧾 Ringkasan Pesanan</div>

                    <div class="checkout-list" id="checkoutList">
                        <p class="empty-message">Belum ada barang dipilih.</p>
                    </div>

                    <div class="checkout-total">
                        <span>Total Pembayaran</span>
                        <span id="checkoutTotal">Rp 0</span>
                    </div>

                    <form action="{{ route('order.store') }}" method="POST" id="checkoutForm">
                        @csrf
                        <!-- Hidden input untuk menyimpan semua order per seller -->
                        <input type="hidden" name="orders_data" id="ordersData">
                        <button type="submit" class="checkout-btn" id="checkoutBtn" disabled>Proses Checkout</button>
                    </form>

                </div>
        </div>

     <script>
    const dataProduct = document.querySelectorAll(".product-item");
    console.log(dataProduct.length);

    if (dataProduct.length == 0) {
        const dataParent = document.querySelector('.cart-left');
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('productData');
        itemDiv.innerHTML = `<center><h4>Keranjang masih kosong nih...</h4></center>`;
        dataParent.appendChild(itemDiv);
    }

    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const checkoutList = document.getElementById('checkoutList');
    const checkoutTotalElement = document.getElementById('checkoutTotal');
    const checkoutDataInput = document.getElementById('ordersData');
    const checkoutBtn = document.getElementById('checkoutBtn');

    // Objek untuk menyimpan kuantitas setiap produk berdasarkan ID
    const productQuantities = {};
    document.querySelectorAll('.qty').forEach(qtySpan => {
        const pid = qtySpan.dataset.id;
        if(pid) productQuantities[pid] = parseInt(qtySpan.textContent) || 1;
    });

    // Fungsi format mata uang
    function formatRupiah(number) {
        return 'Rp ' + number.toLocaleString('id-ID');
    }

    function updateCheckout() {
        let total = 0;
        checkoutList.innerHTML = '';

        // Objek untuk menampung data order per seller
        let ordersPerSeller = {};

        document.querySelectorAll('.product-checkbox').forEach(cb => {
            if (cb.checked) {
                const productId = cb.dataset.id;
                const productName = cb.dataset.name;
                const pricePerItem = parseInt(cb.dataset.price);
                const qty = productQuantities[productId] || 1;
                const subtotal = pricePerItem * qty;
                const cartItem = document.querySelector(`.product-item[data-id="${productId}"]`);
                const sellerId = cartItem.closest('.cart-store-group').dataset.sellerId;

                total += subtotal;

                // Tambahkan ke ringkasan checkout
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('checkout-item');
                itemDiv.innerHTML = `
                    <span>${productName}</span>
                    <span><span class="qty-summary">${qty}x</span> ${formatRupiah(subtotal)}</span>
                `;
                checkoutList.appendChild(itemDiv);

                // Data untuk backend
                if (!ordersPerSeller[sellerId]) {
                    ordersPerSeller[sellerId] = {
                        buyer_id: {{ auth()->user()->buyer->id ?? 0 }},
                        seller_id: parseInt(sellerId),
                        status: 'pending',
                        total_price: 0,
                        order_details: []
                    };
                }

                ordersPerSeller[sellerId].order_details.push({
                    product_id: parseInt(productId),
                    quantity: qty,
                    price: pricePerItem
                });

                ordersPerSeller[sellerId].total_price += subtotal;
            }
        });

        // Update tombol dan list
        if (Object.keys(ordersPerSeller).length === 0) {
            checkoutList.innerHTML = '<p class="empty-message">Belum ada barang dipilih.</p>';
            checkoutBtn.disabled = true;
        } else {
            checkoutBtn.disabled = false;
        }

        // Update total
        checkoutTotalElement.textContent = formatRupiah(total);

        // Set hidden input
        checkoutDataInput.value = JSON.stringify(Object.values(ordersPerSeller));
    }

    // Pilih semua
    selectAll.addEventListener('change', () => {
        document.querySelectorAll('.product-checkbox').forEach(cb => cb.checked = selectAll.checked);
        updateCheckout();
    });

    // Checkbox individu
    document.querySelectorAll('.product-checkbox').forEach(cb => {
        cb.addEventListener('change', updateCheckout);
    });

    // Kontrol kuantitas
    document.querySelectorAll('.product-item').forEach(item => {
        const decreaseBtn = item.querySelector('.decrease');
        const increaseBtn = item.querySelector('.increase');
        const qtySpan = item.querySelector('.qty');
        const productId = qtySpan.dataset.id;
        const checkbox = item.querySelector(`.product-checkbox[data-id="${productId}"]`);

        decreaseBtn?.addEventListener('click', () => {
            let currentQty = productQuantities[productId] || 1;
            if (currentQty > 1) currentQty--;
            productQuantities[productId] = currentQty;
            qtySpan.textContent = currentQty;
            if (checkbox.checked) updateCheckout();
        });

        increaseBtn?.addEventListener('click', () => {
            let currentQty = productQuantities[productId] || 1;
            if (currentQty < 99) currentQty++;
            productQuantities[productId] = currentQty;
            qtySpan.textContent = currentQty;
            if (checkbox.checked) updateCheckout();
        });
    });

    // Tombol hapus
    document.querySelectorAll('.icon-btn.delete').forEach(deleteBtn => {
        deleteBtn.addEventListener('click', () => {
            const productId = deleteBtn.dataset.id;
            const productItem = document.querySelector(`.product-item[data-id="${productId}"]`);
            if (confirm('Yakin ingin menghapus produk ini dari keranjang?')) {
                productItem.remove();
                // Hapus dari kuantitas
                delete productQuantities[productId];
                updateCheckout();
            }
        });
    });

    // Submit form: pastikan hidden input terisi
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        updateCheckout();
        if (!checkoutDataInput.value || checkoutDataInput.value === '[]') {
            e.preventDefault();
            alert('Silakan pilih produk terlebih dahulu.');
        }
    });

    // Panggil saat halaman pertama kali load
    updateCheckout();
</script>

    @endsection
