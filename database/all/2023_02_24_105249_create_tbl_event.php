<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->longText('about_event');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('event_wblink');
            $table->string('event_speakers');
            $table->integer('status');
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
        Schema::dropIfExists('tbl_event');
    }
}
