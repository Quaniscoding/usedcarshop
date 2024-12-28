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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // ID của khách hàng
            $table->foreignId('customer_staff_id')->constrained('customer_staff')->cascadeOnDelete(); // Liên kết đến bảng customer_staff
            $table->string('name'); // Tên khách hàng
            $table->string('first_name')->nullable(); // Họ
            $table->string('last_name')->nullable(); // Tên
            $table->string('email')->unique(); // Email duy nhất
            $table->timestamp('email_verified_at')->nullable(); // Thời điểm email được xác minh
            $table->string('password'); // Mật khẩu để đăng nhập
            $table->string('avatar')->nullable(); // Hình đại diện
            $table->string('phone')->nullable(); // Số điện thoại
            $table->string('address')->nullable(); // Địa chỉ
            $table->string('status')->default('active'); // Trạng thái khách hàng (active, inactive, banned)
            $table->rememberToken(); // Token để đăng nhập
            $table->timestamps(); // Thời gian tạo và cập nhật
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