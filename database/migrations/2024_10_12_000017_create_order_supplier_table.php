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
        Schema::create('order_supplier', function (Blueprint $table) {
            $table->id(); // ID của đơn đặt hàng
            $table->foreignId('supplier_id')->constrained('supplier')->cascadeOnDelete(); // Liên kết đến bảng supplier
            $table->foreignId('staff_id')->constrained('staff')->cascadeOnDelete(); // Nhân viên tạo đơn hàng
            $table->string('order_number')->unique(); // Số đơn đặt hàng duy nhất
            $table->date('order_date')->nullable(); // Ngày tạo đơn hàng
            $table->date('expected_delivery_date')->nullable(); // Ngày giao hàng dự kiến
            $table->decimal('total_amount', 20, 2)->nullable(); // Tổng tiền của đơn hàng
            $table->string('status')->default('pending'); // Trạng thái đơn hàng (pending, confirmed, completed, canceled)
            $table->text('notes')->nullable(); // Ghi chú thêm
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_supplier');
    }
};