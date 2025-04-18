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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            //tên, email, số điên thoại, tiêu đề, nội dung
            $table->string('viết_danh');
            $table->string('email');
            $table->string('so_dien_thoai')->nullable();
            $table->string('tieu_de')->nullable();
            $table->text('noi_dung'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};