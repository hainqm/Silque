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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            //tên, tuổi, địa chỉ, giới tính, email.
            $table->string('ten_khach_hang');
            $table->unsignedInteger('tuoi');
            $table->string('email')->unique()->nullable();
            $table->text('dia_chi')->nullable();
            $table->string('gioi_tinh',10);


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
