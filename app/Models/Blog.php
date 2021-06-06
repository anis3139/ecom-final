<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;  protected $fillable = [
        'name',
        'post',
        'image',
    ];
    protected $table="blogs";
    public function blog()
    {
        return $this->belongsTo(User::class);
    }
}
