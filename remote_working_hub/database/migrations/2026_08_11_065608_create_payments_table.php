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
            $table->string('transaction_id')->unique()->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->decimal('amount', $total = 8, $places = 2);
            $table->string('fname');
            $table->string('lname');
            $table->foreignId('customer_id')->constrained()->onDelete('restrict');
            $table->foreignId('invoice_id')->constrained()->onDelete('restrict');
            $table->foreignId('package_id')->constrained()->onDelete('restrict');
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
