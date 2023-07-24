<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show($slug) 
    {
        $product = Product::with('category')->where('status', "=" , 'active')->where('slug', '=', $slug)->first();    

        return view('frontend.product-detalis', compact("product"));
    }
    public function allProduct() 
    {
        $products = Product::paginate();

        return view('frontend.all-product', compact("products"));
    }
}
