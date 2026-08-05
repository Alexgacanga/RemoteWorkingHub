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
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('phone')->nullable();
            $table->json('payload');
            $table->string('status')->default('RECEIVED');
            $table->timestamps();

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
