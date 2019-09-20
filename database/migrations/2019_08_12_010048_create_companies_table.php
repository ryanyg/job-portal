<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('company_name');
            $table->string('crte');
            $table->string('validity');
            $table->string('description');
            $table->string('industry');
            $table->string('address');
            $table->string('website');
            $table->string('logo');
            //company representative
            $table->string('rep_fullname');
            $table->string('rep_position');
            $table->string('rep_email');
            $table->string('rep_contact');
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
        Schema::dropIfExists('companies');
    }
}
