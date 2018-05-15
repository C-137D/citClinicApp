<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note');
            $table->string('drug');
            $table->string('quantity');
            $table->string('refill');
            $table->integer('patient_id')->nullable()->unsigned()->index();
            $table->foreign('patient_id')
            ->references('id')->on('patients')->onDelete('cascade');
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
        Schema::table('prescriptions', function (Blueprint $table) {
        $table->dropForeign('patient_id');
        });
        Schema::dropIfExists('prescriptions');
    }
}
