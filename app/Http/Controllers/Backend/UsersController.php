<?php

namespace App\Http\Controllers\Backend;


use DataTables;
use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notification;

class UsersController extends Controller
{

    public function showUser(Request $request)

    {
        //   dd($request->id);
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('image', function ($row) {
                //     $imagePath = asset('frontend/image/' . $row->image); // Concatenate the image filename or path correctly
                //     $image = '<img src="' . $imagePath . '" alt="User Image" />';
                //     return $image;
                // })

                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-md send-email-btn">Send Email</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //     $users = User::all();
        // //     $userId = Auth::guard('user')->user()->id;
        // //    $user = User::findOrFail($userId);

        return view('backend.pages.users.user');
    }

    public function sendEmail(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'greetings' => 'required',
            'bodyText' => 'required',
            'endText' => 'required',
        ]);
    
        // Get the user by ID
        $user = User::find($id);
    
        if (!$user) {
            
            return redirect()->back()->with('error', 'User not found');
        }
    
        
        // Create a new instance of the SendEmail Mailable class
        // $email = queue(new SendEmail($request->greetings, $request->bodyText, $request->endText));
    
    Mail::to($user->email)->queue(new SendEmail($request->greetings, $request->bodyText, $request->endText));

        // Send the email
        // Mail::to($user->email)->send($email);
       
        Session::flash('cls', 'success');
        // You may also return a success message or redirect the user to a different page.
        return redirect()->route('dashboard.user.show', $id)->with('success', 'Email sent successfully');
    }
}
