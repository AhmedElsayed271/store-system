<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    public function contactUs()
    {
        return view('frontend.contact-us');
    }
}
