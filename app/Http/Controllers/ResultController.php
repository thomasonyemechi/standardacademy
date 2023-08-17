<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    function uploadResultIndex()
    {
        $class = ClassCore::where('class_teacher', auth()->user()->id)->first();
        
    }
}
