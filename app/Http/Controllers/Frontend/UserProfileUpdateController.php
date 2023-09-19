<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserProfileUpdateController extends Controller
{
    public function userProfileUpdate(Request $request){
        // dd($request->all());
        $userId = Auth::guard('user')->user()->id;
        $user = User::findOrFail($userId);
// dd($user);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins,email,' . $userId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        
        ]);

       

        // dd($request->file('image'));
        $imageName = "";
        $oldImage = "frontend/image/".$user->image;

     
        
        if($image = $request->file('image')){
            if(file_exists($oldImage)){
                File::delete($oldImage);
            };

            $imageName = uniqid().'.'. $image->getClientOriginalExtension();
            $image->move('frontend/image/', $imageName);
        }else{
            $imageName = $user->$image;
        }

        User::where('id', $userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName 
        ]);

        Session::flash('cls', 'success');
        Session::flash('success','Profile Updated Successfully');
        return redirect()->back();
    }
}
