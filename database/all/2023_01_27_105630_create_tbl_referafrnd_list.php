<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblReferafrndList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_referafrnd_list', function (Blueprint $table) {
            $table->id();
            $table->string('u_firstname');
            $table->string('u_lastname');
            $table->string('u_email');
            $table->string('u_phone');
            $table->string('u_country');
            $table->string('u_city');
            $table->string('rec_course');
            $table->string('r_firstname');
            $table->string('r_lastname');
            $table->string('r_email');
            $table->string('r_phone');
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
        Schema::dropIfExists('tbl_referafrnd_list');
    }
}
