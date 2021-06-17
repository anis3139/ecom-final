<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ReatingReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReatingReviewController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $rete = new ReatingReview();
        $rete->product_id = $product->id;
        $rete->user_id = Auth::user()->id;
        $rete->seller_id = $product->product_owner_id;
        $rete->star_reating = $request->rating;
        $rete->product_review = $request->review;
        $rete->is_approved = false;
        $status = $rete->save();

        if ($status == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getallreview(Request $request)
    {
            $sql = "SELECT reating_reviews.id,`product_id`,`user_id`,`seller_id`,`star_reating`,`product_review`,`is_approved`,reating_reviews.created_at AS review_date, users.id, users.name, users.image, reating_reviews.deleted_at FROM reating_reviews LEFT JOIN users ON users.id = reating_reviews.user_id WHERE product_id = $request->product_id AND reating_reviews.deleted_at IS NULL order by reating_reviews.created_at desc";

            $data = DB::select($sql);

            return response()->json(array('status' => 'success', 'review' => $data));
        }
}
