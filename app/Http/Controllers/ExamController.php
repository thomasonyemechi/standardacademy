<?php

namespace App\Http\Controllers;

use App\Models\CbtResult;
use App\Models\CbtResultSummary;
use App\Models\ClassCore;
use App\Models\Exam;
use App\Models\Question;
use App\Models\TestSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function startExamIndex()
    {
        $my_class = ClassCore::where(['class_teacher' => auth()->user()->id])->first();
        $term_id = $this->currentTerm()->id;
        $exams = Exam::with(['subject', 'grade', 'type'])->withCount(['questions'])->where(['class_id' => $my_class->id, 'term_id' => $term_id])->get();
        $tests = TestSetting::where(['class_id' => $my_class->id, 'term_id' => $term_id])->get();
        return view('admin.start-exam', compact(['exams', 'my_class', 'tests']));
    }


    function startTest(Request $request)
    {
        Validator::make($request->all(), [
            'exam_id' => 'required|exists:exams,id',
            'time' => 'required|integer|min:1|max:120'
        ])->validate();

        $exam = Exam::withCount('questions')->find($request->exam_id);
        // if ($request->questions > $exam->questions_count) {
        //     return back()->with('error', 'Questions number cannot be more than ' . $exam->questions_count);
        // }

        TestSetting::create([
            'exam_id' => $request->exam_id,
            'questions' => $exam->questions_count,
            'time' => $request->time,
            'class_id' => $exam->class_id,
            'term_id' => $this->currentTerm()->id
        ]);

        return back()->with('success', 'Test has been registered, Activate exam to allow student write exam');
    }




    function activateTest($test_id)
    {
        $test = TestSetting::findOrFail($test_id);
        //deactivate all other test for class 
        TestSetting::where(['class_id' => $test->class_id])->update([
            'status' => 0
        ]);
        $test->update([
            'status' => 1
        ]);
        return back()->with('success', 'Operarion successful');
    }









    /////////// student attempting exams


    function proceedToTest($test_id)
    {
        $student_id = Auth::guard('student')->user()->id;

        $check = CbtResultSummary::where(['test_id' => $test_id, 'student_id' => $student_id])->first();
        if ($check) {
            return back()->with('error', 'You have already participated in this exam');
        }

        $summary = CbtResultSummary::create([
            'test_id' => $test_id,
            'student_id' => $student_id,
            'start_time' =>  time(),
        ]);

        return redirect('student/question/'.$summary->id);
    }


    function answerSaver(Request $request)
    {
        $val = Validator::make($request->all(), [
            'question_id' => 'required|exists:questions,id',
            'my_option' => 'required|min:1',
            'result_summary_id' => 'required|exists:test_settings,id'
        ]);

        if ($val->errors()) {
            return response(['errors' => $val->errors()->all()], 422);
        }

        $question = Question::find($request->question_id);
        $score = (strtolower($question->ca) == strtolower($request->my_option)) ? 1 : 0;

        CbtResult::updateOrInsert(
            [
                'result_summary_id' => $request->result_summary_id,
                'question_id' => $request->question_id
            ],
            [
                'score' => $score,
                'my_option' => $request->my_option,
            ]
        );

        return response(['message' => 'Answer has been saved'], 200);
    }



    function saveAnswer(Request $request)
    {
        $question =  Question::where(['exam_id' => $request->exam_id, 'question_number' => $request->question_number])
        ->first(['id','question_number', 'ca']);  
        
        $opt = ucfirst($request->custom);
        $ans = ucfirst($question->ca);
        $score = ($ans == $opt)?1:0;
        CbtResult::updateOrInsert(
            [ 
                'question_id' => $question->id,
                'result_summary_id' => $request->result_summary_id,
            ],
            [
                'score' => $score,
                'my_option' => $opt,
            ]
        );

        $next_question = ($request->next) ? $request->next : $request->previous ;

   
        return redirect('student/question/'.$request->result_summary_id.'?question_number='.$next_question); 

    }


    function endExam(Request $request)
    {
        CbtResultSummary::where(['id' => $request->result_summary_id])->update([
            'end_time' => time(),
            'status' => 0
        ]);

        return response([
            'message', 'Exam has been submited'
        ], 200);
    }
}
