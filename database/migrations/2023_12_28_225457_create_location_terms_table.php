<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('location_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->text('terms_and_conditions');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('location_terms');
    }
};
