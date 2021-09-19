<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('hero_banner')->nullable();
            $table->string('promo_image_one')->nullable();
            $table->string('promo_image_two')->nullable();
            $table->string('promo_image_three')->nullable();
            $table->string('site_name')->nullable();
            $table->string('title')->nullable();
            $table->text('sub_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('video_link')->nullable();
            $table->text('address')->nullable();
            $table->text('gmap')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
