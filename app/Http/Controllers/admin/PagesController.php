<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PagesController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function PageIndex()
    {
        if (is_null($this->user) || !$this->user->can('pages.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any  pages!');
        }
       return view('admin.components.Pages');
    }

    public function PagesData()
    {
        if (is_null($this->user) || !$this->user->can('pages.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any  pages!');
        }
        $result = Page::orderBy('id', 'desc')->get();
        return $result;
    }

    function PagesAdd(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('pages.create')) {
            abort(403, 'Sorry !! You are Unauthorized to  create pages!');
        }
        $data = json_decode($_POST['data']);
        $name = $data['0']->name;
        $description = $data['0']->description;
        $status = $data['0']->status;


        $slug = Str::slug($name);
        $next = 2;
        while (Page::where('slug', '=', $slug)->first()) {
            $slug = $slug . "-" . $next;
            $next++;
        }


        $result = Page::insert([
            'title' => $name,
            'description' => $description,
            'status' => $status,
            'slug'=> $slug
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }



    function PagesDetailEdit(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('pages.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any  pages!');
        }
        $id = $req->input('id');
        $result = json_encode(Page::where('id', '=', $id)->get());
        return $result;
    }



    function PagesUpdate(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('pages.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any  pages!');
        }

        $data = json_decode($_POST['data']);
        $id = $data['0']->id;
        $name = $data['0']->name;
        $description = $data['0']->description;
        $statusUpdate = $data['0']->statusUpdate;
        $result = Page::where('id', '=', $id)->update(['title' => $name, 'description' => $description,'status' => $statusUpdate]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }

    function PagesDelete(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('pages.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any  pages!');
        }
        $id = $req->input('id');
        $result = Page::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;

        }
    }




}
