<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use App\Models\QuickOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class QuickOrderController extends Controller
{
    public function quickOrderIndex()
    {
       return view('admin.order.quickOrder');
    }


    public function getQuickOrdersData()
    {
        $orderData=json_decode(QuickOrder::orderBy('id', 'desc')->get());
        return $orderData;
    }


    public function ordersPrint(Request $request, $id)
    {
        $QuickOrder = QuickOrder::findOrFail($id);
        
        $slug=Str::slug($QuickOrder->customer_name);
        $invoice='invoice-('.$QuickOrder->id.")-".$slug.'.pdf';
     
        $pdf = PDF::loadView('admin.order.quickOrderPrint', compact('QuickOrder') );
        return $pdf->download($invoice);
        return $pdf->stream($invoice);
    }
 
}
