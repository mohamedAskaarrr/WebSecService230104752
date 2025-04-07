<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('basket_product', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('basket_id');
        $table->unsignedBigInteger('product_id');
        $table->integer('quantity')->default(1);
        $table->timestamps();

        $table->foreign('basket_id')->references('id')->on('basket')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        $table->unique(['basket_id', 'product_id']); // prevent duplicates
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket_product');
    }
};
