<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Feature;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $about = About::first();
        $features = Feature::all();
        $testimonials = Testimonial::all();

        return view('site.pages.about.index' ,compact('about' ,'features' ,'testimonials'));
    }
}
