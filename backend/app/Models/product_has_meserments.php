<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_has_meserments extends Model
{
    use HasFactory;
    public $table='product_has_meserments';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    public function meserments() {
        return $this->hasMany(mesermentrs_disc::class,'meserments_id');
    }
}
