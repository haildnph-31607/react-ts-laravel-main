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
        Schema::create('classify', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product')->unsigned();
            $table->string('classify');
            $table->float('price', 8, 2);
            $table->integer('quantity');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classify');
    }
};
