<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='orders';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    protected $guarded = ['id'];

    public function customer() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function processor() {
        return $this->hasOne(admins::class,'user_id');
    }

    public function owner() {
        return $this->belongsTo(vendors::class,'vendor_id');
    }

    // public function product() {
    //     return $this->hasMany(OrderProduct::class,'order_product_id');
    // }


    public function OrderProduct() {
        return $this->hasMany(OrderProduct::class,'order_id', 'id')->withTrashed();
    }


    public function product() {
        return $this->hasMany(OrderProduct::class,'order_id', 'id')->withTrashed();
    }


}
