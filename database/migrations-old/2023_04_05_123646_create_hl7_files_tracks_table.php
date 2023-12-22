<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHl7FilesTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hl7_files_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_id')->nullable();
            $table->longText('result_names')->nullable();
            $table->integer('patient_id')->nullable();
            $table->longText('test_names')->nullable();
            $table->longText('result_values')->nullable();
            $table->longText('result_units')->nullable();
            $table->longText('result_rangs')->nullable();
            $table->longText('result_flags')->nullable();
            $table->text('result_notes')->nullable();
            $table->string('file_name',200)->nullable();
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
        Schema::dropIfExists('hl7_files_tracks');
    }
}
