<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('test_category',200)->nullable();
            $table->string('test_title',200)->nullable();
            $table->integer('featured')->nullable();
            $table->string('actual_price',200)->nullable();
            $table->string('competitor_price',200)->nullable();
            $table->tinyInteger('test_type')->nullable();
            $table->string('panel_tests',200)->nullable();
            $table->string('slug',200)->nullable();
            $table->string('category',200)->nullable();
            $table->string('user_id',200)->nullable();
            $table->longtext('tags')->nullable();
            $table->text('test_desc')->nullable();
            $table->longtext('test_details')->nullable();
            $table->longtext('faqs')->nullable();
            $table->integer('test_price')->nullable();
            $table->string('testimage',200)->nullable();
            $table->string('meta_description',200)->nullable();
            $table->longtext('symptoms')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('show_on_homepage')->nullable();
            $table->string('meta_title',200)->nullable();
            $table->string('test_no',200)->nullable();
            $table->string('cpt',200)->nullable();
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
        Schema::dropIfExists('tests');
    }
}
