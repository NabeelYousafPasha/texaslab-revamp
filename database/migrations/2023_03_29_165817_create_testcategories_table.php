<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testcategories', function (Blueprint $table) {
            $table->id();
            $table->string('category',200)->nullable();
            $table->string('panel_tests',200)->nullable();
            $table->integer('panel_price')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->text('category_desc')->nullable();
            $table->longtext('faqs')->nullable();
            $table->tinyInteger('show_on_homepage')->nullable();
            $table->string('meta_title',200)->nullable();
            $table->string('meta_description',200)->nullable();
            $table->string('category_icon',200)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testcategories');
    }
}
