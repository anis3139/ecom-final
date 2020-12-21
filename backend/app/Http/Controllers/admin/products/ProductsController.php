<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use App\Models\product_has_images;
use App\Models\product_table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.components.Products');
    }



    public function getProductData()
    {
        $result = json_decode(product_table::orderBy('id', 'desc')->get());
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


            $data = json_decode($_POST['data']);
        $product_title = $data['0']->product_title;
        $product_discription = $data['0']->product_discription;
        $product_price = $data['0']->product_price;
        $product_selling_price = $data['0']->product_selling_price;
        $product_quantity = $data['0']->product_quantity;
        $product_category_id = $data['0']->product_category_id;
        $product_brand_id = $data['0']->product_brand_id;
        $product_in_stock = $data['0']->product_in_stock;
        $feture_products = $data['0']->feture_products;
        $product_active = $data['0']->product_active;

        $slug = Str::slug($product_title);
        $next = 2;
        while (product_table::where('product_slug', '=', $slug)->first()) {
            $slug = $slug . "-" . $next;
            $next++;
        }

            $result =new product_table();
            $result->product_title = $product_title;
            $result->product_discription = $product_discription;
            $result->product_price = $product_price;
            $result->product_selling_price = $product_selling_price;
            $result->product_quantity = $product_quantity;
            $result->product_category_id = $product_category_id;
            $result->product_brand_id = $product_brand_id;
            $result->product_in_stock = $product_in_stock;
            $result->feture_products = $feture_products;
            $result->product_active = $product_active;
            $result->product_slug = $slug;
            $result->save();
            $last_id=$result->id;
    
        try {
        if (count($request->images) > 0) {
            $i = 0;
            foreach ($request->images as $image) {

                $img = time() . $i . '.' . $image->getClientOriginalExtension();
                $image->move('storage', $img);
                $productImageOnehost = $_SERVER['HTTP_HOST'];
                $productImageOnelocation = "http://" . $productImageOnehost . "/storage/" . $img;
                $imagemodel= new product_has_images();
                $imagemodel->image_path="$productImageOnelocation";
                $imagemodel->has_images_product_id = $last_id;
				$imagemodel->save();
                $i++;
            }
        }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
        } catch (\Throwable $th) {
           return response()->json($th);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
