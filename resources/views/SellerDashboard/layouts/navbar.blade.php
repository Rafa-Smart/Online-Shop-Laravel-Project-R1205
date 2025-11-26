<?php

$orders = App\Models\Order::where('seller_id', auth()->user()->seller->id)
    ->where('status', 'pending')
    ->get();
    // dd(auth()->user()->seller->id);
    // dd($orders)
?>
<style>
    /* Avatar kecil di navbar */
.user-image-sm {
    width: 36px;
    height: 36px;
    object-fit: cover;
    border: 2px solid rgba(255,255,255,0.4);
}

/* Avatar besar dalam dropdown */
.user-image-big {
    width: 85px;
    height: 85px;
    object-fit: cover;
    border: 3px solid #0d6efd;
    padding: 2px;
}

/* Nama di navbar auto-ellipsis */
.store-name {
    max-width: 150px;
    font-weight: bold;
    color: white;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Dropdown styling */
.user-dropdown {
    width: 260px;
    border-radius: 14px;
    overflow: hidden;
}

/* Header */
.user-header {
    background: #f8f9fa;
    border-radius: 0;
}

/* Nama besar */
.user-name-full {
    max-width: 180px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* CARD sebelum diklik */
.nav-user-card {
    background: #f1f3f5; /* cocok untuk navbar putih */
    padding: 6px 12px;
    border-radius: 12px;
    position: relative;
    bottom:0.7rem;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    transition: 0.2s ease;
    border: 1px solid #e5e7eb;
}

.nav-user-card:hover {
    background: #e9ecef;
}

/* Avatar kecil */
.nav-user-card img {
    width: 32px;
    height: 32px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12);
}

/* Nama toko */
.nav-user-name {
    font-weight: 600;
    color: #333;
    font-size: 15px;
}

/* Dropdown styling */
.user-dropdown {
    border-radius: 15px;
    overflow: hidden;
}


</style>

<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-bell-fill"></i>
                    @if ($orders->count() > 0)
                        <span class="badge bg-warning text-dark">{{ $orders->count() }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="dropdown-header">{{ $orders->count() }} Pending Orders</li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @forelse($orders as $order)
                        <li>
                            <a href="{{ route('seller.orders.pending') }}"
                                class="dropdown-item d-flex justify-content-between align-items-start">
                                <div>
                                    <i class="bi bi-cart-fill me-2"></i>
                                    Order #{{ $order->id }} from Buyer
                                    {{ optional(App\Models\Buyer::find($order->buyer_id))->fullname ?? 'Unknown' }}
                                </div>
                                <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @empty
                        <li class="dropdown-item text-center text-secondary">No pending orders</li>
                    @endforelse

                    <li>
                        <a href="{{ route('seller.orders.pending') }}"
                            class="dropdown-item dropdown-footer text-center">
                            See All Orders
                        </a>
                    </li>
                </ul>
            </li>



            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-bell-fill"></i>
                    <span class="navbar-badge badge text-bg-warning">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="bi bi-envelope me-2"></i> 4 new messages
                        <span class="float-end text-secondary fs-7">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="bi bi-people-fill me-2"></i> 8 friend requests
                        <span class="float-end text-secondary fs-7">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                        <span class="float-end text-secondary fs-7">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
                </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
<li class="nav-item dropdown user-menu">

    <a href="#" class="nav-link" data-bs-toggle="dropdown">
        <div class="nav-user-card">

            <!-- Avatar Kecil -->
            <img src="{{ asset('storage/seller_images/' . optional(App\Models\Seller::where('id', Auth::user()->seller->id)->first())->img) }}">

            <!-- Nama Toko -->
            <span class="nav-user-name d-none d-md-inline">
                {{ auth()->user()->seller->store_name }}
            </span>

        </div>
    </a>

    <!-- Dropdown -->
    <ul class="dropdown-menu dropdown-menu-end border-0 shadow user-dropdown">

        <!-- Header -->
        <li class="p-3 text-center user-header">

            <img src="{{ asset('storage/seller_images/' . optional(App\Models\Seller::where('id', Auth::user()->seller->id)->first())->img) }}"
                class="user-image-big rounded-circle shadow mb-2">

            <h6 class="fw-bold text-dark mb-0 user-name-full">
                {{ auth()->user()->seller->store_name }}
            </h6>

            <small class="text-muted d-block mt-1">
                Member since {{ auth()->user()->seller->created_at->isoFormat('D MMMM Y') }}
            </small>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li class="px-3 pb-3">
            <a href="{{ route('seller.profile') }}" class="btn btn-primary w-100 mb-2">
                <i class="bi bi-person-circle me-1"></i> Profil Toko
            </a>

            <a href="{{ route('seller.logout') }}" class="btn btn-outline-danger w-100">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
        </li>

    </ul>
</li>


            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
