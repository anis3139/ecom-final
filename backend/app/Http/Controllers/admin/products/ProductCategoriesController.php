<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategoryModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            $data = json_decode($_POST['data']);
            $name = $data['0']->name;
            $categories = $data['0']->categories;
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $location = "http://" . $host . "/storage/" . $photoName;

            $iconPath =  $request->file('icon')->store('public');
            $iconName = (explode('/', $iconPath))[1];
            $iconHost = $_SERVER['HTTP_HOST'];
            $iconNameLocation = "http://" . $iconHost . "/storage/" . $iconName;

            $slug=Str::slug($name);
            $next = 2;
            while (ProductsCategoryModel::where('slug', '=', $slug)->first()) {
                $slug = $slug."-".$next;
                $next++;
            }


            $result = ProductsCategoryModel::insert([
                'name' => $name,
                'parent_id' => $categories,
                'banner_image' => $location,
                'icon' => $iconNameLocation,
                'slug' => $slug,
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

        $id = $req->input('id');
        $result = json_encode(ProductsCategoryModel::where('id', '=', $id)->get());
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
        $data = json_decode($_POST['data']);
        $id = $data['0']->id;
        $name = $data['0']->name;
        $products_category_id = $data['0']->products_category_id;


        if ($request->file('photo') && $request->file('icon')) {

            $delete_old_file = ProductsCategoryModel::where('id', '=', $id)->first();
            $delete_old_file_name = (explode('/', $delete_old_file->banner_image))[4];
            Storage::delete("public/".$delete_old_file_name);
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $location = "http://" . $host . "/storage/" . $photoName;


            $delete_old_icon = ProductsCategoryModel::where('id', '=', $id)->first();
            $delete_old_icon_name = (explode('/', $delete_old_icon->icon))[4];
            Storage::delete("public/".$delete_old_icon_name);
            $iconPath =  $request->file('icon')->store('public');
            $iconName = (explode('/', $iconPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $icon_location = "http://" . $host . "/storage/" . $iconName;



            $result = ProductsCategoryModel::where('id', '=', $id)->update(['name' => $name, 'parent_id' => $products_category_id,  'icon' => $icon_location, 'banner_image' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
        else if ($request->file('photo')) {

            $delete_old_file = ProductsCategoryModel::where('id', '=', $id)->first();
            $delete_old_file_name = (explode('/', $delete_old_file->banner_image))[4];
            Storage::delete("public/".$delete_old_file_name);
            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $location = "http://" . $host . "/storage/" . $photoName;


            $result = ProductsCategoryModel::where('id', '=', $id)->update(['name' => $name, 'parent_id' => $products_category_id, 'banner_image' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
        else if ($request->file('icon')) {


            $delete_old_icon = ProductsCategoryModel::where('id', '=', $id)->first();
            $delete_old_icon_name = (explode('/', $delete_old_icon->icon))[4];
            Storage::delete("public/".$delete_old_icon_name);
            $iconPath =  $request->file('icon')->store('public');
            $iconName = (explode('/', $iconPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $icon_location = "http://" . $host . "/storage/" . $iconName;


            $result = ProductsCategoryModel::where('id', '=', $id)->update(['name' => $name, 'parent_id' => $products_category_id, 'icon' => $icon_location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = ProductsCategoryModel::where('id', '=', $id)->update(['name' => $name, 'parent_id' => $products_category_id]);
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

        $id = $request->input('id');
        $category = ProductsCategoryModel::find($id);

        if ($category->parent_id==0) {

            $sub_categories = ProductsCategoryModel::orderBy('name', 'desc')->where('parent_id', $category->id) ->orWhere('parent_id', 0)->get();
            foreach ($sub_categories as $sub) {
                $delete_old_file_image = (explode('/', $sub->banner_image))[4];
                $delete_old_file_icon = (explode('/', $sub->icon))[4];
                Storage::delete("public/".$delete_old_file_image);
                Storage::delete("public/".$delete_old_file_icon);
                $result = $sub->delete();
            }
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }

        }
            $delete_old_file = ProductsCategoryModel::where('id', '=', $id)->first();
            $delete_old_file_image = (explode('/', $delete_old_file->banner_image))[4];
            $delete_old_file_icon = (explode('/', $delete_old_file->icon))[4];
            Storage::delete("public/".$delete_old_file_image);
            Storage::delete("public/".$delete_old_file_icon);
            $result = $delete_old_file->delete();
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }








}

    public function getCategoriesData(){
        $result = json_decode(ProductsCategoryModel::with('parent')->orderBy('id', 'desc')->get());
        return $result;

    }

    public function getCategoriesParantData(){
        $main_categories = ProductsCategoryModel::orderBy('name', 'desc')->where('parent_id', 0)->get();
        return $main_categories;

    }









}
