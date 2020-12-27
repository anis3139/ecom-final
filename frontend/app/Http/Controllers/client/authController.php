<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class authController extends Controller
{
    public function registration()
    {
        return view('client.pages.registration');
    }

    public function addUser(Request $request)
    {

       $validator=Validator::make(request()->all(),[
        'name'=>'required',
        'email'=>'required | email |unique:users,email',
        'phone_number'=>'required |min:8| max:16|unique:users,phone_number',
        'password'=>'required |min:8',

       ]);

       if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        }



            try {
                $name = $request->Input('name');
                $phone_number = $request->Input('phone_number');
                $email =strtolower($request->Input('email'));
                $password =bcrypt( $request->Input('password'));

            User::insert([
                'name'=>$name,
                'phone_number'=>$phone_number,
                'email'=>$email,
                'password'=> $password,
                'email_verification_token'=>uniqid( time().$email, true).Str::random(40),

            ]);
            session()->flash('type', 'warning');
            session()->flash('massage','Registration Successfull');
            return redirect()->route('client.checkout');

            } catch (\Exception $th) {
                session()->flash('type', 'warning');
                session()->flash('massage', $th->getMessage());
            }

            return redirect()->back();











    }
}
