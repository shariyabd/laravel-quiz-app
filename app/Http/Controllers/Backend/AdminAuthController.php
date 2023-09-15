<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function login(){
        return view('backend.auth.login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::guard('admin')->attempt($credentials)){
            Session::flash('cls', 'success');
            return redirect(route('admin.dashboard'))->with('success', 'Great! You have successfully logged in.');
        } else {
            // Failed login
            return redirect()->back()->withErrors(['email' => 'These Email or Password do not match our records.']);
        }
        }

    

    public function register(){
        return view('backend.auth.register');
    }

    public function registrationPost(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins,email',
            'password' => 'required',
        ]);



        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        Session::flash('cls', 'success');
        return redirect(route('admin.dashboard'))->with('success','Great! You have successfully registered and logged in.');
    }

    public function adminLogout(Request $request){
        Session::flush();
        Auth::guard('admin')->logout();

        return Redirect(route('admin.login.show'));
    }
}
