<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\registrationVarificationMail;
use App\Models\Order;
use App\Models\User;
use App\Notifications\registerEmail;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;
use Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;


class authController extends Controller
{
    protected $redirectTo;
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'logOut']);
        $this->redirectTo = url()->previous();
    }


    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service)
    {

        $serviceUser = Socialite::driver($service)->stateless()->user();

        do {
   $refrence_id = mt_rand( 11111111, 99999999 );
} while ( DB::table( 'users' )->where( 'phone_number', $refrence_id )->exists() );


        $name =  $serviceUser->getName() ?? '';
        $email = $serviceUser->getEmail();
        $phone_number = $serviceUser->user['mobile'] ?? $refrence_id;
        $image =$serviceUser->getAvatar() ?? '';
        $token = $serviceUser->token ?? '';
        $password = Hash::make(Str::random(32));

        $user = User::firstOrCreate([
            'email' => $email
        ], [
            'email' => $email,
            'password' => $password,
            'phone_number' => $phone_number,
            'image' => $image,
            'name' => $name,
            'provider' => $service,
            'provider_id' => $token,
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => ''
        ]);
        try {
            Auth::login($user, true);
            $massage = "Welcome " . $name;
            session()->flash('success', $massage);
            return redirect()->intended($this->redirectTo);
        } catch (\Throwable $th) {
            session()->flash('success', 'Something Wrong! Please Try Again'.$th->getMassage());
            return redirect()->intended($this->redirectTo);
        }
       
    }


    public function registration()
    {
        return view('client.pages.Registration');
    }


    public function showLogin()
    {
        return view('client.pages.Login');
    }

    public function onlogin(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = request()->only(['email', 'password']);


        if (Auth::attempt($credentials)) {

            if (auth()->user()->email_verified_at == null) {
                auth()->logout();
                session()->flash('warning', 'Your Account is not Active. Please Check Your Email');
                return redirect()->route('client.login');
            } else {
                $request->session()->regenerate();
                session()->flash('success', 'Login Success');
                return $this->redirectTo == route('client.login') ? redirect()->route('client.checkout') : redirect()->intended($this->redirectTo);
            }
        }
        session()->flash('error', 'The provided credentials do not match our records.');
        return redirect()->back();
    }

    public function logOut()
    {

        auth()->logout();
        session()->flash('success', 'Logout Success');
        return redirect()->intended($this->redirectTo);
    }

    public function addUser(Request $request)
    {


        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required | email |unique:users,email',
            'phone_number' => 'required|min:8| max:16|unique:users,phone_number',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->Input('name');
        $phone_number = $request->Input('phone_number');
        $email = strtolower($request->Input('email'));
        $password = bcrypt($request->Input('password'));

        $user = new User();
        $user->name = $name;
        $user->phone_number = $phone_number;
        $user->email = $email;
        $user->password = $password;
        $user->email_verification_token = uniqid(time() . $email, true) . Str::random(40);
        $user->save();

        $user->notify(new registerEmail($user));

        session()->flash('success', 'Registration Successfull! Please Check Your Mail For Active your Account');
        return redirect()->route('client.registration');
    }



    public function userActive($token = null)
    {
        if ($token == null) {
            return redirect()->route('client.home');
        }

        $user = User::where('email_verification_token', $token)->firstOrFail();

        if ($user) {
            $user->email_verified_at = Carbon::now();
            $user->email_verification_token = null;
            $user->save();
            session()->flash('success', 'Your Account Varified Successfully');
            return redirect()->route('client.login');
        }
    }


    public function profile()
    {

        $data = [];
        $data['orders'] = Order::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        return view('client.pages.Profile', $data);
    }



    public function forgot()
    {
        return view('client.pages.Forgot');
    }


    public function forgotPassword(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user == null) {
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
        $user = User::where('email', $email)->firstOrFail();
        if ($user) {
            return view('client.pages.RecoverPassword')->with(['user' => $user]);
        }
    }


    public function updatePassword(Request $request)
    {
        $validator = Validator::make(request()->all(), [

            'email' => 'required | email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = User::where('email', $request->email)->first();

        $data->password = bcrypt($request->Input('password'));
        $data->save();

        return redirect()->route('client.login')->with('success', 'Password Reset Successfully');
    }

    public function profileEdit($id)
    {
        $data = [];
        $data['user'] = User::where('id', $id)->first();

        return view('client.pages.ProfileEdit', $data);
    }


    public function upadeteProfile(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'email' => 'required | email',
            'phone_number' => 'required|min:8| max:16',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->Input('name');
        $phone_number = $request->Input('phone_number');
        $address = $request->Input('address');
        $city = $request->Input('city');
        $district = $request->Input('district');
        $postal_code = $request->Input('postal_code');
        $email = strtolower($request->Input('email'));



        $user = User::findOrFail($id);
        $user->name = $name;
        $user->phone_number = $phone_number;
        $user->email = $email;

        if ($request->hasFile('image')) {
            $photoPath =  $request->file('image')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host .  "/public/storage/" . $photoName;
            $user->image = $location;
        }

        $user->address = $address;
        $user->city = $city;
        $user->district = $district;
        $user->postal_code = $postal_code;
        $user->save();

        session()->flash('success', 'Profile Updated Successfully');
        return redirect()->route('client.profile');
    }
    public function passwordResetView($id)
    {
        $data = [];
        $data['user'] = User::where('id', $id)->first();
        return view('client.pages.PasswordReset',  $data);
    }

    public function resetPassword(Request $request, $id)
    {

        $validator = Validator::make(request()->all(), [
            'email' => 'required | email',
            'oldPassword' => 'min:6|required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user=User::findOrFail($id);

        if ($user->email === $request->email && auth()->user()->email ===  $request->email ) {
            if (Hash::check( $request->Input('oldPassword'), $user->password)) {
                $user->password = bcrypt($request->Input('password'));
                $user->save();
                session()->flash('success', 'Password Updated Successfully');
                return redirect()->route('client.profile');
            }else{
                return redirect()->back()->with('error', 'Old Password is Wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong Credential');
        }
    }
}


