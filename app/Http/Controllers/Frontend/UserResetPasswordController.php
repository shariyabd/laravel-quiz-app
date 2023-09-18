<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserPasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserResetPasswordController extends Controller
{
    

    public function resetForm(){
        return view('frontend.auth.forgot-password');
    }

    public function submitForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        // DB::table('admin_password_resets')->insert([
        //     'email' => $request->email,
        //     'token' => $token,
        //     'created_at' => Carbon::now()
        // ]);

        $passwordReset = new UserPasswordReset();

        // Set the attributes
        $passwordReset->email = $request->email;
        $passwordReset->token = $token;
        $passwordReset->created_at = Carbon::now();
       


        // Save the model to the database
        $passwordReset->save();
        Mail::send('frontend.email.forgotPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
  
    public function showResetPasswordForm($token){
        return view('frontend.auth.reset-password', ['token' => $token]);
    }

    public function passwordUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ]);

        $updatePassword = UserPasswordReset::where('email', $request->email)
            ->where('token', $request->token)
            ->first();


        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        // Find the admin user by email
        $admin = User::where('email', $request->email)->first();

      

        if ($admin) {
            // Update the admin's password
            $admin->password = Hash::make($request->password);
            $admin->save();
        }

        UserPasswordReset::where('email', $request->email)->delete();

        Session::flash('cls', 'success');
        return redirect(route('frontend.dashboard'))->with('success', 'Your password has been changed!');
    }
}
