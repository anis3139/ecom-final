<?php

namespace App\Http\Controllers\client;

use Illuminate\Contracts\Session\Session as SessionSession;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\product_table;
use App\Models\ProductsCategoryModel;
use App\Models\OrderProducts;
use App\Models\SliderModel;
use App\Models\VisitorTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    public function index()
    {

        //Server ip
        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorTable::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);
        //Server ip

        $sliders = SliderModel::all();
        $categories=ProductsCategoryModel::orderBy('id', 'desc')->where('status', 1)->get();
        $categories=ProductsCategoryModel::orderBy('id', 'desc')->where('status', 1)->limit(5)->get();
        $featureProducts=product_table::with(['img'])->where('feture_products', 1)->where('product_active', 1)->take(8)->get();
        $latestProducts=product_table::with(['img'])->where('product_active', 1)->orderBy('id', 'desc')->take(8)->get();

        $promo_categories=ProductsCategoryModel::orderBy('id', 'asc')->where('status', 1)->limit(5)->get();

       $popular_products= OrderProducts::with('product')
            ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
            ->groupBy('product_id')
            ->orderBy('maxSell', 'desc')
            ->take(10)->get();

        return view("client.index", compact('sliders', 'categories', 'popular_products', 'featureProducts', 'latestProducts', 'promo_categories'));
    }

    public function search(Request $request)
    {
        $key=$request->key;

        if($key != ""){
            $searchProducts=product_table::with(['img'])->where('product_active', 1)->Where('product_title','LIKE',"%{$key}%")->orWhere('product_discription','LIKE',"%{$key}%")->orderBy('id', 'desc')->paginate(15);

            $popular_products= OrderProducts::with('product')
            ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
            ->groupBy('product_id')
            ->orderBy('maxSell', 'desc')
            ->take(4)->get();
            $topRatedProducts= product_table::orderBy('product_price', 'desc')->limit(4)->get();
            if(count($searchProducts)>0){
                return view('client.pages.search', compact('searchProducts','popular_products','topRatedProducts','key'));
            }
        }
        return view('client.pages.search', compact('searchProducts','popular_products','topRatedProducts','key'));


    }


}
