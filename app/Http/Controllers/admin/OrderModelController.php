<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderModelController extends Controller
{
    public function ordeIndex(){
        return view("admin.components.orders");
    }
}
