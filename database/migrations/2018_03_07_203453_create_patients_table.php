<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('studentId');
            $table->string('lName');
            $table->string('fName');
            $table->string('mName');
            $table->string('course');
            $table->string('year');
            $table->string('sex');
            $table->string('bod');
            $table->string('height');
            $table->string('weight');
            $table->string('age');
            $table->string('pic');
            $table->string('bloodType');
            $table->string('status');
            // address
            $table->string('address');
            $table->string('mobileNo');
            // in case of emergency
            $table->string('contactPerson');
            $table->string('relation');
            $table->string('addressEm');
            $table->string('landLine');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
