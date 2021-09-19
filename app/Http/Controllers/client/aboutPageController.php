<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\Product;
use App\Models\Category;
use App\Models\SpecialFeature;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function aboutIndex()
    {
        $data=[];
        $data['AboutSFSectionData'] = json_decode(SpecialFeature::orderBy('id', 'desc')->limit(3)->get());
        $data['AboutSectionData'] = json_decode( AboutPage::orderBy('id', 'desc')->first());
        $data['TestimonialDatas'] =  json_decode(Testimonial::orderBy('id', 'desc')->limit(3)->get());

        return view('client.pages.AboutPage',  $data);
    }

}
