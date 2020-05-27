<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option_value', function (Blueprint $table) {
            $table->unsignedInteger('product_option_id');
            $table->unsignedBigInteger('value_id');
            $table->decimal('price', 18, 4)->nullable();
            $table->string('price_type', 10)->nullable();
            $table->primary(['product_option_id', 'value_id'], 'product_option_id_value_id_primary');
            $table->foreign('product_option_id')->references('id')->on('product_options')->onDelete('cascade');
            $table->foreign('value_id')->references('id')->on('values')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_option_value');
    }
}
