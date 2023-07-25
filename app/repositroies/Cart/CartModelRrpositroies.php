<?php

namespace App\repositroies\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartModelRrpositroies implements cartRepositroies
{
    public function get(): Collection
    {

        $cart = Cart::query();

        if (Auth::check()) {
            $cart->where('user_id', '=', Auth::id());
        } else {
            $cart->where('cookie_id', '=', $this->getCookieId());
        }
        return $cart->with('product')->get();
    }

    public function count()
    {
        $cart = Cart::query();

        if (Auth::check()) {

            $cart->where('user_id', '=', Auth::id());

        } else {

            $cart->where('cookie_id', '=', $this->getCookieId());

        }

        return $cart->count();
    }

    public function add($id, $quanitiy)
    {
        if (Auth::check()) {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quanity' => $quanitiy,
            ]);
        } else {
            Cart::create([
                'cookie_id' => $this->getCookieId(),
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quanity' => $quanitiy,
            ]);
        }
    }

    public function update($id, $quanitiy, $incrment = true)
    {
        $cart = Cart::query();

        if (Auth::check()) {

            $cart->where('user_id', Auth::id());
        } else {
            $cart->where('cookie_id', '=', $this->getCookieId());
        }

        if ($incrment) {

            return $cart->where('product_id', '=', $id)->increment('quanity',  1);
        }
        
        return $cart->where('product_id', '=', $id)->update(['quanity' => $quanitiy]);

    }

    public function delete($id)
    {
        $cart = Cart::query();
        if (Auth::check()) {
            $cart->where('user_id', '=', Auth::id());
        } else {
            $cart->where('cookie_id', '=', $this->getCookieId());
        }
        $cart->where('product_id', '=', $id)->delete();
    }
    public function empty()
    {
        Cart::where('cookie_id', '=', $this->getCookieId())
            ->delete();
    }

    public function total()
    {
        $cart = Cart::query();
        if (Auth::check()) {

            $groupBy = "user_id";
            $cart->where('user_id', '=', Auth::id());
        } else {

            $groupBy = 'cookie_id';
            $cart->where('cookie_id', '=', $this->getCookieId());
        }


        $total = $cart->selectRaw('SUM(carts.quanity * products.price) as total')
            ->join('products', 'carts.product_id', '=', 'products.id')->groupBy($groupBy)->first()->total ?? 0;

        return $total;

    }

    public function getCookieId()
    {
        $cookie_id = Cookie::get('cookie_id');

        if ($cookie_id == null) {
            $cookie_id = Str::uuid();
            Cookie::queue('cookie_id', $cookie_id, 60 * 24 * 30);
        }
        return $cookie_id;
    }
}
