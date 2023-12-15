<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisabledTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disabled_time_slots', function (Blueprint $table) {
            $table->id();
            $table->string('location_id',200)->nullable();
            $table->string('day1_status',200)->nullable();
            $table->string('day1_start',200)->nullable();
            $table->string('day1_end',200)->nullable();
            $table->string('day2_status',200)->nullable();
            $table->string('day2_start',200)->nullable();
            $table->string('day2_end',200)->nullable();
            $table->string('day3_status',200)->nullable();
            $table->string('day3_start',200)->nullable();
            $table->string('day3_end',200)->nullable();
            $table->string('day4_status',200)->nullable();
            $table->string('day4_start',200)->nullable();
            $table->string('day4_end',200)->nullable();
            $table->string('day5_status',200)->nullable();
            $table->string('day5_start',200)->nullable();
            $table->string('day5_end',200)->nullable();
            $table->string('day6_status',200)->nullable();
            $table->string('day6_start',200)->nullable();
            $table->string('day6_end',200)->nullable();
            $table->string('day7_status',200)->nullable();
            $table->string('day7_start',200)->nullable();
            $table->string('day7_end',200)->nullable();
            
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
        Schema::dropIfExists('disabled_time_slots');
    }
}
