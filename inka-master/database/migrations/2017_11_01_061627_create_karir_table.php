<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKarirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karir', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->longText('content');
            $table->integer('content_index')->unsigned();
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
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
        Schema::dropIfExists('karir');
    }
}
