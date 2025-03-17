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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing UNSIGNED BIGINT primary key column named 'id'
            $table->string('code', 64)->unique(); // VARCHAR(64) with unique constraint
            $table->string('name', 256); // VARCHAR(256)
            $table->unsignedInteger('price'); // UNSIGNED INT(10)
            $table->string('model', 128); // VARCHAR(128)
            $table->text('description')->nullable(); // TEXT, nullable
            $table->string('photo', 128)->nullable(); // VARCHAR(128), nullable
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
            $table->softDeletes(); // Adds 'deleted_at' column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
