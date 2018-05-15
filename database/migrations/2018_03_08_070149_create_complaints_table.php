<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bP');
            $table->string('pR');
            $table->string('rR');
            $table->string('temp');
            $table->string('s');
            $table->string('o');
            $table->string('a');
            $table->string('p');
            $table->integer('patient_id')->nullable()->unsigned()->index();
            $table->foreign('patient_id')
            ->references('id')->on('patients')->onDelete('cascade');;      
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
        Schema::table('complaints', function (Blueprint $table) {
	        $table->dropForeign('patient_id');
        });
        Schema::dropIfExists('complaints');
    }
}
