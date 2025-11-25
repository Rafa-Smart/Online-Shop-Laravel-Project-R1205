<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\SellerProfileController;
use App\Http\Controllers\DashboardSellerController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
})->name('landingPage');

// --- Rute untuk Pengguna Belum Terautentikasi (Guest) ---
Route::middleware(['guest'])->group(function () {
    // Route Dashboard hanya jika tidak ada Auth, mungkin hanya untuk contoh
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // REGISTER
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('/verify-email/{token}', [RegisteredUserController::class, 'verifyEmail'])->name('email.verify');

    // LOGIN
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    // GOOGLE AUTH
    Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');
});

// --- Rute untuk Pengguna Terautentikasi dan Terverifikasi (Auth & Verified) ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'getAllProducts'])->name('home');
    Route::get('/product/{id}', [HomeController::class, 'getDetailProduct'])->name('product.detail');

    // CART
    Route::get('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('addCart');
    Route::get('/carts', [CartController::class, 'getAllCarts'])->name('showCarts');
    Route::get('/carts/delete/{id}', [CartController::class, 'delete'])->name('carts.delete');
    Route::post('/addcomment/{idProduct}', [CommentController::class, 'addComment'])->name('addcomment');

    // LOGOUT
    Route::post('logout', [LoginController::class, 'logOut'])->name('logout');

    // buat order di buyer
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    // SELLER
    Route::get('/seller/create', [SellerController::class, 'create'])->name('seller.create');
    Route::post('/seller/store', [SellerController::class, 'store'])->name('seller.store');

    Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    Route::get('/seller/dashboard/statistics', [DashboardSellerController::class, 'statistics']);

    // PRODUK SELLER (Menggunakan Resource Route untuk CRUD standar)
    // Ini menggantikan 6 rute manual (index, create, store, edit, update, destroy)
    Route::resource('seller/products', ProductController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->names('seller.products');

    Route::get('seller/products', [ProductController::class, 'index'])->name('seller.products.index');

    // chart produk

    Route::get('seller/products/chart', [ProductController::class, 'show'])
        ->name('seller.products.show');

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    // Biodata
    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Update Foto
    Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])
        ->name('profile.updatePhoto');

    // Ganti Password
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])
        ->name('profile.changePassword');

    // Request ganti email (kirim email verifikasi)
    Route::post('/profile/change-email', [ProfileController::class, 'requestChangeEmail'])
        ->name('profile.requestChangeEmail');

    // Link verifikasi email baru
    Route::get('/verify-new-email/{token}', [ProfileController::class, 'verifyNewEmail'])
        ->name('profile.verifyNewEmail');

    // Hapus akun
    Route::post('/profile/delete-account', [ProfileController::class, 'deleteAccount'])
        ->name('profile.deleteAccount');



    // ini buat profile seller

    Route::get('seller/profile', [SellerProfileController::class, 'index'])
        ->name('seller.profile');

    Route::post('seller/profile/update', [SellerProfileController::class, 'update'])
        ->name('seller.profile.update');

    Route::post('seller/profile/update-photo', [SellerProfileController::class, 'updatePhoto'])
        ->name('seller.profile.updatePhoto');

    Route::post('seller/profile/change-password', [SellerProfileController::class, 'changePassword'])
        ->name('seller.profile.changePassword');

    Route::post('seller/profile/delete-account', [SellerProfileController::class, 'deleteAccount'])
        ->name('seller.profile.deleteAccount');

    // seller notifikasi
    // List semua order untuk seller
    Route::get('/seller/orders/pending', [OrderController::class, 'indexPending'])->name('seller.orders.pending');

    Route::post('/seller/orders/approve/{order}', [OrderController::class, 'approve'])->name('seller.orders.approve');

    // Cancel order
    Route::post('/seller/orders/cancel/{order}', [OrderController::class, 'cancel'])->name('seller.orders.cancel');

    // ketika dibaca buyer
    Route::post('/buyer/notifications/read/{order}', [HomeController::class, 'markAsRead'])->name('buyer.notifications.read');

    // Review
    Route::post('/product/{id}/review', [ReviewController::class, 'store'])
        ->name('product.review');



    // wishlist
 Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/all', [WishlistController::class, 'allWishlist'])->name('wishlist.all');
    Route::get('/wishlist/category/{id}', [WishlistController::class, 'categoryWishlist'])->name('wishlist.category');
    Route::get('/wishlist/create/{product_id}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::post('/wishlist-categories', [WishlistController::class, 'storeCategory'])->name('wishlist-categories.store');
      Route::get('/wishlist/category/detail/{id}', [WishlistController::class, 'categoryDetailPage'])->name('wishlist.category.detail');

});
