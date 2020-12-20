<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\SliderModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       
        $sliders = SliderModel::all();
        return view("client.index", compact('sliders'));
    }

}
