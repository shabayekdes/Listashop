<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 12, 4);
            $table->decimal('cost', 12, 4);

            $table->boolean('status')->default(true);

            $table->boolean('new')->nullable();
            $table->boolean('featured')->nullable();
            $table->string('thumbnail')->nullable();
            $table->decimal('special_price', 12, 4)->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();

            $table->text('description')->nullable();
            $table->text('short_description')->nullable();

            // $table->decimal('weight', 12, 4)->nullable();
            // $table->decimal('width', 12, 4)->nullable();
            // $table->decimal('height', 12, 4)->nullable();
            // $table->decimal('depth', 12, 4)->nullable();

            // $table->text('meta_title')->nullable();
            // $table->text('meta_keywords')->nullable();
            // $table->text('meta_description')->nullable();

            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}