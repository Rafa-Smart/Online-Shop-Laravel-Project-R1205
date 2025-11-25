@extends('SellerDashboard.layouts.app')

@section('title', 'Profile - Electro Laravel')

@section('content')



<div class="container py-4">
    <div class="row">

        {{-- ================= SIDEBAR ================= --}}
        <div class="col-md-3">
            <div class="profile-sidebar text-center">

                {{-- FOTO PROFIL --}}
                @if($seller->img)
                    <img src="{{ asset('storage/profile_photos/'.$seller->img) }}" class="profile-photo mb-3">
                @else
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" class="profile-photo mb-3">
                @endif

                {{-- Upload Foto --}}
                <form action="{{ route('seller.profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control mb-2" name="photo" required>
                    <button class="btn btn-primary w-100">Upload Foto</button>
                </form>

                <hr>

                {{-- TAB DI SIDEBAR --}}
                <div id="tab-biodata"  class="tab-button active mt-2">Biodata</div>
                <div id="tab-orders"   class="tab-button">Pesanan</div>
                <div id="tab-settings" class="tab-button">Pengaturan</div>
            </div>
        </div>

        {{-- ================= BAGIAN KANAN ================= --}}
        <div class="col-md-9">

            {{-- ==== TOP TAB LIKE TOKOPEDIA ==== --}}
            <div class="top-tabs">
                <div class="top-tab active" data-tab="biodata">Biodata Toko</div>
                <div class="top-tab" data-tab="orders">Pesanan Masuk</div>
                <div class="top-tab" data-tab="settings">Pengaturan</div>

                <div class="tab-indicator" id="indicator"></div>
            </div>

            {{-- ================== INCLUDE TAB ================== --}}
            @include('SellerDashboard.profile.tabs.biodata')
            @include('SellerDashboard.profile.tabs.orders')
            @include('SellerDashboard.profile.tabs.settings')

        </div>
    </div>
</div>

{{-- ================= MODAL PASSWORD ================= --}}
<div class="modal fade" id="modalPassword" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('seller.profile.changePassword') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Ubah Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="fw-bold">Password Lama</label>
                <input type="password" name="old_password" class="form-control mb-3" required>

                <label class="fw-bold">Password Baru</label>
                <input type="password" name="new_password" class="form-control mb-3" required>

                <label class="fw-bold">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger">Perbarui Password</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL HAPUS AKUN ================= --}}
<div class="modal fade" id="modalDeleteAccount" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('seller.profile.deleteAccount') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus akun ini? Semua data akan hilang permanen.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus Akun</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= JS TAB ================= --}}
<script>
const sidebarTabs = document.querySelectorAll('.tab-button');
const topTabs = document.querySelectorAll('.top-tab');
const contents = document.querySelectorAll('.tab-content');
const indicator = document.getElementById("indicator");

function activateTab(tabName) {
    sidebarTabs.forEach(b => b.classList.remove('active'));
    topTabs.forEach(t => t.classList.remove('active'));
    contents.forEach(c => c.classList.remove('active'));

    document.getElementById('tab-' + tabName).classList.add('active');
    document.querySelector('.top-tab[data-tab="' + tabName + '"]').classList.add('active');
    document.getElementById('content-' + tabName).classList.add('active');

    const activeTop = document.querySelector('.top-tab.active');
    indicator.style.width = activeTop.offsetWidth + "px";
    indicator.style.left = activeTop.offsetLeft + "px";
}

sidebarTabs.forEach(btn => {
    btn.addEventListener('click', () => activateTab(btn.id.replace('tab-', '')));
});

topTabs.forEach(btn => {
    btn.addEventListener('click', () => activateTab(btn.dataset.tab));
});

window.onload = () => {
    const activeTop = document.querySelector('.top-tab.active');
    indicator.style.width = activeTop.offsetWidth + "px";
    indicator.style.left = activeTop.offsetLeft + "px";
};
</script>

@endsection
