<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('location_day_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->string('day_of_week')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->unique([
                'location_id',
                'day_of_week',
            ]);
        });
    }

    public function down()
    {
        Schema::dropIfExists('location_day_timings');
    }
};