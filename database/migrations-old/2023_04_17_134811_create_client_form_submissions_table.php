<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientFormSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_form_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('external_id',200)->nullable();
            $table->string('name',200)->nullable();
            $table->string('phone',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('fax',200)->nullable();
            $table->string('address',200)->nullable();
            $table->string('city',200)->nullable();
            $table->string('state',200)->nullable();
            $table->string('zip',200)->nullable();
            $table->string('county',200)->nullable();
            $table->string('primary_contact_title',200)->nullable();
            $table->string('number_providers',200)->nullable();
            $table->string('physician_name',200)->nullable();
            $table->string('npi',200)->nullable();
            $table->string('speciality',200)->nullable();
            $table->string('client_after_hour_phone',200)->nullable();
            $table->string('emr_vendor',200)->nullable();
            $table->string('est_specimens_per_day',200)->nullable();
            $table->string('client_hours',200)->nullable();
            $table->string('signature',200)->nullable();
            $table->string('will_you_accept_insurance',200)->nullable();
            $table->string('will_you_have_self_pay_Patients',200)->nullable();
            $table->string('new_clinic_or_established',200)->nullable();
            $table->string('contact_person',200)->nullable();
            $table->string('insurance',200)->nullable();
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
        Schema::dropIfExists('client_form_submissions');
    }
}
