<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductsBrandModel;
use App\Models\ProductsCategoryModel;
use App\Models\VisitorTable;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function adminHome()
    {

        $data=[];
        $data['TotalContact']= ContactModel::count();
        $data['TotalCategory']=ProductsCategoryModel::count();
        $data['TotalBrand']=ProductsBrandModel::count();
        $data['TotalProduct']=Product::count();
        $data['TotalVisitor']=VisitorTable::count();
        $data['Orders']=Orders::count();

        return view('admin.home',  $data);
    }
}
