<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('product_review_media', function (Blueprint $table) {
        $table->id();
        $table->foreignId('review_id')->constrained('product_reviews')->cascadeOnDelete();

        $table->string('media_path');  // foto / video
        $table->string('media_type');  // image / video

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_review_media');
    }
};
