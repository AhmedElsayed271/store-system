<?php

namespace App\repositroies\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;

interface cartRepositroies
{
    public function get(): Collection;
    
    public function add($id, $quanitiy);

    public function update($id, $quantity);
    
    public function delete(Product $product);
    
    public function empty();
    
    public function total();
}
