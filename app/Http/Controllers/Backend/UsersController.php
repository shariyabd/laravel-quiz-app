<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Support\Facades\Log;
use DataTables;
use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function showUser(Request $request)

    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('image', function ($row) {
                //     $imagePath = asset('frontend/image/' . $row->image);
                //     $image = '<img src="' . $imagePath . '" alt="User Image" />';
                //     return $image;
                // })
                ->addColumn('status_toggle', function ($row) {
                    return view('backend.pages.users.status_toggle', compact('row'));
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Send Email" class="edit btn btn-primary btn-md send-email-btn">Send Email</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-success btn-md userEditBtn"><i class="fa-solid fa-pen-to-square"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



       


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



    public function userPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',

        ]);

        $makeUser = new User();
        $makeUser->name = $request->input('name');
        $makeUser->email = $request->input('email');
        $makeUser->password = Hash::make($request->input('password'));
        $makeUser->save();

        Session::flash('cls', 'success');
        return response()->json(['success' => 'User Added Successfully']);
    }


    public function active(User $user)
    {
        $user->update(['is_active' => true]);
        Log::info('User activated: ' . $user->name);
        return redirect()->back()->with('success', 'User activated successfully.');
    }

    public function deactive(User $user)
    {
        $user->update(['is_active' => false]);
        Log::info('User deactivated: ' . $user->name);
        return redirect()->back()->with('success', 'User deactivated successfully.');
    }
}
