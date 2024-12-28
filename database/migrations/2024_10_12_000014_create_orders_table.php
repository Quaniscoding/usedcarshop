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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete(); // Liên kết đến users (nếu có)
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete(); // Liên kết đến customers
            $table->foreignId('staff_id')->nullable()->constrained('staff')->cascadeOnDelete(); // Nhân viên quản lý đơn hàng
            $table->decimal('grand_total', 20, 2)->nullable(); // Tổng tiền đơn hàng
            $table->enum('payment_method', ['cash', 'credit_card', 'bank_transfer', 'paypal'])->nullable(); // Phương thức thanh toán
            $table->enum('payment_status', ['unpaid', 'paid', 'failed', 'refunded'])->default('unpaid'); // Trạng thái thanh toán
            $table->enum('status', ['new', 'processing', 'shipped', 'delivered', 'canceled'])->default('new'); // Trạng thái đơn hàng
            $table->string('currency')->default('USD'); // Đơn vị tiền tệ
            $table->decimal('shipping_amount', 20, 2)->default(0); // Phí giao hàng
            $table->string('shipping_method')->nullable(); // Phương thức giao hàng
            $table->string('tracking_code')->nullable(); // Mã theo dõi vận chuyển
            $table->timestamp('delivery_date')->nullable(); // Ngày giao hàng dự kiến
            $table->text('notes')->nullable(); // Ghi chú của khách hàng
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};