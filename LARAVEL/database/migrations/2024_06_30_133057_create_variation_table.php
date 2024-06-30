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
        Schema::create('variation', function (Blueprint $table) {
            $table->id();  // Tạo cột id với auto_increment
            $table->unsignedBigInteger('id_product');  // Tạo cột id_product mà không có auto_increment
            $table->unsignedBigInteger('id_color');  // Tạo cột id_color mà không có auto_increment
            $table->unsignedBigInteger('id_size');  // Tạo cột id_size mà không có auto_increment
            $table->string('status');  // Tạo cột status với kiểu dữ liệu phù hợp
            $table->float('price');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation');
    }
};
