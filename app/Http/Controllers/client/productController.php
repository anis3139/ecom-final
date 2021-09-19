<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductDetails($slug)
    {


        $productDetails = Product::with('cat', 'img', 'maserment',  'rating')->where('slug', $slug)->where('status', 1)->first();

        if ($productDetails == null) {
            return redirect()->route('client.home');
        }

        return view('client.pages.ProductDetails', compact('productDetails'));
    }
}
