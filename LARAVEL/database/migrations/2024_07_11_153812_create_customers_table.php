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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable()->comment('Địa chỉ chính xác');
            $table->string('district')->nullable()->comment('Huyện');
            $table->string('conscious')->nullable()->comment('Tỉnh');
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('id_user');


            $table->foreign('id_user')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
