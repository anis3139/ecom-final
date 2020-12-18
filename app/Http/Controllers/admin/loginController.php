<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\adminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
class loginController extends Controller
{
    
    
    function loginIndex(){
    	return view('admin.adminLogin');
    }

    function onLogin(Request $request){
        
        
        // $this->validate($request, [
        //     'user'  => 'required',
        //     'pass'  => 'required',
        //   ]);

        //  dd($credentials);

         $credentials=$request->only('username','password');

         if (Auth::attempt($credentials,$request->remember)) {
             $user=adminModel::where('username',$request->username)->first();
             Auth::login($user);
             return 1;
         }
         else{
             return 0;
         }
 
     }


     function onLogout(Request $request){
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    
}
