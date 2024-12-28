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
        Schema::create('order_supplier_invoices', function (Blueprint $table) {
            $table->id(); // ID của hóa đơn
            $table->foreignId('order_supplier_id')
                ->constrained('order_supplier')
                ->cascadeOnDelete(); // Liên kết đến bảng order_suppliers
            $table->string('invoice_number')->unique(); // Số hóa đơn duy nhất
            $table->date('invoice_date')->nullable(); // Ngày phát hành hóa đơn
            $table->date('due_date')->nullable(); // Ngày đến hạn thanh toán
            $table->decimal('total_amount', 20, 2); // Tổng số tiền hóa đơn
            $table->decimal('tax_amount', 20, 2)->default(0); // Thuế (mặc định là 0)
            $table->decimal('discount_amount', 20, 2)->default(0); // Giảm giá (mặc định là 0)
            $table->string('payment_status')->default('unpaid'); // Trạng thái thanh toán của hóa đơn
            $table->string('currency')->default('USD'); // Loại tiền tệ (mặc định là USD)
            $table->text('notes')->nullable(); // Ghi chú bổ sung
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_supplier_invoice');
    }
};