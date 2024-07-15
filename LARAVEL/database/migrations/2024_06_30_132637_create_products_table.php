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
            $table->id();
            $table->string('name', 50);
            $table->unsignedBigInteger('price');
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('id_sales')->nullable();
            $table->unsignedBigInteger('id_category');

            $table->foreign('id_sales')->references('id')->on('sales')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('id_category')->references('id')->on('categories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->timestamps();
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
