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
        Schema::create('supply_item_refurbished', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->cascadeOnDelete();
            $table->foreignId('supply_item_id')->constrained('supply_items')->cascadeOnDelete();
            $table->decimal('refurbished_price', 20, 2)->nullable();
            $table->text('refurbished_description')->nullable();
            $table->date('refurbished_date')->nullable();
            $table->enum('refurbished_status', ['in_progress', 'completed', 'cancelled'])->default('in_progress');
            $table->json('refurbished_images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_item_refurbished');
    }
};