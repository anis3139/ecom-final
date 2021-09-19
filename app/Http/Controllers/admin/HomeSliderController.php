<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function SliderIndex(){
        if (is_null($this->user) || !$this->user->can('slider.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any slider !');
        }
        return view('admin.components.Slider');
    }

    public function SliderData()
    {
        if (is_null($this->user) || !$this->user->can('slider.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any slider !');
        }
        $result = Slider::orderBy('id', 'desc')->get();
        return $result;
    }

    function SliderAdd(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('slider.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any slider !');
        }
        $data = json_decode($_POST['data']);
        $name = $data['0']->name;
        $description = $data['0']->description;

        $photoPath =  $req->file('photo')->store('public');
        $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host .  "/public/storage/" . $photoName;
        $result = Slider::insert([
            'title' => $name,
            'sub_title' => $description,
            'image' => $location,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    function SliderDetailEdit(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('slider.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any slider !');
        }
        $id = $req->input('id');
        $result = json_encode(Slider::where('id', '=', $id)->get());
        return $result;
    }



    function SliderUpdate(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('slider.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any slider !');
        }
        $data = json_decode($_POST['data']);
        $id = $data['0']->id;
        $name = $data['0']->name;
        $description = $data['0']->description;
        if ($req->file('photo')) {


        $delete_old_file = Slider::where('id', '=', $id)->first();
        $delete_old_file_nameArr = (explode('/', $delete_old_file->image));
        $delete_old_file_name = end($delete_old_file_nameArr);

        Storage::delete("public/".$delete_old_file_name);



            $photoPath =  $req->file('photo')->store('public');
  $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host .  "/public/storage/" . $photoName;

            $result = Slider::where('id', '=', $id)->update(['title' => $name, 'sub_title' => $description, 'image' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = Slider::where('id', '=', $id)->update(['title' => $name, 'sub_title' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }

    }

    function SliderDelete(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('slider.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any slider !');
        }
        $id = $req->input('id');
        $delete_old_file = Slider::where('id', '=', $id)->first();
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


}
