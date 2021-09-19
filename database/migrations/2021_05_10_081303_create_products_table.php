<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id',128)->unique()->nullable();
            $table->string('name',128);
            $table->string('meta_title',128)->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description');
            $table->longText('meta_description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('sku')->nullable();
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->tinyInteger('is_campaign')->default(0);
            $table->longText('warranty_policy')->nullable();
            $table->string('warranty_period')->nullable();
            $table->longText('return_policy')->nullable();
            $table->integer('delivery_day')->nullable();
            $table->string('return_period')->nullable();
            $table->integer('stock')->default(1);
            $table->decimal('purchase_price', 8, 2)->nullable();
            $table->decimal('product_price', 8, 2);
            $table->decimal('product_selling_price', 8, 2)->nullable();
            $table->integer('discount')->default(0);
            $table->decimal('product_tax', 8, 2)->default(0);
            $table->integer('product_delivary_charge')->default(0);
            $table->tinyInteger('product_delivary_charge_type')->default(0);
            $table->integer('product_quantity')->default(1);
            $table->integer('low_stock_activity')->nullable();
            $table->integer('product_min_quantity')->default(1);
            $table->integer('product_max_quantity')->default(100);
            $table->tinyInteger('product_review')->default(1);
            $table->integer('product_rating')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('feture_products')->default(1);
            $table->json('color')->nullable();
            $table->unsignedBigInteger('product_meserment_type')->nullable();
            $table->unsignedBigInteger('attribute_id')->nullable();
            $table->string('attribute')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('attribute_id')->references('id')->on('attributes')->nullable();
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
        Schema::dropIfExists('products');
    }
}
