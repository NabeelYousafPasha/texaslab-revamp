<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('location_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->time('block_start_time')->nullable();
            $table->time('block_end_time')->nullable();
            $table->integer('time_interval')->nullable();
            $table->integer('block_limit')->nullable();
            $table->timestamps();

            $table->unique('location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaction_timings_table');
    }
};
