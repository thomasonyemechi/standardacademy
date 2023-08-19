<?php

namespace App\Http\Controllers;

use App\Models\ClassArm;
use App\Models\ClassCore;
use App\Models\Guardian;
use App\Models\Payment;
use App\Models\ResultSummary;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function studentProfileIndex($student_id)
    {
        $term_id = $this->currentTerm()->id;
        $parents = Guardian::orderby('guardian_name', 'asc')->get(['id', 'guardian_name']);
        $arms = ClassArm::orderby('arm', 'asc')->get();
        $classes = ClassCore::orderby('index', 'asc')->get();
        $student = Student::with(['parent', 'grade', 'arm'])->findorfail($student_id);
        $payments = Payment::with(['fee_cat:id,fee', 'user:id,name'])->where(['student_id' => $student_id, 'term_id' => $term_id, 'type' => 5])->orderby('id', 'desc')->limit(25)->get();
        $brought_forward = $this->calculateBalanceBroughtFwd($student_id, $term_id);
        $fees = Payment::with(['fee_cat:id,fee',])->where(['student_id' => $student_id, 'term_id' => $term_id, 'type' => 1])->orderby('id', 'desc')->get();

        $result_id = ResultSummary::where(['student_id' => $student->id, 'term_id' => $term_id ])->first()->id ?? 0;
        $results = ResultSummary::where(['student_id' => $student->id])->get();
        return view('admin.student-profile', compact(['student', 'classes', 'arms', 'parents', 'payments', 'brought_forward', 'fees', 'result_id', 'results']));
    }



    function calculateBalanceBroughtFwd($student_id, $term_id)
    {
        $prv_terms = Term::where('id', '<', $term_id)->get();
        $amt = 0;
        $paid = 0;
        foreach ($prv_terms as $term) {
            $amt += Payment::where(['student_id' => $student_id, 'term_id' => $term->id, 'type' => 1])->sum('total');
            $paid += Payment::where(['student_id' => $student_id, 'term_id' => $term->id, 'type' => 5])->sum('total');
        }

        $paid += Payment::where(['student_id' => $student_id, 'term_id' => $term_id, 'type' => 5])->sum('total');
        return [$amt, $paid];
    }





    function allStudent()
    {
        $students = Student::with(['parent:id,guardian_name,state', 'grade:id,class', 'arm:id,arm'])->orderBy('id', 'desc')->paginate(25);
        return view('admin.students', compact('students'));
    }
    function addStudentIndex()
    {
        $parents = Guardian::orderby('guardian_name', 'asc')->get(['id', 'guardian_name']);
        $classes = ClassCore::orderby('class', 'asc')->get(['id', 'class']);
        $arms = ClassArm::orderby('arm', 'asc')->get(['id', 'arm']);
        return view('admin.add_student', compact(['parents', 'classes', 'arms']));
    }


    function updateStudentClass(Request $request)
    {
        $val = Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'arm_id' => 'exists:class_arms,id',
            'student_id' => 'required|exists:students,id',
        ])->validate();
        Student::where('id', $request->student_id)->update([
            'class_id' => $request->class_id,
            'arm_id' => $request->arm_id
        ]);
        return back()->with('success', 'Student class has been updated');
    }

    public function createStudentProfile(Request $request)
    {
        Validator::make($request->all(), [
            'guardian_id' => 'required|exists:guardians,id',
            'class_id' => 'required|exists:class_cores,id',
            'surname' => 'required',
            'firstname' => 'required',
        ])->validate();

        $pwd = rand(1000, 9999);
        $username = strtolower($request->surname) . $pwd;
        if ($this->checkUserName($username) > 0) {
            $username = $username . $request->guardian_id . $request->class_id;
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $photo_name = 'assets/images/students/' . $request->firstname . '_' . time() . rand() . '.' . $img->getClientOriginalExtension();
            move_uploaded_file($img, $photo_name);
        }

        $others = [
            'previous_school' => 'null',
            'reason_for_leaving' => 'null',
            'blood_group' => 'null',
            'genotype' => 'null',
            'ailment' => 'null',
            'disability' => 'null',
        ];
        Student::create([
            'parent_id' => $request->guardian_id,
            'class_id' => $request->class_id,
            'arm_id' => $request->arm_id ?? 0,
            'registration_number' => $request->registration_number ?? '',
            'surname' => $request->surname,
            'firstname' => $request->firstname,
            'othername' => $request->othername,
            'sex' => $request->sex,
            'username' => $username,
            'password' => Hash::make($pwd),
            'pwd' => $pwd,
            'others' => json_encode($others),
            'photo' => $photo_name ?? 'assets/img/students/student.png',
            'created_by' => auth()->user()->id,
        ]);

        return back()->with('success', 'Student profile has been created!');
    }


    function checkUserName($username)
    {
        $ck = Student::where(['username' => $username])->count();
        return $ck;
    }


    public function updateStudentProfile(Request $request)
    {
        Validator::make($request->all(), [
            'guardian_id' => 'required|exists:guardians,id',
            'student_id' => 'required|exists:students,id',
            'surname' => 'required',
            'firstname' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ])->validate();

        $student = Student::find($request->student_id);
        $name = $student->photo;
        $oldname = $student->photo;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = 'assets/images/students/' . $student->firstname . '_' . time() . rand() . '.' . $img->getClientOriginalExtension();
            move_uploaded_file($img, $name);
            if ($oldname != 'assets/images/students/student.png') {
                @unlink($oldname);
            }
        }
        $student->update([
            'parent_id' => $request->guardian_id,
            'registration_number' => $request->registration_number ?? '',
            'surname' => $request->surname,
            'firstname' => $request->firstname,
            'othername' => $request->othername,
            'sex' => $request->gender,
            'photo' => $name,
            'dob' => $request->dob
        ]);

        return back()->with('success', 'Student profile has been updated!');
    }
}
