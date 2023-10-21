<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCntfooter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cntfooter', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('email');
            $table->string('phone');
            $table->string('linkedIn');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->longText('beginyourJourney');
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
        Schema::dropIfExists('tbl_cntfooter');
    }
}
