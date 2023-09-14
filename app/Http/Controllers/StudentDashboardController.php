<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Payment;
use App\Models\ResultSummary;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentDashboardController extends StudentController
{
    public function getLogin()
    {
        return view('student.login');
    }


    function dash()
    {
        return view('student.index');
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


        return redirect('/student/')->with('success', 'Welcome back');
    }


    function profileRet()
    {
        $student = Auth::guard('student')->user()->id;
        $student = Student::with(['grade', 'arm'])->findorfail($student);
        $student_id = $student->id;
        if ($this->guardian()->id != $student->parent_id) {
            return redirect('/guardian/')->with('error', 'The page you are requesting for was not found');
        }


        $term_id = $this->currentTerm()->id;
        $student = Student::with(['parent', 'grade', 'arm'])->findorfail($student_id);
        $payments = Payment::with(['fee_cat:id,fee', 'user:id,name'])->where(['student_id' => $student_id, 'term_id' => $term_id, 'type' => 5])->orderby('id', 'desc')->limit(25)->get();
        $brought_forward = $this->calculateBalanceBroughtFwd($student_id, $term_id);
        $fees = Payment::with(['fee_cat:id,fee',])->where(['student_id' => $student_id, 'term_id' => $term_id, 'type' => 1])->orderby('id', 'desc')->get();
        $grade = $student->grade;
        $result_id = ResultSummary::where(['student_id' => $student->id, 'term_id' => $term_id])->first()->id ?? 0;
        $results = ResultSummary::where(['student_id' => $student->id])->get();
        $assignments = Assignment::with(['subject:id,subject'])->where(['class_id' => $student->class_id, 'term_id' => $term_id])->orderby('updated_at', 'asc')->get();
        return view('student.student', compact(['student', 'grade', 'payments', 'brought_forward', 'fees', 'result_id', 'results', 'assignments']));
    }
}
