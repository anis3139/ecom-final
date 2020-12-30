<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use PDF;
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
        $data = Orders::with(['orderProducts', 'customer','orderProducts.product'])->findOrFail($id);
        $pdf = PDF::loadView('admin.order.printOrder', $data);
        return $pdf->download('invoice.pdf');
        return $pdf->stream('invoice.pdf');
    }


}
