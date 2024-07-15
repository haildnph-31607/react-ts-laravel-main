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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->integer('discount');
            $table->integer('minimum');
            $table->unsignedBigInteger('id_types');
            $table->timestamp('start')->nullable()->comment('Ngày bắt đầu');
            $table->timestamp('end')->nullable()->comment('Ngày kết thúc');
            $table->timestamps();

            $table->foreign('id_types')->references('id')->on('promotion_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
