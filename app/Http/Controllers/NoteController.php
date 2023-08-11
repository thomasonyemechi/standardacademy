<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Note;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    function addContentIndex($note_id)
    {
        $note  = Note::with(['subject:id,subject', 'grade:id,class', 'term:id,term'])->findOrFail($note_id);
        return view('admin.add_note_content', compact(['note']));
    }

    function createNoteIndex()
    {
        $classes = ClassCore::where('class_teacher', auth()->user()->id)->get();
        $notes = Note::where(['created_by' => auth()->user()->id, 'term_id' => $this->currentTerm()->id ])->orderby('id', 'desc')->paginate(25);
        $subjects = Subject::orderby('subject', 'asc')->get();
        return view('admin.create_note', compact(['notes', 'classes', 'subjects']));
    }

    function createNote(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'subject_id' => 'required|exists:subjects,id',
        ])->validate();

        $term_id = $this->currentTerm()->id;
        $check = Note::where(['subject_id' => $request->subject_id, 'class_id' => $request->class_id, 'term_id' => $term_id])->count();
        if($check > 0)
        {
            return back()->with('error', 'This note already exists');
        }

        Note::create([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'term_id' => $term_id,
            'created_by' => auth()->user()->id
        ]);
        return back()->with('success', 'Note has been created, Proceed to add content');
    }
}
