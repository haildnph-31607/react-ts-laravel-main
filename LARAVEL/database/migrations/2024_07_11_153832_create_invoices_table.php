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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('invoice_number')->unique(); // Mã hóa đơn
            $table->date('invoice_date'); // Ngày đặt
            $table->decimal('total_amount', 15, 2); // Tổng số lượng
            $table->decimal('discount', 15, 2)->nullable(); // Giảm giá
            $table->decimal('grand_total', 15, 2); // Tổng tiền
            $table->string('status')->default('Unpaid');
            $table->string('payment_method')->nullable(); // Hình thức thanh toán
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('invoices');
    }
};
