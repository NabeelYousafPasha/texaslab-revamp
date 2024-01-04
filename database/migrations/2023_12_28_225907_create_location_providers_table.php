<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('location_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('location_details');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('npi')->unique()->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('location_providers');
    }
};

