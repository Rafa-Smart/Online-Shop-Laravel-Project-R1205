<?php

$orders = App\Models\Order::where('seller_id', auth()->user()->seller->id)
    ->where('status', 'pending')
    ->get();
    // dd(auth()->user()->seller->id);
    // dd($orders)
?>

<style>
    body {
                  background-color: white; /* Ensure the iframe has a white background */
                }

                <style>
/* ===== NAVBAR GLOBAL ===== */
.app-header.navbar {
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    height: 64px;
    backdrop-filter: blur(10px);
}

.nav-link {
    transition: all 0.2s ease;
    border-radius: 8px;
    padding: 8px 12px;
}

.nav-link:hover {
    background: #f8fafc;
    color: #1e40af !important;
}

/* ===== USER CARD IN NAVBAR ===== */
.nav-user-card {
    background: #f1f5f9;
    border-radius: 16px;
    padding: 6px 12px;
    transition: all 0.25s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border: 1px solid #e2e8f0;
}

.nav-user-card:hover {
    background: #e2e8f0;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
}

.nav-user-name {
    font-size: 14px;
    max-width: 140px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* ===== DROPDOWN MENUS ===== */
.dropdown-menu {
    border: none;
    box-shadow: 0 8px 24px rgba(14, 22, 36, 0.12);
    border-radius: 16px !important;
    padding: 0;
    margin-top: 8px !important;
    overflow: hidden;
}

.dropdown-item {
    transition: all 0.2s ease;
}

.hover-bg:hover {
    background: #f8fafc !important;
}

/* ===== USER PROFILE DROPDOWN ===== */
.user-dropdown {
    width: 280px !important;
}

.user-header {
    background: linear-gradient(135deg, #f0f9ff 0%, #e6f2ff 100%);
}

.user-image-big {
    width: 85px !important;
    height: 85px !important;
    object-fit: cover !important;
    border: 3px solid #2563eb !important;
    padding: 2px;
    box-shadow: 0 6px 16px rgba(37, 99, 235, 0.25) !important;
}

/* ===== BADGES ===== */
.badge.bg-orange {
    background-color: #ffedd5;
    color: #9a3412;
}

/* ===== BUTTONS ===== */
.btn {
    font-weight: 600;
    padding: 0.5rem 1rem;
    transition: all 0.2s ease;
}

.btn-primary {
    background: #2563eb;
    border: none;
}

.btn-primary:hover {
    background: #1d4ed8;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
}

.btn-outline-danger:hover {
    background: #fee2e2;
    color: #b91c1c;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(239, 68, 68, 0.2);
}

/* ===== ICON BACKGROUNDS ===== */
.bg-blue-50 { background-color: #eff6ff; }
.bg-orange-50 { background-color: #fff7ed; }
.bg-green-50 { background-color: #f0fdf4; }

/* ===== RESPONSIVE TWEAKS ===== */
@media (max-width: 768px) {
    .nav-user-name {
        display: none !important;
    }
    .navbar-nav .nav-item {
        margin: 0 4px;
    }
}
</style>

<nav class="app-header navbar navbar-expand bg-white">
    <div class="container-fluid px-4">
        <!-- Left: Sidebar Toggle & Nav Links -->
        <ul class="navbar-nav me-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link text-dark" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list fs-5"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link text-dark fw-medium">Home</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ route("contact.index") }}" class="nav-link text-dark fw-medium">Contact</a>
            </li>
        </ul>

        <!-- Right: Search, Notifications, User -->
        <ul class="navbar-nav ms-auto align-items-center gap-2">

            <!-- Search -->


            <!-- Pending Orders Notification -->
            <li class="nav-item dropdown">
                <a class="nav-link position-relative text-dark" data-bs-toggle="dropdown" href="#">
                   <i class="bi bi-bell-fill fs-5"></i>
                    @if($orders->count() > 0)
                        <span class="position-absolute top-18 right-15  translate-middle badge rounded-pill bg-orange text-dark fw-bold" style="font-size: 0.7rem; padding: 0.25em 0.4em; color: rgb(237, 230, 230) !important; background-color: rgb(237, 0, 0);">
                            {{ $orders->count() }}
                        </span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 mt-2" style="width: 320px; max-height: 360px; overflow-y: auto;">
                    <li class="px-4 pt-3 pb-2">
                        <h6 class="fw-bold text-dark mb-0">New Orders</h6>
                        <small class="text-muted">{{ $orders->count() }} pending</small>
                    </li>
                    <li><hr class="dropdown-divider m-0"></li>
                    @forelse($orders as $order)
                        <li>
                            <a href="{{ route('seller.orders.pending') }}" class="dropdown-item d-flex gap-3 py-3 px-4 text-decoration-none hover-bg">
                                <div class="bg-blue-50 rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    <i class="bi bi-bag text-primary fs-6"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold text-dark">Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</div>
                                    <small class="text-muted d-block mt-1">
                                        {{ optional(App\Models\Buyer::find($order->buyer_id))->fullname ?? 'Anonymous' }}
                                    </small>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="px-4 py-3 text-center text-muted fst-italic">No pending orders</li>
                    @endforelse
                    <li><hr class="dropdown-divider m-0"></li>
                    <li class="px-4 py-2">
                        <a href="{{ route('seller.orders.pending') }}" class="btn btn-outline-primary w-100 rounded-pill fw-medium">
                            View All Orders
                        </a>
                    </li>
                </ul>
            </li>

            <!-- System Notifications (Static Example) -->


            <!-- Fullscreen Toggle -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen fs-5"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit fs-5" style="display: none;"></i>
                </a>
            </li>

            <!-- User Profile Dropdown -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link p-0" data-bs-toggle="dropdown">
                    <div class="nav-user-card d-flex align-items-center gap-2 px-2 py-1">
                        <img src="{{ asset('storage/seller_images/' . optional(App\Models\Seller::find(auth()->user()->seller->id))->img) }}"
                             class="rounded-circle border border-white shadow-sm" style="width: 36px; height: 36px; object-fit: cover;">
                        <span class="nav-user-name text-dark fw-medium d-none d-md-inline">
                            {{ auth()->user()->seller->store_name }}
                        </span>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg user-dropdown mt-2">
                    <li class="p-4 text-center user-header">
                        <img src="{{ asset('storage/seller_images/' . optional(App\Models\Seller::find(auth()->user()->seller->id))->img) }}"
                             class="user-image-big rounded-circle shadow mb-2 border-3 border-primary">
                        <h6 class="fw-bold text-dark mb-1">{{ auth()->user()->seller->store_name }}</h6>
                        <small class="text-muted d-block">
                            Since {{ auth()->user()->seller->created_at->isoFormat('MMM YYYY') }}
                        </small>
                    </li>
                    <li><hr class="dropdown-divider m-0"></li>
                    <li class="px-3 pb-3 pt-2">
                        <a href="{{ route('seller.profile') }}" class="btn btn-primary w-100 rounded-pill mb-2 fw-medium">
                            <i class="bi bi-person-circle me-1"></i> Store Profile
                        </a>
                        <form action="{{ route('seller.logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100 rounded-pill fw-medium">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
