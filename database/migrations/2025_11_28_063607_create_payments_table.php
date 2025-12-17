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
       Schema::create('payments', function (Blueprint $table) {
    $table->id();

    // Relasi ke orders (satu order punya satu payment)
    $table->foreignId('order_id')
        ->constrained('orders')
        ->cascadeOnDelete();

    // Kode unik transaksi untuk Midtrans
    $table->string('order_code')->unique();

    // Token Snap untuk membuka pembayaran
    $table->string('snap_token')->nullable();
    $table->string('snap_redirect_url')->nullable();

    // Data status dari Midtrans
    $table->string('payment_type')->nullable();
    $table->string('transaction_status')->nullable(); 
        // pending, settlement, deny, cancel, expire, refund, capture

    // ID referensi dari Midtrans (transaction_id)
    $table->string('transaction_id')->nullable();

    // opsional jika pakai VA / QR / e-wallet
    $table->string('va_number')->nullable();
    $table->string('bank')->nullable();
    $table->string('qr_link')->nullable();

    // Store raw JSON callback
    $table->json('payload')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
