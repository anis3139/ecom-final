<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shopIndex()
    {
        $product= Product::with(['img']);
        $allProducts= $product->where('status', 1)->orderBy('id', 'desc')->paginate(15);

        $popular_products= OrderProduct::with('product')
            ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
            ->groupBy('product_id')
            ->orderBy('maxSell', 'desc')
            ->take(4)->get();

        $topRatedProducts= $product->orderBy('product_price', 'desc')->where('status', 1)->limit(4)->get();

        $recentProducts=$product->where('status', 1)->orderBy('id', 'asc')->limit(5)->get();

        return view('client.pages.Shop')->with([
          'allProducts'=> $allProducts,
          'popular_products'=> $popular_products,
          'topRatedProducts'=> $topRatedProducts,
          'recentProducts'=> $recentProducts,
          ]);
    }



    public function getsingleProductdata(Request $req)
    {
        $id = $req->input('id');
        $result = Product::with('cat', 'img', 'maserment')->where('status', 1)->where('id', '=', $id)->get();

        return $result;
    }
}
