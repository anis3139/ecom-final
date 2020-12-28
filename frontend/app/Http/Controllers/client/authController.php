<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\registrationVarificationMail;
use App\Models\User;
use App\Notifications\registerEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class authController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only'=>'logOut']);
    }



    public function registration()
    {
        return view('client.pages.registration');
    }


    public function showLogin()
    {
        return view('client.pages.login');
    }

    public function onlogin(Request $request)
    {
        $validator=Validator::make(request()->all(),[
            'email'=>'required|email',
            'password'=>'required',
           ]);
           if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
          }

          $credentials =request()->only(['email', 'password']);


        if (Auth::attempt($credentials)) {

            if (auth()->user()->email_verified_at == null) {
                return redirect()->route('client.login')->with('error','Your Account is not Active');
                auth()->logout();
            }else {
                $request->session()->regenerate();
                return redirect()->route('client.home')->with('success','login Successfull');
            }

        }
        return redirect()->back()->with('warning','The provided credentials do not match our records.');

    }

    public function logOut()
    {

       auth()->logout();
        return redirect()->route('client.home')->with('success','Log Out Successfull');
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
                $name = $request->Input('name');
                $phone_number = $request->Input('phone_number');
                $email =strtolower($request->Input('email'));
                $password =bcrypt( $request->Input('password'));

                $user=new User();
                $user->name=$name;
                $user->phone_number=$phone_number;
                $user->email=$email;
                $user->password= $password;
                $user->email_verification_token= uniqid(time().$email, true).Str::random(40);
                $user->save();


            Mail::to($user->email)->send(new registrationVarificationMail($user));

            return redirect()->route('client.registration')->with('success','Registration Successfull! Please Check Your Mail For Active your Account');

    }



    public function userActive($token = null)
    {
        if ($token == null) {
            return redirect()->route('client.home');
        }

        $user=User::where('email_verification_token', $token)->firstOrFail();

        if ($user) {
            $user->email_verified_at=Carbon::now();
            $user->email_verification_token=null;
            $user->save();
            return redirect()->route('client.login')->with('success','Your Account Varified Successfully');
        }


    }
}
