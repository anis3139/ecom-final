<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCategoryModel extends Model
{
    use HasFactory;
    protected $table= 'products_category';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time'; 
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;




}
