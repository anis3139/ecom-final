<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class OrderProduct extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='order_products';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    public function order() {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function product() {
        return $this->belongsTo(Product::class,'product_id')->withTrashed();
    }

    public function owner() {
        return $this->belongsTo(vendors::class,'vendor_id');
    }

}
