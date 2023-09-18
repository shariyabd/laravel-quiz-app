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

      
           
        $imageName = "";
        $oldImage = "backend/image/".$admin->image;
        if($image = $request->file('image')){
            if(file_exists($oldImage)){
                File::delete($oldImage);
            };
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('backend/image/',$imageName);

            // $oldImagePath = public_path('backend/image/' . $admin->image);
            // if (file_exists($oldImagePath) && is_file($oldImagePath)) {
            //     unlink($oldImagePath);
            // }
        
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
