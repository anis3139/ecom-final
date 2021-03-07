<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\registerEmail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class userController extends Controller
{
    public function userIndex()
    {

        return view('admin.user.userIndex');
    }


    public function userData()
    {
        $result = json_decode(User::orderBy('id', 'desc')->get());

        return $result;

    }


    function userDelete(Request $req)
    {
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
        $id = $req->input('id');
        $result = json_encode(User::where('id', '=', $id)->get());
        return $result;
    }



    function userDataUpdate(Request $req)
    {

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
