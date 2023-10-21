<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_course', function (Blueprint $table) {
            $table->id();
            $table->string('course_type');
            $table->string('coupon_type');
            $table->string('course_title');
            $table->string('instructor_name');
            $table->string('price');
            $table->string('image');
            $table->date('start_date');
            $table->date('next_date');
            $table->string('no_of_seats');
            $table->longText('short_desc');
            $table->longText('about_course');
            $table->longText('learning_objective');
            $table->longText('upcoming_cohort');
            $table->longText('afordble_price');
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
        Schema::dropIfExists('tbl_course');
    }
}
