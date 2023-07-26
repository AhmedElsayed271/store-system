<?php

namespace App\Models;

use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Scopes\StoreScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['imageurl'];
    public static function booted()
    {
        // static::addGlobalScope('store', new StoreScope());
    }

    ######### Relations ###########

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Image::class,'product_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id', 'id', 'id');
    }

    ######### Relations ###########

    public function scopeActive(EloquentBuilder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    public function imageUrl()
    {
        if ($this->photo == null) {
            
            return "https://app.advaiet.com/item_dfile/default_product.png";

        } else if (Str::startsWith($this->photo, ['http://', 'https://'])) {
            
            return $this->photo;
        
        } else {
        
            return asset('assets/dashboard/uploads/' . $this->photo);
        
        }
    }

    protected function getimageurlAttribute()
    {
        return base_path() . $this->image;
    }
}
