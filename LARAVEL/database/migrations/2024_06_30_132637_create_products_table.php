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
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Tạo cột id với auto_increment
            $table->string('name', 50);
            $table->unsignedBigInteger('price');
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('id_sales')->nullable();
            $table->unsignedBigInteger('id_category');  // Tạo cột id_category mà không có auto_increment
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
