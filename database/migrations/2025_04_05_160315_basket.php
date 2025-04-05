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
        // Migration for basket table
Schema::create('basket', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who owns the basket
    $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Product in the basket
    $table->integer('quantity')->default(1); // Quantity of the product in the basket
    $table->timestamps();
});

        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
