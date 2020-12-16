<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\adminModel;
use Illuminate\Http\Request;


class loginController extends Controller
{
    function loginIndex(){
    	return view('admin.adminLogin');
    }

    function onLogin(Request $request){
        $user= $request->input('user');
        $pass= $request->input('pass');
        $countValue=adminModel::where('username','=',$user)->where('password','=', md5($pass))->count();
        
         if($countValue==1){
             $request->session()->put('user',$user);
 
             return 1;
         }
         else{
             return 0;
         }
 
     }


     function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/admin/login');
    }
    
}
