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
        Schema::create('table_order', function (Blueprint $table) {
            $table->id();
            $table->string('order_details');
            $table->date('order_date');
            $table->integer('order_quantity');
            $table->decimal('total_amount');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('table_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_order');
    }
};
