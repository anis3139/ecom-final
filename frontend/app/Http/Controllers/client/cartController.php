<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\product_table;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function showCart()
    {

        $data = [];

        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total']= array_sum( array_column($data['cart'], 'total_price'));




        return view('client.pages.cart', $data);
    }

    public function addToCart(Request $request)
    {
        $cart=[];

        try {
            $this->validate($request, [
                'product_id' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back();
        }

         $product = product_table::with('img')->findOrFail($request->input('product_id'));
         $unit_price=($product->product_selling_price !== null && $product->product_selling_price > 0) ? $product->product_selling_price : $product->product_price;
         $cart = session()->has('cart') ? session()->get('cart') : [];

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['total_price']= $cart[$product->id]['quantity'] *  $cart[$product->id]['unit_price'];


        } else {
            $cart[$product->id] = [
                'title' => $product->product_title,
                'quantity' =>$product->product_quantity,
                'unit_price' => $unit_price,
                'total_price' => $unit_price,
                'image' =>$product->img->first()->image_path,

            ];


        }

        session(['cart' => $cart]);



        return redirect()->route('client.showCart')->with('success','Product successfully added.');
    }


    public function RemoveFromCart(Request $request)
    {


        try {
            $this->validate($request, [
                'product_id' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back();
        }


        $cart = session()->has('cart') ? session()->get('cart') : [];
        unset($cart[$request->input('product_id')]);

        session(['cart' => $cart]);

        return redirect()->back()->with('success','Product Remove From Your Cart.');
    }


    public function clearCart()
    {
       session(['cart'=>[]]);

        return redirect()->back()->with('success','Your Cart is Clear');
    }


    public function checkout()
    {


       return view('client.pages.checkout');
    }

}
