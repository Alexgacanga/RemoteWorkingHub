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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('receipt_number')->unique();
            $table->decimal('total_amount', $total = 8, $places = 2);
            $table->enum('payment_method', ['mpesa', 'cash']);
            $table->timestamps('issued_at');
            $table->foreignId('package_id')->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->nullOnDelete();
            $table->foreignId('customer_id')->constrained()->nullOnDelete();
            $table->foreignId('payment_id')->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
