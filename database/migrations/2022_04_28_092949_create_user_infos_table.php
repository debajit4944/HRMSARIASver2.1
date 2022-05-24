<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('phno');
            $table->string('gender');
            $table->string('addr');
            $table->string('pincode');
            $table->string('state');
            $table->string('addrdistrict');
            $table->date('dob');
            $table->string('idtype');
            $table->string('idno');
            $table->string('ifsccode');
            $table->string('bankaccno');
            $table->bigInteger('project_id');
            $table->date('doj');
            $table->bigInteger('designation_id');
            $table->bigInteger('category_id');
            $table->bigInteger('organisation_id');
            $table->bigInteger('district_id');
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
        Schema::dropIfExists('user_infos');
    }
};
