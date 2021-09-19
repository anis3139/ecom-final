<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Category !');
        }
        return view('admin.components.Categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any Category !');
        }
            $data = json_decode($_POST['data']);
            $name = $data['0']->name;
            $status = $data['0']->catStatus;
            $is_menu = $data['0']->is_menu;
            $is_homepage = $data['0']->is_homepage;

            $categories = $data['0']->categories != null ? $data['0']->categories : null;

            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host =$_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host . "/public/storage/" . $photoName;



            $iconPath =  $request->file('icon')->store('public');
            $iconName = (explode('/', $iconPath))[1];
            $iconHost = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $iconNameLocation =  $protocol . $iconHost . "/public/storage/" . $iconName;

            $slug=Str::slug($name);
            $next = 2;
            while (Category::where('slug', '=', $slug)->first()) {
                $slug = $slug."-".$next;
                $next++;
            }


            $result = Category::insert([
                'name' => $name,
                'status' => $status,
                'is_homepage' => $is_homepage,
                'is_menu' => $is_menu,
                'parent_id' => $categories,
                'banner_image' => $location,
                'icon' => $iconNameLocation,
                'slug' => $slug,
                'created_by' => Auth::guard('admin')->user()->id,
            ]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Category !');
        }
        $id = $req->input('id');
        $result = json_encode(Category::where('id', '=', $id)->get());
        return $result;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Category !');
        }
        $data = json_decode($_POST['data']);
        $id = $data['0']->id;
        $name = $data['0']->name;
        $catEditStatus = $data['0']->catEditStatus;
        $catEdit_is_menu = $data['0']->catEdit_is_menu;
        $catEdit_is_homepage = $data['0']->catEdit_is_homepage;
        $products_category_id = $data['0']->products_category_id != null ? $data['0']->products_category_id : null;


        if ($request->file('photo') && $request->file('icon')) {

            $delete_old_file = Category::where('id', '=', $id)->first();
            $delete_old_file_nameArr = (explode('/', $delete_old_file->banner_image));
            $delete_old_file_name = end($delete_old_file_nameArr);
            Storage::delete("public/".$delete_old_file_name);
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host . "/public/storage/" . $photoName;


            $delete_old_icon = Category::where('id', '=', $id)->first();
            $delete_old_icon_nameArr = (explode('/', $delete_old_icon->icon));
            $delete_old_icon_name = end( $delete_old_icon_nameArr);
            Storage::delete("public/".$delete_old_icon_name);
            $iconPath =  $request->file('icon')->store('public');
            $iconName = (explode('/', $iconPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $icon_location =  $protocol . $host ."/public/storage/" . $iconName;



            $result = Category::where('id', '=', $id)->update(['name' => $name, 'status' => $catEditStatus,'is_menu' => $catEdit_is_menu,'is_homepage' => $catEdit_is_homepage, 'parent_id' => $products_category_id,  'icon' => $icon_location, 'banner_image' => $location, 'updated_by' => Auth::guard('admin')->user()->id]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
        else if ($request->file('photo')) {

            $delete_old_file = Category::where('id', '=', $id)->first();
            $delete_old_file_nameArr = (explode('/', $delete_old_file->banner_image));
            $delete_old_file_name = end($delete_old_file_nameArr);
            Storage::delete("public/".$delete_old_file_name);
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location =  $protocol . $host . "/public/storage/" . $photoName;


            $result = Category::where('id', '=', $id)->update(['name' => $name, 'status' => $catEditStatus,'is_menu' => $catEdit_is_menu,'is_homepage' => $catEdit_is_homepage,  'parent_id' => $products_category_id, 'banner_image' => $location, 'updated_by' => Auth::guard('admin')->user()->id]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
        else if ($request->file('icon')) {


            $delete_old_icon = Category::where('id', '=', $id)->first();
            $delete_old_icon_nameArr = (explode('/', $delete_old_icon->icon));
            $delete_old_icon_name = end($delete_old_icon_nameArr);
            Storage::delete("public/".$delete_old_icon_name);
            $iconPath =  $request->file('icon')->store('public');
            $iconName = (explode('/', $iconPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $icon_location =  $protocol  . $host . "/public/storage/" . $iconName;


            $result = Category::where('id', '=', $id)->update(['name' => $name, 'status' => $catEditStatus,'is_menu' => $catEdit_is_menu,'is_homepage' => $catEdit_is_homepage,  'parent_id' => $products_category_id, 'icon' => $icon_location, 'updated_by' => Auth::guard('admin')->user()->id]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = Category::where('id', '=', $id)->update(['name' => $name, 'status' => $catEditStatus,'is_menu' => $catEdit_is_menu,'is_homepage' => $catEdit_is_homepage,  'parent_id' => $products_category_id, 'updated_by' => Auth::guard('admin')->user()->id]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Category !');
        }

        $id = $request->input('id');
        $category = Category::find($id);

        if ($category->parent_id == null) {

            $sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id) ->orWhere('id', $category->id)->get();

            foreach ($sub_categories as $sub) {
                $delete_old_file_imageArr = (explode('/', $sub->banner_image));
                $delete_old_file_image = end($delete_old_file_imageArr);
                $delete_old_file_iconArr = (explode('/', $sub->icon));
                $delete_old_file_icon = end($delete_old_file_iconArr);
                Storage::delete("public/".$delete_old_file_image);
                Storage::delete("public/".$delete_old_file_icon);
                $sub->update(['deleted_by' => Auth::guard('admin')->user()->id]);
                $result = $sub->delete();
            }
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

        }
            $delete_old_file = Category::where('id', '=', $id)->first();
            $delete_old_file_imageArr = (explode('/', $delete_old_file->banner_image));
            $delete_old_file_image = end($delete_old_file_imageArr);
            $delete_old_file_iconArr = (explode('/', $delete_old_file->icon));
            $delete_old_file_icon = end($delete_old_file_iconArr);
            Storage::delete("public/".$delete_old_file_image);
            Storage::delete("public/".$delete_old_file_icon);
            $delete_old_file->update(['deleted_by' => Auth::guard('admin')->user()->id]);
            $result = $delete_old_file->delete();
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }








}

    public function getCategoriesData(){
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Category !');
        }
        $result = json_decode(Category::with('parent')->orderBy('id', 'desc')->get());

        return $result;

    }

    public function getCategoriesParantData(){
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Category !');
        }
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
        return $main_categories;

    }






}
