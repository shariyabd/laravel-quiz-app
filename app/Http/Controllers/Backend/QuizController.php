<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizTopic;
use DataTables;

class QuizController extends Controller
{


    public function Quizindex(Request $request)
    {

    //   dd(Quiz::all());
        $quizTopics = QuizTopic::all();


        if($request->ajax()){
            $data =Quiz::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex">';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-md quizEdit-btn"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-md quizDelete-btn"><i class="fa-solid fa-trash "></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.quiz.manage-quiz', compact('quizTopics'));
    }

    public function QuizStore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|unique:quizzes',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'correct_answer' => 'required'

        ]);





         Quiz::updateOrcreate([
            'id' => $request->id
        ],
         [

            'title' => request('title'),
            'option_1' => request('option_1'),
            'option_2' => request('option_2'),
            'option_3' => request('option_3'),
            'option_4' => request('option_4'),
            'correct_answer' => request('correct_answer'),
            'quiz_topic_id' => request('quiz_topic_id')
        ]);

       


        return response()->json(['success' => 'Quiz saved successfully.']);
    }

public function QuizEdit($id){
    $quizEdit = Quiz::findOrFail($id);

    return response()->json($quizEdit);

}
    public function quizDelete(Request $request){
     
        $quizItem = Quiz::findOrFail($request->id)->delete();
        return response()->json(['success' => 'Quiz Deleted Successfully']);

       
    }

   
}
