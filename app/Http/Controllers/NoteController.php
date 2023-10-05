<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Note;
use App\Models\NoteContent;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{   
    function classNoteIndex(Request $request)
    {
        $notes = []; $grade = [];
        if($request->grade) {
            $grade = ClassCore::findOrFail($request->grade);
            $notes = Note::with(['subject:id,subject', 'user'])->withCount(['contents'])->where(['class_id' => $grade->id])->orderby('id', 'desc')->get();
        }
        $classes = ClassCore::orderby('index', 'asc')->get();
        return view('admin.class_notes', compact(['classes', 'notes', 'grade']));
    }
    function contentListIndex()
    {
        $my_class = ClassCore::where(['class_teacher' => 1 ])->get();
        $gross_content = [];
        foreach($my_class as $cla) 
        {
            $notes = Note::where(['class_id' => $cla->id])->get();
            foreach($notes as $note) {
                $ct = NoteContent::where(['note_id' => $note->id])->get();
                $gross_content[] = $ct;
            }
        }

        return $gross_content;
        return view('admin.content-list', compact(['gross_content']));
    }

    function noteContentIndex($note_id)
    {
        $note  = Note::with(['subject:id,subject', 'grade:id,class', 'term:id,term'])->findOrFail($note_id);
        $contents = NoteContent::where(['note_id' => $note->id])->orderby('week', 'desc')->get();
        if(count($contents) == 0) {
            return back()->with('error', 'This note does not have any content');
         }
        return view('admin.note-content', compact(['note', 'contents']));
    }

    function addContentIndex(Request $request, $note_id)
    {
        $note  = Note::with(['subject:id,subject', 'grade:id,class', 'term:id,term'])->findOrFail($note_id);
        $contents = NoteContent::where(['note_id' => $note->id])->orderby('week', 'desc')->get();
        $content = [];
        if($request->edit){
            $content = NoteContent::findorFail($request->edit);
        }
        return view('admin.add_note_content', compact(['note', 'contents', 'content']));
    }
    

    function createNoteIndex()
    {
        $class = ClassCore::where('class_teacher', auth()->user()->id)->first();
        $notes = Note::withCount(['contents'])->where(['class_id' => $class->id, 'term_id' => $this->currentTerm()->id ])->orderby('id', 'desc')->paginate(25);
        $subjects = Subject::orderby('subject', 'asc')->get();
        return view('admin.create_note', compact(['notes', 'class', 'subjects']));
    }

    function deleteNote($note_id)
    {
        $note = Note::withCount(['contents'])->findOrFail($note_id);
        if($note->contents_count > 0) {
            return back()->with('error', 'Note has some content and cannot be deleted');
        }
        $note->delete();
        return back()->with('success', 'Note has been deleted!');
    }

    function deleteContent($content_id)
    {
        $content = NoteContent::findOrFail($content_id);
        $content->delete();
        return redirect('/admin/add-content/'.$content->note_id)->with('success', 'Content has been deleted!');
    }

    
    public function updateContent(Request $request)
    {
        Validator::make($request->all(), [
            'week' => 'required|integer',
            'topic' => 'required|string|min:3',
            'content' => 'required|string',
            'content_id' => 'required|exists:note_contents,id'
        ])->validate();
        
        $content = NoteContent::find($request->content_id);
        $content->update([
            'topic' => $request->topic,
            'content' => $request->content,
        ]);

        return redirect('/admin/add-content/'.$content->note_id)->with('success', 'Note has been updated');
    }

    function addNoteContent(Request $request)
    {
        Validator::make($request->all(), [
            'week' => 'required|integer',
            'topic' => 'required|string|min:3',
            'content' => 'required|string',
            'note_id' => 'required|exists:notes,id'
        ])->validate();

        $check = NoteContent::where(['note_id' => $request->note_id, 'week' => $request->week])->count();
        if($check > 0) {
            return back()->with(['error' => 'Note for week already exists, You can only edit note', 'content' => $request->content, 'topic' => $request->topic]);
        }

        NoteContent::create([
            'note_id' => $request->note_id,
            'topic' => $request->topic,
            'class_id' => $request->class_id,
            'content' => $request->content,
            'week' => $request->week,
            'created_by' => auth()->user()->id
        ]);

        return back()->with('success', 'Note content hass been added');
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
