<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\registerEmail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function userIndex()
    {
        if (is_null($this->user) || !$this->user->can('user.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any user!');
        }
        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social Link !');
        }
        return view('admin.user.UserIndex');
    }


    public function userData()
    {
        if (is_null($this->user) || !$this->user->can('user.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any user!');
        }
        $result = json_decode(User::orderBy('id', 'desc')->get());

        return $result;

    }


    function userDelete(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('user.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any user!');
        }
        $id = $req->input('id');
        $result = User::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function userDetailEdit(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any user!');
        }
        $id = $req->input('id');
        $result = json_encode(User::where('id', '=', $id)->get());
        return $result;
    }



    function userDataUpdate(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any user!');
        }
        $id = $req->Input('id');
        $user=User::where('id', '=', $id)->first();

        $this->validate($req, [
            'name' => 'required',
            'email' => 'required |unique:users,email,' .$user->id,
            'phone_number_edit' => 'required|min:8| max:16|required |unique:users,phone_number,'.$user->id


          ]);

        $id = $req->Input('id');
        $name = $req->Input('name');
        $email = strtolower($req-> Input('email'));
        $phone_number_edit = $req-> Input('phone_number_edit');


        $result = User::where('id', '=', $id)->update([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number_edit

            ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    function userAdd(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('user.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any user!');
        }
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required | email |unique:users,email',
            'phone_number' => 'required|min:8| max:16|unique:users,phone_number',
            'password' => 'min:6|required'
        ]);


        $name = $req->Input('name');
        $password = $req->Input('password');
        $email =strtolower( $req->Input('email'));
        $phone_number = $req->Input('phone_number');


        $result = User::insert([
            'name' => $name,
            'password' =>  bcrypt($password),
            'email' => $email,
            'phone_number' => $phone_number,
            'email_verified_at'=>Carbon::now()
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
