<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizQuestionController extends Controller
{
   

    public function manageQuizQuestion(){
        return view('backend.pages.quiz-question.manage-quiz-question');
    }
}
