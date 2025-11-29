@extends('layouts.head')

@section('title', $product->product_name)

@section('content')
    <style>
        /* --- CSS Dasar (TIDAK BERUBAH) --- */
        body {
            background-color: #f5f7fa;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .product-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
            padding: 30px;
        }


        /* --- Perubahan pada Sidebar Pembelian dan Sticky --- */
        .purchase-sidebar {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            /* Tambahkan background agar tidak tembus pandang saat sticky */
            background-color: #fff;
        }

        /* >>> MODIFIKASI: CSS untuk Sticky Sidebar Kanan <<< */
        @media (min-width: 992px) {

            /* Hanya aktif di layar desktop (lg) ke atas */
            .sticky-sidebar-wrapper {
                position: -webkit-sticky;
                /* Untuk Safari */
                position: sticky;
                top: 90px;
                /* Jarak dari atas layar. Sesuaikan dengan tinggi header/navbar Anda. */
                align-self: flex-start;
            }
        }

        /* ------------------------------------------- */

        /* --- Komentar (TIDAK BERUBAH) --- */
        .comment-section {
            margin-top: 4rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
        }

        .comment-title {
            font-weight: 700;
            color: #0e1624;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .product-container {

            background: #fff;

            border-radius: 12px;

            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            /* Shadow lebih menonjol */

            transition: all 0.2s ease-in-out;

            padding: 30px;

        }



        /* --- Header & Judul Produk --- */

        .product-title {

            font-size: 1.8rem;

            font-weight: 700;

            color: #1a1a1a;

            margin-bottom: 0.5rem;

        }



        /* Warna Aksen Kategori: Biru Laut yang lebih kalem */

        .badge-category {

            background-color: #e3f2fd;
            /* Biru sangat terang */

            color: #1565c0;
            /* Biru sedang */

            border-radius: 6px;

            padding: 4px 10px;

            font-size: 0.8rem;

            font-weight: 600;

            display: inline-block;

        }



        /* Warna Harga: Biru yang lebih menonjol */

        .price-tag {

            color: #0e1624;
            /* Biru Gelap Dominan */

            font-size: 2.5rem;

            font-weight: 800;

            margin-bottom: 1rem;

        }



        /* --- Galeri Gambar --- */

        .product-img {

            border-radius: 10px;

            width: 100%;

            height: 400px;

            object-fit: contain;

            background-color: #f8f8f8;

            border: 1px solid #eee;

        }



        .thumb-img {

            border-radius: 6px;

            border: 2px solid #ddd;

            transition: border-color 0.2s ease;

            cursor: pointer;

            object-fit: cover;

        }



        /* Border aktif/hover gambar thumb menggunakan warna aksen */

        .thumb-img:hover,

        .thumb-img.active {

            border-color: #0e1624;

        }



        /* --- Area Aksi Kanan (Sidebar Pembelian) --- */

        .purchase-sidebar {

            border: 1px solid #e0e0e0;

            border-radius: 8px;

            padding: 20px;

            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);

        }



        /* Tombol Utama (Beli Langsung & Kirim Komentar): Biru Gelap */

        .btn-buy-now {

            background-color: #0e1624;

            border: 1px solid #0e1624;

            color: #fff;

            font-weight: 600;

            transition: 0.3s;

        }

        .btn-buy-now:hover {

            background-color: #1a2a43;
            /* Biru Gelap sedikit lebih terang saat hover */

            border-color: #1a2a43;

        }



        /* Tombol Tambah Keranjang & Beli Lokal: Biru Muda/Cyan sebagai aksen sekunder */

        .btn-add-cart,

        .btn-secondary-action {
            /* Menggunakan btn-secondary-action untuk Beli Lokal */

            background-color: #03a9f4;

            border: 1px solid #03a9f4;

            color: #fff;

            font-weight: 600;

            transition: 0.3s;

        }

        .btn-add-cart:hover,

        .btn-secondary-action:hover {

            background-color: #039be5;

            border-color: #039be5;

        }



        /* Mengganti class .btn-success di bawah menjadi btn-secondary-action */

        .btn-success {

            background-color: #03a9f4 !important;

            border: 1px solid #03a9f4;

        }

        .btn-success:hover {

            background-color: #039be5 !important;

            border-color: #039be5;

        }



        .quantity-control .btn {

            border-radius: 4px !important;

            border-color: #ddd;

            color: #555;

            background-color: #fff;

        }



        /* --- Tab Detail di Kolom Tengah --- */

        .nav-tabs {

            margin-bottom: 0 !important;

        }

        .nav-tabs .nav-link {

            padding: 8px 15px;

            font-size: 1rem;

            color: #555;

            border: none;

            border-bottom: 3px solid transparent;

        }

        /* Warna aktif tab: Biru Gelap */

        .nav-tabs .nav-link.active {

            color: #0e1624;

            border-bottom-color: #0e1624;

            background-color: transparent;

        }



        .tab-content {

            border-top: none;

            padding-top: 10px !important;

        }



        .detail-info-item {

            display: flex;

            margin-bottom: 5px;

            line-height: 1.5;

        }

        .detail-info-item strong {

            margin-right: 5px;

            min-width: 100px;

            color: #777;

            font-weight: 500;

        }

        .detail-info-item span {

            color: #333;

            font-weight: 600;

        }



        /* Subtotal yang menonjol */

        #subtotal {

            color: #0e1624 !important;

        }



        /* --- Komentar --- */

        .comment-section {

            margin-top: 4rem;

            background: #fff;

            border-radius: 12px;

            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);

            padding: 2.5rem;

        }

        .comment-title {

            font-weight: 700;

            color: #0e1624;

            border-bottom: 2px solid #eee;

            padding-bottom: 15px;

            margin-bottom: 20px;

        }

        .thumb-grid {
            display: grid;
            grid-template-columns: repeat(4, 65px);
            /* 4 kolom */
            gap: 10px;
            /* jarak antar foto */
        }

        .thumb-img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: .2s;
        }

        .thumb-img:hover {
            border-color: #0d6efd;
            transform: scale(1.05);
        }

        .detail-info-item span,
        .detail-info-item strong,
        #detail p,
        #detail span {
            white-space: normal !important;
            word-wrap: break-word !important;
            word-break: break-word !important;
            max-width: 100%;
            display: block;
            /* BIKIN TURUN KE BAWAH */
        }
    </style>

    <div class="container py-5">
        {{-- Mengubah row menjadi 2 kolom utama: 8 kolom untuk konten, 4 kolom untuk sticky sidebar --}}
        <div class="row g-4">

            {{-- 1. 🖼️📝 Kolom Kiri/Tengah: Detail Produk & Ulasan (col-lg-8) --}}
            <div class="col-lg-8">
                {{-- Detail Produk --}}
                <div class="product-container mb-5">
                    <div class="row g-4">
                        {{-- Sub-Kolom Gambar (col-md-6) --}}
                        <div class="col-md-6">

                            <!-- Foto utama -->
                            <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->product_name }}"
                                class="product-img mb-3" id="mainProductImg">

                            <!-- Thumbnail grid -->
                            <div class="thumb-grid">

                                <!-- Thumbnail utama -->
                                <img src="{{ asset('storage/' . $product->img) }}" class="thumb-img"
                                    data-large="{{ asset('storage/' . $product->img) }}">

                                <!-- Thumbnail tambahan -->
                                @foreach ($productPhotos as $photo)
                                    <img src="{{ asset('storage/' . $photo->photo_path) }}" class="thumb-img"
                                        data-large="{{ asset('storage/' . $photo->photo_path) }}">
                                @endforeach

                            </div>

                        </div>

                        {{-- Sub-Kolom Detail (col-md-6) --}}
                        <div class="col-md-6">
                            <span
                                class="badge-category mb-2">{{ $product->category?->category_name ?? 'Tanpa Kategori' }}</span>
                            <h1 class="product-title">{{ $product->product_name }}</h1>
                            @php
                                $avg = $product->average_rating;
                            @endphp



                            <div class="d-flex align-items-center mb-3">
                                <small class="text-muted">Terjual **2**</small>
                                <span class="mx-2 text-muted">|</span>
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $avg ? 'text-warning' : 'text-secondary' }}">★</span>
                                @endfor
                                <span class="ms-2 text-dark fw-bold">{{ $avg }}/5</span>
                                <span class="ms-1 text-muted">({{ $product->reviews->count() }} ratings)</span>
                            </div>

                            <div class="price-tag">Rp{{ number_format($product->price, 0, ',', '.') }}</div>

                            <hr class="my-3">

                            {{-- Tab Detail & Info Pengiriman --}}
                            <ul class="nav nav-tabs" id="detailTab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#detail">Detail Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#info">Info Penting</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="detail">

                                    <p class="text-secondary">{{ $product->description }}</p>

                                    <div class="detail-info-item"><strong>Kondisi:</strong> <span>Baru</span></div>
                                    <div class="detail-info-item"><strong>Min. Pesanan:</strong> <span>1 Buah</span></div>
                                    <div class="detail-info-item"><strong>Category:</strong>
                                        <span>{{ $product->category->category_name }}</span>
                                    </div>

                                    {{-- 🔽 Tambahan: Spesifikasi Produk --}}
                                    <hr class="my-3">

                                    <h5 class="fw-bold mb-2">Spesifikasi Produk</h5>

                                    @if (!empty($product->product_specifications))
                                        @foreach ($product->product_specifications as $spec)
                                            <div class="detail-info-item mb-1">
                                                <strong>{{ $spec['title'] }}:</strong>
                                                <span>{{ $spec['value'] }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-secondary">Tidak ada spesifikasi.</p>
                                    @endif

                                </div>

                                <div class="tab-pane fade" id="info">
                                    <p>🚚 Pengiriman dilakukan maksimal <strong>1 hari kerja</strong> setelah pembayaran
                                        dikonfirmasi.</p>
                                    <p>Informasi Pengiriman lebih detail dapat dilihat saat <i>checkout</i>.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- 💬 Komentar & Ulasan (SEKARANG BERADA DI DALAM COL-LG-8) --}}
                <div class="comment-section">

                    {{-- Daftar Komentar --}}
                    <div class="comment-list">

                        @forelse ($product->reviews as $review)

                            <div class="comment mb-3 pb-3 border-bottom">

                                {{-- ⭐ RATING --}}
                                <div class="rating-display mb-3">

                                    @php
                                        $avg = $product->average_rating;
                                    @endphp

                                    {{-- BINTANG --}}
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $avg ? 'text-warning' : 'text-secondary' }}">★</span>
                                    @endfor

                                    {{-- NILAI --}}
                                    <span class="ms-2 text-dark fw-bold">{{ $avg }}/5</span>

                                    {{-- JUMLAH REVIEW --}}
                                    <span class="text-muted">({{ $product->reviews->count() }} ulasan)</span>

                                </div>


                                {{-- NAMA USER --}}
                                <strong>{{ $review->user->name ?? 'Pengguna' }}</strong>
                                <small class="text-muted ms-2">{{ $review->created_at->diffForHumans() }}</small>

                                {{-- KOMENTAR --}}
                                <p class="mt-2">{{ $review->comment }}</p>

                                {{-- MEDIA (FOTO / VIDEO) --}}
                                <div id="review-gallery-{{ $review->id }}" class="d-flex gap-2 mt-2">

                                    @foreach ($review->medias as $media)
                                        @if (str_contains($media->media_type, 'image'))
                                            <!-- FOTO -->
                                            <a href="{{ asset('storage/' . $media->media_path) }}"
                                                class="review-media-item" data-lg-size="1600-900">
                                                <img src="{{ asset('storage/' . $media->media_path) }}"
                                                    style="width:75px; height:75px; object-fit:cover; border-radius:6px;">
                                            </a>
                                        @else
                                            <!-- VIDEO -->
                                            <a href="{{ asset('storage/' . $media->media_path) }}"
                                                class="review-media-item" data-lg-size="1280-720" data-lg-video="true">
                                                <video
                                                    style="width:75px; height:75px; object-fit:cover; border-radius:6px;">
                                                    <source src="{{ asset('storage/' . $media->media_path) }}">
                                                </video>
                                            </a>
                                        @endif
                                    @endforeach

                                </div>


                            </div>

                        @empty
                            <p class="text-center text-muted mt-3">Belum ada ulasan untuk produk ini.</p>
                        @endforelse

                    </div>

                    {{-- ✏️ Form komentar --}}
                    <form class="mt-5 pt-3 border-top" action="{{ route('product.review', $product->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <label class="fw-bold mb-2">Beri Rating</label>
                        <select name="rating" class="form-select mb-3" required>
                            <option value="">Pilih Rating</option>
                            <option value="5">⭐ 5 - Sangat Bagus</option>
                            <option value="4">⭐ 4 - Bagus</option>
                            <option value="3">⭐ 3 - Cukup</option>
                            <option value="2">⭐ 2 - Kurang</option>
                            <option value="1">⭐ 1 - Buruk</option>
                        </select>

                        <label class="fw-bold">Komentar</label>
                        <textarea name="comment" class="form-control mb-3" rows="3" placeholder="Tulis pengalamanmu..."></textarea>

                        <label class="fw-bold">Upload Foto/Video (opsional)</label>
                        <input type="file" name="media[]" class="form-control mb-3" multiple>

                        <button type="submit" class="btn btn-buy-now">Kirim Review</button>
                    </form>

                </div>


            </div>

            {{-- 2. 🛒 Kolom Kanan: Area Pembelian STICKY (col-lg-4) --}}
            <div class="col-lg-4" style="margin-top: 50px">
                {{-- Pembungkus Sticky --}}
                <div class="sticky-sidebar-wrapper">
                    <div class="purchase-sidebar">
                        <h5 class="fw-semibold mb-3">Atur Jumlah dan Catatan</h5>

                        {{-- Quantity Control --}}
                        <div class="d-flex align-items-center mb-3">
                            <div class="input-group quantity-control" style="width: 100px;">
                                <button class="btn btn-outline-secondary btn-sm" type="button" id="minusBtn">−</button>
                                <input type="number" class="form-control text-center form-control-sm" id="qty"
                                    value="1" min="1" max="{{ $product->stock }}" aria-label="Kuantitas">
                                <button class="btn btn-outline-secondary btn-sm" type="button" id="plusBtn">+</button>
                            </div>
                            <small class="ms-3 mb-0 text-muted">Stok Total: <strong
                                    class="text-dark">{{ $product->stock }}</strong></small>
                        </div>

                        {{-- Subtotal --}}
                        <div class="d-flex justify-content-between align-items-center mb-4 pt-2">
                            <span class="text-muted fw-semibold">Subtotal</span>
                            <strong id="subtotal"
                                class="fs-5">Rp{{ number_format($product->price, 0, ',', '.') }}</strong>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-grid gap-2">
                            <button id="buyNowBtn" class="btn btn-secondary-action py-2 w-100">Beli Langsung</button>

                            <button class="btn btn-secondary-action py-2 w-100">
                                <a href="{{ route('addCart', $product->id) }}" style="color: white;">
                                    Tambah Keranjang
                                </a>
                            </button>

                            {{-- Form Tersembunyi --}}
                            <form id="buyNowForm" action="{{ route('order.store') }}" method="POST"
                                style="display:none;">
                                @csrf
                                <input type="hidden" name="orders_data" id="orders_data">
                            </form>
                        </div>

                        {{-- Link Aksi Bawah --}}
                        <div class="d-flex justify-content-around mt-3 text-muted">
                            <small><i class="bi bi-chat-dots"></i> Chat</small>
                            <small><i class="bi bi-heart"></i> Wishlist</small>
                            <small><i class="bi bi-share"></i> Share</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Include Midtrans Snap JS --}}
            <script
                src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
                data-client-key="{{ config('midtrans.client_key') }}"></script>


        </div>

    </div>



    <div class="modal fade" id="paymentChoiceModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">

                <h5 class="fw-bold text-center mb-3">Pilih Metode Pembelian</h5>

                <button id="payWithGateway" class="btn btn-primary w-100 mb-2">
                    Bayar dengan Payment Gateway
                </button>

                <button id="payWithWhatsapp" class="btn btn-success w-100">
                    Pesan via WhatsApp
                </button>

            </div>
        </div>
    </div>



    {{-- 🔢 Script subtotal & Waktu Relatif (TETAP SAMA) --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // =========================
            // Variabel utama
            // =========================
            const buyNowBtn = document.getElementById('buyNowBtn');
            const buyNowForm = document.getElementById('buyNowForm');
            const ordersDataInput = document.getElementById('orders_data');

            const price = {{ $product->price }};
            const stock = {{ $product->stock }};
            const qtyInput = document.getElementById('qty');
            const subtotalEl = document.getElementById('subtotal');

            // =========================
            // Fungsi format Rupiah
            // =========================
            function formatRupiah(number) {
                return number.toLocaleString('id-ID', {
                    minimumFractionDigits: 0
                });
            }

            function updateSubtotal() {
                let qty = parseInt(qtyInput.value) || 1;
                qty = Math.min(Math.max(qty, 1), stock);
                qtyInput.value = qty;
                subtotalEl.textContent = 'Rp' + formatRupiah(qty * price);
            }

            // =========================
            // Quantity Control
            // =========================
            document.getElementById('minusBtn').addEventListener('click', () => {
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value--;
                    updateSubtotal();
                }
            });

            document.getElementById('plusBtn').addEventListener('click', () => {
                if (parseInt(qtyInput.value) < stock) {
                    qtyInput.value++;
                    updateSubtotal();
                }
            });

            qtyInput.addEventListener('input', updateSubtotal);
            updateSubtotal();

            // =========================
            // Thumbnail Swap
            // =========================
            const mainImg = document.getElementById('mainProductImg');
            const thumbnails = document.querySelectorAll('.thumb-img');

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', () => {
                    mainImg.src = thumb.dataset.large;
                    thumbnails.forEach(t => t.classList.remove('active'));
                    thumb.classList.add('active');
                });
            });

            // =========================
            // Waktu Relatif
            // =========================
            function formatRelativeTime(seconds) {
                const s = Math.abs(seconds);
                if (s < 1) return 'baru saja';
                if (s < 60) return `${s} detik yang lalu`;
                const minutes = Math.floor(s / 60);
                if (minutes < 60) return `${minutes} menit yang lalu`;
                const hours = Math.floor(minutes / 60);
                if (hours < 24) return `${hours} jam yang lalu`;
                const days = Math.floor(hours / 24);
                if (days < 7) return `${days} hari yang lalu`;
                const weeks = Math.floor(days / 7);
                if (weeks < 4) return `${weeks} minggu yang lalu`;
                const months = Math.floor(days / 30);
                if (months < 12) return `${months} bulan yang lalu`;
                const years = Math.floor(days / 365);
                return `${years} tahun yang lalu`;
            }

            const timeEls = Array.from(document.querySelectorAll('.time[data-timestamp]'));

            function updateTimes() {
                const now = new Date();
                timeEls.forEach(el => {
                    const iso = el.getAttribute('data-timestamp');
                    if (!iso) return;
                    const then = new Date(iso);
                    if (isNaN(then)) return;
                    let diffSec = Math.floor((now - then) / 1000);
                    if (diffSec < 0) diffSec = 0;
                    el.textContent = formatRelativeTime(diffSec);
                });
            }

            updateTimes();
            setInterval(updateTimes, 60000);


            // ==========================================================
            // 🔥 BUY NOW — MODAL PEMILIHAN METODE (Gateway / WhatsApp)
            // ==========================================================

            const gatewayBtn = document.getElementById('payWithGateway');
            const whatsappBtn = document.getElementById('payWithWhatsapp');

            // Klik BELI → munculkan modal
            buyNowBtn.addEventListener('click', function() {
                const modal = new bootstrap.Modal(document.getElementById('paymentChoiceModal'));
                modal.show();
            });

            // =========================
            // 1️⃣ Bayar via Payment Gateway (MIDTRANS)
            // =========================
            gatewayBtn.addEventListener('click', function() {

                const qty = parseInt(qtyInput.value);
                const buyerId = {{ Auth::user()->buyer->id }};
                const sellerId = {{ $product->seller_id }};
                const productId = {{ $product->id }};
                const productName = @json($product->product_name);

                const dataToSend = [{
                    buyer_id: buyerId,
                    seller_id: sellerId,
                    status: "pending",
                    total_price: qty * price,
                    details: [{
                        product_id: productId,
                        quantity: qty,
                        price: price
                    }]
                }];

                fetch("{{ route('order.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            orders_data: JSON.stringify(dataToSend)
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (!res.snap_token) {
                            alert('Gagal membuat pembayaran. Silakan coba lagi.');
                            return;
                        }

                        snap.pay(res.snap_token, {
                            onSuccess: () => window.location.href = '/home',
                            onPending: () => window.location.href = '/home',
                            onError: () => window.location.href = '/home',
                            onClose: () => window.location.href = '/home'
                        });
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Terjadi kesalahan server.');
                        window.location.href = '/';
                    });
            });


            // =========================
            // 2️⃣ Beli via WhatsApp (Auto Redirect)
            const qty = parseInt(qtyInput.value);
            // =========================
whatsappBtn.addEventListener('click', function() {

    const qty = parseInt(qtyInput.value);
    const buyerId = {{ Auth::user()->buyer->id }};
    const sellerId = {{ $product->seller_id }};
    const productId = {{ $product->id }};
    const productName = @json($product->name);

    let sellerPhone = "{{ $product->seller->phone_number ?? '628xxxx' }}";
    sellerPhone = sellerPhone.replace(/^\+?0/, "62");

    const total = qty * price;

    const message = `
🧾 *ORDER RECEIPT*

────────────────────────
📦 Produk: ${productName}
🔢 Jumlah: ${qty}
💳 Harga: Rp${price.toLocaleString('id-ID')}
────────────────────────
💵 *TOTAL: Rp${total.toLocaleString('id-ID')}*
────────────────────────

📅 Tanggal: ${new Date().toLocaleDateString('id-ID')}
⏰ Waktu: ${new Date().toLocaleTimeString('id-ID')}

Terima kasih kak 🙏✨
`;

    const dataToSend = [{
        buyer_id: buyerId,
        seller_id: sellerId,
        status: "pending",
        total_price: total,
        details: [{
            product_id: productId,
            quantity: qty,
            price: price
        }]
    }];

    // 🔥 STEP 1 — SIMPAN ORDER KE DATABASE
    fetch("{{ route('order.store') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            orders_data: JSON.stringify(dataToSend)
        })
    })
    .then(res => res.json())
    .then(res => {
        // 🔥 STEP 2 — SETELAH ORDER DISIMPAN → buka WhatsApp
        const encoded = encodeURIComponent(message);
        const url = `https://api.whatsapp.com/send?phone=${sellerPhone}&text=${encoded}`;
        window.location.href = url;
    })
    .catch(err => {
        console.error(err);
        alert("Terjadi kesalahan. Order tidak tersimpan.");
    });

});



        });
    </script>


    <script
        src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('midtrans.client_key') }}"></script>


@endsection
