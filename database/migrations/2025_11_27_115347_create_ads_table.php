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
        Schema::create('ads', function (Blueprint $table) {
    $table->id();

    $table->foreignId('seller_id')->constrained('sellers')->cascadeOnDelete();
    $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

    $table->string('title')->nullable();          // Judul kecil
    $table->string('headline');                   // Judul besar
    $table->text('description')->nullable();      // Deskripsi iklan

    $table->string('button_text')->default('Shop Now');
    $table->string('button_link')->nullable();   // Auto generate ke route('product.show')

    $table->string('bg_image'); // Transparent background PNG

    $table->boolean('is_active')->default(true);

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
