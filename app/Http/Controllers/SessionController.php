<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{


    function termIndex()
    {
        $sessions = Session::with(['terms'])->orderBy('id', 'desc')->get();
        return view('admin.manage_session', compact('sessions'));
    }



    function createSession(Request $request)
    {
        $val = Validator::make($request->all(), [
            'session' => 'required|string|max:10',
        ])->validate();

        $check_session = Session::where(['session' => $request->session])->count();
        if ($check_session > 0) {
            return back()->with('error', 'Session already exists');
        }

        $session = Session::create([
            'session' => $request->session,
        ]);

        for ($i = 1; $i <= 3; $i++) {
            Term::create([
                'session_id' => $session->id,
                'term' => $i,
                'year' => explode('/', $request->session)[0],
            ]);
        }

        return back()->with('success', 'Session has been created sucessfuly');
    }





    function updateTermInfo(Request $request)
    {
        $val = Validator::make($request->all(), [
            'year' => 'required|string|max:255',
            'term_id' => 'required|exists:terms,id',
            'close' => 'required',
            'resume' => 'required',
        ])->validate();
        
        Term::where(['id' => $request->term_id])->update([
            'year' => $request->year,
            'close' => $request->close,
            'resume' => $request->resume,
        ]);

        return back()->with('message', 'Term Info updated successfully');
    }


    function activateTerm($term_id)
    {
        $term = Term::find($term_id);
        Term::where('id', '>', 0)->update([
            'status' => 0
        ]);
        $term->update([
            'status' => 1
        ]);
        return back()->with('success', 'Term activated sucessfully');
    }


}
