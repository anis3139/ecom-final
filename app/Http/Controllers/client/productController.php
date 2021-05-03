<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product_table;
use App\Models\ProductsCategoryModel;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function showProductDetails($slug)
    {


        $productDetails = product_table::with('cat', 'img', 'maserment', 'color', 'rating')->where('product_slug', $slug)->where('product_active', 1)->first();

        if ($productDetails == null) {
            return redirect()->route('client.home');
        }

        return view('client.pages.ProductDetails', compact('productDetails'));
    }
}
