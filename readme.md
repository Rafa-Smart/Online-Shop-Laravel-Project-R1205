# 🛍️ Platform E-Commerce Multi-User

<div align="center">

![Status Platform](https://img.shields.io/badge/status-production-success?style=for-the-badge)
![Arsitektur](https://img.shields.io/badge/arsitektur-multi--user-blue?style=for-the-badge)
![Lisensi](https://img.shields.io/badge/lisensi-MIT-orange?style=for-the-badge)

**Platform e-commerce lengkap dengan fitur modern dan arsitektur multi-user yang handal**

[Fitur](#-fitur-utama) • [Arsitektur](#-arsitektur) • [Instalasi](#-instalasi) • [Dokumentasi](#-dokumentasi) • [Tangkapan Layar](#-tangkapan-layar)

---

</div>

## 🌟 Ringkasan

Platform e-commerce multi-user yang komprehensif dengan sistem **Pembeli (Buyer)** dan **Penjual (Seller)** yang terintegrasi sempurna. Dibangun menggunakan arsitektur modern dengan fokus pada pengalaman pengguna yang seamless, manajemen toko yang powerful, dan sistem notifikasi real-time.

### ✨ Keunggulan

- 🔐 **Sistem Autentikasi Ganda** - Manual & Google OAuth
- 🛒 **Keranjang Belanja Canggih** - Update real-time & notifikasi otomatis
- 💳 **Dual Payment Gateway** - Integrasi Midtrans & checkout WhatsApp
- 📊 **Analitik Komprehensif** - Pelacakan penjualan & wawasan pelanggan
- 🎨 **Iklan Dinamis** - Manajemen banner kustom
- 📱 **Desain Responsif** - Pendekatan mobile-first

---

## 🎯 Fitur Utama

### 👤 Fitur Pembeli (Buyer)

<details>
<summary><b>🏠 Halaman Beranda & Landing</b></summary>

#### Landing Page
- Tampilan review dan testimoni pelanggan
- Desain modern dan menarik
- Call-to-action yang jelas

#### Home Page
- **Search Bar Pintar** dengan pencarian real-time per karakter
- **Sistem Notifikasi Lengkap**:
  - 🛎️ Notifikasi pesanan (auto-update saat seller terima/tolak)
  - ❤️ Notifikasi wishlist dengan indikator merah
  - 🛒 Notifikasi keranjang dengan badge jumlah
  - Dropdown maksimal 5 item per jenis notifikasi
- **Slider Iklan Dinamis** dengan auto-loop
- **Kartu Produk Lengkap**:
  - Label kategori produk
  - Rating bintang (sudah terkalkulasi)
  - Indikator stok dengan progress bar
  - Harga asli & harga diskon
  - Badge persentase diskon
  - Toggle tampilan Grid/List
- **Filter & Pencarian Canggih**:
  - Cari berdasarkan nama produk
  - Filter kondisi (Semua/Baru/Bekas)
  - Filter ketersediaan (Tersedia/Stok Menipis)
  - Urutan (Terbaru, Terpopuler, Harga, Nama A-Z/Z-A)
  - Slider rentang harga
  - Tombol reset semua filter

</details>

<details>
<summary><b>🔐 Sistem Autentikasi</b></summary>

#### Halaman Login
- Login manual dengan email/password
- Integrasi Google OAuth
- Error & success handling
- Validasi real-time

#### Halaman Register
- Registrasi manual
- Sign-up dengan Google
- Validasi formulir lengkap
- Notifikasi sukses/error

</details>

<details>
<summary><b>🛍️ Produk & Belanja</b></summary>

#### Halaman Detail Produk
- **Galeri Gambar**:
  - Navigasi thumbnail
  - Gambar utama berubah saat klik thumbnail
  - Preview gambar detail
- **Informasi Produk**:
  - Judul & kategori produk
  - Jumlah terjual
  - Rating (terkalkulasi otomatis)
  - Harga & diskon
- **Detail Spesifikasi**:
  - Kondisi produk (Baru/Bekas)
  - Kategori produk
  - Minimal pesanan
  - Spesifikasi fleksibel (dapat ditambah seller)
- **Sistem Komentar Multi-User**:
  - Nama pembeli
  - Rating pembeli
  - Teks komentar
  - Timestamp komentar terakhir
  - Upload gambar & video
  - Lightbox untuk preview media
- **Fitur Checkout**:
  - Input jumlah pembelian
  - Indikator stok tersisa
  - Validasi jumlah (pop-up jika melebihi stok)
  - Kalkulasi total harga otomatis
  - Tombol "Beli Langsung"
  - Tombol "Tambah ke Keranjang"
  - Pop-up pilihan pembayaran:
    - 💳 Payment gateway (Midtrans)
    - 💬 Checkout via WhatsApp
- **Info Seller**:
  - Jam kerja/status online seller

</details>

<details>
<summary><b>❤️ Halaman Wishlist</b></summary>

#### Event Klik Icon Wishlist
**Belum punya kategori:**
- Pop-up otomatis untuk buat kategori wishlist
- Input nama & deskripsi kategori

**Sudah punya kategori:**
- Pop-up pilihan kategori wishlist
- Pilih kategori untuk menyimpan produk

#### Tab Wishlist
**1. All Wishlist**
- Tampilan grid dengan kartu produk
- Informasi lengkap:
  - Nama produk
  - Kategori
  - Harga asli & diskon
  - Rating produk
  - Badge kondisi (Baru/Bekas)
- Icon add to cart
- Icon delete produk

**2. Kategori Wishlist**
- Layout kartu horizontal
- Info per kategori:
  - Nama kategori
  - Deskripsi
  - Jumlah produk dalam kategori
- Klik kartu membuka 2 tab:
  - **Tab Produk**: Tampilkan semua produk dalam kategori
  - **Tab Pengaturan**: 
    - Tombol tambah kategori
    - Tabel kategori (No, Nama, Deskripsi)
    - Tombol delete kategori

</details>

<details>
<summary><b>🛒 Halaman Keranjang</b></summary>

#### Bagian Produk
- **Checkbox Master**: Pilih semua produk sekaligus
- **Pengelompokan per Toko**:
  - Nama toko
  - Produk terpisah per seller
- **Fitur Per Produk**:
  - Checkbox individual
  - Nama produk
  - Icon add to wishlist
  - Icon hapus dari keranjang
- **Deteksi Checkbox**: Produk terpilih otomatis masuk checkout

#### Bagian Checkout
- Daftar produk yang diceklis
- Harga per produk
- Total harga keseluruhan
- Pop-up pilihan pembayaran:
  - 💳 Payment gateway (Midtrans)
  - 💬 Checkout via WhatsApp

</details>

<details>
<summary><b>📧 Halaman Kontak</b></summary>

- Email admin
- Nomor telepon admin
- Lokasi kantor/toko
- Media sosial (Instagram, Facebook, Twitter, LinkedIn, WhatsApp)
- **Form Kritik & Saran**:
  - Subject
  - Nama lengkap pengirim
  - Email pengirim
  - Pesan/message
- Email otomatis terkirim ke admin

</details>

<details>
<summary><b>👤 Profil Pembeli</b></summary>

#### Tab Biodata Diri
- Upload/ganti foto profil
- Edit nama pengguna
- Edit nama lengkap
- Edit nomor HP
- Ganti/buat password (termasuk untuk akun Google)

#### Tab Riwayat Pesanan
- Kartu pesanan dengan detail:
  - Harga bayar
  - Waktu pemesanan
  - Status pesanan
  - Detail produk

#### Tab Pengaturan Akun
- Ganti password
- Buat password (untuk login Google)
- Logout akun
- Hapus akun

</details>

---

### 🏪 Fitur Penjual (Seller)

<details>
<summary><b>📊 Dashboard Seller</b></summary>

#### Notifikasi Sidebar
- Badge notifikasi di sub-menu sidebar
- Notifikasi stok produk (di bawah threshold)
- Notifikasi pesanan baru (perlu accept/reject)
- Indikator visual warna

#### Kartu Statistik Utama
**1. Total Pendapatan**
- Kalkulasi otomatis dari order completed
- Indikator naik/turun dari periode sebelumnya
- Badge performa

**2. Produk Terjual**
- Total produk terjual (order completed + paid)
- Indikasi stabil/tidak stabil
- Trend penjualan

**3. Total Produk**
- Jumlah total produk milik seller
- Indikator keamanan inventori
- Status inventaris

#### Chart Statistik Penjualan
- Grafik interaktif dengan hover detail
- Filter periode:
  - Per hari
  - Per bulan
  - Per tahun
- Detail waktu & pendapatan pada tooltip

#### Kategori Top Performer
- Kartu 6 kategori terbaik berdasarkan pendapatan
- Grafik bar kategori terbaik
- Hover detail: total pesanan & nama kategori

#### Tabel Top 5 Produk Terlaris
- Ranking produk berdasarkan penjualan
- Detail per produk

</details>

<details>
<summary><b>📦 Manajemen Produk</b></summary>

#### Overview Cards
- Total produk (terkalkulasi)
- Total produk aktif (stok tersedia)
- Jumlah stok menipis
- Rata-rata rating produk (terkalkulasi)

#### Filter Produk
- Search nama produk
- Filter kondisi (Semua/Baru/Bekas)
- Filter stok (Semua/Menipis/Tersedia/Habis)
- Urutan (Terbaru, Terlama, Harga, Nama, Rating)

#### Tampilan Produk
**Kartu Produk:**
- Nama produk
- Harga produk
- Jumlah stok
- Badge status (Menipis/Aman)
- Badge kondisi (Baru/Bekas)
- Tombol Edit & Delete

**Toggle View:**
- Tampilan Grid
- Tampilan List/Tabel

#### Halaman Tambah Produk
- **Field Wajib**:
  - Nama produk
  - Stok produk (angka)
  - Harga setelah diskon
  - Upload thumbnail (1 file)
- **Field Opsional**:
  - Harga awal (sebelum diskon)
- **Dropdown**:
  - Pilih kategori produk
  - Pilih kondisi (Baru/Bekas)
- **Upload Media**:
  - Thumbnail produk (wajib)
  - Foto detail (bisa banyak)
  - Preview gambar
  - Validasi jenis & ukuran file
  - Hapus foto sebelum simpan
- **Spesifikasi Produk**:
  - Input judul spesifikasi
  - Input deskripsi (teks panjang)
  - Tambah spesifikasi unlimited
  - Format JSON (fleksibel)
- **Validasi Lengkap**:
  - Nama tidak boleh kosong
  - Stok harus angka
  - Thumbnail wajib
  - Harga diskon wajib
- **Simpan**: Redirect ke daftar produk

#### Halaman Edit Produk
- Load data produk existing
- Edit semua field (sama seperti tambah)
- Thumbnail opsional (gunakan data lama jika tidak diganti)
- Upload foto tambahan
- Hapus foto lama
- Edit/tambah/hapus spesifikasi
- Update data ke database

</details>

<details>
<summary><b>📈 Dashboard Pesanan Produk</b></summary>

#### Tombol Export
- **Export Excel** (warna hijau)
- **Export PDF** (warna merah)
- Unduh laporan penjualan

#### Kartu Performa Toko
**1. Total Produk**
- Icon box
- Jumlah produk tersedia
- Badge "Produk Aktif"
- Background purple

**2. Total Terjual**
- Icon target
- Total produk terjual
- Badge "Total Penjualan"
- Background hijau

**3. Produk Terlaris**
- Icon bintang
- Nama produk best seller
- Badge "Best Seller"
- Background pink

**4. Rata-Rata Harga**
- Icon koin
- Rata-rata harga produk
- Badge "Average Price"
- Background biru gradien

#### Chart Penjualan (Chart.js)
- Jumlah penjualan per produk
- Jenis chart tersedia:
  - BAR (default)
  - LINE
  - PIE
- Fitur:
  - Switch chart type
  - Animasi chart
  - Data real-time dari database
  - Label produk miring (rotate text)

#### Search & Filter
- Form search: "Ketik nama produk..."
- Tombol "Reset Filter"
- Dropdown urutan:
  - Penjualan terbanyak
  - Penjualan terdikit
  - Harga tertinggi
  - Harga terendah

#### List Produk
**Data per produk:**
- Nomor urut
- Nama produk
- SKU produk (PRD-00001)
- Harga produk
- **Badge Stok**:
  - 🟡 Kuning = Aman
  - 🔴 Merah = Menipis
  - 🟢 Hijau = Sangat Aman
- Badge rating/skor penjualan
- Icon 🔥 (produk laris)
- Tombol "Detail"

#### Badge Notifikasi Menu
- 🔴 Badge merah pada Products: produk bermasalah
- 🔴 Badge merah pada Stock Management: stok kritis
- 🔵 Badge biru pada Orders: pesanan baru

</details>

<details>
<summary><b>📢 Halaman Iklan (Advertisements)</b></summary>

#### Tabel Iklan
- Gambar iklan
- Nama produk yang diiklankan
- Headline iklan
- **Status**:
  - Active: tampil di halaman utama
  - Inactive: tersimpan, tidak tampil
- **Action**:
  - Tombol Edit
  - Tombol Delete

#### Halaman Buat Iklan
- **Select Product**:
  - Dropdown produk tersedia
  - Default: "-- Choose Product --"
  - Wajib pilih produk untuk promosi
- **Field Teks**:
  - Title kecil (subheading): "Diskon Besar!", "Promo Akhir Tahun"
  - Headline besar (fokus utama): "Hemat Hingga 50%"
  - Deskripsi konten (teks panjang, multi-paragraf)
  - Teks tombol banner: "Shop Now", "Beli Sekarang"
- **Toggle Active**:
  - ✅ Active: langsung tampil di toko
  - ❌ Inactive: tersimpan sebagai draft
- **Upload Background**:
  - Wajib format PNG transparan
  - Alasan PNG transparan: teks/headline tampil rapi
  - Validasi jenis & ukuran file
  - Preview real-time
- **Area Preview**: tampilan background banner

#### Halaman Edit Iklan
- Load data iklan existing
- Edit semua field (sama seperti buat)
- Ganti produk yang dipromosikan
- Update background PNG (opsional)
- Preview real-time
- Toggle status active/inactive

</details>

<details>
<summary><b>📊 Manajemen Stok</b></summary>

#### Kartu Statistik
- Total produk (setelah filter)

#### Tabel Stok
**Data per produk:**
- Gambar produk
- Nama produk
- Stok tersedia
- Tombol Update (edit jumlah stok)

#### Filter & Notifikasi
- Filter produk di bawah threshold
- Threshold default diatur di profil seller
- Notifikasi masuk ke menu sidebar
- Update stok real-time

</details>

<details>
<summary><b>📋 Halaman Order Pending</b></summary>

#### Kartu Statistik
- Data produk pending
- Data produk completed/accepted
- Data produk cancelled

#### Tabel Pending Orders (Action)
**Data order yang perlu diproses:**
- Order ID
- Nama buyer
- Total price
- Status: Pending
- Created at
- **Action**:
  - 🟢 Tombol Accept
  - 🔴 Tombol Reject

#### Tabel Riwayat Order
**Semua order yang sudah diproses:**
- Order ID
- Buyer name
- Product name
- Quantity
- Total
- Status: Pending/Completed/Cancelled

</details>

<details>
<summary><b>👥 Customer Insight</b></summary>

#### Kartu Metrik Pelanggan
- **Total Customer**: jumlah pelanggan
- **Repeat Rate**: persentase pelanggan berulang
- **Avg Orders/Customer**: rata-rata pesanan per pelanggan
- **Top Spender**: pelanggan dengan pembelian terbanyak

#### Visualisasi Data
- Kartu total user yang order berulang
- **Grafik Pie**: 
  - Buyer baru vs buyer berulang
  - Persentase & jumlah

#### Tabel Top Buyer
- Badge menarik untuk top buyer
- **Data per buyer**:
  - Nama buyer
  - Total order
  - Total spend

</details>

<details>
<summary><b>📧 Halaman Kontak Seller</b></summary>

- Email admin/seller
- Nomor telepon
- Lokasi kantor/toko
- Media sosial (Instagram, Facebook, Twitter, LinkedIn, WhatsApp)
- **Form Kritik & Saran**:
  - Subject
  - Nama lengkap pengirim
  - Email pengirim
  - Message
- Email otomatis terkirim ke admin

</details>

<details>
<summary><b>👤 Profil Seller</b></summary>

#### Tab Biodata Toko
- Upload/ganti foto profil toko
- Edit nama toko
- Edit nama pemilik toko
- Buat/edit deskripsi toko
- Edit nomor HP toko
- **Threshold Stok**: atur minimal stok untuk notifikasi
- Ganti/buat password (termasuk untuk akun Google)

#### Tab Riwayat Order
- Kartu order dengan detail lengkap:
  - Harga bayar
  - Waktu pemesanan
  - Status order
  - Detail produk & buyer

#### Tab Pengaturan Akun
- Ganti password
- Buat password (untuk login Google)
- Logout akun
- Hapus akun

</details>

---

## 💳 Sistem Pembayaran

### 🔐 Payment Gateway - Midtrans
- Integrasi Midtrans lengkap
- Berbagai metode pembayaran:
  - Transfer bank
  - E-wallet (GoPay, OVO, Dana, dll)
  - Kartu kredit/debit
  - Alfamart/Indomaret
- Notifikasi pembayaran otomatis
- Secure transaction

### 💬 Checkout via WhatsApp
- Redirect ke WhatsApp seller
- Template pesan otomatis dengan detail:
  - Nama produk
  - Jumlah
  - Total harga
  - Data pembeli
- Konfirmasi langsung dengan seller

---

## 🏗️ Arsitektur

### 🎨 Tech Stack
```
Frontend:
├── HTML5, CSS3, JavaScript
├── Responsive Design (Mobile-First)
├── Chart.js (untuk visualisasi data)
└── Lightbox (untuk preview media)

Backend:
├── Multi-user Architecture
├── Real-time Notification System
├── RESTful API
└── JSON Data Format

Payment:
├── Midtrans Gateway
└── WhatsApp Integration

Database:
├── Relational Database
├── JSON Format untuk Spesifikasi Fleksibel
└── Calculated Fields untuk Rating & Statistik
```

### 📁 Struktur Data

#### User Roles
- **Buyer**: Pembeli dengan fitur belanja lengkap
- **Seller**: Penjual dengan dashboard manajemen toko
- **Multi-role**: User dapat menjadi buyer sekaligus seller

#### Data Calculation
- ✅ Rating produk terkalkulasi otomatis
- ✅ Total penjualan real-time
- ✅ Statistik pendapatan per periode
- ✅ Stok produk ter-update otomatis
- ✅ Notifikasi terintegrasi sistem

---

## 🚀 Instalasi

### Prasyarat
```bash
- Web Server (Apache/Nginx)
- PHP >= 7.4
- MySQL/PostgreSQL
- Composer
- Node.js & NPM
```

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/username/ecommerce-platform.git
cd ecommerce-platform
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Konfigurasi Environment**
```bash
cp .env.example .env
# Edit file .env dengan konfigurasi database & API keys
```

4. **Database Setup**
```bash
php artisan migrate
php artisan db:seed
```

5. **Generate Application Key**
```bash
php artisan key:generate
```

6. **Konfigurasi Midtrans**
```env
MIDTRANS_SERVER_KEY=your_server_key
MIDTRANS_CLIENT_KEY=your_client_key
MIDTRANS_IS_PRODUCTION=false
```

7. **Konfigurasi Google OAuth**
```env
GOOGLE_CLIENT_ID=your_client_id
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_REDIRECT_URI=your_redirect_uri
```

8. **Run Development Server**
```bash
php artisan serve
npm run dev
```

9. **Akses Aplikasi**
```
http://localhost:8000
```

---

## 📚 Dokumentasi

### 🔑 User Roles

| Role | Akses | Fitur Utama |
|------|-------|-------------|
| **Buyer** | Halaman utama, produk, checkout | Belanja, wishlist, keranjang, profil |
| **Seller** | Dashboard seller, manajemen produk | Kelola produk, iklan, pesanan, statistik |
| **Admin** | (Opsional) | Kelola semua user dan konten |

### 📊 Status Order

| Status | Deskripsi | Action |
|--------|-----------|--------|
| **Pending** | Menunggu konfirmasi seller | Accept/Reject |
| **Completed** | Pesanan diterima & dibayar | Lihat detail |
| **Cancelled** | Pesanan ditolak seller | Lihat alasan |

### 🎨 Format Data

#### Spesifikasi Produk (JSON)
```json
{
  "spesifikasi": [
    {
      "judul": "Bahan",
      "deskripsi": "100% Katun Premium"
    },
    {
      "judul": "Ukuran",
      "deskripsi": "S, M, L, XL, XXL"
    }
  ]
}
```

#### Rating Calculation
```javascript
// Rating produk dihitung otomatis dari semua review buyer
averageRating = totalRating / jumlahReview
// Contoh: (5 + 4 + 5 + 3 + 4) / 5 = 4.2 ⭐
```

---

## 🎨 Tangkapan Layar

### 🏠 Landing & Home
```
[Landing Page dengan Review]
↓
[Home dengan Search & Filter]
↓
[Product Cards Grid/List View]
```

### 🛍️ Shopping Flow
```
[Detail Produk + Review]
↓
[Add to Cart/Wishlist]
↓
[Checkout - Pilih Pembayaran]
↓
[Midtrans/WhatsApp]
↓
[Order Success]
```

### 🏪 Seller Dashboard
```
[Dashboard Statistik]
↓
[Manajemen Produk]
↓
[Stock Management]
↓
[Order Management]
↓
[Customer Insights]
```

---

## 🔒 Keamanan

### 🛡️ Fitur Keamanan
- ✅ Password hashing (bcrypt)
- ✅ CSRF Protection
- ✅ XSS Prevention
- ✅ SQL Injection Protection
- ✅ Session Management
- ✅ Secure Payment Gateway (Midtrans)
- ✅ Google OAuth 2.0
- ✅ Input Validation & Sanitization
- ✅ File Upload Validation

### 🔐 Best Practices
- Validasi input di frontend & backend
- Sanitasi data sebelum disimpan
- Enkripsi data sensitif
- Rate limiting untuk API
- Secure cookie settings

---

## 🤝 Kontribusi

Kami sangat menghargai kontribusi Anda! Silakan ikuti langkah berikut:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

### 📋 Guidelines
- Ikuti coding standards yang ada
- Tulis komentar untuk kode yang kompleks
- Update dokumentasi jika diperlukan
- Test fitur sebelum submit PR

---

## 📝 Changelog

### Version 1.0.0 (Current)
- ✅ Multi-user authentication system
- ✅ Complete buyer & seller features
- ✅ Payment gateway integration
- ✅ Real-time notification system
- ✅ Advanced product filtering
- ✅ Comprehensive analytics dashboard
- ✅ Wishlist & cart management
- ✅ Advertisement management
- ✅ Customer insights
- ✅ Stock management with threshold alerts

---

## 📞 Dukungan

Butuh bantuan? Hubungi kami:

- 📧 Email: support@ecommerce-platform.com
- 💬 WhatsApp: +62 812-3456-7890
- 🌐 Website: https://ecommerce-platform.com
- 📱 Instagram: @ecommerce_platform

### 🐛 Laporkan Bug
Temukan bug? [Buat issue baru](https://github.com/username/ecommerce-platform/issues)

### 💡 Request Fitur
Punya ide fitur baru? [Diskusikan di sini](https://github.com/username/ecommerce-platform/discussions)

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah MIT License - lihat file [LICENSE](LICENSE) untuk detail.

```
MIT License

Copyright (c) 2024 E-Commerce Platform

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction...
```

---

## 🌟 Ucapan Terima Kasih

Terima kasih kepada semua kontributor yang telah membantu mengembangkan platform ini!

### 🎯 Tech Stack Credits
- [Midtrans](https://midtrans.com) - Payment Gateway
- [Chart.js](https://www.chartjs.org) - Data Visualization
- [Google OAuth](https://developers.google.com) - Authentication
- [Lightbox](https://lokeshdhakar.com/projects/lightbox2/) - Image Gallery

---

<div align="center">

**⭐ Jangan lupa beri star jika project ini membantu! ⭐**

Made with ❤️ by [Your Team Name]

[⬆ Kembali ke atas](#-platform-e-commerce-multi-user)

</div>