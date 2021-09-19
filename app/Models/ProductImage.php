<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProductImage extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='product_images';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    protected $fillable = [
        'product_id',
        'image_path',
    ];
    public function image() {
        return $this->belongsTo(Product::class,'product_id');
    }
}
