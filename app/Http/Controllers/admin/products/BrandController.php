<?php
namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Illuminate\Support\Str;


class BrandController extends Controller
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
        if (is_null($this->user) || !$this->user->can('brand.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any brand !');
        }
        return view('admin.components.Brands');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('brand.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Create any brand !');
        }

        return view('admin.components.addBrands');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('brand.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Create any brand !');
        }
        try {



        $data = json_decode($_POST['data']);
        $name = $data['0']->name;
        $photoPath =  $request->file('photo')->store('public');
        $photoName = (explode('/', $photoPath))[1];
        $host = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';

        $location =$protocol . $host . "/public/storage/" . $photoName;


        $slug = Str::slug($name);
        $next = 2;
        while (Brand::where('slug', '=', $slug)->first()) {
            $slug = $slug . "-" . $next;
            $next++;
        }

        $result = Brand::insert([
            'name' => $name,
            'image' => $location,
            'slug' => $slug,
            'created_by' => Auth::guard('admin')->user()->id,

        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    } catch (\Throwable $th) {
        return response()->json(array('error',$th));
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {

        if (is_null($this->user) || !$this->user->can('brand.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any brand !');
        }
        $id = $req->input('id');
        $result = json_encode(Brand::where('id', '=', $id)->get());
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('brand.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any brand !');
        }
        $id = $request->input('id');
        $delete_old_file = Brand::where('id', '=', $id)->first();
        $delete_old_file_nameArr = (explode('/', $delete_old_file->image));
        $delete_old_file_name = end($delete_old_file_nameArr);

        Storage::delete("public/".$delete_old_file_name);
        $delete_old_file->update(['deleted_by' => Auth::guard('admin')->user()->id]);
        $result = $delete_old_file->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }


    public function getBrandData(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('brand.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any brand !');
        }
        $result = Brand::all();
        return $result ;

    }

    public function updateBrand(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('brand.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to Edit any brand !');
        }
        $data = json_decode($_POST['data']);
        $id = $data['0']->id;
        $name = $data['0']->name;

        if ($request->file('photo')) {


            $delete_old_file = Brand::where('id', '=', $id)->first();
            $delete_old_file_nameArr = (explode('/', $delete_old_file->image));
            $delete_old_file_name = end($delete_old_file_nameArr);

            Storage::delete("public/".$delete_old_file_name);



            $photoPath =  $request->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $location = $protocol . $host . "/public/storage/" . $photoName;


            $result = Brand::where('id', '=', $id)->update(['name' => $name,  'image' => $location,
            'updated_by' => Auth::guard('admin')->user()->id]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = Brand::where('id', '=', $id)->update(['name' => $name,
            'updated_by' => Auth::guard('admin')->user()->id,]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }

    }

}
