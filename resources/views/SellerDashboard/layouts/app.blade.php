<!DOCTYPE html>
<html lang="en">

{{-- HEAD --}}
@include('SellerDashboard.layouts.head')

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">

    <div class="app-wrapper">

        {{-- NAVBAR --}}
        @include('SellerDashboard.layouts.navbar')

        {{-- SIDEBAR --}}
        @include('SellerDashboard.layouts.sidebar')

        {{-- MAIN CONTENT --}}
        <main class="app-main">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        @include('SellerDashboard.layouts.footer')

    </div>


</body>
</html>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom SweetAlert2 JS untuk Flash Message -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        customClass: { popup: 'elegant' }
    });

    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
    @endif

    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        });
    @endif
});
</script>

<!-- SweetAlert2 Custom Styling -->
<style>
/* 🎨 Popup utama */
.swal2-popup.elegant {
    border-radius: 16px !important;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
    padding: 1.2em 1.5em !important;
    max-width: 400px;
    background: linear-gradient(145deg, #ffffff, #f0f0f5);
    font-family: 'Roboto', sans-serif;
}

/* Judul */
.swal2-popup.elegant .swal2-title {
    font-weight: 700 !important;
    font-size: 1.8rem !important;
    color: #333333 !important;
    margin: 0.5em 0 !important;
    text-align: center;
}

/* Konten pesan */
.swal2-popup.elegant .swal2-content,
.swal2-popup.elegant .swal2-html-container {
    font-size: 1rem !important;
    color: #777777 !important;
    text-align: center;
    margin-top: 0.5em !important;
    margin-bottom: 1em !important;
    line-height: 1.5 !important;
    padding: 0 1em;
}

/* Tombol konfirmasi */
.swal2-popup.elegant .swal2-confirm {
    background: #1d72b8 !important;
    color: #fff !important;
    font-weight: 600;
    padding: 0.6em 2em;
    border-radius: 10px !important;
    box-shadow: 0 4px 12px rgba(29, 114, 184, 0.4);
    transition: all 0.3s ease;
}
.swal2-popup.elegant .swal2-confirm:hover {
    background: #155d8b !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(29, 114, 184, 0.5);
}

/* Tombol tutup (X) */
.swal2-popup.elegant .swal2-close {
    font-size: 1.5rem !important;
    position: absolute !important;
    top: 15px !important;
    right: 15px !important;
    color: #aaaaaa !important;
    transition: color 0.2s ease;
    z-index: 10;
}
.swal2-popup.elegant .swal2-close:hover {
    color: #555555 !important;
}

/* Ikon centang */
.swal2-icon.swal2-success {
    border: none !important; 
    margin: 0.5em auto 0.5em !important; 
}

.custom-success-icon-container {
    background-color: #38c172; 
    border-radius: 50%;
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 15px rgba(56, 193, 114, 0.4);
    position: relative;
    overflow: hidden;
    margin: 0 auto;
}

.custom-success-icon-container i {
    font-size: 55px;
    color: #ffffff; 
}

/* Animasi muncul popup */
@keyframes shake-and-pulse {
    0% { transform: scale(0.8); opacity: 0; }
    50% { transform: scale(1.03); opacity: 1; } 
    75% { transform: scale(1) rotate(1deg); } 
    85% { transform: scale(1) rotate(-1deg); }
    100% { transform: scale(1) rotate(0deg); }
}

.swal2-popup.elegant.animated {
    animation: shake-and-pulse 0.7s cubic-bezier(0.68, -0.55, 0.27, 1.55) both;
}

@keyframes scale-up-circle {
    from { transform: scale(0); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.custom-success-icon-container {
    animation: scale-up-circle 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}

@keyframes fade-in-check {
    from { opacity: 0; }
    to { opacity: 1; }
}

.custom-success-icon-container i {
    opacity: 0;
    animation: fade-in-check 0.3s ease-in forwards 0.4s; 
}
</style>
