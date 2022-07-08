<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('home_setting');
        Schema::create('home_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->string('lang_id', 255);
            $table->integer('total_item')->unsigned()->nullable();
            $table->integer('column')->unsigned()->nullable();
            $table->string('link', 255)->nullable();
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
        Schema::dropIfExists('home_setting');
    }
}
