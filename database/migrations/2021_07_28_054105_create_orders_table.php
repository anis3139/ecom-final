<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('order_id', 30)->unique()->nullable();
            $table->string('customer_phone_number', 32);
            $table->text('address');
            $table->string('city', 32)->nullable();
            $table->string('district', 32);
            $table->string('country', 32)->default('bangladesh');
            $table->string('postal_code', 32);
            $table->decimal('price_without_discount',10,2);
            $table->decimal('discount_amount',10,2)->default(0.00);
            $table->decimal('total_amount',10,2);

            $table->decimal('total_tax', 8, 2);
            $table->integer('total_delivery_charge');
            $table->decimal('paid_amount',10,2);
            $table->decimal('total_cupon_discount',10,2);

            $table->string('shipping_id')->nullable();
            $table->string('delivery_status', 32)->default('Pending');
            $table->string('payment_details', 32)->nullable();
            $table->string('transection_id', 191)->nullable();

            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->enum('status',[ 'delivered', 'returned','Cancelled'])->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

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
        Schema::dropIfExists('orders');
    }
}
