<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\AdminPasswordReset;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Exception\SessionNotFoundException;

class AdminPasswordResetController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('backend.auth.forgot-password');
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = Str::random(64);

        // DB::table('admin_password_resets')->insert([
        //     'email' => $request->email,
        //     'token' => $token,
        //     'created_at' => Carbon::now()
        // ]);

        $passwordReset = new AdminPasswordReset();

        // Set the attributes
        $passwordReset->email = $request->email;
        $passwordReset->token = $token;
        $passwordReset->created_at = Carbon::now();
       


        // Save the model to the database
        $passwordReset->save();
        Mail::send('backend.email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('backend.auth.reset-password', ['token' => $token]);
    }


    public function submitResetPasswordForm(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ]);

        $updatePassword = AdminPasswordReset::where('email', $request->email)
            ->where('token', $request->token)
            ->first();


        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        // Find the admin user by email
        $admin = Admin::where('email', $request->email)->first();

      

        if ($admin) {
            // Update the admin's password
            $admin->password = Hash::make($request->password);
            $admin->save();
        }

        AdminPasswordReset::where('email', $request->email)->delete();

        // Session::flash('cls', 'success');
        return redirect(route('admin.login.show'))->with('message', 'Your password has been changed!');
    }
}
