<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='products';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getCategory() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function getBrand() {
        return $this->belongsTo(Brand::class,'brand_id', 'id');
    }
    public function orderproduct() {
        return $this->belongsTo(OrderProduct::class,'product_id', 'id');
    }

    public function masermant() {
        return $this->hasMany(meserments::class,'product_measurements_id');
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class,'vendor_id', 'id');
    }

    public function image() {
        return $this->hasMany(ProductImage::class,'product_id', 'id');
    }

    public function maserment() {
        return $this->hasMany(meserments::class,'product_id', 'id');
    }
   


    public function cat() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function img() {
        return $this->hasMany(ProductImage::class,'product_id', 'id');
    }

    public function rating() {
        return $this->hasMany(ReatingReview::class,'product_id', 'id');
    }


    public function favorite_to_users()
    {
        return $this->belongsToMany(User::class, 'product_user');
    }


}
