<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('dashboard.products.index', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => "required|min:3",
            'price' => "required|numeric",
            'status' => 'required|in:active,inactive,archived',
            'photo' => 'required|mimes:jpeg,png,jpg,gif',
            'photos' => 'required|array|max:3',
            'photos.*' => 'mimes:jpeg,png,jpg,gif',
        ]);




        $path = $request->file('photo')->store('products', 'upload');


        $product = Product::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'price'         => $request->price,
            'description'   => $request->description,
            'status'        => $request->status,
            'category_id'        => $request->category_id,
            'photo'         => $path
        ]);

        $images = $request->photos;

        foreach ($images as $image) {

            $images = [];

            $path = $image->store('products', 'upload');

            Image::create([
                'photo'      => $path,
                'product_id' => $product->id
            ]);
        }

        return redirect()->route('products.index')->with(['success' => "Added Successfuly"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => "required|min:3",
            'price' => "required|numeric",
            'status' => 'required|in:active,inactive,archived',
            'photo' => 'sometimes|required|mimes:jpeg,png,jpg,gif',
            'photos' => 'sometimes|required|array|max:3',
            'photos.*' => 'sometimes|mimes:jpeg,png,jpg,gif',
        ]);

        $oldImage = $product->photo;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('products', 'upload');
        } else {
            $path = $product->photo;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'photo' => $path,
            'category_id' => $request->category_id,
            'compare_price' => $request->compare_price
        ]);

        if ($path != $oldImage) {

            Storage::disk('upload')->delete($oldImage);
        }

        if ($request->has('photos')) {

            $images = $request->photos;

            foreach ($images as $image) {

                $oldImage = $product->photos;

                $path = $image->store('products', 'upload');

                $product->photos()->create([
                    'photo' => $path
                ]);
            }
        }

        if (isset($oldImage)) {

            foreach ($oldImage as $image) {

                $photo = $image->photo;
                
                $image->delete();

                Storage::disk('upload')->delete($photo);
            }
        }

        return redirect()->route('products.index')->with(['success' => "Updated Successfuly"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $oldMainImage = $product->photo;

        $oldImages = $product->photos;

        $product->delete();

        Storage::disk('upload')->delete($oldMainImage);

        foreach($oldImages as $image) {
            Storage::disk('upload')->delete($image->photo);
        }


        return redirect()->route('products.index')->with(['success' => "Deleted Successfuly"]);
    }
}
