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
            $table->string('category');
        });
        DB::table('permissions')->insert([
            ['name' => 'Create Users', 'slug' => 'create-users', 'category' => 'Users'],
            ['name' => 'Edit Users', 'slug' => 'edit-users', 'category' => 'Users'],
            ['name' => 'Delete Users', 'slug' => 'delete-users', 'category' => 'Users'],
            ['name' => 'View Users', 'slug' => 'view-users', 'category' => 'Users'],

            ['name' => 'Create Roles', 'slug' => 'create-roles', 'category' => 'Roles'],
            ['name' => 'Edit Roles', 'slug' => 'edit-roles', 'category' => 'Roles'],
            ['name' => 'Delete Roles', 'slug' => 'delete-roles', 'category' => 'Roles'],
            ['name' => 'View Roles', 'slug' => 'view-roles', 'category' => 'Roles'],

            ['name' => 'Create Packages', 'slug' => 'create-packages', 'category' => 'Packages'],
            ['name' => 'Edit Packages', 'slug' => 'edit-packages', 'category' => 'Packages'],
            ['name' => 'Delete Packages', 'slug' => 'delete-packages', 'category' => 'Packages'],
            ['name' => 'View Packages', 'slug' => 'view-packages', 'category' => 'Packages'],

            ['name' => 'Create Options', 'slug' => 'create-options', 'category' => 'Options'],
            ['name' => 'Edit Options', 'slug' => 'edit-options', 'category' => 'Options'],
            ['name' => 'View Options', 'slug' => 'view-options', 'category' => 'Options'],
            ['name' => 'Delete Options', 'slug' => 'delete-options', 'category' => 'Options'],

            ['name' => 'Manage Payments', 'slug' => 'payments', 'category' => 'Payments'],

            ['name' => 'Manage Subscriptions', 'slug' => 'subscriptions', 'category' => 'Subscriptions'],

            ['name' => 'Manage Invoices', 'slug' => 'invoices', 'category' => 'Invoices'],

            ['name' => 'Manage Sales', 'slug' => 'sales', 'category' => 'Sales'],

            ['name' => 'Manage Revenue', 'slug' => 'revenue', 'category' => 'Revenue'],

            ['name' => 'Manage Customers', 'slug' => 'customers', 'category' => 'Customers'],

            ['name' => 'Manage Expenses', 'slug' => 'expenses', 'category' => 'Expenses'],
            
            ['name' => 'Manage Receipts', 'slug' => 'receipts', 'category' => 'Receipts']
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
