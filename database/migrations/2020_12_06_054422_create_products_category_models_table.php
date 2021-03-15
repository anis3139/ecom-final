<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCategoryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_category', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('icon', 128);
            $table->string('banner_image', 128);
            $table->unsignedInteger('parent_id')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_menu')->default(0);
            $table->tinyInteger('is_homepage')->default(0);
            $table->string('slug');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_category');
    }
}
