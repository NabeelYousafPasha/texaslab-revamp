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
        Schema::table('location_tests', function (Blueprint $table) {
            
            $table->dropColumn([
                'tests',
            ]);

            $table->after('location_id', function($table) {
                
                $table->foreignId('test_id')
                    ->constrained('tests')
                    ->cascadeOnDelete();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location_tests', function (Blueprint $table) {
            
            $table->dropConstrainedForeignId('test_id');

            $table->after('location_id', function($table) {
                $table->json('tests')->nullable();
            });
        });
    }
};
