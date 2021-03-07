<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


   public function ordersView(Request $request)
   {
    $id = $request->input('id');
    $result = Orders::with(['orderProducts', 'customer','orderProducts.product'])->where('id', '=', $id)->get();

    return $result;
   }

   public function ordersStatusUpdate(Request $request)
   {

    try {
        $id=$request->input('id');
       $payment_status=$request->input("payment_status");



       $result = Orders::where('id', '=', $id)->update([
        'payment_status' => $payment_status
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
        $orders = Orders::with(['orderProducts', 'orderProducts.product'])->findOrFail($id);
        
    $slug=Str::slug($orders->customer_name);
    $invoice='invoice-('.$orders->id.")-".$slug.'.pdf';
     
        $pdf = PDF::loadView('admin.order.printOrder', compact('orders') );
        return $pdf->download($invoice);
        return $pdf->stream($invoice);
    }


}
