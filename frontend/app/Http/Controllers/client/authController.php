<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\registrationVarificationMail;
use App\Models\Orders;
use App\Models\User;
use App\Notifications\registerEmail;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;
use Session;
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
                auth()->logout();
                session()->flash('warning', 'Your Account is not Active. Please Check Your Email');
                return redirect()->route('client.login');

            }else {
                $request->session()->regenerate();
                session()->flash('success', 'Login Success');
                return redirect()->route('client.checkout');
            }

        }
        session()->flash('error', 'The provided credentials do not match our records.');
        return redirect()->back();

    }

    public function logOut()
    {

       auth()->logout();
       session()->flash('success', 'Logout Success');
        return redirect()->route('client.home');
    }

    public function addUser(Request $request)
    {


       $validator=Validator::make(request()->all(),[
        'name'=>'required',
        'email'=>'required | email |unique:users,email',
        'phone_number'=>'required|min:8| max:16|unique:users,phone_number',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6'

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



                $user->notify(new registerEmail( $user));



        session()->flash('success', 'Registration Successfull! Please Check Your Mail For Active your Account');
        return redirect()->route('client.registration');

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
            session()->flash('success', 'Your Account Varified Successfully');
            return redirect()->route('client.login');
        }


    }


public function profile()
{

    $data= [];
    $data['orders']=Orders::where('user_id', auth()->user()->id)->get();

    return view('client.pages.profile', $data);
}



public function forgot()
{
    return view('client.pages.forgot');
}


public function forgotPassword(Request $request)
{

    $user=User::where('email', $request->email)->first();

    if($user == null){
        return redirect()->back()->with('error', 'Email not Exist !');
    }
    

    Mail::to($user->email)->send(new registrationVarificationMail($user));

    return redirect()->back()->with('success', 'Please Check your Mail For new Password !');

}


public function recoverPassWord($id = null)
{

    if ($id == null) {
        session()->flash('error', 'Wrong varification Token');
        return redirect()->route('client.home');
    }

    $recoveryTocken = $id;
    $email = (explode('-', $recoveryTocken))[0];
    $user=User::where('email',$email)->firstOrFail();
    if($user){
        return view('client.pages.recoverPassword')->with([ 'user'=> $user]);
     }
             
    
}


public function updatePassword(Request $request)
{
    $validator=Validator::make(request()->all(),[

        'email'=>'required | email',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6'
       ]);

       if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $data=User::where('email',$request->email)->first();

        $data->password= bcrypt( $request->Input('password'));
        $data->save();

        return redirect()->route('client.login')->with('success', 'Password Reset Successfully');
}

}
