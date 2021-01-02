<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class OrderProducts extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='order_products';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    public function order() {
        return $this->belongsTo(Orders::class,'order_id');
    }
    public function product() {
        return $this->belongsTo(product_table::class,'product_id');
    }

    public function owner() {
        return $this->belongsTo(vendors::class,'product_owner_id');
    }

}
