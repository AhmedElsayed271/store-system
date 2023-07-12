<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_item', 'order_id', 'product_id' ,'id', 'id')
        ->withPivot(['product_name','price', 'quantity','options']);
    }

    public static function booted()
    {
        static::creating(function (Order $order) {
            $order->billing_number = Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber()
    {
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at', $year)->max('billing_number');
        if ($number) {
            return $number + 1;
        } else {
            return $year . '0001';
        }
    }
}
