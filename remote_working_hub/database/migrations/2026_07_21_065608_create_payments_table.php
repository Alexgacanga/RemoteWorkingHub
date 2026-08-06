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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('payment_method', ['CASH', 'MPESA']);
            $table->string('bill_reference')->nullable();
            $table->string('transaction_id')->unique();
            $table->dateTime('payment_date')->nullable();
            $table->string('phone_number');
            $table->decimal('amount', $total = 8, $places = 2);
            $table->string('fname');
            $table->string('lname');
            $table->foreignId('customer_id')->constrained()->nullOnDelete();
            $table->foreignId('invoice_id')->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->nullable()->nullOnDelete();
            $table->foreignId('package_id')->constrained()->nullOnDelete();
            $table->foreignId('receipt_id')->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
