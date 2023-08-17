<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Exam;
use App\Models\ExamType;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CbtController extends Controller
{
    function addQuestionIndex(Request $request, $exam_id)
    {
        $exam = Exam::with(['subject', 'grade', 'type', 'term'])->findOrFail($exam_id);
        $questions = Question::with(['user'])->where('exam_id', $exam_id)->orderby('updated_at', 'desc')->paginate(25);
        $question = [];
        if($request->edit){
            $question = Question::findorFail($request->edit);
        }
        return view('admin.exam_question', compact(['exam', 'questions', 'question']));
    }

    function examIndex()
    {
        $class = ClassCore::where(['class_teacher' => auth()->user()->id])->first();
        $subjects = Subject::orderby('subject', 'asc')->get();
        $types = ExamType::with(['user:id,name'])->orderby('id', 'desc')->get();
        $exams = Exam::with(['subject', 'grade', 'type', 'user', 'term'])->where('class_id', $class->id)->get();
        return view('admin.exams', compact(['exams', 'class', 'subjects', 'types']));
    }

    function activateQuestion($arr)
    {
        foreach($arr as $sn){
            Question::where('id', $sn)->update(['status'=> 1]);
        }
    }


    function deactivateQuestion($arr)
    {
        foreach($arr as $sn){
            Question::where('id', $sn)->update(['status'=> 0]);
        }
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

        $question = Question::find($request->question_id);

        $question->update([
            'a'=>addslashes(trim($request->option_a)),
            'b'=>addslashes(trim($request->option_b)),
            'c'=>addslashes(trim($request->option_c)),
            'd'=>addslashes(trim($request->option_d)),
            'ca'=>addslashes(trim($request->ca)),
            'question'=>addslashes(trim($request->question))
        ]);

        return redirect('/admin/question/'.$question->exam_id)->with('success','Question has been updated');
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
            'exam_id' => 'required|exists:exams,id'
        ])->validate();

        Question::create([
            'exam_id' => $request->exam_id,
            'created_by'=> auth()->user()->id,
            'question_number'=>$this->qNumber($request->exam_id),
            'a'=>addslashes(trim($request->option_a)),
            'b'=>addslashes(trim($request->option_b)),
            'c'=>addslashes(trim($request->option_c)),
            'd'=>addslashes(trim($request->option_d)),
            'ca'=>addslashes(trim($request->ca)),
            'question'=>addslashes(trim($request->question)),
        ]);

        return back()->with('success','Question has been added');
    }

    function qNumber($exam_id){
        return Question::where('exam_id',$exam_id)->count()+1;
    }

    function deleteExam()
    {
        return;
    }


    function addexam(Request $request)
    {
        //return response($request['type']);
        $val = Validator::make($request->all(), [
            'subject_id' => 'required|exists:subjects,id',
            'exam_type' => 'required|exists:exam_types,id',
            'class_id' => 'required|exists:class_cores,id',
        ])->validate();

        $term_id = $this->currentTerm()->id;
        // creating a unique code for each exam by cocatenating subject + examtype + term + class
        $index = $val['subject_id'] . $val['exam_type'] . $term_id . $val['class_id'];

        //return response($index);
        if (count(Exam::where('index', $index)->get()) > 0) {
            return back()->with('error', 'Class exam already exits');
        }

        Exam::create([
            'type_id' => $request->exam_type,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'term_id' => $term_id,
            'index' => $index,
            'created_by' => auth()->user()->id
        ]);
        return back()->with('success', 'Class exam has been created, proceed to add questions');
    }


    function examTypeIndex()
    {
        $types = ExamType::with(['user:id,name'])->orderby('id', 'desc')->get();
        return view('admin.exam_type', compact('types'));
    }

    function deleteType($type_id)
    {
        $type = ExamType::findOrFail($type_id);
        $type->delete();
        return back()->with('success', 'Exam type has been deleted');
    }

    function updateType(Request $request)
    {
        Validator::make($request->all(), [
            'type_id' => 'required|exists:exam_types,id',
            'type' => 'required|string',
        ])->validate();

        ExamType::where('id', $request->type_id)->update([
            'type' => $request->type,
        ]);

        return back()->with('success', 'Exam type has been updated!');
    }

    function addtype(Request $request)
    {
        Validator::make($request->all(), [
            'type' => 'required|max:200|unique:exam_types,type',
        ])->validate();

        ExamType::create([
            'type' => $request->type,
            'created_by' => auth()->user()->id
        ]);

        return back()->with('success', 'Exam type has been added!');
    }
}
