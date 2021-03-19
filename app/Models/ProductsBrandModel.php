<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProductsBrandModel extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='products_brand';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;



    public function products()
    {
      return $this->hasMany(product_table::class, 'product_brand_id', 'id');
    }

}
