<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Student;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    function promoteIndex($class_id=0)
    {
        $grades = ClassCore::withCount('students')->orderby('index', 'asc')->get();
        $students = []; $grade = [];
        if($class_id){
            $grade = ClassCore::findOrfail($class_id);
            $students = Student::where(['class_id' => $grade->id])->orderby('surname','asc')->get(['id','surname', 'firstname', 'photo', 'sex']);
        }
        return view('admin.manage-promotions', compact(['grades', 'students', 'grade']) );
    }
    
    function demoteStudent(Request $request)
    {
        $data = $request->data;
        foreach($data as $stu)
        {
            $student = Student::with(['grade'])->find($stu);
            $prev_class = ClassCore::where('index', '<', $student->grade->index)->orderBy('index', 'desc')->first()->id;
            if(!$prev_class) { $prev_class = $student->class; }
            $student->update([
                'class_id' => $prev_class
            ]);
        }
        return response([
            'message' => 'Students has been demoted to the previous class'
        ], 200);
    }


    function promoteStudent(Request $request)
    {
        $data = $request->data;
        foreach($data as $stu)
        {
            $student = Student::with(['grade'])->find($stu);
            $next_class = ClassCore::where('index', '>', $student->grade->index)->orderBy('index', 'asc')->first()->id ?? 0 ;
            $student->update([
                'class_id' => $next_class
            ]);
        }

        return response([
            'message' => 'Students has been promoted to the next class'
        ], 200);
    }

}
