<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Cache\Repository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\repositroies\Cart\CartModelRrpositroies;
use App\Models\Cart;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repository = new CartModelRrpositroies();
        
        $total = $repository->total();
        
        $cart = $repository->get();

        return view('frontend.cart', compact('cart','total'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = Cart::query();

        if (Auth::check()) {
            $product->where('user_id', '=', Auth::id());
        } else {
            $product->where('cookie_id', '=', Cookie::get('cookie_id'));
        }

        $product = $product->where('product_id', '=', $request->id)->get();

        if ($product->count() > 0) {

            $repository = new CartModelRrpositroies();

            return $repository->update($request->id, 0);

        } else {

            $repository = new CartModelRrpositroies();

            return $repository->add($request->id, 1);
        }

        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $repository = new CartModelRrpositroies();

        return $repository->update($id, $request->quantity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repository = new CartModelRrpositroies();

        $repository->delete($id);

        return redirect()->route('cart.index');
    }
}
