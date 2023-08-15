<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\ClassCore;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
{
    function classAssignmentIndex(Request $request)
    {
        $assignments = []; $grade = [];
        if($request->grade) {
            $grade = ClassCore::findOrFail($request->grade);
            $assignments = Assignment::with(['subject:id,subject', 'user:id,name', 'term'])->where(['class_id' => $grade->id])->orderby('id', 'desc')->get();
        }
        $classes = ClassCore::orderby('index', 'asc')->get();
        return view('admin.class_assignment', compact(['classes', 'assignments', 'grade']));
    }


    function createAssignmentIndex(Request $request)
    {
        $subjects = Subject::orderby('subject', 'asc')->get(); $assignment = [];
        $class = ClassCore::where('class_teacher', auth()->user()->id)->first();
        if($request->edit){
            $assignment = Assignment::with(['subject:id,subject', 'grade:id,class'])->findorFail($request->edit);
        }
        $assignments = Assignment::with(['subject:id,subject', 'user:id,name', 'grade:id,class'])->where('class_id', $class->id)->orderby('updated_at', 'desc')->paginate(25);
        return view('admin.create_assignment', compact(['subjects',  'class', 'assignments', 'assignment']));
    }

    function createAssignment(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'subject_id' => 'required|exists:subjects,id',
            'assignment' => 'required|string'
        ])->validate();

        Assignment::create([
            'term_id' => $this->currentTerm()->id,
            'subject_id' => $request->subject_id,
            'assignment' => $request->assignment,
            'created_by' => auth()->user()->id,
            'class_id' => $request->class_id
        ]);

        return back()->with('success', 'Assignment has been created');
    }

    function updateAssignment(Request $request)
    {
        Validator::make($request->all(),[
            'subject_id' => 'required|exists:subjects,id',
            'assignment' => 'required|string',
            'assignment_id' => 'required|exists:assignments,id'
        ])->validate();
    
        Assignment::where('id', $request->assignment_id)->update([
            'assignment' => $request->assignment,
            'subject_id' => $request->subject_id
        ]);
        return redirect('/admin/create-assignment')->with('success', 'Assignment has been updated');
    }

    function deleteAssignment($assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id);
        $assignment->delete();
        return redirect('/admin/create-assignment')->with('success', 'Assignment has been deleted!');
    }
}
