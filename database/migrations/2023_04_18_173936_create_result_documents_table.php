<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_documents', function (Blueprint $table) {
            $table->id();
            $table->string('file_name',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('full_name',200)->nullable();
            $table->string('url',200)->nullable();
            $table->integer('patient_id')->nullable();
            $table->string('type',200)->nullable();
            $table->string('email_status',200)->nullable();
            $table->string('sms_status',200)->nullable();
            $table->string('appointment_id',200)->nullable();
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
        Schema::dropIfExists('result_documents');
    }
}
