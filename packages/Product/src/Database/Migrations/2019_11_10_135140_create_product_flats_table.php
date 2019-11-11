<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_flats', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('sku');
            $table->string('name');
            $table->decimal('price', 12, 4)->nullable();
            $table->decimal('cost', 12, 4);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('thumbnail')->nullable();

            $table->boolean('new')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('special_price')->nullable();
            // $table->date('special_price_from')->nullable();
            // $table->date('special_price_to')->nullable();

            $table->text('description')->nullable();
            $table->text('short_description')->nullable();

            // $table->decimal('weight', 12, 4)->nullable();
            // $table->decimal('width', 12, 4)->nullable();
            // $table->decimal('height', 12, 4)->nullable();
            // $table->decimal('depth', 12, 4)->nullable();

            // $table->text('meta_title')->nullable();
            // $table->text('meta_keywords')->nullable();
            // $table->text('meta_description')->nullable();

            $table->unsignedBigInteger('product_id');

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_flats');
    }
}