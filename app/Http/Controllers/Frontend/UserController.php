<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userProfile(){
        return view('frontend.dashboard.pages.user-profile.userProfile');
    }

    public function userProfileUpdateForm(){
        return view('frontend.dashboard.pages.user-profile.updateUserProfile');
    }

    public function userPasswordUpdateForm(){
        return view('frontend.dashboard.pages.user-profile.updateUserPassword');
    }
}
