<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'user_id';

    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        
    }
}
