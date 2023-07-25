<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function allProduct() 
    {
        $products = Product::paginate(9);

        return view('frontend.all-product', compact("products"));
    }

    public function productDetails($id) 
    {   

        $product = Product::findOrFail($id);

        return view('frontend.product-details', compact('product'));
    }
}
