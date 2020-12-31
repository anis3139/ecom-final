<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product_table;
use Illuminate\Http\Request;

class shopController extends Controller
{
   public function shopIndex()
   {
     $allProducts=product_table::with(['img'])->where('product_active', 1)->orderBy('id', 'desc')->paginate(15);
      return view('client.pages.shop')->with([
          'allProducts'=> $allProducts
          ]);
   }
}
