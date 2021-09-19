<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReatingReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingReviewController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function reviewIndex()
    {
        if (is_null($this->user) || !$this->user->can('rating.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any rating !');
        }
        return view('admin.components.ReviewRating');
    }

    public function getReviewdata()
    {
        if (is_null($this->user) || !$this->user->can('rating.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any rating !');
        }
       $result=json_decode(ReatingReview::with('user','product','vendor')->orderBy('id', 'desc')->get());

       return  $result;
    }
    public function deleteReview(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('rating.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any rating !');
        }
        $id = $request->input('id');
        $result = ReatingReview::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
