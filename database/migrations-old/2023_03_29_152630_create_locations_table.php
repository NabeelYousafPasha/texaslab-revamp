<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('days',200)->nullable();
            $table->string('name',200)->nullable();
            $table->string('phone',200)->nullable();
            $table->string('fax',200)->nullable();
            $table->string('address',200)->nullable();
            $table->string('user_id',200)->nullable();
            $table->string('city',200)->nullable();
            $table->string('clia',200)->nullable();
            $table->integer('stateId')->nullable();
            $table->string('zipcode',200)->nullable();
            $table->string('disabled_dates',200)->nullable();
            $table->string('disabled_time_slot',200)->nullable();
            $table->string('alt_phone',200)->nullable();
            $table->string('alt_fax',200)->nullable();
            $table->string('paymentmethod',200)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->longtext('tests')->nullable();
            $table->longtext('panels')->nullable();
            $table->string('longitude',200)->nullable();
            $table->string('lattitude',200)->nullable();
            $table->integer('hours_1')->nullable();
            $table->tinyInteger('location_type')->nullable();
            $table->integer('hours_2')->nullable();
            $table->integer('same_day')->nullable();
            $table->time('start_time')->nullable();
            $table->string('block_start_time',200)->nullable();
            $table->string('block_end_time',200)->nullable();
            $table->time('end_time')->nullable();
            $table->integer('time_interval')->nullable();
            $table->string('sales_rep_code')->nullable();
            $table->integer('block_limit')->nullable();
            $table->longtext('ibn_sina_term_and_cindition')->nullable();
            $table->longtext('disabled_appointment_dates')->nullable();
            $table->text('terms_and_condition')->nullable();
            $table->string('accountholder',200)->nullable();
            $table->string('accountcurrenct',200)->nullable();
            $table->string('bankname',200)->nullable();
            $table->string('stripe_key',200)->nullable();
            $table->string('stripe_secret',200)->nullable();
            $table->string('accountno',200)->nullable();
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
        Schema::dropIfExists('locations');
    }
}
