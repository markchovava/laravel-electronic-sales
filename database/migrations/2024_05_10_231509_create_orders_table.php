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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('order_ref')->nullable();
            $table->string('status')->nullable();
            $table->longText('message')->nullable();
            $table->bigInteger('products_total')->nullable();
            $table->bigInteger('products_quantity')->nullable();
            $table->string('delivery_name')->nullable();
            $table->bigInteger('delivery_fee')->nullable();
            $table->bigInteger('order_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
