<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
    $table->id();
    $table->foreignId('buyer_id')->constrained()->onDelete('cascade'); // pemilik wishlist
    $table->foreignId('product_id')->constrained()->onDelete('cascade'); // produk yang di wishlist
    $table->foreignId('wishlist_category_id')->nullable()->constrained('wishlist_categories')->onDelete('cascade'); // kategori wishlist
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }
};
