<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSpeakers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_speakers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('speaker_name');
            $table->string('job_title');
            $table->string('company');
            $table->longText('brief_description');
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
        Schema::dropIfExists('tbl_speakers');
    }
}
