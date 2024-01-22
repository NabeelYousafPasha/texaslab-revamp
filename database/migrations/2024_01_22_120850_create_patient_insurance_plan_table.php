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
        Schema::create('patient_insurance_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_insurance_id')->constrained('patient_insurances');
            $table->foreignId('insurance_plan_id')->constrained('insurance_plans');
            $table->timestamps();

            $table->unique([
                'patient_insurance_id',
                'insurance_plan_id',
            ], 'patient_insurance_id_insurance_plan_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_insurance_plan');
    }
};
