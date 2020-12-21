<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meserments extends Model
{
    use HasFactory;
    public $table='product_tables';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;

    public function product() {
        return $this->belongsTo(product_table::class,'product_measurements_id');
    }
    public function mesermentsDescription() {
        return $this->hasMany(mesermentrs_disc::class,'mesermentrs_id');
    }

}
