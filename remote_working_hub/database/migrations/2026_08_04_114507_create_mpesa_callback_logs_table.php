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
        Schema::create('mpesa_callback_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('transaction_id')->unique();
            $table->string('bill_reference')->unique();
            $table->date('transaction_time');
            $table->decimal('transaction_amount', 10, 2);
            $table->string('phone_number');
            $table->string('fname');
            $table->string('lname');
            $table->json('payload');
            $table->string('status')->default('RECEIVED');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_callback_logs');
    }
};
