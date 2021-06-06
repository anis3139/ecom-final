<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
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

        $data = json_decode($_POST['data'], true);
        $id = $data['id'];
        $post = $data['post'];
        $status = $data['status'];

        if ($request->file('photo')) {
            $delete_old_file = Blog::where('id', '=', $id)->first();

            $delete_old_file_name = (explode('/', $delete_old_file->image))[5];
            Storage::delete("public/".$delete_old_file_name);
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host . "/public/storage/" . $photoName;

            $result = Blog::where('id', '=', $id)->update(['post' => $post, 'status' => $status, 'image' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = Blog::where('id', '=', $id)->update(['post' => $post, 'status' => $status]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }


    function Delete(Request $req)
    {
        $id = $req->input('id');
        $result = Blog::where('id', '=', $id)->first();
        $delete_image = (explode('/', $result->image))[5];
        Storage::delete("public/".$delete_image);
        $result =$result->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
