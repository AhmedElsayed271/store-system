<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    public function edit() 
    {   $countries = Countries::getNames();
        $locales =  Languages::getNames();
        $profile = Profile::find(Auth::user()->id);
        return view('dashboard.profile.edit', compact('countries', 'locales', 'profile'));
    }
    public function update(ProfileRequest $request)
    {
    ;   
        $user = User::find(Auth::user()->id);

        $user->profile->fill($request->except('_token'))->save();
        return redirect()->route('profile')->with(['success' => "Porfile Updated!"]);
    }
}
