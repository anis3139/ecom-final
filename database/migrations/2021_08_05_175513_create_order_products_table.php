<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');

            $table->string('color')->nullable();
            $table->string('maserment')->nullable();
            $table->text('note1')->nullable();
            $table->text('note2')->nullable();

            $table->decimal('price',10,2);

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->default(0);
            $table->softDeletes();


            $table->foreign('order_id')->references('id')->on('orders')->nullable()->onDelete('cascade');           


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
