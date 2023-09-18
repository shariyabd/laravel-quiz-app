<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\UsersVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        $token = Str::random(64);

          UsersVerify::create([
              'user_id' => $user->id, 
              'token' => $token
            ]);

             Mail::send('frontend.email.emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });
          
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


    public function verifyAccount($token)
    {
        $verifyUser = UsersVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
                
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('frontend.dashboard.pages.dashboard');
        }
    
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
}
