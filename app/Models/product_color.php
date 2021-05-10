<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class product_color extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='product_colors';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    public function image() {
        return $this->belongsTo(Product::class,'product_color_product_id');
    }
}
