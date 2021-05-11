<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function CuponIndex(){
        return view("admin.components.Cupon");
    }
}
