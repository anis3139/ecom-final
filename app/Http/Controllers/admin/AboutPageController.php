<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\ExclusiveFeature;
use App\Models\SpecialFeature;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function homeAboutIndex(){
        if (is_null($this->user) || !$this->user->can('about.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any about !');
        }
        $results = json_decode(AboutPage::orderBy('id', 'desc')->get()->first());
        return view('admin.AboutPage', [
            'results'=>$results


        ]);
    }

    public function addTitle(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $title = $request->input("title");

        $valuecheck = (AboutPage::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = AboutPage::where('id', '=',  $valuecheck['0']->id)->update(['title' => $title]);
        }
        else{
            $result = AboutPage::insert(['title' => $title]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addDescription(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $description = $request->input("description");



        $valuecheck = (AboutPage::orderBy('id', 'desc')->get());

        try {


        if( count($valuecheck)>0){
            $result = AboutPage::where('id', '=',  $valuecheck['0']->id)->first();
            $result->description = $description;
            $result->save();

        }
        else{
            $result =new  AboutPage();
            $result->description = $description;
            $result->save();

        }
    } catch (\Throwable $th) {
       return response()->json(array('error'=>$th));
    }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    function imageAdd(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $valuecheck = (AboutPage::orderBy('id', 'desc')->get());

        $fileNames =  $req->file('photo')->store('public');
        $fileName = (explode('/', $fileNames))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $imageRealPath =  $protocol . $hostName . "/public/storage/" . $fileName;


        if( count($valuecheck)>0){


        $result = AboutPage::where('id', '=',  $valuecheck['0']->id)->update(['image1' => $imageRealPath]);

        } else{

            $result = AboutPage::insert(['image1' => $imageRealPath]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function imageAdd2(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $valuecheck = (AboutPage::orderBy('id', 'desc')->get());

        $fileNames =  $req->file('photo')->store('public');
        $fileName = (explode('/', $fileNames))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $imageRealPath =  $protocol . $hostName . "/public/storage/" . $fileName;

        if( count($valuecheck)>0){

        $result = AboutPage::where('id', '=',  $valuecheck['0']->id)->update(['image2' => $imageRealPath]);
        } else{
            $result = AboutPage::insert(['image2' => $imageRealPath]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
    function imageAdd3(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $valuecheck = (AboutPage::orderBy('id', 'desc')->get());

        $fileNames =  $req->file('photo')->store('public');
        $fileName = (explode('/', $fileNames))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $imageRealPath =  $protocol . $hostName . "/public/storage/" . $fileName;


        if( count($valuecheck)>0){

        $result = AboutPage::where('id', '=',  $valuecheck['0']->id)->update(['image3' => $imageRealPath]);
        } else{
            $result = AboutPage::insert(['image3' => $imageRealPath]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    function imageEXPAdd(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $valuecheck = (AboutPage::orderBy('id', 'desc')->get());




        $fileNames =  $req->file('photo')->store('public');
        $fileName = (explode('/', $fileNames))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $imageRealPath =  $protocol . $hostName . "/public/storage/" . $fileName;


        if( count($valuecheck)>0){

        $result = AboutPage::where('id', '=',  $valuecheck['0']->id)->update(['exp_image' => $imageRealPath]);
        } else{
            $result = AboutPage::insert(['exp_image' => $imageRealPath]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



 //special Feature Section

    public function getHomeFeaturedSpecialsData()
    {
        if (is_null($this->user) || !$this->user->can('about.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any about !');
        }
        $result = json_decode(SpecialFeature::orderBy('id', 'desc')->get());
        return $result;
    }

    function homeSFAdd(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $title = $request->input("title");
        $description = $request->input("description");

        $result = SpecialFeature::insert([
            'title' => $title,
            'description' => $description
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    function HomeFSDelete(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any about !');
        }
        $id = $req->input('id');
        $result = SpecialFeature::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }






    function HomeFSEdit(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any about !');
        }
        $id = $req->input('id');
        try {
            $result = json_encode(SpecialFeature::where('id', '=', $id)->get());
            return $result;
        } catch (\Throwable $th) {
           return response()->json(array('error'=>$th));
        }

    }



    function HomeFSUpdate(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('about.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any about !');
        }
        $id = $request->input("id");
        $title = $request->input("title");
        $description = $request->input("description");

            $result = SpecialFeature::where('id', '=', $id)->update(['title' => $title, 'description' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

    }






 public function getHomeExclusiveSpecialsData()
 {
    if (is_null($this->user) || !$this->user->can('about.view')) {
        abort(403, 'Sorry !! You are Unauthorized to view any about !');
    }
     $results = json_decode(ExclusiveFeature::orderBy('id', 'desc')->get());

     return $results;
 }



 function homeEXPAdd(Request $request)
 {
    if (is_null($this->user) || !$this->user->can('about.create')) {
        abort(403, 'Sorry !! You are Unauthorized to create any about !');
    }
     $title = $request->input("title");
     $description = $request->input("description");

    try {
        $result = ExclusiveFeature::insert([
            'title' => $title,
            'description' => $description
        ]);
    } catch (\Throwable $th) {
        return response()->json(array('error'=>$th));
    }


     if ($result == true) {
         return 1;
     } else {
         return 0;
     }
 }





 function HomeEXFDelete(Request $req)
 {
    if (is_null($this->user) || !$this->user->can('about.delete')) {
        abort(403, 'Sorry !! You are Unauthorized to delete any about !');
    }
     $id = $req->input('id');
     $result = ExclusiveFeature::where('id', '=', $id)->delete();
     if ($result == true) {
         return 1;
     } else {
         return 0;
     }
 }





 function HomeEXPEdit(Request $req)
 {
    if (is_null($this->user) || !$this->user->can('about.edit')) {
        abort(403, 'Sorry !! You are Unauthorized to edit any about !');
    }
     $id = $req->input('id');

     try {
         $result = json_encode(ExclusiveFeature::where('id', '=', $id)->get());
         return $result;
     } catch (\Throwable $th) {
        return response()->json(array('error'=>$th));
     }

 }


 function HomeEXPUpdate(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('about.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any about !');
        }
        $id = $request->input("id");
        $title = $request->input("title");
        $description = $request->input("description");

            $result = ExclusiveFeature::where('id', '=', $id)->update(['title' => $title, 'description' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

    }





    public function getTestimonialData()
    {
        if (is_null($this->user) || !$this->user->can('about.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any about !');
        }
        $results = json_decode(Testimonial::orderBy('id', 'desc')->get());
        return $results;
    }



    function TestimonialAdd(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('about.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any about !');
        }
        $data = json_decode($_POST['data']);

        $name = $data['0']->name;
        $description = $data['0']->description;
        $date = $data['0']->date;


        $fileNames =  $req->file('photo')->store('public');
        $fileName = (explode('/', $fileNames))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $imageRealPath =  $protocol . $hostName . "/public/storage/" . $fileName;


            try {
                $result = Testimonial::insert([
                    'name' => $name,
                    'description' => $description,
                    'image' => $imageRealPath,
                    'date' => $date,
                ]);
            } catch (\Throwable $th) {
              return response()->json(array('error'=>$th));
            }


        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }




    function TestimonialDelete(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any about !');
        }
        $id = $req->input('id');
        $delete_old_file = Testimonial::where('id', '=', $id)->first();
        $delete_old_file_nameArr = (explode('/', $delete_old_file->image));
        $delete_old_file_name = end($delete_old_file_nameArr);
        Storage::delete("public/".$delete_old_file_name);
        $result = $delete_old_file->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }



    }

    function  TestimonialEdit(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('about.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any about !');
        }
        $id = $req->input('id');
        $result = json_encode(Testimonial::where('id', '=', $id)->get());
        return $result;
    }





    function TestimonilaUpdate(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('about.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any about !');
        }

        $data = json_decode($_POST['data']);

        $id = $data['0']->id;

        $name = $data['0']->name;
        $date = $data['0']->date;
        $description = $data['0']->description;


        if ($req->file('photo')) {

        $delete_old_file = Testimonial::where('id', '=', $id)->first();
        $delete_old_file_nameArr = (explode('/', $delete_old_file->image));
        $delete_old_file_name = end($delete_old_file_nameArr);
        Storage::delete("public/".$delete_old_file_name);

        $fileNames =  $req->file('photo')->store('public');
        $fileName = (explode('/', $fileNames))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $imageRealPath =  $protocol . $hostName . "/public/storage/" . $fileName;






        $result = Testimonial::where('id', '=', $id)->update(['name' => $name, 'date' => $date, 'description' => $description, 'image' => $imageRealPath]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = Testimonial::where('id', '=', $id)->update(['name' => $name, 'date' => $date, 'description' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }






    }




}
