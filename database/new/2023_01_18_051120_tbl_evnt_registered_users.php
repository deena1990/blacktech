<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblEvntRegisteredUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('tbl_evnt_registered_users', function (Blueprint $table) {
        $table->id();
        $table->string('event_id');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('gender');
        $table->string('phone');
        $table->string('email');
        $table->string('city');
        $table->string('country');
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
        Schema::dropIfExists('tbl_evnt_registered_users');
    }
}
