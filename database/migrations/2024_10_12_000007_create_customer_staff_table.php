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
        Schema::create('customer_staff', function (Blueprint $table) {
            $table->id(); // ID của nhân viên
            $table->string('name'); // Tên nhân viên
            $table->string('email')->unique(); // Email duy nhất
            $table->string('phone')->nullable(); // Số điện thoại
            $table->string('role')->default('support'); // Vai trò của nhân viên (ví dụ: support, manager, etc.)
            $table->string('status')->default('active'); // Trạng thái của nhân viên (active, inactive, etc.)
            $table->string('avatar')->nullable(); // Ảnh đại diện (nếu có)
            $table->string('password'); // Mật khẩu để đăng nhập
            $table->rememberToken(); // Token để quản lý phiên đăng nhập
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_staff');
    }
};