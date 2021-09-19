<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table= 'categories';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;


    protected $guarded = ['id'];


    protected static function boot() {
        parent::boot();

        static::deleting(function($category) {
            $category->products()->delete();
            $category->children()->delete();
        });
    }




    public function parent() {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public static function ParentOrNotCategory($parent_id, $child_id)
    {
      $categories = Category::where('id', $child_id)->where('parent_id', $parent_id)->get();
      if (!is_null($categories)) {
        return true;
      }else {
        return false;
      }
    }
}
