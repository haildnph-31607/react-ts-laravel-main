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
            // $table->foreignId('customer_id')->constrained();
            $table->unsignedBigInteger('customer_id');
            $table->string('invoice_number')->unique();//mã háo đơn
            $table->date('invoice_date'); // ngày đặt
            $table->decimal('total_amount', 15, 2);// tổng số lượng
            $table->decimal('discount', 15, 2)->nullable(); // giảm giá
            $table->decimal('grand_total', 15, 2); // tồng tiền
            $table->string('status')->default('Unpaid');
            $table->string('payment_method')->nullable();// hình thức thanh toán
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
