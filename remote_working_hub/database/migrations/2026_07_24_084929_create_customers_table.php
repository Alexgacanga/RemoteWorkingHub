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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->unique();
            $table->timestamps();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->string('id_no')->unique()->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('password_reset_tokens');
    }
};
