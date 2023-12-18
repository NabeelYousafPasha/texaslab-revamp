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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('status_id')->constrained('statuses');
            $table->boolean('is_free')->nullable()->default(false);
            $table->decimal('actual_price')->nullable()->default(0.00);
            $table->decimal('offered_price')->nullable()->default(0.00);
            $table->decimal('competitor_price')->nullable()->default(0.00);
            $table->dateTime('featured_at')->nullable();
            $table->boolean('is_renderabble')->default(false);
            $table->longText('description_text')->nullable();
            $table->longText('description_html')->nullable();
            $table->json('symptoms')->nullable();
            $table->json('faqs')->nullable();
            $table->json('result_kpis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
