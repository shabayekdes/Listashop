<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');

            // $table->boolean('is_guest')->default(true);
            // $table->string('customer_email')->nullable();
            // $table->string('customer_first_name')->nullable();
            // $table->string('customer_last_name')->nullable();

            // $table->string('coupon_code')->nullable();

            $table->integer('item_count');

            $table->decimal('grand_total', 12, 4)->default(0);

            // $table->string('payment_gateway')->default('stripe');
            $table->integer('payment_method')->comment("1- COD, 2- credit card, 3- paypal");
            $table->integer('payment_status')->default(1)->comment("1- Pending, 2- Paid");
            $table->integer('order_status')->default(1);

            $table->foreignId('customer_id')->nullable()->references('id')->on('customers')->onDelete('set null');
            $table->foreignId('customer_address_id')->nullable()->references('id')->on('customer_addresses');

            $table->json('error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
