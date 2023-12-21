<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('result_kpis', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('model')->nullable();

            $table->unique([
                'code',
                'model',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_kpis');
    }
};
