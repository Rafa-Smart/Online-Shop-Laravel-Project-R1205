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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')
                ->constrained('buyers')
                ->cascadeOnDelete();
            $table->foreignId('seller_id')
                ->constrained('sellers')
                ->cascadeOnDelete();
            $table->enum('status', allowed: ['pending', 'paid', 'shipped', 'completed', 'cancelled'])->default('pending');
            $table->integer('total_price');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
