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
        Schema::table('user_locations', function (Blueprint $table) {
            $table->foreignId('location_id')
                ->change()
                ->constrained('location_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_locations', function (Blueprint $table) {
            $table->dropForeign('user_locations_location_id_foreign');
        });
    }
};
