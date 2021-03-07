<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function MessageIndex(){
        return view("admin.components.contact");
    }

    public function getContactData()
    {
        $result = json_decode(ContactModel::orderBy('id','desc')->get());
        return $result;
    }

    public function contactDelete(Request $request)
    {

        $id = $request->input("id");
        $result = ContactModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
