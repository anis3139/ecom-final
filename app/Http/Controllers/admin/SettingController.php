<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function otherIndex(){
        if (is_null($this->user) || !$this->user->can('setting.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any view  settings !');
        }
        $results = json_decode(Setting::orderBy('id', 'desc')->get()->first());


        return view('admin.components.Settings', [
            'results'=>$results
        ]);
    }


    public function addAddress(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  settings!');
        }
        $address = $request->input("address");

        $valuecheck = (Setting::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['address' => $address]);
        }
        else{
            $result = Setting::insert(['address' => $address]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addPhone(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any settings!');
        }
        $phone = $request->input("phone");

        $valuecheck = (Setting::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['phone' => $phone]);
        }
        else{
            $result = Setting::insert(['phone' => $phone]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addEmail(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  settings!');
        }
        $email = $request->input("email");

        $valuecheck = (Setting::orderBy('id', 'desc')->get());

        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['email' => $email]);
        }
        else{
            $result = Setting::insert(['email' => $email]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addVideoLink(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  settings!');
        }
        $video_link = $request->input("video_link");

        $valuecheck = (Setting::orderBy('id', 'desc')->get());

        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['video_link' => $video_link]);
        }
        else{
            $result = Setting::insert(['video_link' => $video_link]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addSiteName(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  settings!');
        }
        $site_name = $request->input("site_name");
        $envKey = "APPLICATION_NAME";
        $valuecheck = (Setting::orderBy('id', 'desc')->get());

        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['site_name' => $site_name]);
            $this->setEnvironmentValue($envKey, $site_name);
        }
        else{
            $result = Setting::insert(['site_name' => $site_name]);
            $this->setEnvironmentValue($envKey, $site_name);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addTitle(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  settings!');
        }
        $title = $request->input("title");

        $valuecheck = (Setting::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['title' => $title]);
        }
        else{
            $result = Setting::insert(['title' => $title]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }






    public function addsubTitle(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any settings!');
        }
        $sub_title = $request->input("sub_title");


        $valuecheck = (Setting::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['sub_title' => $sub_title]);
        }
        else{
            $result = Setting::insert(['sub_title' => $sub_title]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addGmap(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any settings!');
        }
        $gmap = $request->input("gmap");

        $valuecheck = (Setting::orderBy('id', 'desc')->get());



        if( count($valuecheck)>0){
            $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['gmap' => $gmap]);
        }
        else{
            $result = Setting::insert(['gmap' => $gmap]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }











    function logoAdd(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  Settings!');
        }
        $valuecheck = (Setting::orderBy('id', 'desc')->get());
        $photoPath =  $req->file('photo')->store('public');
        $photoName = (explode('/', $photoPath))[1];
        $host = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';

        $location =  $protocol . $host . "/public/storage/" . $photoName;
        if( count($valuecheck)>0){

        $result = Setting::where('id', '=',  $valuecheck['0']->id)->update(['logo' => $location]);
        } else{
            $result = Setting::insert(['logo' => $location]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

 function BannerAdd(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  Settings!');
        }
        $valuecheckBanner = (Setting::orderBy('id', 'desc')->get());
        $BannerPath =  $req->file('Banner')->store('public');
        $BannerName = (explode('/', $BannerPath))[1];
        $hostBanner = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $locationBanner =  $protocol . $hostBanner . "/public/storage/" . $BannerName;
        if( count($valuecheckBanner)>0){

            $result = Setting::where('id', '=',  $valuecheckBanner['0']->id)->update(['hero_banner' => $locationBanner]);
        } else{
            $result = Setting::insert(['hero_banner' => $locationBanner]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


     function promoImageOne(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  Settings!');
        }
        $valuecheckpromoImageOne = (Setting::orderBy('id', 'desc')->get());
        $promoImageOnePath =  $req->file('promoImageOne')->store('public');
        $promoImageOneName = (explode('/', $promoImageOnePath))[1];
        $hostpromoImageOne = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $locationpromoImageOne =  $protocol . $hostpromoImageOne . "/public/storage/" . $promoImageOneName;
        if( count($valuecheckpromoImageOne)>0){


        $result = Setting::where('id', '=',  $valuecheckpromoImageOne['0']->id)->update(['promo_image_one' => $locationpromoImageOne]);
        } else{
            $result = Setting::insert(['promo_image_one' => $locationpromoImageOne]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


   function promoImageTwo(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  Settings!');
        }
        $valuecheckpromoImageTwo = (Setting::orderBy('id', 'desc')->get());
        $promoImageTwoPath =  $req->file('promoImageTwo')->store('public');
        $promoImageTwoName = (explode('/', $promoImageTwoPath))[1];
        $hostpromoImageTwo = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $locationpromoImageTwo =  $protocol . $hostpromoImageTwo . "/public/storage/" . $promoImageTwoName;
        if( count($valuecheckpromoImageTwo)>0){

        $result = Setting::where('id', '=',  $valuecheckpromoImageTwo['0']->id)->update(['promo_image_two' => $locationpromoImageTwo]);
        } else{
            $result = Setting::insert(['promo_image_two' => $locationpromoImageTwo]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    function promoImageThree(Request $req)
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any  Settings!');
        }
        $valuecheckpromoImageThree = (Setting::orderBy('id', 'desc')->get());
        $promoImageThreePath =  $req->file('promoImageThree')->store('public');
        $promoImageThreeName = (explode('/', $promoImageThreePath))[1];
        $hostpromoImageThree = $_SERVER['HTTP_HOST'];
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $locationpromoImageThree =  $protocol . $hostpromoImageThree . "/public/storage/" . $promoImageThreeName;
        if( count($valuecheckpromoImageThree)>0){


        $result = Setting::where('id', '=',  $valuecheckpromoImageThree['0']->id)->update(['promo_image_three' => $locationpromoImageThree]);
        } else{
            $result = Setting::insert(['promo_image_three' => $locationpromoImageThree]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function setEnvironmentValue($envKey, $values)
    {
    
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $str .= "\n"; // In case the searched variable is in the last line without \n
        $keyPosition = strpos($str, "{$envKey}=");
        $endOfLinePosition = strpos($str, "\n", $keyPosition);
        $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

        // If key does not exist, add it
        if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
            $str .= "{$envKey}='{$values}'\n";
        } else {
            $str = str_replace($oldLine, "{$envKey}='{$values}'", $str);
        }

    
    
        $str = substr($str, 0, -1);
        $changeValue= file_put_contents($envFile, $str);

        if( !$changeValue){
            return false;
        }else{
            return true;
        }
    
    }

}
