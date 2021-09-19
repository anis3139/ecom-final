<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {

        if (is_null($this->user) || !$this->user->can('blog.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any blog !');
        }
        return view('admin.components.Blog');
    }



    public function blogData()
    {
        if (is_null($this->user) || !$this->user->can('blog.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any blog !');
        }
        $result = Blog::orderBy('created_at', 'desc')->get();
        return $result;
    }
    function Edit(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('blog.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any blog !');
        }
        $id = $req->input('id');
        $result = json_encode(Blog::where('id', '=', $id)->get());
        return $result;
    }

    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('blog.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any blog !');
        }
        $data = json_decode($_POST['data'], true);
        $id = $data['id'];
        $post = $data['post'];
        $title = $data['title'];
        $status = $data['status'];

        if ($request->file('photo')) {
            $delete_old_file = Blog::where('id', '=', $id)->first();

            $delete_old_file_nameArr = (explode('/', $delete_old_file->image));
            $delete_old_file_name = end($delete_old_file_nameArr);
            Storage::delete("public/" . $delete_old_file_name);
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host . "/public/storage/" . $photoName;

            $result = Blog::where('id', '=', $id)->update(['title' => $title, 'post' => $post, 'meta_title' => $title, 'meta_description' => $post, 'status' => $status, 'image' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = Blog::where('id', '=', $id)->update(['title' => $title, 'post' => $post, 'status' => $status]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }


    function Delete(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('blog.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any blog !');
        }
        $id = $req->input('id');
        $result = Blog::where('id', '=', $id)->first();
        $delete_imageArr = (explode('/', $result->image));
        $delete_image = end($delete_imageArr);
        Storage::delete("public/" . $delete_image);
        $result = $result->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('blog.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Create any blog !');
        }

        $data = json_decode($_POST['data']);
        $title = $data['0']->title;
        $post = $data['0']->post;

            $slug=Str::slug($title);
            $next = 2;
            while (Blog::where('slug', '=', $slug)->first()) {
                $slug = $slug."-".$next;
                $next++;
            }


        $blog = new Blog;
        $blog->name = auth()->user()->name;
        $blog->title =  $title;
        $blog->meta_title =  $title;
        $blog->post =  $post;
        $blog->meta_description =  $post;
        $blog->slug =  $slug;

        if ($request->hasFile('photo')) {
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host .  "/public/storage/" . $photoName;
            $blog->image = $location;
        }
        $blog = $blog->save();
        if ($blog == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
