<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CbtController extends Controller
{
    function addtype(Request $request)
    {
        Validator::make($request->all(), [
            'type' => 'required|max:200|unique:exam_types,type',
        ])->validate();

        ExamType::create([
            'examtype' => $request->type,
            'created_by' => auth()->user()->id
        ]);

        return back()->with('success', 'Exam Type Add');
    }
}
