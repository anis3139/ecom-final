<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aboutPageController extends Controller
{
    public function aboutIndex()
    {
        
        
        return view('client.pages.aboutPage');
    }

}
