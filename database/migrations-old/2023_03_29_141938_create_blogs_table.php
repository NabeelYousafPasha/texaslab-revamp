<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_ID')->nullable();
            $table->longtext('post_content')->nullable();
            $table->string('alt_img',200)->nullable();
            $table->longtext('post_des')->nullable();
            $table->string('post_title',200)->nullable();
            $table->string('post_slug',200)->nullable();
            $table->integer('post_status')->nullable();
            $table->string('meta_title',200)->nullable();
            $table->string('meta_description',200)->nullable();
            $table->longtext('post_schema')->nullable();
            $table->string('featured_image',200)->nullable();

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
        Schema::dropIfExists('blogs');
    }
}
