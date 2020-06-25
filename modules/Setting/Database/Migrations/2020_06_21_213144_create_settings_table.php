<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('setting_key')->unique();
            $table->string('value')->nullable();
            $table->string('class')->default('form-control');
            $table->string('placeholder')->nullable();
            $table->string('hint')->nullable();
            $table->string('type')->default('text');
            $table->foreignId('setting_group_id')->references('id')->on('setting_groups');
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
        Schema::dropIfExists('settings');
    }
}
