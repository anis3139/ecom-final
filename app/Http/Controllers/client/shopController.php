<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\OrderProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class shopController extends Controller
{
   public function shopIndex()
   {
     $allProducts=Product::with(['img'])->where('product_active', 1)->orderBy('id', 'desc')->paginate(15);

     $popular_products= OrderProducts::with('product')
            ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
            ->groupBy('product_id')
            ->orderBy('maxSell', 'desc')
            ->take(4)->get();

    $topRatedProducts= Product::orderBy('product_price', 'desc')->where('product_active', 1)->limit(4)->get();

    $recentProducts=Product::where('product_active', 1)->orderBy('id', 'asc')->limit(5)->get();
      return view('client.pages.Shop')->with([
          'allProducts'=> $allProducts,
          'popular_products'=> $popular_products,
          'topRatedProducts'=> $topRatedProducts,
          'recentProducts'=> $recentProducts,
          ]);
   }



   function getsingleProductdata(Request $req)
   {

       $id = $req->input('id');
       $result = Product::with('cat', 'img', 'maserment', 'color')->where('product_active', 1)->where('id', '=', $id)->get();

       return $result;
   }

}
