<?php

namespace App\Http\Controllers\Backend;

use App\Models\QuizTopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Symfony\Component\CssSelector\Node\FunctionNode;

class QuizTopicController extends Controller
{



    public function QuizTopicindex(Request $request)
    {

        if ($request->ajax()) {
            $data = QuizTopic::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-md quizTopicEdit-btn"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-md quizTopicDelete-btn"><i class="fa-solid fa-trash "></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.quiz-topic.manage-quiztopic');
    }


    public function QuizTopicEdit($id)
    {
        $quizTopic = QuizTopic::findOrFail($id);
        return response()->json($quizTopic);
    }

    public function QuizTopicstore(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:quiz_topics'
        ]);
        QuizTopic::updateOrCreate([
            'id' => $request->id
        ],
        [
            'name' => $request->name, 
            
        ]);             
        

        return response()->json(['success' => 'Quiz saved successfully.']);
    }

    public  function quizTopicDelete(Request $request)
    {
        $quizTopic = QuizTopic::findOrFail($request->id)->delete();
        return response()->json(['message' => 'Quiz Deleted successfully']);
    }
}
