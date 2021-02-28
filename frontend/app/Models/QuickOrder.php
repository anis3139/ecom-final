<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickOrder extends Model
{
    use HasFactory;
    protected $table= 'quick_orders';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
