<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    function subjectIndex()
    {
        $subjects = Subject::orderby('subject', 'asc')->get();
        return view('admin.manage_subject', compact('subjects'));
    }

    function updateSubject(Request $request)
    {
        Validator::make($request->all(), [
            'subject_id' => 'required|exists:subjects,id',
            'subject' => 'required|string',
        ])->validate();
        $ck = Subject::where(['subject' => $request->subject])->count();
        if ($ck > 0) {
            return back()->with('error', 'Subject already exist');
        }
        Subject::where('id', $request->subject_id)->update([
            'subject' => $request->subject,
        ]);
        return back()->with('success', 'Subject has been updated sucessfully');
    }


    function createSubject(Request $request)
    {
        $val = Validator::make($request->all(), [
            'subject' => 'required|string',
        ])->validate();
        $ck = Subject::where(['subject' => $request->subject])->count();
        if ($ck > 0) {
            return back()->with('error', 'Subject already exist');
        }
        Subject::create([
            'subject' => $request->subject,
            'created_by' => auth()->user()->id
        ]);
        return back()->with('success', 'Subject added sucessfully');
    }
}
