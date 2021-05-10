<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class meserments extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    public $table='meserments';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class,'product_id');
    }
}
