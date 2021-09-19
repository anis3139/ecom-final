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

    public function singleBlog($slug){
        $data = [];
        $data['blog'] = Blog::orderBy('created_at', 'desc')->where('status', 1)->where('slug', $slug)->first();
        return view('client.pages.SingleBlog', $data);
    }

}
