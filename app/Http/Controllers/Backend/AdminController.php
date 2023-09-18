<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestionPaper;
use App\Models\QuizTopic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminController extends Controller
{
    public function dashboard(){
        $totalQuiz = Quiz::count();
        $totalQuizTopic = QuizTopic::count();
        $totalQuizQuestionPaper = QuizQuestionPaper::count();
        $totalUsers = User::count();
        return view('backend.pages.index', compact('totalQuiz', 'totalQuizTopic', 'totalQuizQuestionPaper','totalUsers'));
    }
    

    public function adminProfile(){
        return view('backend.pages.admin-profile.admin-profile');
    }

    public function adminProfileUpdateForm(){
        return view('backend.pages.admin-profile.update-admin-profile');
    }

    public function adminPasswordUpdateForm(){
        return view('backend.pages.admin-profile.admin-password-update');
    }

}
