<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserAuthController extends Controller
{
    public function index()
    {
        return view('frontend.auth.login');
    }


    public function registration()
    {
        return view('frontend.auth.register');
    }


    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

      $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('frontend.dashboard'))->withSuccess('Great! You have successfully registered and logged in.');
    }

    
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];


        if (auth()->guard('user')->attempt($credentials)) {
            Session::flash('cls', 'success');
            return redirect('/dashboard')->with('success', 'Great! You have successfully logged in.');
        } else {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }


    public function updateProfile(Request $request)
    {


        $userId = Auth::user()->id;
        $user = User::findorFail($userId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $userId,
            'password' => 'nullable|required_with:password_confirmation|confirmed',
            'password_confirmation' => 'nullable',
        ]);
       

        Session::flash('cls', 'success');
        Session::flash('success','Profile Updated Successfully');

        return redirect()->back();
    

    }



    public function dashboard()
    {
        return view('frontend.pages.dashboard');
    }
}
