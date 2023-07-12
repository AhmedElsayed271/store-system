<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\repositroies\Cart\CartModelRrpositroies;

class HomeController extends Controller
{
    public function index()
    {   
        $products = Product::with('category')->active()->latest()->limit(8)->get();

        return view('frontend.home', compact('products'));
    }
}
