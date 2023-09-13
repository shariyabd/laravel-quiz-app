<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestionPaper;

class QuizQuestionController extends Controller
{
   

    public function QuizQuestionIndex(){
        $quiz = Quiz::all();
        return view('backend.pages.quiz-question.manage-quiz-question', compact('quiz'));
    }

    public function QuizQuestionStore(Request $request){
        
        $request->validate([
            'title' => 'required|unique:quiz_question_papers',
            'sub_title' => 'required',
            'duration' => 'required',
            'full_marks' => 'required'
        ]);

        QuizQuestionPaper::updateOrcreate([
            'id' => $request->id
        ],
        [
            'title'=>$request->title,
            'duration'=>$request->duration,
            'full_marks'=>$request->full_marks,
            'quiz_id'=>$request->quiz_id
        ]);

        return response()->json(['success', 'Question Paper Added Successfully']);
    }
}
