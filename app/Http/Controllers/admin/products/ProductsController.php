<?php

namespace App\Http\Controllers\admin\products;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Models\meserments;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Product !');
        }
        return view('admin.components.Products');
    }



    public function getProductData()
    {
        if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Product !');
        }
        $result = json_decode(Product::with(['getCategory', 'getBrand', 'image'])->where('vendor_id', null)->orderBy('id', 'desc')->get());
        return $result;
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


        if (is_null($this->user) || !$this->user->can('product.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any Product !');
        }
        $data = json_decode($_POST['data']);
        $name = $data['0']->name;
        $description = $data['0']->description;
        $sku = $data['0']->sku;
        $purchase_price = $data['0']->purchase_price;
        $product_price = $data['0']->product_price;
        $discount = $data['0']->discount;
        $product_selling_price = $data['0']->product_selling_price;
        $product_quantity = $data['0']->product_quantity;
        $category_id = $data['0']->category_id;
        $brand_id = $data['0']->brand_id;
        $stock = $data['0']->stock;
        $feture_products = $data['0']->feture_products;
        $status = $data['0']->status;
        $pdmesermentValue = $data['0']->pdmesermentValue;
        $product_colors = $data['0']->product_colors;
        $selectedmesermentId = $data['0']->selectedmesermentId;
        $pdTax = $data['0']->pdTax;


        $slug = Str::slug($name);
        $next = 2;
        while (Product::where('slug', '=', $slug)->first()) {
            $slug = $slug . "-" . $next;
            $next++;
        }

        $result = new Product();
        $result->name = $name;
        $result->description = $description;
        $result->meta_title = $name;
        $result->meta_description = $description;
        $result->sku = $sku;
        $result->purchase_price = $purchase_price;
        $result->product_price = $product_price;
        $result->discount = $discount;
        $result->product_selling_price = $product_selling_price;
        $result->product_quantity = $product_quantity;
        $result->category_id = $category_id;
        $result->brand_id = $brand_id;
        $result->stock = $stock;
        $result->feture_products = $feture_products;
        $result->product_meserment_type = $selectedmesermentId;
        $result->status = $status;
        $result->slug = $slug;
        $result->product_tax = $pdTax;
        $result->color =json_encode($product_colors);
        $result->created_by = Auth::guard('admin')->user()->id;
        $result->save();
        $last_id = $result->id;

        $words = explode(" ", $name);
        $acronym = "";
        foreach ($words as $w) {
            $acronym .= $w[0];
        }

        $collectName= $acronym ?? Str::random(3);
        $lastPId= "#".strtolower($collectName)."-".$result->id;
        $pdId =Product::findOrFail($result->id);
        $pdId->product_id = $lastPId;
        $pdId->save();


        if (count($request->images) > 0) {
            $i = 0;
            foreach ($request->images as $image) {

                $img = time() . $i . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/storage/'), $img);
                $productImageOnehost = $_SERVER['HTTP_HOST'];
                $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $productImageOnelocation = $protocol . $productImageOnehost .  "/public/storage/" . $img;
                $imagemodel = new ProductImage();
                $imagemodel->image_path = "$productImageOnelocation";
                $imagemodel->product_id = $last_id;
                $imagemodel->save();
                $i++;
            }
        }

        if (count($pdmesermentValue) > 0) {

            for ($mersement = 0; $mersement < count($pdmesermentValue); $mersement++) {
                $pdmeserment = new meserments();
                $pdmeserment->product_id = $last_id;
                $pdmeserment->meserment_value = $pdmesermentValue[$mersement];
                $pdmeserment->save();
            }
        }




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

        if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Product !');
        }
        $id = $req->input('id');
        $result = json_encode(Product::with(['getCategory', 'getBrand', 'image', 'vendor', 'maserment'])->where('id', '=', $id)->get());
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

        if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Product !');
        }
        $data = json_decode($_POST['data']);
        $product_id_edit = $data['0']->product_id_edit;
        $pdEditName = $data['0']->pdEditName;
        $pdEditDescription = $data['0']->pdEditDescription;
        $pdEditSku = $data['0']->pdEditSku;
        $pdEditPurchasePrice = $data['0']->pdEditPurchasePrice;
        $pdEditPrice = $data['0']->pdEditPrice;
        $pdEditSaving = $data['0']->pdEditSaving;
        $pdEditOffer = $data['0']->pdEditOffer;
        $pdEditQuantity = $data['0']->pdEditQuantity;
        $pdEditCategory = $data['0']->pdEditCategory;
        $pdEditBrand = $data['0']->pdEditBrand;
        $pdEditStock = $data['0']->pdEditStock;
        $pdEditFeature = $data['0']->pdEditFeature;
        $pdEditStatus = $data['0']->pdEditStatus;
        $pdmesermentValueEdit = $data['0']->pdmesermentValueEdit;
        $slelctedmesermentEdit = $data['0']->slelctedmesermentEdit;
        $editedValueOfColor = json_encode($data['0']->editedValueOfColor);
        $pdEditTax = $data['0']->pdEditTax;





        if ($pdmesermentValueEdit !== null) {
            meserments::where('product_id', $product_id_edit)->delete();

            for ($meserments = 0; $meserments < count($pdmesermentValueEdit); $meserments++) {
                $data = new meserments();
                $data->product_id = $product_id_edit;
                $data->meserment_value = $pdmesermentValueEdit[$meserments];
                $data->save();
            }
        }





        if ($request->has('images')) {

            $ProductImage = ProductImage::where('product_id', $product_id_edit)->get();
            foreach ($ProductImage as  $product_has_images_value) {
                $delete_old_file = ProductImage::where('id', '=', $product_has_images_value->id)->first();
                $delete_old_file_nameArr = (explode('/', $delete_old_file->image_path));
                $delete_old_file_name = end($delete_old_file_nameArr);
                Storage::delete("public/" . $delete_old_file_name);
                $delete_old_file->delete();
            }



            $i = 0;
            foreach ($request->images as $image) {
                $img = time() . $i . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/storage/'), $img);
                $productImageOnehost = $_SERVER['HTTP_HOST'];
                $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $productImageOnelocation = $protocol . $productImageOnehost .  "/public/storage/" . $img;
                $imagemodel = new ProductImage();
                $imagemodel->image_path = $productImageOnelocation;
                $imagemodel->product_id = $product_id_edit;
                $imagemodel->save();
                $i++;
            }


            $result = Product::where('id', '=', $product_id_edit)->first();
            $result->name = $pdEditName;
            $result->description = $pdEditDescription;
            $result->meta_title = $pdEditName;
            $result->meta_description = $pdEditDescription;
            $result->sku = $pdEditSku;
            $result->purchase_price = $pdEditPurchasePrice;
            $result->product_price = $pdEditPrice;
            $result->discount = $pdEditSaving;
            $result->product_selling_price = $pdEditOffer;
            $result->product_quantity = $pdEditQuantity;
            $result->category_id = $pdEditCategory;
            $result->brand_id = $pdEditBrand;
            $result->stock = $pdEditStock;
            $result->feture_products = $pdEditFeature;
            $result->status = $pdEditStatus;
            $result->product_meserment_type = $slelctedmesermentEdit;
            $result->color = $editedValueOfColor;
            $result->product_tax = $pdEditTax;
            $result->updated_by = Auth::guard('admin')->user()->id;
            $status = $result->save();

            if ($status == true) {
                return 1;
            } else {
                return 0;
            }
        } else {

            $result = Product::where('id', '=', $product_id_edit)->first();
            $result->name = $pdEditName;
            $result->description = $pdEditDescription;
            $result->meta_title = $pdEditName;
            $result->meta_description = $pdEditDescription;
            $result->sku = $pdEditSku;
            $result->purchase_price = $pdEditPurchasePrice;
            $result->product_price = $pdEditPrice;
            $result->discount = $pdEditSaving;
            $result->product_selling_price = $pdEditOffer;
            $result->product_quantity = $pdEditQuantity;
            $result->category_id = $pdEditCategory;
            $result->brand_id = $pdEditBrand;
            $result->stock = $pdEditStock;
            $result->feture_products = $pdEditFeature;
            $result->status = $pdEditStatus;
            $result->product_meserment_type = $slelctedmesermentEdit;
            $result->color = $editedValueOfColor;
            $result->product_tax = $pdEditTax;
            $result->updated_by = Auth::guard('admin')->user()->id;
            $status = $result->save();

            if ($status == true) {
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

        if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Product !');
        }
        $id = $request->input('id');
        $ProductImage = ProductImage::where('product_id', $id)->get();

        foreach ($ProductImage as  $product_has_images_value) {

            $delete_old_file = ProductImage::where('id', '=', $product_has_images_value->id)->first();
            $delete_old_file_nameArr = (explode('/', $delete_old_file->image_path));
            $delete_old_file_name = end($delete_old_file_nameArr);
            Storage::delete("public/" . $delete_old_file_name);
            $delete_old_file->update(['deleted_by' => Auth::guard('admin')->user()->id]);
            $result2 = $delete_old_file->delete();
        }





        $data = Product::where('id', '=', $id)->first();
        $data->update(['deleted_by' => Auth::guard('admin')->user()->id]);
        $result = $data->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function excelExport(Request $request){
        if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any order !');
        }

        return Excel::download(new ProductExport, 'products('. date("j F, Y").').xlsx');

    }


}
