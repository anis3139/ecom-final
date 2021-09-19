<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('slug');
            $table->string('icon', 128);
            $table->string('banner_image', 128);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_menu')->default(0);
            $table->tinyInteger('is_homepage')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->nullable()->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('admins')->nullable();
            $table->foreign('updated_by')->references('id')->on('admins')->nullable();
            $table->foreign('deleted_by')->references('id')->on('admins')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
