<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_id',200)->nullable();
            $table->string('patient_id',200)->nullable();
            $table->string('pcr_result_document',200)->nullable();
            $table->string('test_result',200)->nullable();
            $table->string('pcr_result_status',200)->nullable();
            $table->string('result_id',200)->nullable();

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
        Schema::dropIfExists('result_statuses');
    }
}
