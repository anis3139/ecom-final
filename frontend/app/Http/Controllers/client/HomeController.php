<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product_table;
use App\Models\ProductsCategoryModel;
use App\Models\SliderModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = SliderModel::all();
        $categories=ProductsCategoryModel::orderBy('id', 'desc')->where('status', 1)->get();
       
        return view("client.index", compact('sliders', 'categories'));
    }


    

}
