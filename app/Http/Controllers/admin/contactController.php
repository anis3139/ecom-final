<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function MessageIndex(){
        if (is_null($this->user) || !$this->user->can('contact.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any contact !');
        }
        return view("admin.components.Contact");
    }

    public function getContactData()
    {
        if (is_null($this->user) || !$this->user->can('contact.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any contact !');
        }
        $result = json_decode(Contact::orderBy('id','desc')->get());
        return $result;
    }

    public function contactDelete(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('contact.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any contact !');
        }
        $id = $request->input("id");
        $result = Contact::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
