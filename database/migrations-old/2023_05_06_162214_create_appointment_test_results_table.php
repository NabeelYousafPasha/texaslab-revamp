<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_test_results', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_id')->nullable();
            $table->string('low_value')->nullable();
            $table->string('modrate_value')->nullable();
            $table->string('high_value')->nullable();
            $table->string('test_name')->nullable();
            $table->string('result_status')->nullable();
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
        Schema::dropIfExists('appointment_test_results');
    }
}
