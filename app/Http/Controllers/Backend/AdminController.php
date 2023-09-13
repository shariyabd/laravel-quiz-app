<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminController extends Controller
{
    public function dashboard(){
        return view('backend.pages.index');
    }

    public function adminProfile(){
        return view('backend.pages.admin-profile.admin-profile');
    }

    public function adminProfileUpdateForm(){
        return view('backend.pages.admin-profile.update-admin-profile');
    }

}
