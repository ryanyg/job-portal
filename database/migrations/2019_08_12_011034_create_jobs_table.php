<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('company_id');
            $table->string('category');
            $table->string('position');
            $table->string('position_level');
            $table->integer('number_vacancy');
            $table->string('work_schedule');
            $table->text('description');
            //jobqualification
            $table->string('education');
            $table->string('work_experience');
            $table->string('gender');
            $table->string('type');
            $table->string('salary');
            $table->string('status');
            $table->string('skill');
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
        Schema::dropIfExists('jobs');
    }
}
