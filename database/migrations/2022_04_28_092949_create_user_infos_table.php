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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('gender')->nullable();
            $table->string('addr')->nullable();
            $table->string('pincode')->nullable();
            $table->string('state')->nullable();
            $table->string('addrdistrict')->nullable();
            $table->date('dob')->nullable();
            $table->string('idtype')->nullable();
            $table->string('idno')->nullable();
            $table->string('ifsccode')->nullable();
            $table->string('bankaccno')->nullable();
            $table->bigInteger('project_id')->nullable();
            $table->date('doj')->nullable();
            $table->bigInteger('designation_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('organisation_id')->nullable();
            $table->bigInteger('district_id')->nullable();
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
