<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $data = [];
        $data['posts'] = Blog::orderBy('created_at', 'desc')->where('status', 1)->paginate(10);
        return view('client.pages.Blog', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string',
            'post' => 'required|string',
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $blog = new Blog;
        $blog->name = auth()->user()->name;
        $blog->post =  $request->post;
        $blog->title =  $request->title;

        if ($request->hasFile('image')) {
            $photoPath =  $request->file('image')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host .  "/public/storage/" . $photoName;
            $blog->image = $location;
        }
        $blog = $blog->save();
        if ($blog == true) {
            session()->flash('success', 'Post Create Successfully');
            return redirect()->back();
        } else {
            session()->flash('error', 'Something Wrong...');
            return redirect()->back();
        }
    }
}
