<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\OrderProducts;
use App\Models\product_table;
use App\Models\ProductsCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function catagoryWiseProduct($slug)
    {



        $category=ProductsCategoryModel::where('slug', $slug)->first();
        $allProducts=product_table::where('product_category_id',  $category->id)->where('product_active', 1)->paginate(15);
        $recentProducts=product_table::where('product_active', 1)->orderBy('id', 'asc')->limit(5)->get();

        $popular_products= OrderProducts::with('product')
        ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
        ->groupBy('product_id')
        ->orderBy('maxSell', 'desc')
        ->take(4)->get();

        $topRatedProducts= product_table::orderBy('product_price', 'desc')->where('product_active', 1)->limit(4)->get();




        return view('client.pages.CategoryShow')->with([
            'allProducts'=> $allProducts,
            'popular_products'=> $popular_products,
            'topRatedProducts'=> $topRatedProducts,
            'category'=>$category,
            'recentProducts'=>$recentProducts,
            ]);
    }
}
