<?php

namespace App\Http\Controllers\admin\order;


use App\Exports\OrderMultiSheetExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use DateTime;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Excel;

class OrderController extends Controller
{
    public $user;

    private $excel;



    public function __construct(Excel $excel)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
        $this->excel = $excel;
    }
    public function ordeIndex()
    {
        if (is_null($this->user) || !$this->user->can('order.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any order !');
        }
        return view('admin.order.Order');
    }


    public function getOrdersData()
    {
        if (is_null($this->user) || !$this->user->can('order.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any order !');
        }
        $orderData = json_decode(Order::orderBy('id', 'desc')->get());
        return $orderData;
    }


    public function ordersView(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('order.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any order !');
        }
        $id = $request->input('id');
        $result = Order::with(['OrderProduct', 'customer', 'OrderProduct.product'])->where('id', '=', $id)->get();

        return $result;
    }

    public function ordersStatusUpdate(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('order.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any order !');
        }
        try {

            $id = $request->input('id');
            $delivery_status = $request->input("delivery_status");
            $shippingID = $request->input("shippingID");



            $results = Order::with(['OrderProduct', 'OrderProduct.product'])->where('id', '=', $id)->first();
            $results->delivery_status = $delivery_status;
            $results->shipping_id = $shippingID;
            $results->save();

            if ($results->delivery_status == "Delivered" && $results->status != "delivered") {

                    foreach ($results->OrderProduct as $key => $op) {
                        $productId= $op->product_id;
                        $productOrderQuantity= $op->quantity;
                        $products = Product::where('id', '=', $productId)->get();
                        foreach ($products as $key => $product) {
                            $productStock = $product->stock;
                            $productUpdateStock = $productStock-$productOrderQuantity;

                            $product->update([
                                'stock' => $productUpdateStock
                            ]);

                        }


                    }

                $results->status = 'delivered';
                $results->save();

                if ($results) {
                    return 1;
                } else {
                    return 0;
                }

            }


            if ($results == true) {
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

        if (is_null($this->user) || !$this->user->can('order.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any order !');
        }
        $orders = Order::with(['OrderProduct', 'OrderProduct.product'])->findOrFail($id);

        $slug = Str::slug($orders->customer_name);
        $invoice = 'invoice-(' . $orders->order_id . ")-" . $slug . '.pdf';

        $pdf = PDF::loadView('admin.order.PrintOrder', compact('orders'));
        return $pdf->download($invoice);
        return $pdf->stream($invoice);
    }


    public function excelExport(Request $request){
        if (is_null($this->user) || !$this->user->can('order.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any order !');
        }

        $date = explode("-",$request->time);
        $year = intval($date[0]) !=null ? intval($date[0]) : (new DateTime())->format("Y");

        return $this->excel->download(new OrderMultiSheetExport($year), 'orders('.$year.').xlsx');

    }
}
