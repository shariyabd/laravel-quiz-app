<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AdminPasswordResetController extends Controller
{
    public function resetForm(){
        return view('backend.auth.forgot-password');
    }

    
}
