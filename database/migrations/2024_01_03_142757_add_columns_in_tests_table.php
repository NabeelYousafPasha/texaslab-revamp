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
        Schema::table('tests', function (Blueprint $table) {
            $table->after('description_html', function($table) {
                $table->string('specimen');
                $table->string('labdaq_compendium');
                $table->string('labdaq_panel_name');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn([
                'specimen',
                'labdaq_compendium',
                'labdaq_panel_name',
            ]);
        });
    }
};
