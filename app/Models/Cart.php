<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded =  [];

    protected static function booted() {
        static::creating(function (Cart $cart) {
            $cart->id = Str::uuid();
        });
    }

    ########## Relations ############

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault([
            'name' => 'anonymous'
        ]);
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
