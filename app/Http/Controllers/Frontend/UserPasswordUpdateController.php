<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserPasswordUpdateController extends Controller
{
    public function userPasswordUpdate(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'same:new_password'
        ]);

        $auth = Auth::guard('user')->user();


        $current_password = $auth->password;
        $new_password = $request->new_password;


        //checking new password and current are same or not
        if (Hash::check($new_password, $current_password)) {
            return redirect()->back()->with("error", "New Password cannot be the same as your current password.");
        }

        //checking current password and auth password 
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            return back()->with('error', "Current Password is Invalid");
        }

        $user = User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        Session::flash('cls', 'success');
        return back()->with('success', "Password Changed Successfully");
    }
}
