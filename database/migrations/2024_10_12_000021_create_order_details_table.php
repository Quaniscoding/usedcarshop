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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // ID của chi tiết đơn hàng
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete(); // Liên kết đến bảng orders
            $table->foreignId('supply_item_id')->constrained('supply_items')->cascadeOnDelete(); // Liên kết đến bảng supply_items
            $table->integer('quantity')->default(1); // Số lượng hàng hóa
            $table->decimal('price', 20, 2); // Giá mỗi sản phẩm
            $table->decimal('discount', 20, 2)->default(0); // Chiết khấu trên sản phẩm
            $table->enum('status', ['pending', 'confirmed', 'canceled', 'shipped'])->default('pending'); // Trạng thái sản phẩm trong đơn
            $table->text('notes')->nullable(); // Ghi chú
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};