<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_table extends Model
{
    use HasFactory;
    public $table='product_tables';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;


    public function category() {
        return $this->hasOne(ProductsCategoryModel::class,'product_category_id');
    }

    public function cat() {
        return $this->belongsTo(ProductsCategoryModel::class,'product_category_id', 'id');
    }

    public function brand() {
        return $this->hasOne(ProductsBrandModel::class,'product_brand_id');
    }

    public function maserment() {
        return $this->hasMany(meserments::class,'product_id', 'id');
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class,'product_owner_id');
    }

    public function image() {
        return $this->hasMany(product_has_images::class,'product_image_id');
    }

    public function img() {
        return $this->hasMany(product_has_images::class,'has_images_product_id', 'id');
    }
    public function color() {
        return $this->hasMany(product_color::class,'product_color_product_id', 'id');
    }



}
