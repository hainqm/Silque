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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            //tên,tên sản phẩm, số sao, nội dung đánh giá,
            $table->string('ten_nguoi_dung');
            $table->string('ten_san_pham');
            $table->integer('so_sao')->nullable();
            $table->text('noi_dung_danh_gia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
