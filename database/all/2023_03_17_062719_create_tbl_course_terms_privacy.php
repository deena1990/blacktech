<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCourseTermsPrivacy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_course_terms_privacy', function (Blueprint $table) {
            $table->id();
            $table->string('term_use_heading');
            $table->longText('term_use_description');
            $table->string('refund_heading');
            $table->longText('refund_description');
            $table->string('rescheduling_heading');
            $table->longText('rescheduling_description');
            $table->string('privacy_heading');
            $table->longText('privacy_description');
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
        Schema::dropIfExists('tbl_course_terms_privacy');
    }
}
