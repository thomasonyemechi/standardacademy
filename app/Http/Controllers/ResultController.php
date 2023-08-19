<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Result;
use App\Models\ResultSetup;
use App\Models\ResultSummary;
use App\Models\Session;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class ResultController extends Controller
{
    function uploadResultIndex($class_id=0, $subject_id=0)
    {
        $class = ClassCore::where('class_teacher', auth()->user()->id)->first();
        $subjects = Subject::orderby('subject', 'asc')->get();
        if ($class_id > 0) {
            $subject = Subject::findorfail($subject_id);
            $grade = ClassCore::findOrFail($class_id);
        }

        return view('admin.upload_result', compact(['class', 'subjects', 'class_id', 'subject_id']));
    }
    

    function broadSheetIndex($class_id=0, $subject_id=0)
    {
        $class = ClassCore::where('class_teacher', auth()->user()->id)->first();
        $subjects = Subject::orderby('subject', 'asc')->get();
        if ($class_id > 0) {
            $subject = Subject::findorfail($subject_id);
            $grade = ClassCore::findOrFail($class_id);
        }

        return view('admin.result_broadsheet', compact(['class', 'subjects', 'class_id', 'subject_id']));
    }


    function startResult2(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'subject_id' => 'required|exists:subjects,id'
        ])->validate();
        return redirect('/admin/upload-result/'.$request->class_id.'/'.$request->subject_id);
    }

    function startResult3(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'subject_id' => 'required|exists:subjects,id'
        ])->validate();
        return redirect('/admin/broad-sheet/'.$request->class_id.'/'.$request->subject_id);
    }


    function loadResult($class_id, $subject_id)
    {
        $term = $this->currentTerm();
        $request = json_encode(['class_id' => $class_id, 'subject_id' => $subject_id]);
        $this->startResult($request); 
        $results = Result::with(['student:id,surname,firstname'])->where(['class_id' => $class_id, 'subject_id' => $subject_id, 'term_id' => $term->id])->paginate(50);
        return response([
            'setup' => ResultSetup::first(),
            'cap' => $term->session->session.' '.term_text($term->term).' '.ClassCore::find($class_id)->class.' '.Subject::find($subject_id)->subject,
            'data' => $results,
        ], 200);
    }



    function editStudentResult(Request $request)
    {
        $val = Validator::make($request->all(), [
            'ca1' => 'required|integer',
            'ca2' => 'required|integer',
            'ca3' => 'required|integer',
            'exam' => 'required|integer',
            'result_id' => 'required|exists:results,id',
        ]);
        if ($val->fails()){ return response(['errors'=>$val->errors()->all()], 422);}
        $result = Result::find($request->result_id);

        $result->update([
            't1' => $request->ca1,
            't2' => $request->ca2,
            't3' => $request->ca3,
            'exam' => $request->exam,
            'total' => $request->ca1 + $request->ca2 + $request->ca3 + $request->exam
        ]);

        return response([
            'message' => 'Student result has been updated!!',
            'status' => true
        ]);
    }


    function editMultipleResult(Request $request)
    {
        $val = Validator::make($request->all(), [
            'data' => 'required',
        ]);
        if ($val->fails()){ return response(['errors'=>$val->errors()->all()], 422);} $i = 0;

        foreach($request->data as $res)
        {
            Result::where('id', $res['result_id'])->update([
                't1' => $res['ca1'],
                't2' => $res['ca2'],
                't3' => $res['ca3'],
                'exam' => $res['exam'],
                'total' => $res['ca1'] + $res['ca2'] + $res['ca3'] + $res['exam']
            ]); $i++;
        }

        return response([
            'data' => '',
            'message' => $i.' Results updated sucessfully',
            'status' => true
        ]);
    }



    function startResult($request)
    {
        $request = json_decode($request);

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
                    'term_id' => $term->id,
                    'class_id' =>  $request->class_id,
                    'result_index' => $result_index,
                    'student_id' => $stu->id
                ]);
            }
            // term_id student_id subject_id
            // $result_index = $term->id . $stu->id . $request->subject_id;
            $ck = Result::where(['term_id' => $term->id, 'subject_id' => $request->subject_id, 'student_id' => $stu->id])->limit(1)->count();

            if ($ck == 0) {
                Result::create([
                    'result_id' => $summary->id,
                    'subject_id' => $request->subject_id,
                    'term_id' => $term->id,
                    'class_id' => $request->class_id,
                    'student_id' => $stu->id
                ]);
            }
        }
        return 'done';
    }

    function fetchSessionBroadSheet($class_id, $subject_id) {
        $term = []; $results = [];
        $session = Session::find( $this->currentTerm()->session_id );

        foreach($session->terms as $term) {
            $terms[] = $term->id;
        }
        $arr = ['t1', 't2', 't3', 'exam', 'total'];
        $students = Student::where(['class_id' => $class_id, 'status' => 1])->get(['id', 'surname', 'firstname']);
        foreach($students as $stu) {
            $data = $stu;

            $data['first'] = Result::where(['term_id' => $terms[0], 'student_id' => $stu->id,'subject_id' => $subject_id, 'class_id' => $class_id])->first($arr);
            $data['second'] = Result::where(['term_id' => $terms[1], 'student_id' => $stu->id,'subject_id' => $subject_id, 'class_id' => $class_id])->first($arr);
            $data['third'] = Result::where(['term_id' => $terms[2], 'student_id' => $stu->id,'subject_id' => $subject_id, 'class_id' => $class_id])->first($arr);
            $results[] = $data;
        }
        return response([
            'data' => $results,
            'cap' => $session->session.' '.ClassCore::find($class_id)->class.' '.Subject::find($subject_id)->subject,
            'setup' => ResultSetup::first(),
        ]);
    }

}
