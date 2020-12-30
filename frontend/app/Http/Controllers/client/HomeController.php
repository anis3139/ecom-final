<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product_table;
use App\Models\ProductsCategoryModel;
use App\Models\SliderModel;
use App\Models\VisitorTable;
use Illuminate\Http\Request;

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

        return view("client.index", compact('sliders', 'categories'));
    }




}
