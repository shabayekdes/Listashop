<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valuables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->decimal('price', 18, 4)->nullable();
            $table->string('price_type', 10)->nullable();
            $table->unsignedInteger('position');
            $table->unsignedInteger('valuable_id');
            $table->string('valuable_type');
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
        Schema::dropIfExists('valuables');
    }
}
