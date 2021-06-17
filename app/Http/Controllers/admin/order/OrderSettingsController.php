<?php


namespace App\Http\Controllers\admin\order;
use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\OrderSettings;
use Illuminate\Http\Request;

class OrderSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.OrderSettings', [
            'results'=>json_decode(OrderSettings::orderBy('id', 'desc')->get()->first()),
        ]);
    }


    public function addRocketNumber(Request $request)
    {
        $rocket_number = $request->input("rocket_number");

        $valuecheck = (OrderSettings::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = OrderSettings::where('id', '=',  $valuecheck['0']->id)->update(['rocket_number' => $rocket_number]);
        }
        else{
            $result = OrderSettings::insert(['rocket_number' => $rocket_number]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function addBkashNumber(Request $request)
    {


        $bkash_number = $request->input("bkash_number");

        $valuecheck = (OrderSettings::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = OrderSettings::where('id', '=',  $valuecheck['0']->id)->update(['bkash_number' => $bkash_number]);
        }
        else{
            $result = OrderSettings::insert(['bkash_number' => $bkash_number]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addNagadNumber(Request $request)
    {
        $nagad_number = $request->input("nagad_number");

        $valuecheck = (OrderSettings::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = OrderSettings::where('id', '=',  $valuecheck['0']->id)->update(['nagad_number' => $nagad_number]);
        }
        else{
            $result = OrderSettings::insert(['nagad_number' => $nagad_number]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addDelivaryInCity(Request $request)
    {

  
        $delivary_in_city = $request->input("delivary_in_city");

        $valuecheck = (OrderSettings::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = OrderSettings::where('id', '=',  $valuecheck['0']->id)->update(['delivary_in_city' => $delivary_in_city]);
        }
        else{
            $result = OrderSettings::insert(['delivary_in_city' => $delivary_in_city]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addDelivaryOutCity(Request $request)
    {
        $delivary_out_city = $request->input("delivary_out_city");

        $valuecheck = (OrderSettings::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = OrderSettings::where('id', '=',  $valuecheck['0']->id)->update(['delivary_out_city' => $delivary_out_city]);
        }
        else{
            $result = OrderSettings::insert(['delivary_out_city' => $delivary_out_city]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }





    public function getCuponData()
    {
        $result = json_decode(Cupon::orderBy('id', 'desc')->get());
        return $result;
    }

    function CuponAdd(Request $request)
    {

        $cupon_code = $request->input("cupon_code");
        $discount = $request->input("discount");
        $type = $request->input("type");
        $status = $request->input("status");
        $exp_date = $request->input("exp_date");

        $result = Cupon::insert([
            'cupon_code' => $cupon_code,
            'discount' => $discount,
            'type' => $type,
            'status' => $status,
            'exp_date' => $exp_date
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }






    function CuponEdit(Request $req)
    {
        $id = $req->input('id');
        try {
            $result = json_encode(Cupon::where('id', '=', $id)->get());
            return $result;
        } catch (\Throwable $th) {
           return response()->json(array('error'=>$th));
        }

    }



    function CuponUpdate(Request $request)
    {

        $id = $request->input("id");
        $cupon_code = $request->input("cupon_code");
        $discount = $request->input("discount");
        $type = $request->input("type");
        $status = $request->input("status");
        $exp_date = $request->input("exp_date");

            $result = Cupon::where('id', '=', $id)->update(['cupon_code' => $cupon_code, 'discount' => $discount, 'type' => $type, 'status' => $status, 'exp_date' => $exp_date]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

    }






    function CuponDelete(Request $req)
    {
        $id = $req->input('id');
        $result = Cupon::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }







}
