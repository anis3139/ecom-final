<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\OrderProducts;
use App\Models\product_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class shopController extends Controller
{
   public function shopIndex()
   {
     $allProducts=product_table::with(['img'])->where('product_active', 1)->orderBy('id', 'desc')->paginate(15);

     $popular_products= OrderProducts::with('product')
            ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
            ->groupBy('product_id')
            ->orderBy('maxSell', 'desc')
            ->take(4)->get();

    $topRatedProducts= product_table::orderBy('product_price', 'desc')->limit(4)->get();


      return view('client.pages.shop')->with([
          'allProducts'=> $allProducts,
          'popular_products'=> $popular_products,
          'topRatedProducts'=> $topRatedProducts
          ]);
   }


   
   function getsingleProductdata(Request $req)
   {
     dd($req);
       $id = $req->input('id');
       $result = product_table::with('cat', 'img', 'maserment', 'color')->where('product_active', 1)->where('id', '=', $id)->get();
       return $result;
   }

}
