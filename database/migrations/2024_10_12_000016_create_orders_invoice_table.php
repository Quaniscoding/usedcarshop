<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders_invoice', function (Blueprint $table) {
            $table->id(); // ID của hóa đơn
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete(); // Liên kết đến bảng orders
            $table->string('invoice_number')->unique(); // Số hóa đơn
            $table->decimal('total_amount', 10, 2); // Tổng số tiền trên hóa đơn
            $table->decimal('tax_amount', 10, 2)->nullable(); // Tiền thuế (nếu có)
            $table->decimal('discount_amount', 10, 2)->nullable(); // Tiền giảm giá (nếu có)
            $table->string('payment_status')->default('unpaid'); // Trạng thái thanh toán của hóa đơn
            $table->date('invoice_date')->nullable(); // Ngày phát hành hóa đơn
            $table->date('due_date')->nullable(); // Ngày đến hạn thanh toán
            $table->text('notes')->nullable(); // Ghi chú
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_invoice');
    }
};