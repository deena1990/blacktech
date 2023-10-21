<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCourseEnrollList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_course_enroll_list', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('paymentPlan');
            $table->string('name_on_card');
            $table->string('card_number');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('card_cvv');
            $table->string('course_id');
            $table->string('coupon_code');
            $table->string('paid_amount');
            $table->string('status');
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
        Schema::dropIfExists('tbl_course_enroll_list');
    }
}
