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
            $table->decimal('price', 18, 4)->nullable();
            $table->string('price_type', 10)->nullable();
            $table->foreignId('product_option_id')->references('id')->on('product_options')->onDelete('cascade');
            $table->foreignId('option_value_id')->references('id')->on('option_values')->onDelete('cascade');
            $table->primary(['product_option_id', 'option_value_id'], 'product_option_id_option_value_id_primary');

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
