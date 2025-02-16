<?php

namespace App\Http\Controllers\vendor\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function ordeIndex()
   {
      return view('vendor.order.Order');
   }


   public function getOrdersData()
   {
       $id=Auth::guard('vendor')->id();
       $orderData=json_decode(Order::orderBy('id', 'desc')->get());
       return $orderData;
   }


   public function ordersView(Request $request)
   {
    $id = $request->input('id');
    $result = Order::with(['OrderProduct', 'customer','OrderProduct.product'])->where('id', '=', $id)->get();

    return $result;
   }

   public function ordersStatusUpdate(Request $request)
   {

    try {
        $id=$request->input('id');
       $delivery_status=$request->input("delivery_status");



       $result = Order::where('id', '=', $id)->update([
        'delivery_status' => $delivery_status
        ]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
    } catch (\Throwable $th) {
        return response()->json(array('error', $th));
    }

    }

    public function ordersPrint(Request $request, $id)
    {
        $orders = Order::with(['OrderProduct', 'OrderProduct.product'])->findOrFail($id);

        $pdf = PDF::loadView('vendor.order.PrintOrder', compact('orders') );
        return $pdf->download('invoice(' . $orders->id.').pdf');
        return $pdf->stream('invoice' . $orders->id.'.pdf');
    }


}
