<?php

namespace App\Http\Controllers\Backend;

use Exception;
use DataTables;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\QuizQuestionPaper;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class QuizQuestionController extends Controller
{
   

    public function QuizQuestionIndex(Request $request){

        $quiz = Quiz::all();
        $quizCount = Quiz::count();
       
    

        if ($request->ajax()) {
            $data = QuizQuestionPaper::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('quiz_id', function ($row) use ($quizCount) {
                    return $quizCount;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-md  questionPaperEdit-btn"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-md questionPaperDelete-btn"><i class="fa-solid fa-trash "></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.quiz-question.manage-quiz-question', compact('quiz'));
    }

    public function QuizQuestionStore(Request $request){
        
        // dd($request->all());
        $request->validate([
            'title' => 'required|unique:quiz_question_papers',
            'subtitle' => 'required',
            'duration' => 'required',
            'full_marks' => 'required',
            
        ]);
       
           QuizQuestionPaper::updateOrCreate(
                ['id' => $request->id],
                [
                    'title' => $request->title,
                    'subtitle'=>$request->subtitle,
                    'duration' => $request->duration,
                    'full_marks' => $request->full_marks,
                    'quiz_id' => json_encode($request->quiz_id),
                ]
                );
        
        return response()->json(['message' => 'Question Paper Saved Successfully']);
    }

    public function QuizQuestionEdit($id){
        $quizQuestion = QuizQuestionPaper::findOrFail($id);

       
        return response()->json($quizQuestion);
    }
   
   

    public function QuizQuestionDelete(Request $request){
        $quizQuestionId = QuizQuestionPaper::findOrFail($request->id)->delete();
        
        return response()->json(['message' => 'Question Paper Deleted Successfully']);

    }
}
