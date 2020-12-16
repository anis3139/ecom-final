<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\adminModel;
use Illuminate\Http\Request;
class adminController extends Controller
{
    public function adminIndex()
    {

        return view('admin.adminIndex');
    }


    public function adminData()
    {
        $result = json_decode(adminModel::orderBy('id', 'desc')->get());
      
        return $result;
      
    }


    function adminDelete(Request $req)
    {
        $id = $req->input('id');
        $result = AdminModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function adminDetailEdit(Request $req)
    {
        $id = $req->input('id');
        $result = json_encode(AdminModel::where('id', '=', $id)->get());
        return $result;
    }



    function adminDataUpdate(Request $req)
    {
        $this->validate($req, [
            'name'  => 'required',
            'password'  => 'required|max:13|min:6',
            'username'  => 'required',
            'email'  => 'required|email',
          ]);
        $id = $req->Input('id');
        $name = $req->Input('name');
        $password = $req->Input('password');
        $username = $req->Input('username');
        $email = $req->Input('email');


        $result = AdminModel::where('id', '=', $id)->update(['name' => $name, 'password' =>   md5($password), 'username' => $username, 'email' => $email]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    function adminAdd(Request $req)
    {

        $this->validate($req, [
            'name'  => 'required',
            'password'  => 'required|max:13|min:6',
            'username'  => 'required',
            'email'  => 'required|email',
          ]);
        $name = $req->Input('name');
        $password = $req->Input('password');
        $username = $req->Input('username');
        $email = $req->Input('email');


        $result = AdminModel::insert([
            'name' => $name,
            'password' =>  md5($password),
            'username' => $username,
            'email' => $email
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
