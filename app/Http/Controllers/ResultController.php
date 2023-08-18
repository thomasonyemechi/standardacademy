<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Result;
use App\Models\ResultSummary;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    function uploadResultIndex($class_id)
    {
        $class = ClassCore::where('class_teacher', auth()->user()->id)->first();
        $subjects = Subject::orderby('subject', 'desc');
        return view('admin.upload_result', compact(['class', 'subjects']));
    }


    function startResult(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'subject_id' => 'required|exists:subjects,id',
        ])->validate();

        $students = Student::where(['class_id' => $request->class_id, 'status' => 1])->get(['id']);
        // $class = ClassCore::find($request->class_id);
        $term = $this->currentTerm();

        foreach ($students as $stu) {
            $result_index = $stu->id . $term->id;
            ////check if summary has been created
            $summary = ResultSummary::where('result_index', $result_index)->first(['id']);
            if ($summary) {
            } else {
                $summary = ResultSummary::create([
                    'session_id' => $term->session->id,
                    'term_id' => $term->id,
                    'class_id' =>  $request->class_id,
                    'result_index' => $result_index,
                    'student_id' => $stu->id
                ]);
            }
            // term_id student_id subject_id
            $result_index = $term->id . $stu->id . $request->subject_id;
            $ck = Result::where('result_index', $result_index)->limit(1)->count();
            if ($ck == 0) {
                Result::create([
                    'result_index' => $result_index,
                    'result_id' => $summary->id,
                    'subject_id' => $request->subject_id,
                    'term_id' => $term->id,
                    'class_id' => $request->class_id,
                    'student_id' => $stu->id
                ]);
            }
        }
        return redirect('/admin/upload-result/')->with('success', 'Class result has been created');
    }
}
