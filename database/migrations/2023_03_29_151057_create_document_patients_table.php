<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_patients', function (Blueprint $table) {
            $table->id();
            $table->string('url',200)->nullable();
            $table->Integer('patient_id')->nullable();
            $table->string('type',200)->nullable();
            $table->Integer('appointment_id')->nullable();
            
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
        Schema::dropIfExists('document_patients');
    }
}
