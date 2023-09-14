<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Guardian;
use App\Models\Payment;
use App\Models\ResultSummary;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ParentController extends StudentController    
{
    function parentIndex()
    {
        $guardians = Guardian::orderby('id', 'desc')->paginate(25);
        return view('admin.register_guardian', compact('guardians'));
    }


    function createGuardianProfile(Request $request)
    {
        Validator::make($request->all(), [
            'guardian_name' => 'required|min:6',
            'guardian_phone' => 'required',
            'guardian_email' => 'required|email|unique:guardians,guardian_email',
            'guardian_address' => 'required'
        ])->validate();

        Guardian::create([
            'guardian_name' => $request->guardian_name,
            'guardian_phone' => $request->guardian_phone,
            'guardian_email' => $request->guardian_email,
            'guardian_address' => $request->guardian_address,
            'password' => Hash::make(trim($request->phone)),
            'mother_name' => $request->mother_name,
            'mother_email' => $request->mother_email,
            'mother_address' => $request->mother_address,
            'mother_phone' => $request->mother_phone,
            'mother_occupation' => $request->mother_occupation,
            'mother_office_address' => $request->mother_office_address,
            'father_name' => $request->father_name,
            'father_email' => $request->father_email,
            'father_address' => $request->father_address,
            'father_phone' => $request->father_phone,
            'father_occupation' => $request->father_occupation,
            'father_office_address' => $request->father_office_address,
            'state' => $request->state,
            'lga' => $request->lga,
        ]);
        return back()->with('success', 'Guardian profile has been created');
    }


    function guardianLogin(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|exists:guardians,guardian_email',
            'password' => 'required|string|min:3'
        ])->validate();

        $guardian = Guardian::where(['guardian_email' => $request->email, 'guardian_phone' => $request->password])->first();

        if (!$guardian) {
            return back()->with('error', 'Invalid login detials');
        }

        $ath = Auth::guard('guardian')->login($guardian);

        return redirect('/guardian/')->with('success', 'Welcome back');
    }




    // after login functions
    function guardian()
    {
        return Auth::guard('guardian')->user();
    }

    function parentDashboardIndex()
    {
        $students = Student::with(['grade:id,class', 'arm'])->where(['parent_id' => $this->guardian()->id])->get();
        return view('parent.index', compact(['students']));
    }

    function viewStudentProfile($student)
    {
        $student = Student::with(['grade', 'arm'])->findorfail($student); $student_id = $student->id;
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
        return view('parent.student', compact(['student','grade', 'payments', 'brought_forward', 'fees', 'result_id', 'results', 'assignments']));
    }
    
}
