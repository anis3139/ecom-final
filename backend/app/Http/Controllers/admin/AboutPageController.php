<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAboutSecTionModel;
use App\Models\homeExclusiveFeaturesModel;
use App\Models\homeSpecialFeaturesModel;
use App\Models\TestimonialModel;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function homeAboutIndex(){

        $results = json_decode(HomeAboutSecTionModel::orderBy('id', 'desc')->get()->first());
        return view('admin.AboutPage', [
            'results'=>$results


        ]);
    }

    public function addTitle(Request $request)
    {
        $title = $request->input("title");

        $valuecheck = (HomeAboutSecTionModel::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = HomeAboutSecTionModel::where('id', '=',  $valuecheck['0']->id)->update(['title' => $title]);
        }
        else{
            $result = HomeAboutSecTionModel::insert(['title' => $title]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addDescription(Request $request)
    {
        $description = $request->input("description");



        $valuecheck = (HomeAboutSecTionModel::orderBy('id', 'desc')->get());

        try {


        if( count($valuecheck)>0){
            $result = HomeAboutSecTionModel::where('id', '=',  $valuecheck['0']->id)->first();
            $result->description = $description;
            $result->save();

        }
        else{
            $result =new  HomeAboutSecTionModel();
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

        $valuecheck = (HomeAboutSecTionModel::orderBy('id', 'desc')->get());

       $fileNames=$req->file('photo')->getClientOriginalExtension();
            $fileName=time().".".$fileNames;

        $photoPath =  $req->file('photo')->move(public_path('images/'), $fileName);

        $imageRealPath=asset('images')."/".$fileName;

        if( count($valuecheck)>0){
        $result = HomeAboutSecTionModel::where('id', '=',  $valuecheck['0']->id)->update(['image1' => $imageRealPath]);
        } else{
            $result = HomeAboutSecTionModel::insert(['image1' => $imageRealPath]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function imageAdd2(Request $req)
    {

        $valuecheck = (HomeAboutSecTionModel::orderBy('id', 'desc')->get());

       $fileNames=$req->file('photo')->getClientOriginalExtension();
            $fileName=time().".".$fileNames;

        $photoPath =  $req->file('photo')->move(public_path('images/'), $fileName);

        $imageRealPath=asset('images')."/".$fileName;

        if( count($valuecheck)>0){
        $result = HomeAboutSecTionModel::where('id', '=',  $valuecheck['0']->id)->update(['image2' => $imageRealPath]);
        } else{
            $result = HomeAboutSecTionModel::insert(['image2' => $imageRealPath]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
    function imageAdd3(Request $req)
    {

        $valuecheck = (HomeAboutSecTionModel::orderBy('id', 'desc')->get());

       $fileNames=$req->file('photo')->getClientOriginalExtension();
            $fileName=time().".".$fileNames;

        $photoPath =  $req->file('photo')->move(public_path('images/'), $fileName);

        $imageRealPath=asset('images')."/".$fileName;

        if( count($valuecheck)>0){
        $result = HomeAboutSecTionModel::where('id', '=',  $valuecheck['0']->id)->update(['image3' => $imageRealPath]);
        } else{
            $result = HomeAboutSecTionModel::insert(['image3' => $imageRealPath]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    function imageEXPAdd(Request $req)
    {

        $valuecheck = (HomeAboutSecTionModel::orderBy('id', 'desc')->get());

       $fileNames=$req->file('photo')->getClientOriginalExtension();
            $fileName=time().".".$fileNames;

        $photoPath =  $req->file('photo')->move(public_path('images/'), $fileName);

        $imageRealPath=asset('images')."/".$fileName;

        if( count($valuecheck)>0){
        $result = HomeAboutSecTionModel::where('id', '=',  $valuecheck['0']->id)->update(['exp_image' => $imageRealPath]);
        } else{
            $result = HomeAboutSecTionModel::insert(['exp_image' => $imageRealPath]);
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
        $result = json_decode(homeSpecialFeaturesModel::orderBy('id', 'desc')->get());
        return $result;
    }

    function homeSFAdd(Request $request)
    {

        $title = $request->input("title");
        $description = $request->input("description");

        $result = homeSpecialFeaturesModel::insert([
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
        $id = $req->input('id');
        $result = homeSpecialFeaturesModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }






    function HomeFSEdit(Request $req)
    {
        $id = $req->input('id');


        try {
            $result = json_encode(homeSpecialFeaturesModel::where('id', '=', $id)->get());
            return $result;
        } catch (\Throwable $th) {
           return response()->json(array('error'=>$th));
        }

    }



    function HomeFSUpdate(Request $request)
    {

        $id = $request->input("id");
        $title = $request->input("title");
        $description = $request->input("description");

            $result = homeSpecialFeaturesModel::where('id', '=', $id)->update(['title' => $title, 'description' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

    }






 public function getHomeExclusiveSpecialsData()
 {
     $results = json_decode(homeExclusiveFeaturesModel::orderBy('id', 'desc')->get());

     return $results;
 }



 function homeEXPAdd(Request $request)
 {

     $exp_title = $request->input("exp_title");
     $exp_description = $request->input("exp_description");

    try {
        $result = homeExclusiveFeaturesModel::insert([
            'exp_title' => $exp_title,
            'exp_description' => $exp_description
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
     $id = $req->input('id');
     $result = homeExclusiveFeaturesModel::where('id', '=', $id)->delete();
     if ($result == true) {
         return 1;
     } else {
         return 0;
     }
 }





 function HomeEXPEdit(Request $req)
 {
     $id = $req->input('id');

     try {
         $result = json_encode(homeExclusiveFeaturesModel::where('id', '=', $id)->get());
         return $result;
     } catch (\Throwable $th) {
        return response()->json(array('error'=>$th));
     }

 }


 function HomeEXPUpdate(Request $request)
    {

        $id = $request->input("id");
        $exp_title = $request->input("exp_title");
        $exp_description = $request->input("exp_description");

            $result = homeExclusiveFeaturesModel::where('id', '=', $id)->update(['exp_title' => $exp_title, 'exp_description' => $exp_description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

    }





    public function getHomeTestimonialData()
    {
        $results = json_decode(TestimonialModel::orderBy('id', 'desc')->get());
        return $results;
    }



    function TestimonialAdd(Request $req)
    {


        $data = json_decode($_POST['data']);

        $name = $data['0']->name;
        $description = $data['0']->description;
        $date = $data['0']->date;

       $fileNames=$req->file('photo')->getClientOriginalExtension();
            $fileName=time().".".$fileNames;

        $photoPath =  $req->file('photo')->move(public_path('images/'), $fileName);

        $imageRealPath=asset('images')."/".$fileName;


            try {
                $result = TestimonialModel::insert([
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




    function HomeTestimonialDelete(Request $req)
    {
        $id = $req->input('id');
        $result = TestimonialModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function  HomeTestimonialEdit(Request $req)
    {
        $id = $req->input('id');
        $result = json_encode(TestimonialModel::where('id', '=', $id)->get());
        return $result;
    }





    function TestimonilaUpdate(Request $req)
    {


        $data = json_decode($_POST['data']);

        $id = $data['0']->id;

        $name = $data['0']->name;
        $date = $data['0']->date;
        $description = $data['0']->description;
        if ($req->file('photo')) {

       $fileNames=$req->file('photo')->getClientOriginalExtension();
        $fileName=time().".".$fileNames;

        $photoPath =  $req->file('photo')->move(public_path('images/'), $fileName);

        $imageRealPath=asset('images')."/".$fileName;
            $result = TestimonialModel::where('id', '=', $id)->update(['name' => $name, 'date' => $date, 'description' => $description, 'image' => $imageRealPath]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = TestimonialModel::where('id', '=', $id)->update(['name' => $name, 'date' => $date, 'description' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }






    }




}
