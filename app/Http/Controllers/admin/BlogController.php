<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {

        return view('admin.components.Blog');
    }



    public function blogData()
    {
        $result = Blog::orderBy('created_at', 'desc')->get();
        return $result;
    }
    function Edit(Request $req)
    {
        $id = $req->input('id');
        $result = json_encode(Blog::where('id', '=', $id)->get());
        return $result;
    }

    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'post' => 'required|string',
            'status' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = $request->Input('id');
        $post = $request->Input('post');
        $status = $request->Input('status');


        $result = Blog::where('id', '=', $id)->update([
            'post' => $post,
            'status' => $status
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    function Delete(Request $req)
    {
        $id = $req->input('id');
        $result = Blog::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
