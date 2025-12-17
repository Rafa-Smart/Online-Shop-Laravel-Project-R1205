<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Electro Laravel')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('img/avatar.jpg') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- LightGallery (foto + video) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery.min.css" />

<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/video/lg-video.min.js"></script>

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
/* 🎨 Tambahan Styling CSS Kustom untuk SweetAlert2 */

<style>
/* ✨ Styling Elegan untuk SweetAlert2 Popup */

/* Popup utama */
.swal2-popup.elegant {
    border-radius: 16px !important;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
    padding: 1.2em 1.5em !important;
    max-width: 400px;
    background: linear-gradient(145deg, #ffffff, #f0f0f5);
    font-family: 'Roboto', sans-serif;
}

/* Judul (Akan digunakan untuk pesan di atas centang, misalnya "Download Successful") */
.swal2-popup.elegant .swal2-title {
    font-weight: 700 !important;
    font-size: 1.8rem !important; /* Ukuran Judul dibesarkan */
    color: #333333 !important;
    margin-top: 0.5em !important;
    margin-bottom: 0.5em !important; /* Jarak yang lebih baik ke ikon */
    text-align: center;
}

/* Pesan (Konten HTML - Akan digunakan untuk pesan di bawah centang) */
.swal2-popup.elegant .swal2-content,
.swal2-popup.elegant .swal2-html-container {
    font-size: 1rem !important;
    color: #777777 !important; 
    text-align: center;
    margin-top: 0.5em !important; /* Jarak yang lebih baik dari ikon */
    margin-bottom: 1em;
    line-height: 1.5 !important;
    padding: 0 1em;
    order: 3; /* PENTING: Urutan ke-3 (di bawah Judul dan Ikon) */
}

/* Tombol */
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

/* Tombol Tutup (X) */
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

/* --- KODE CSS UNTUK IKON CENTANG (DIBESARKAN DAN DIPOSISI ULANG) --- */

/* Mengatur ulang ikon bawaan SweetAlert2 agar bisa diganti total */
.swal2-icon.swal2-success {
    border: none !important; 
    margin: 0.5em auto 0.5em !important; 
    order: 2; /* PENTING: Urutan ke-2 (di bawah Judul, di atas Pesan) */
}

/* Container untuk membuat lingkaran latar belakang ikon */
.custom-success-icon-container {
    background-color: #38c172; 
    border-radius: 50%;
    width: 100px; /* 👈 UKURAN DIBESARKAN */
    height: 100px; /* 👈 UKURAN DIBESARKAN */
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 15px rgba(56, 193, 114, 0.4);
    position: relative;
    overflow: hidden;
}

/* Ikon centang di tengah (Memakai Font Awesome) */
.custom-success-icon-container i {
    font-size: 55px; /* 👈 UKURAN DIBESARKAN */
    color: #ffffff; 
}

/* --- KODE CSS UNTUK ANIMASI TAMBAHAN (TETAP) --- */

/* 1. Animasi Goyangan/Pulse untuk Modal/Popup Saat Muncul */
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

/* 2. Animasi Scale Up untuk Lingkaran Hijau */
@keyframes scale-up-circle {
    from { transform: scale(0); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.custom-success-icon-container {
    animation: scale-up-circle 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}

/* 3. Animasi Fade In untuk Ikon Centang */
@keyframes fade-in-check {
    from { opacity: 0; }
    to { opacity: 1; }
}

.custom-success-icon-container i {
    opacity: 0;
    animation: fade-in-check 0.3s ease-in forwards 0.4s; 
}

/* --- END OF KODE CSS UNTUK ANIMASI TAMBAHAN --- */

/* Toast (jika pakai toast) */
.swal2-container.toast-center {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
}

.swal2-popup.toast {
    padding: 1em 1.5em !important;
    border-radius: 14px !important;
    font-size: 1rem !important;
    font-weight: 500 !important;
    background: #ffffff;
    box-shadow: 0 6px 20px rgba(0,0,0,0.2);
}
</style>

</head>
<body>

    {{-- Header --}}
    @include('layouts.header')
    

    {{-- Konten halaman --}}
    @yield('content')
    
    {{-- Footer --}}
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        customClass: {
            popup: 'elegant'
        },
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
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
            title: '{{ session('error') }}',
            timer: 1000
        });
    @endif
});


</script>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
