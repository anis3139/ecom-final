<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCategoryModel extends Model
{
    use HasFactory;
    protected $table= 'products_category';


    public function children() {
        return $this->hasMany(ProductsCategoryModel::class,'parent_id');
    }
    public function parent() {
        return $this->belongsTo(ProductsCategoryModel::class,'parent_id');
    }

    public function products()
    {
      return $this->hasMany(product_table::class);
    }

    public static function ParentOrNotCategory($parent_id, $child_id)
    {
      $categories = ProductsCategoryModel::where('id', $child_id)->where('parent_id', $parent_id)->get();
      if (!is_null($categories)) {
        return true;
      }else {
        return false;
      }
    }

}
