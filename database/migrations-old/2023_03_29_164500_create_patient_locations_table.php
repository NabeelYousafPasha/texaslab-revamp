<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_id')->nullable();
            $table->string('city',200)->nullable();
            $table->string('statename',200)->nullable();
            $table->string('address',200)->nullable();
            $table->string('county',200)->nullable();
            $table->string('zipcode',200)->nullable();
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
        Schema::dropIfExists('patient_locations');
    }
}
