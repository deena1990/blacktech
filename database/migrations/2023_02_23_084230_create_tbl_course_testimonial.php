<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCourseTestimonial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_course_testimonial', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->string('name');
            $table->string('destination');
            $table->string('about');
            $table->string('brand_image');
            $table->string('profile_img');
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
        Schema::dropIfExists('tbl_course_testimonial');
    }
}
