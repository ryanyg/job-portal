<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('phone_number');
            $table->string('dob');
            $table->string('gender');
            $table->string('address');
            $table->string('skill');
            $table->string('edu_attainment');
            $table->string('school');
            $table->string('field_of_study');
            $table->string('date_graduated');
            $table->string('avatar');
            $table->string('resume');
            $table->string('work_position');
            $table->string('work_company');
            $table->string('work_year_experience');
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
        Schema::dropIfExists('profiles');
    }
}
