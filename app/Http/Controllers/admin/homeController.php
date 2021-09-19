<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function adminHome()
    {
        if (is_null($this->user) || !$this->user->can('home.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Dashboard !');
        }
        $data=[];
        $data['TotalContact']= Contact::count();
        $data['TotalCategory']=Category::count();
        $data['TotalBrand']=Brand::count();
        $data['TotalProduct']=Product::count();
        $data['TotalVisitor']=Visitor::count();
        $data['TotalCustomer']=User::count();
        $data['Order']=Order::count();
        $data['DeliveredOrder']=Order::where('delivery_status', 'Delivered')->count();
        $data['PendingOrder']=Order::where('delivery_status', 'Pending')->count();
        $data['TodayOrder']=Order::select(DB::raw('paid_amount'))->whereRaw('Date(created_at) = CURDATE()')->count();
        $data['TodayDeliveredOrder']=Order::select(DB::raw('paid_amount'))->where('delivery_status', 'Delivered')->whereRaw('Date(created_at) = CURDATE()')->where('delivery_status', 'Delivered')->count();
        $data['TodayPendingOrder']=Order::select(DB::raw('paid_amount'))->where('delivery_status', 'Pending')->count();
        $data['TodayProcessingOrder']=Order::select(DB::raw('paid_amount'))->where('delivery_status', 'Processing')->count();
        $data['TodayOnShippingOrder']=Order::select(DB::raw('paid_amount'))->where('delivery_status', 'On Shipping')->count();
        $data['TodayCancelledOrder']=Order::select(DB::raw('paid_amount'))->where('delivery_status', 'Cancelled')->count();
        $data['TotalSales']= DB::table('orders')->where('delivery_status', 'Delivered')->select('paid_amount')->sum('paid_amount');
        $data['TotalSalesMonthly']= DB::table('orders')->where('delivery_status', 'Delivered')->select('paid_amount') ->whereMonth('created_at', Carbon::now()->month)->sum('paid_amount');
        $data['TotalSalesYearly']= DB::table('orders')->where('delivery_status', 'Delivered')->select('paid_amount') ->whereYear('created_at', Carbon::now()->year)->sum('paid_amount');
        $data['TotalSalesDaily']= DB::table('orders')->where('delivery_status', 'Delivered')->select(DB::raw('paid_amount'))
        ->whereRaw('Date(created_at) = CURDATE()')->where('delivery_status', 'Delivered')->sum('paid_amount');

        return view('admin.Home',  $data);
    }
}
