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
        Schema::table('location_panels', function (Blueprint $table) {
            
            $table->dropColumn('panels');

            $table->after('location_id', function($table) {

                $table->foreignId('panel_id')
                    ->constrained('panels')
                    ->cascadeOnDelete();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location_panels', function (Blueprint $table) {
            
            $table->dropConstrainedForeignId('panel_id');
            
            $table->after('location_id', function($table) {
                $table->json('panels')->nullable();
            });
        });
    }
};
