<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title',200)->nullable();
            $table->longtext('about_us')->nullable();
            $table->longtext('donation_text')->nullable();
            $table->string('phone_number',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('logo',200)->nullable();
            $table->string('address',200)->nullable();
            $table->longtext('footertext')->nullable();
            $table->string('faxnumber',200)->nullable();
            $table->string('clinicaladdress',200)->nullable();
            $table->string('clinicaddresslink',200)->nullable();
            $table->string('facebook_link',200)->nullable();
            $table->string('instagram_link',200)->nullable();
            $table->string('pinterest_link',200)->nullable();
            $table->string('favicon',200)->nullable();
            $table->string('addresslink',200)->nullable();
            
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
        Schema::dropIfExists('site_settings');
    }
}
