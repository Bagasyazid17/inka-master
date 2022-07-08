<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporation_id')->unsigned()->nullable();
            $table->string('bahasa', 255);
            $table->string('nama', 255);
            $table->boolean('has_sub')->nullable();
            $table->longtext('content')->nullable();
            $table->integer('content_index')->unsigned()->nullable();
            $table->integer('status')->unsigned()->default(0);
            $table->integer('urutan')->unsigned()->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporation');
    }
}
