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
        Schema::table('products', function (Blueprint $table) {
            //
            // $table->unsignedInteger('category_id')->after('ten_san_pham')->nullable();
            //Nối khoá
            $table->unsignedInteger('category_id')->after('ten_san_pham')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //

            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};