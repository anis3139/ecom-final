<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesermentrs_disc extends Model
{
    use HasFactory;
    public $table='meserments';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    public function meserments() {
        return $this->belongsTo(product_has_meserments::class,'meserments_id');
    }



}
