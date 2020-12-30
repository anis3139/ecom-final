<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class orderController extends Controller
{
   public function ordeIndex()
   {
      return view('admin.order.order');
   }


   public function getOrdersData()
   {
       $orderData=json_decode(Orders::orderBy('id', 'desc')->get());
       return $orderData;
   }
}
