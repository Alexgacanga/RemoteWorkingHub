<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug')->unique();
        });
        DB::table('permissions')->insert([
            ['name' => 'Create Users', 'slug' => 'create-users'],
            ['name' => 'Edit Users', 'slug' => 'edit-users'],
            ['name' => 'Delete Users', 'slug' => 'delete-users'],
            ['name' => 'View Users', 'slug' => 'view-users'],
            ['name' => 'Create Roles', 'slug' => 'create-roles'],
            ['name' => 'Edit Roles', 'slug' => 'edit-roles'],
            ['name' => 'Delete Roles', 'slug' => 'delete-roles'],
            ['name' => 'View Roles', 'slug' => 'view-roles'],
            ['name' => 'Create Packages', 'slug' => 'create-packages'],
            ['name' => 'Edit Packages', 'slug' => 'edit-packages'],
            ['name' => 'Delete Packages', 'slug' => 'delete-packages'],
            ['name' => 'View Packages', 'slug' => 'view-packages'],
            ['name' => 'Create Options', 'slug' => 'create-options'],
            ['name' => 'Edit Options', 'slug' => 'edit-options'],
            ['name' => 'View Options', 'slug' => 'view-options'],
            ['name' => 'Delete Options', 'slug' => 'delete-options'],
            ['name' => 'Manage Payments', 'slug' => 'payments'],
            ['name' => 'Manage Subscriptions', 'slug' => 'subscriptions'],
            ['name' => 'Manage Invoices', 'slug' => 'invoices'],
            ['name' => 'Manage Sales', 'slug' => 'sales'],
            ['name' => 'Manage Revenue', 'slug' => 'revenue'],
            ['name' => 'Manage Customers', 'slug' => 'customers'],
            ['name' => 'Manage Expenses', 'slug' => 'expenses'],
            ['name' => 'Manage Receipts', 'slug' => 'receipts']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
