<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
  
    return view('frontend.pages.dashboard');
}

}
