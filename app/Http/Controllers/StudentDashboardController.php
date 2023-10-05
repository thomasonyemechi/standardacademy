<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CbtResultSummary;
use App\Models\NoteContent;
use App\Models\Payment;
use App\Models\ResultSummary;
use App\Models\Student;
use App\Models\TestSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentDashboardController extends StudentController
{
    public function getLogin()
    {
        return view('student.login');
    }

    function startIndex()
    {
        $student = Auth::guard('student')->user();
        $test = TestSetting::with(['exam'])->where(['class_id' => $student->class_id, 'status' => 1])->first();
        if (!$test) {
            return redirect('/student/dashboard')->with('error', 'You don\'t have any exam');
        }
        return view('student.exam', compact(['student', 'test']));
    }

    function dash()
    {
        return redirect('/student/my-profile');
    }

    function answerIndex($result_summary_id)
    {
        return view('student.answer', compact('result_summary_id'));
    }

    function readNoteIndex()
    {
        $notes = NoteContent::where(['class_id' => Auth::guard('student')->user()->class_id])->orderby('updated_at', 'desc')->get();
        return view('student.notes', compact('notes'));
    }


    function loginStudent(Request $request)
    {
        Validator::make($request->all(), [
            'username' => 'required|exists:students,username',
            'password' => 'required|string|min:3'
        ])->validate();

        $student = Student::where(['username' => $request->username, 'pwd' => $request->password])->first();

        if (!$student) {
            return back()->with('error', 'Invalid login detials');
        }


        // return $student;

        $ath = Auth::guard('student')->login($student);

        $exam_checker = TestSetting::where(['class_id' => $student->class_id, 'status' => 1])->first();

        if (!$exam_checker) {
            return redirect('/student')->with('success', 'Welcome back');
        }

        $if_written = CbtResultSummary::where(['student_id' => $student->id, 'test_id' => $exam_checker->id])->first();

        if ($exam_checker) {
            if (!$if_written) {
                return redirect('/student/exam')->with('success', 'Exam section');
            }
        }


        return redirect('/student')->with('success', 'Welcome back');
    }


    function profileRet()
    {
        $student_id = Auth::guard('student')->user()->id;

        $term_id = $this->currentTerm()->id;
        $student = Student::with(['parent', 'grade', 'arm'])->findorfail($student_id);
        $payments = Payment::with(['fee_cat:id,fee', 'user:id,name'])->where(['student_id' => $student_id, 'term_id' => $term_id, 'type' => 5])->orderby('id', 'desc')->limit(25)->get();
        $brought_forward = $this->calculateBalanceBroughtFwd($student_id, $term_id);
        $fees = Payment::with(['fee_cat:id,fee',])->where(['student_id' => $student_id, 'term_id' => $term_id, 'type' => 1])->orderby('id', 'desc')->get();
        $grade = $student->grade;
        $result_id = ResultSummary::where(['student_id' => $student->id, 'term_id' => $term_id])->first()->id ?? 0;
        $results = ResultSummary::where(['student_id' => $student->id])->get();
        $guradian = $student->parent;
        $assignments = Assignment::with(['subject:id,subject'])->where(['class_id' => $student->class_id, 'term_id' => $term_id])->orderby('updated_at', 'asc')->get();
        return view('student.profile', compact(['student', 'grade', 'payments', 'brought_forward', 'fees', 'result_id', 'results', 'assignments', 'guradian']));
    }
}
