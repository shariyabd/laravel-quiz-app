<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminPasswordUpdateController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function adminPasswordUpdate(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'same:new_password'
        ]);

        $auth = Auth::guard('admin')->user();


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

        $admin = Admin::find($auth->id);
        $admin->password =  Hash::make($request->new_password);
        $admin->save();
        Session::flash('cls');
        return back()->with('success', "Password Changed Successfully");
    }
}
