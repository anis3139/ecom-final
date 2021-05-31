<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
   public function index(){
        $data=[];
        $data['posts']=Blog::orderBy('created_at', 'desc')->where('status', 1)->paginate(2);
        return view('client.pages.Blog', $data);
    }
    public function store(Request $request){
        $validator=Validator::make(request()->all(),[
            'name'=>'required|string',
            'post'=>'required|string',

           ]);

           if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
            }

        $name=auth()->user()->name;
        $post=$request->post;

        $blog=Blog::create([
            'name'=>$name,
            'post'=>$post,
        ]);

        if($blog==true){
            session()->flash('success', 'Post Create Successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Something Wrong...');
            return redirect()->back();
        }

    }
}
