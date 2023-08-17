<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Exam;
use App\Models\ProspectiveExam;
use App\Models\ProspectiveQuestion;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProspectiveCbtController extends Controller
{
    function addQuestionIndex(Request $request, $exam_id)
    {
        $exam = ProspectiveExam::with(['subject:id,subject', 'grade:id,class'])->findOrFail($exam_id);
        $questions = ProspectiveQuestion::where(['exam_id' => $exam->id])->paginate();
        $question = [];
        if($request->edit){
            $question = ProspectiveQuestion::findorFail($request->edit);
        }
        return view('admin.prospective_exam_question', compact(['exam', 'questions', 'question']));
    }

    function createProExamIndex()
    {
        $subjects = Subject::orderby('subject', 'asc')->get();
        $classes = ClassCore::orderby('index', 'asc')->get();
        $exams = ProspectiveExam::with(['subject:id,subject', 'user:id,name'])->get();
        return view('admin.create_prospective_exam', compact(['subjects', 'classes', 'exams']));
    }

    function updateQuestion(Request $request)
    {
        Validator::make($request->all(), [
            'option_a' => 'required|max:5000|string',
            'option_b' => 'required|max:5000|string',
            'option_c' => 'required|max:5000|string',
            'option_d' => 'required|max:5000|string',
            'ca' => 'required|max:1|string',
            'question' => 'required|max:20000',
            'question_id' => 'required|exists:questions,id'
        ])->validate();

        $question = ProspectiveQuestion::find($request->question_id);

        $question->update([
            'a'=>addslashes(trim($request->option_a)),
            'b'=>addslashes(trim($request->option_b)),
            'c'=>addslashes(trim($request->option_c)),
            'd'=>addslashes(trim($request->option_d)),
            'ca'=>addslashes(trim($request->ca)),
            'question'=>addslashes(trim($request->question))
        ]);

        return redirect('/admin/prospective/question/'.$question->exam_id)->with('success','Question has been updated');
    }

    function submitQuestion(Request $request)
    {
        Validator::make($request->all(), [
            'option_a' => 'required|max:5000|string',
            'option_b' => 'required|max:5000|string',
            'option_c' => 'required|max:5000|string',
            'option_d' => 'required|max:5000|string',
            'ca' => 'required|max:1|string',
            'question' => 'required|max:20000',
            'exam_id' => 'required|exists:prospective_exams,id'
        ])->validate();

        ProspectiveQuestion::create([
            'exam_id' => $request->exam_id,
            'created_by' => auth()->user()->id,
            'question_number' => ProspectiveQuestion::where(['exam_id' => $request->exam_id])->count()+1 ,
            'a' => addslashes(trim($request->option_a)),
            'b' => addslashes(trim($request->option_b)),
            'c' => addslashes(trim($request->option_c)),
            'd' => addslashes(trim($request->option_d)),
            'ca' => addslashes(trim($request->ca)),
            'question' => addslashes(trim($request->question)),
        ]);

        return back()->with('success', 'Question has been added');
    }


    function createProspectiveExam(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'subject_id' => 'required|exists:subjects,id'
        ])->validate();

        $check = ProspectiveExam::where(['class_id' => $request->class_id, 'subject_id' => $request->subject_id])->count();
        if ($check > 0) {
            return back()->with('success', 'Prospective  exam already exists');
        }

        ProspectiveExam::create([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'created_by' => auth()->user()->id
        ]);
        return back()->with('success', 'Prosecptvie exam has been created');
    }
}
