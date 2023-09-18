<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }
    public function createQuiz(){
        return view('frontend.pages.quiz.create-quiz');
     }
     public function allQuiz(){
        return view('frontend.pages.quiz.all-quiz');
     }

     public function dashboard()
{
    
    
}

}
