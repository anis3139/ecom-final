<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorTable;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function VisitorIndex()
    {

        $visitorData = json_decode(VisitorTable::orderBy('id','desc')->take(1000)->get(), true);
        return view('admin.components.Visitor', ['visitorData' => $visitorData]);
    }
}
