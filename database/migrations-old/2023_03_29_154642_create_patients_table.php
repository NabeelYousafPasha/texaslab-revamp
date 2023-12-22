<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 200)->nullable();
            $table->string('last_name', 200)->nullable();
            $table->string('full_name', 200)->nullable();
            $table->string('email_address', 200)->nullable();
            $table->string('parent_name', 200)->nullable();
            $table->string('relation_name', 200)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('ethnicity', 200)->nullable();
            $table->string('cell_phone', 200)->nullable();
            $table->string('patientrace', 200)->nullable();
            $table->string('zipcode', 200)->nullable();
            $table->string('city', 200)->nullable();
            $table->text('address')->nullable();
            $table->string('county', 200)->nullable();
            $table->string('front', 200)->nullable();
            $table->string('back', 200)->nullable();
            $table->tinyInteger('parent_checkbox')->nullable();
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
        Schema::dropIfExists('patients');
    }
}