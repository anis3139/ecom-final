<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{


    function loginIndex()
    {
        return view('admin.AdminLogin');
    }

    function onLogin(Request $request)
    {


        $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required',
        ]);


        $credentials = $request->only('password');
        if (filter_var($request->get('username'), FILTER_VALIDATE_EMAIL) !== FALSE) {
            $credentials['email'] = $request->get('username');
        }else{
            $credentials['username'] = $request->get('username');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            if (Auth::guard('admin')->user()->status == "inactive") {
                auth::guard('admin')->logout();
                return 0;
            } else {
                $request->session()->regenerate();
                return 1;
            }
        } else {
            return 0;
        }
    }


    function onLogout(Request $request)
    {
        auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
