<?php

namespace App\Http\Controllers;

use App\Models\ClassArm;
use App\Models\ClassCategory;
use App\Models\ClassCore;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{

    function classProfileIndex($class_id)
    {
        $grade = ClassCore::with(['students'])->findOrFail($class_id);



        $term_id = $this->currentTerm()->id;
        $fees = Payment::where(['class_id' => $class_id, 'type' => 1, 'term_id' => $term_id ])->sum('total');
        $payments = Payment::where(['class_id' => $class_id, 'type' => 5, 'term_id' => $term_id ])->sum('total');

        return view('admin.class-profile', compact(['grade', 'payments', 'fees']));
    }


    function classIndex()
    {
        $categories = ClassCategory::orderby('category','asc')->get();
        $classes = ClassCore::with(['category:id,category'])->withCount('students')->orderby('index','asc')->get();
        return view('admin.manage_class', compact(['categories', 'classes']));
    }

    function orderClass(Request $request)
    {
        $val = Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'action' => 'required|string'
        ])->validate();
        $class = ClassCore::find($request->class_id);
        $act = $request->action;
        if($act == 'move_up') {
            $upper_class = ClassCore::where([['index', '<', $class->index]])->orderBy('index', 'desc')->first();
        }elseif($act == 'move_down'){
            $upper_class = ClassCore::where([['index', '>', $class->index]])->orderBy('index', 'ASC')->first();
            return $upper_class;
        }else {
            return back()->with('error', 'Invalid action selected');
        }
        if(!$upper_class) { return back()->with('error', 'Class cannot be ordered'); }
        $upper_class_index = $upper_class->index;
        ClassCore::where('id', $class->id)->update([
            'index' => $upper_class_index
        ]);
        ClassCore::where('id', $upper_class->id)->update([
            'index' => $class->index
        ]);
        return back()->with('success', 'Operation sucessfull');
    }


    function createClass(Request $request)
    {
        Validator::make($request->all(), [
            'level' => 'required|integer',
            'category_id' => 'required|exists:class_categories,id'
        ])->validate();

        $category = ClassCategory::find($request->category_id);
        $class_name = $category->category.' '.$request->level;

        $ck = ClassCore::where(['class' => $class_name])->count();
        if($ck > 0) { return back()->with('error', 'Class already exist'); }

        $total_class = ClassCore::count();

        ClassCore::create([
            'class' => $class_name,
            'category_id' => $category->id,
            'index' => $total_class + 1,
            'created_by' =>  auth()->user()->id
        ]);

        return back()->with('success', 'Class created sucessfully');
    }

    
    function updateClassArm(Request $request)
    {
        Validator::make($request->all(), [
            'arm' => 'required|string|max:20',
            'arm_id' => 'required|exists:class_arms,id'
        ])->validate();
        $ck = ClassArm::where(['arm' => $request->arm])->count();
        if($ck > 0) { return back()->with('error', 'Class arm already exists'); }

        ClassArm::where('id', $request->arm_id)->update([
            'arm' => $request->arm,
        ]);
        return back()->with('success', 'Class arm updated sucessfully');
    }



    function createClassArm(Request $request)
    {
        Validator::make($request->all(), [
            'arm' => 'required|string|max:20|unique:class_arms,arm',
        ])->validate();
        ClassArm::create([
            'arm' => $request->arm,
            'created_by' => auth()->user()->id,
        ]);
        return back()->with('success', 'Class arm created sucessfully');
    }






    function categoryIndex()
    {
        $categories = ClassCategory::orderby('category','asc')->get();
        $arms = ClassArm::orderby('arm','asc')->get();
        return view('admin.classes_arms', compact(['categories', 'arms']));
    }

    function updateClassCategory(Request $request)
    {
        Validator::make($request->all(), [
            'category' => 'required|string|max:20',
            'category_id' => 'required|exists:class_categories,id'
        ])->validate();
        $ck = ClassCategory::where(['category' => $request->category])->count();
        if ($ck > 0) {
            return back()->with('error', 'Class category already exists');
        }
        ClassCategory::where('id', $request->category_id)->update([
            'category' => $request->category,
        ]);
        return back()->with('success', 'Class category has been updated sucessfully');
    }


    function createClassCategory(Request $request)
    {
        Validator::make($request->all(), [
            'category' => 'required|string|max:20|unique:class_categories,category',
        ])->validate();
        ClassCategory::create([
            'category' => $request->category,
            'created_by' => auth()->user()->id
        ]);
        return back()->with('success', 'Class category has been created sucessfully');
    }
}
