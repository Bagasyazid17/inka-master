<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB as DB;

class CreatePreviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preview', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->longText('content');
            $table->timestamps();
        });

        DB::unprepared('CREATE EVENT IF NOT EXISTS deletePreview
            ON SCHEDULE
                EVERY 1 HOUR
            DO
                BEGIN
                DELETE FROM preview WHERE updated_at < DATE_SUB(NOW(), INTERVAL 1 HOUR);
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preview');
    }
}
