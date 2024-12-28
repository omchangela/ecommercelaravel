<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming there's a 'users' table
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street_address');
            $table->string('apt_suite')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('country');
            $table->string('email');
            $table->string('phone');
            $table->boolean('billing_same_as_shipping')->default(false);
            $table->json('cart_items');
            $table->decimal('total_price', 8, 2);
            $table->string('razorpay_payment_id');
            $table->string('razorpay_order_id');
            $table->string('razorpay_signature');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('order_payments');
    }
}
