<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcessTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => "required|email|string",
            'password' => 'required|string|min',
        ]);

        $user = User::where('email','=',$request->email);
        return response()->json($user);
    }
}
