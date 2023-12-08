<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type',200)->nullable();
            $table->string('test_titles',200)->nullable();
            $table->string('ibnpatientcheck',200)->nullable();
            $table->string('appointment_id',200)->nullable();
            $table->string('invoice_number',200)->nullable();
            $table->string('url',200)->nullable();
            $table->string('amount',200)->nullable();
            $table->string('patient_id',200)->nullable();
            $table->string('appointment_date',200)->nullable();
            $table->string('location_id',200)->nullable();
            
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
        Schema::dropIfExists('invoices');
    }
}
