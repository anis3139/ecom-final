<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function AdminIndex()
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        return view('admin.components.AdminIndex');
    }


    public function adminData()
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }


        $result = json_decode(Admin::with('roles')->orderBy('id', 'desc')->get());

        return $result;

    }


    public function adminRole()
    {

        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to View any role !');
        }


        $result = json_encode(Role::all());

        return $result;

    }


    function adminDelete(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }
        $id = $req->input('id');
        $result = Admin::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function adminDetailEdit(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $id = $req->input('id');
        $result = json_encode(Admin::with('roles')->where('id', '=', $id)->get());
        return $result;
    }



    function adminDataUpdate(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $id = $req->Input('id');
        $name = $req->Input('name');
        $password = $req->Input('password');
        $username = $req->Input('username');
        $role = $req->Input('roleUpdate');
        $statusUpdate = $req->Input('statusUpdate');
        $email = strtolower($req-> Input('email'));

        $this->validate($req, [
            'name'  => 'required',
            'username'  => 'required|unique:admins,username,'.$id,
            'email'  => 'required|email|unique:admins,email,'.$id,
            'roleUpdate'  => 'required',
            'statusUpdate'  => 'required',
            'password'  => 'nullable|min:6',
          ]);



        $user = Admin::find($id);
          $user->name = $name;
          if ($password) {
              $user->password = bcrypt($password);
          }
          $user->username = $username;
          $user->email = $email;
          $user->status = $statusUpdate;
          $user->save();


        $user->roles()->detach();
        if ($role) {
            $user->assignRole($role);
        }

        if ($user == true) {
            return 1;
        } else {
            return 0;
        }
    }



    function adminAdd(Request $req)
    {


        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $this->validate($req, [
            'name'  => 'required',
            'username'  => 'required|unique:admins,username',
            'email'  => 'required|email|unique:admins,email',
            'role'  => 'required',
            'status'  => 'required',
            'password'  => 'required|max:13|min:6',
          ]);

        $name = $req->Input('name');
        $password = $req->Input('password');
        $username = $req->Input('username');
        $role = $req->Input('role');
        $status = $req->Input('status');
        $email =strtolower( $req->Input('email'));


        $user = new Admin;
         $user->name = $name;
         $user->password =  bcrypt($password);
         $user->username = $username;
         $user->email = $email;
         $user->status = $status;
         $user->save();

        if ($role) {
            $user->assignRole($role);
        }


        if ($user) {
            return 1;
        } else {
            return 0;
        }
    }
}
