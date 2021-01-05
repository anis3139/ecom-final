<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrderProducts;
use App\Models\product_table;
use App\Notifications\orderConfirmNotification;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        $quantity= $request->quantity ?? $product->product_quantity;

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity'] +=  $quantity;
            $cart[$product->id]['total_price']= $cart[$product->id]['quantity'] *  $cart[$product->id]['unit_price'];


        } else {
            $cart[$product->id] = [
                'title' => $product->product_title,
                'quantity' => $quantity,
                'unit_price' => $unit_price,
                'total_price' => $unit_price,
                'color' =>$request->color,
                'maserment' =>$request->maserment,
                'image'=>$product->img[0]->image_path,
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

        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total']= array_sum( array_column($data['cart'], 'total_price'));

       return view('client.pages.checkout', $data);
    }
    public function order(Request $request)
    {



        $cart = session()->has('cart') ? session()->get('cart') : [];
        $total= array_sum( array_column($cart, 'total_price'));

                $customer_name = $request->Input('customer_name');
                $customer_phone_number = $request->Input('customer_phone_number');
                $address =$request->Input('address');
                $country = $request->Input('country');
                $city = $request->Input('city');
                $district = $request->Input('district');
                $postal_code = $request->Input('postal_code');
                $payment_details = $request->Input('payment_details');

                $shipping_customer_name = $request->Input('shipping_customer_name');
                $shipping_customer_phone_number = $request->Input('shipping_customer_phone_number');
                $shipping_address =$request->Input('shipping_address');
                $shipping_country = $request->Input('shipping_country');
                $shipping_city = $request->Input('shipping_city');
                $shipping_district = $request->Input('shipping_district');
                $shipping_postal_code = $request->Input('shipping_postal_code');


              if (isset($shipping_address)) {
                $validator=Validator::make(request()->all(),[
                    'shipping_customer_name'=>'required',
                    'shipping_customer_phone_number'=>'required |min:8| max:16|',
                    'shipping_address'=>'required',
                    'shipping_country'=>'required',
                    'shipping_city'=>'required',
                    'shipping_district'=>'required',
                    'shipping_postal_code'=>'required',

                   ]);

                   if ($validator->fails()) {
                      return redirect()->back()->withErrors($validator);
                    }
                $order=new Orders();
                $order->user_id=auth()->user()->id;
                $order->customer_name=$shipping_customer_name;
                $order->customer_phone_number=$shipping_customer_phone_number;
                $order->address=$shipping_address;
                $order->country= $shipping_country;
                $order->city= $shipping_city;
                $order->district= $shipping_district;
                $order->postal_code= $shipping_postal_code;
                $order->total_amount= $total;
                $order->paid_amount= $total;
                $order->payment_details= $payment_details;
                $order->save();
              }else {
                $validator=Validator::make(request()->all(),[
                    'customer_name'=>'required',
                    'customer_phone_number'=>'required |min:8| max:16|',
                    'address'=>'required',
                    'country'=>'required',
                    'city'=>'required',
                    'district'=>'required',
                    'postal_code'=>'required',

                   ]);

                   if ($validator->fails()) {
                      return redirect()->back()->withErrors($validator);
                    }

                $order=new Orders();
                $order->user_id=auth()->user()->id;
                $order->customer_name=$customer_name;
                $order->customer_phone_number=$customer_phone_number;
                $order->address=$address;
                $order->country= $country;
                $order->city= $city;
                $order->district= $district;
                $order->postal_code= $postal_code;
                $order->total_amount= $total;
                $order->paid_amount= $total;
                $order->payment_details= $payment_details;
                $order->save();
              }

        foreach ($cart as $product_id => $product)
        {
            $order_product=new OrderProducts();
            $order_product->product_id=$product_id;
            $order_product->quantity=$product['quantity'];
            $order_product->price=$product['total_price'];
            $order_product->order_id= $order->id;
            $order_product->save();

        }

        auth()->user()->notify(new orderConfirmNotification($order));

        session()->forget(['cart','price']);

        return redirect()->route('client.orderDetails', $order->id )->with('success','Order send successfully');

    }

    public function orderDetails($id)
    {
        $data=[];
        $data['orders']=Orders::with('product')->findOrFail($id);
        return view('client.pages.orderDetails', $data);
    }









}
