<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function SocialIndex(){
        if (is_null($this->user) || !$this->user->can('social.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any social Link !');
        }
        $results = json_decode(Social::orderBy('id', 'desc')->get()->first());


        return view('admin.components.SocialLink', [
            'results'=>$results
        ]);
    }


    public function addFacebook(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social Link !');
        }
        if (is_null($this->user) || !$this->user->can('rating.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any rating !');
        }
        $facebook = $request->input("facebook");

        $valuecheck = (Social::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Social::where('id', '=',  $valuecheck['0']->id)->update(['facebook' => $facebook]);
        }
        else{
            $result = Social::insert(['facebook' => $facebook]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addTwitter(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social Link !');
        }
        $twitter = $request->input("twitter");

        $valuecheck = (Social::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Social::where('id', '=',  $valuecheck['0']->id)->update(['twitter' => $twitter]);
        }
        else{
            $result = Social::insert(['twitter' => $twitter]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addYoutube(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social Link !');
        }
        $youtube = $request->input("youtube");

        $valuecheck = (Social::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Social::where('id', '=',  $valuecheck['0']->id)->update(['youtube' => $youtube]);
        }
        else{
            $result = Social::insert(['youtube' => $youtube]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function addInstragram(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social Link !');
        }
        $instragram = $request->input("instragram");

        $valuecheck = (Social::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Social::where('id', '=',  $valuecheck['0']->id)->update(['instragram' => $instragram]);
        }
        else{
            $result = Social::insert(['instragram' => $instragram]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addGoogle(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social Link !');
        }
        $google = $request->input("google");

        $valuecheck = (Social::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Social::where('id', '=',  $valuecheck['0']->id)->update(['google' => $google]);
        }
        else{
            $result = Social::insert(['google' => $google]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addLinkin(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('social.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any social Link !');
        }
        $linkin = $request->input("linkin");

        $valuecheck = (Social::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Social::where('id', '=',  $valuecheck['0']->id)->update(['linkin' => $linkin]);
        }
        else{
            $result = Social::insert(['linkin' => $linkin]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

}
