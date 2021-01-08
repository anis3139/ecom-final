<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product_table;
use App\Models\ProductsCategoryModel;
use Illuminate\Http\Request;

class aboutPageController extends Controller
{
    public function aboutIndex()
    {
        $data=[];
        
        $data['categories']=ProductsCategoryModel::orderBy('id', 'desc')->where('status', 1)->limit(5)->get();
        
        return view('client.pages.aboutPage',  $data);
    }

}
