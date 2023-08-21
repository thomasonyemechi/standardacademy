<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Foundation\Auth\User;
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

    function contactIndex()
    {
        return view('contact');
    }

    function admissionIndex()
    {
        return view('admission');
    }

    function feesIndex()
    {
        return view('fees');
    }

    function galleryIndex()
    {
        return view('gallery');
    }

    function newsIndex()
    {
        return view('news');
    }

    function adminDashboard()
    {
        $students = Student::orderby('updated_at', 'desc')->limit(5)->get();
        $total_staff = User::where('id', '>', 1)->count();

        $term = $this->currentTerm();

        $classes = ClassCore::orderBy('class', 'asc')->get();
        $pay_chart = [];
        foreach ($classes as $cla) {
            $data = [
                'class' => $cla,
                'fee' => abs(Payment::where(['term_id' => $term->id, 'type' => 1, 'class_id' => $cla->id])->sum('total')),
                'payment' => Payment::where(['term_id' => $term->id, 'type' => 5, 'class_id' => $cla->id])->sum('total')
            ];
            $pay_chart[] = $data;
        }


        $data = [
            'assigned_fee' => abs(Payment::where(['term_id' => $term->id, 'type' => 1])->sum('total')),
            'reveived_payment' => Payment::where(['term_id' => $term->id, 'type' => 5])->sum('total'),
            'pay_chart' => $pay_chart,
        ];




        return view('admin.index', compact(['students', 'total_staff', 'data']));
    }
}
