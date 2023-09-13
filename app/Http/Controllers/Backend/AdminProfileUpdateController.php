<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminProfileUpdateController extends Controller
{
    public function adminProfileUpdate(Request $request){
        
        $adminId = Auth::guard('admin')->user()->id;
        $admin = Admin::findorFail($adminId);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins,email,' . $adminId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        
        ]);

        // $imageName = "";
        //     if($image = $request->file('image')){
        //         $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        //         $image->move('image/',$imageName);
        //     }

           
        $imageName = "";
        $oldImage = "image/".$admin->image;
        if($image = $request->file('image')){
            if(file_exists($oldImage)){
                File::delete($oldImage);
            };
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('image/',$imageName);
        
        }else{
            $imageName = $admin->image;
        }


        Admin::where('id', $adminId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName 
        ]);
        
              Session::flash('cls', 'success');
              Session::flash('success','Profile Updated Successfully');
              return redirect()->back();

    }
}
