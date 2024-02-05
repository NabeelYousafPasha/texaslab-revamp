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
        Schema::table('patient_insurances', function (Blueprint $table) {
            $table->after('is_worker_compensated', function($table) {
                $table->nullableMorphs('model');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_insurances', function (Blueprint $table) {
            $table->dropMorphs('model');
        });
    }
};
