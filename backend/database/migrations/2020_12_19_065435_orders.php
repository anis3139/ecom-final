<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 128);
            $table->string('customer_phone_number', 32);
            $table->text('address');
            $table->string('city', 32);
            $table->string('district', 32);
            $table->string('country', 32)->default('bangladesh');
            $table->string('postal_code', 32);
            $table->decimal('total_amount',10,2);
            $table->decimal('discount_amount',10,2)->default(0.00);
            $table->decimal('paid_amount',10,2);

            $table->string('payment_status', 32)->default('pending');
            $table->text('payment_details', 32)->nullable();

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('processed_by')->nullable();
            $table->unsignedInteger('order_product_id')->nullable();
            $table->unsignedInteger('product_owner_id')->default(0);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('processed_by')->references('id')->on('admins')->onDelete('cascade');
            // $table->foreign('product_owner_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
