<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_postal_code');
            $table->string('shipping_province');
            $table->string('payment_method');
            $table->decimal('total_amount', 12, 2);
            $table->enum('status', [
                'pending_payment',
                'payment_uploaded',
                'payment_verified',
                'processing',
                'shipped',
                'delivered',
                'cancelled'
            ])->default('pending_payment');
            $table->text('order_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};