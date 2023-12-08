<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('result_id')->nullable();
            $table->integer('patientLocationId')->nullable();
            $table->integer('patient_id')->nullable();
            $table->string('category_id',200)->nullable();
            $table->string('single_tests',200)->nullable();
            $table->string('sample_id',200)->nullable();
            $table->string('panel_tests',200)->nullable();
            $table->integer('locationId')->nullable();
            $table->string('test_result',200)->nullable();
            $table->date('appointment')->nullable();
            $table->string('term_id',200)->nullable();
            $table->integer('blood')->nullable();
            $table->string('additional_doc',200)->nullable();
            $table->string('ibn_result_document',200)->nullable();
            $table->string('timeslot',200)->nullable();
            $table->string('result_type',200)->nullable();
            $table->integer('paid_or_free')->nullable();
            $table->tinyInteger('rapid_test_status')->nullable();
            $table->integer('checkin')->nullable();
            $table->string('front',200)->nullable();
            $table->string('back',200)->nullable();
            $table->string('hl7resultpdf',200)->nullable();
            $table->string('hl7emailstatus',200)->nullable();
            $table->integer('generatereceipt')->nullable();
            $table->string('total_price',200)->nullable();
            $table->string('cupon_code',200)->nullable();
            $table->string('invoice_id',200)->nullable(); 
            $table->string('payment_id',200)->nullable();
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
        Schema::dropIfExists('patient_appointments');
    }
}
