<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcurementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_procurement_id')->unsigned();
            $table->string('judul', 255);
            $table->longText('content');
            $table->integer('content_index')->unsigned();
            $table->date('mulai');
            $table->date('selesai');
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::table('procurement', function (Blueprint $table) {
            $table->foreign('master_procurement_id')
                  ->references('id')->on('master_procurement')
                  ->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procurement');
    }
}
