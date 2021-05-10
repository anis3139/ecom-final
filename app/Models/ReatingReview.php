<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReatingReview extends Model
{
    use HasFactory, SoftDeletes;
    public function vendor() {
        return $this->belongsTo(Vendor::class,'seller_id', 'id');
    }
    public function product() {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
