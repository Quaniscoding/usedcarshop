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
        Schema::create('order_details_supplier', function (Blueprint $table) {
            $table->id(); // ID của chi tiết đơn hàng
            $table->foreignId('order_supplier_id')->constrained('order_supplier')->cascadeOnDelete(); // Liên kết đến bảng orders
            $table->foreignId('supply_item_id')->constrained('supply_items')->cascadeOnDelete(); // Liên kết đến bảng supply_items
            $table->integer('quantity')->default(1); // Số lượng hàng hóa
            $table->decimal('price', 20, 2); // Giá của từng mục hàng hóa
            $table->decimal('total', 20, 2); // Tổng tiền (price * quantity)
            $table->string('status')->default('pending'); // Trạng thái của mục hàng hóa
            $table->text('notes')->nullable(); // Ghi chú
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details_supplier');
    }
};