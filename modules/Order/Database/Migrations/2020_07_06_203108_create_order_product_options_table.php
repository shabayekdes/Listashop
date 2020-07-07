<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_option', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 18, 4)->unsigned()->nullable();

            $table->foreignId('order_product_id')->references('id')->on('order_product')->onDelete('cascade');
            $table->foreignId('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreignId('option_value_id')->references('id')->on('option_values')->onDelete('cascade');

            $table->unique(['order_product_id', 'option_id', 'option_value_id'],'order_product_option_value_unique');
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
        Schema::dropIfExists('order_product_options');
    }
}
