<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebviewController extends Controller
{
    function guestIndex()
    {
        return view('welcome');
    }

    function aboutIndex()
    {
        return view('about');
    }
}
