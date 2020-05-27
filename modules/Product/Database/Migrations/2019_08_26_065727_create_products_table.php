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

            $table->string('name');

            $table->string('sku')->unique();
            $table->string('type');
            $table->string('slug');
            $table->unsignedInteger('qty')->default(10);
            $table->boolean('is_active')->default(true);

            $table->decimal('price', 12, 4)->nullable();
            $table->decimal('cost', 12, 4);
            $table->decimal('special_price', 12, 4)->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();

            $table->boolean('featured')->default(false);
            $table->boolean('new')->default(false);
            $table->datetime('new_from')->nullable();
            $table->datetime('new_to')->nullable();

            $table->string('thumbnail')->nullable();

            $table->text('description')->nullable();
            $table->text('short_description')->nullable();

            $table->unsignedBigInteger('category_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
