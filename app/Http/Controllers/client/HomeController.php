<?php

namespace App\Http\Controllers\client;

use Illuminate\Contracts\Session\Session as SessionSession;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Visitor;
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
        Visitor::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);
        //Server ip

        $sliders = Slider::all();
        $categories=Category::orderBy('id', 'desc')->where('status', 1)->where('is_homePage', 1)->where('parent_id', null)->limit(5)->get();

  $allCategory=Category::orderBy('id', 'desc')->where('status', 1)->get();

        $featureProducts=Product::with(['img'])->where('feture_products', 1)->where('status', 1)->take(8)->get();
        $latestProducts=Product::with(['img'])->where('status', 1)->orderBy('id', 'desc')->take(8)->get();

        $promo_categories=Category::orderBy('id', 'asc')->where('is_homePage', 1)->where('status', 1)->limit(5)->get();

       $popular_products= OrderProduct::with('product')
            ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
            ->groupBy('product_id')
            ->orderBy('maxSell', 'desc')
            ->take(10)->get();

        return view("client.index", compact('sliders', 'categories', 'popular_products', 'featureProducts', 'latestProducts', 'promo_categories', 'allCategory'));
    }

    public function search(Request $request)
    {
        $key=$request->key;

        if($key != ""){
            $searchProducts=Product::with(['img'])->where('status', 1)->Where('name','LIKE',"%{$key}%")->orWhere('status', 1)->Where('product_id','LIKE',"%{$key}%")->orderBy('id', 'desc')->paginate(15);

            $popular_products= OrderProduct::with('product')
            ->select('product_id', DB::raw('COUNT(product_id) as maxSell'))
            ->groupBy('product_id')
            ->orderBy('maxSell', 'desc')
            ->take(4)->get();
            $topRatedProducts= Product::orderBy('product_price', 'desc')->where('status', 1)->limit(4)->get();
            if(count($searchProducts)>0){
                return view('client.pages.Search', compact('searchProducts','popular_products','topRatedProducts','key'));
            }
        }
        return view('client.pages.Search', compact('searchProducts','popular_products','topRatedProducts','key'));


    }




}
