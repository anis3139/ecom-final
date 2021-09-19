<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function catagoryWiseProduct($slug)
    {



        $category=Category::where('slug', $slug)->first();
        $allProducts=Product::where('category_id',  $category->id)->where('status', 1)->paginate(15);
        $recentProducts=Product::where('status', 1)->orderBy('id', 'asc')->limit(5)->get();

        $popular_products= OrderProduct::with('product')
        ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
        ->groupBy('product_id')
        ->orderBy('maxSell', 'desc')
        ->take(4)->get();

        $topRatedProducts= Product::orderBy('product_price', 'desc')->where('status', 1)->limit(4)->get();




        return view('client.pages.CategoryShow')->with([
            'allProducts'=> $allProducts,
            'popular_products'=> $popular_products,
            'topRatedProducts'=> $topRatedProducts,
            'category'=>$category,
            'recentProducts'=>$recentProducts,
            ]);
    }
}
