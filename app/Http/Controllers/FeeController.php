<?php

namespace App\Http\Controllers;

use App\Models\ClassCore;
use App\Models\FeeCategory;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DateTime;


class FeeController extends Controller
{

    function manageFeeIndex($fee_id = 0, $class_id = 0)
    {
        $fees = FeeCategory::orderby('fee', 'asc')->get();
        $classes = ClassCore::orderby('index', 'asc')->get();
        return view('admin.manage_levy', compact(['fees', 'classes', 'fee_id', 'class_id']));
    }







    function MakeFeePayment(Request $request)
    {
        Validator::make($request->all(), [
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|integer',
        ])->validate();

        $student = Student::find($request->student_id);
        Payment::create([
            'term_id' => $this->currentTerm()->id,
            'fee_id' => $request->fee_cat_id ?? 0,
            'fee_index' => 0,
            'class_id' => $student->class_id,
            'student_id' => $student->id,
            'total' => $request->amount,
            'amount' => 0,
            'discount' => 0,
            'created_by' => auth()->user()->id,
            'type' => 5
        ]);
        return back()->with([
            'success' => 'Fee payment has been made',
        ]);
    }




    function viewFee(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required|exists:class_cores,id',
            'fee_id' => 'required|exists:fee_categories,id',
        ])->validate();

        return redirect('/admin/manage-levy/' . $request->fee_id . '/' . $request->class_id);
    }


    function updateSchoolFeePerRecord(Request $request)
    {
        $val = Validator::make($request->all(), [
            'payment_id' => 'required|exists:payments,id',
            'amount' => 'required|integer',
            'discount' => 'integer',
        ]);

        if ($val->fails()) {
            return response(['errors' => $val->errors()->all()], 422);
        }
        $payment = Payment::find($request->payment_id);
        $payment->update([
            'amount' => $request->amount,
            'discount' => $request->discount,
            'total' => -$request->amount - $request->discount
        ]);

        return response([
            'message' => 'Fee updated sucessfully',
            'status' => true
        ], 200);
    }


    function updateSchoolFeePerRecord_MultipleStudent(Request $request)
    {
        $val = Validator::make($request->all(), [
            'payments' => 'required|array',
        ]);

        $data = [];

        foreach ($request->payments as $pay) {
            $payment = Payment::find($pay['id']);
            $dis = $pay['discount'];
            $payment->update([
                'amount' => $pay['amount'],
                'discount' => $dis,
                'total' => -$pay['amount'] - $dis
            ]);
            $data[] = $dis;
        }

        return response([
            'data' => $data,
            'message' => 'School Fees has been Updated sucessfuly'
        ]);
    }


    function updateFeeCategory(Request $request)
    {
        Validator::make($request->all(), [
            'fee_id' => 'required|exists:fee_categories,id',
            'fee' => 'required|string',
            'description' => 'string'
        ])->validate();


        FeeCategory::where('id', $request->fee_id)->update([
            'fee' => $request->fee,
            'description' => $request->description,
        ]);

        return back()->with(['success' => 'Fee category has been updated', 'action' => 'created_fee']);
    }


    function setFees(Request $request)
    {
        Validator::make($request->all(), [
            'fee_id' => 'required|exists:fee_categories,id',
            'class_id' => 'required|exists:class_cores,id',
            'amount' => 'required|integer',
        ])->validate();


        $fee = FeeCategory::find($request->fee_id);
        $class = ClassCore::find($request->class_id);
        $current_term = $this->currentTerm()->id;

        $students = Student::where(['class_id' => $request->class_id, 'status' => 1])->get(['id', 'class_id']);
        if (count($students) == 0) {
            return back()->with(['error' => 'There are no students in this class']);
        }

        foreach ($students as $student) {
            ////fee index .... fee_cat_id.term_id.student_id
            $fee_index = $fee->id . $current_term . $student->id;
            $check_fee_exists = Payment::where(['fee_index' => $fee_index])->count();
            if ($check_fee_exists > 0) {
            } else {
                Payment::create([
                    'term_id' => $current_term,
                    'fee_id' => $fee->id,
                    'fee_index' => $fee_index,
                    'class_id' => $student->class_id,
                    'student_id' => $student->id,
                    'amount' => $request->amount,
                    'total' => -$request->amount,
                    'discount' => 0,
                    'created_by' => auth()->user()->id,
                    'type' => 1
                ]);
            }
        }

        // $class_fee = $this->fetchFee($fee->id, $current_term, $class->id);

        return redirect('/admin/manage-levy/' . $fee->id . '/' . $class->id)->with(['success', 'Fee setting in progress']);
    }


    function fetSettedFee($fee, $class)
    {
        $term = $this->currentTerm()->id;
        $data = [
            'session' =>  $this->currentTerm()->session->session,
            'term' => $this->currentTerm()->term,
            'fee' => FeeCategory::find($fee)->fee,
            'class' => ClassCore::find($class)->class,
            'records' => Payment::with(['student:id,surname,firstname'])
                ->where(['class_id' => $class, 'fee_id' => $fee, 'term_id' => $term, 'type' => 1])->get([
                    'id', 'fee_id', 'class_id', 'student_id', 'amount', 'discount'
                ])
        ];



        return response([
            'data' => $data
        ]);
    }


    function fetchFee($fee_id, $term_id, $class_id)
    {
        $payments = Payment::with(['fee_cat:id,term', 'term:id,term', 'student:id,firstname,lastname', 'grade:id,class'])->where(['fee_id' => $fee_id, 'term_id' => $term_id, 'class_id' => $class_id, 'type' => 1])->get([
            'fee_id', 'term_id', 'student_id', 'class_id', 'amount', 'discount'
        ]);
        return $payments;
    }





    public function crerateFeeCategory(Request $request)
    {
        Validator::make($request->all(), [
            'fee' => 'required|string|unique:fee_categories,fee',
            'description' => 'required|string'
        ])->validate();


        FeeCategory::create([
            'term_id' => $this->currentTerm()->id,
            'fee' => $request->fee,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
        ]);

        return back()->with(['success' => 'Fee category has been created', 'action' => 'created_fee']);
    }


    function fetchDailyFeeTransaction(Request $request)
    {

        $day = ($request->date) ? date('Y-m-d', strtotime($request->date)) : date('Y-m-d');

        $payments = Payment::with(['fee_cat:id,fee', 'student:id,surname,firstname', 'grade:id,class', 'term:id,term', 'user:id,name'])
            ->where('created_at', 'like', "%$day%")->orderBy('id', 'desc')->paginate(100);
        return view('admin.daily_payments', compact(['payments', 'day']));
    }



    function getStartAndEndDate($week, $year)
    {
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $ret['week_start'] = $dto->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->format('Y-m-d');
        return $ret;
    }



    function fetchWeeklyTransaction(Request $request)
    {
        $week = $request->week ?? date('W') ;
        $week_array = $this->getStartAndEndDate($week, date('Y'));
        $start = strtotime($week_array['week_start']);
        $end = strtotime($week_array['week_end']) + (86400 - 1);
        $payments = Payment::with(['fee_cat:id,fee', 'student:id,surname,firstname', 'grade:id,class', 'term:id,term', 'user:id,name'])
            ->whereBetween('created_at', [date('Y-m-d', $start), date('Y-m-d',$end)])->orderBy('id', 'desc')->paginate(200);
        $date = date('j M, Y', $start) . ' to ' . date('j M, Y', $end) . ' (Week ' . $week . ')';
        return view('admin.weekly_payment', compact(['payments', 'date']));
    }


    function fetchDateRangeFee(Request $request){
        $from = $request->from;
        $to = $request->to;
        $start = strtotime($from);
        $end = strtotime($to)+(86400-1);
        $payments = Payment::with(['fee_cat:id,fee', 'student:id,surname,firstname', 'grade:id,class', 'term:id,term', 'user:id,name'])
        ->whereBetween('created_at', [date('Y-m-d', $start), date('Y-m-d', $end)])->orderBy('id', 'desc')->paginate(200);
        $date =  date('j M, Y', $start).' to '. date('j M, Y', $end).'';
        return view('admin.range_fee', compact(['payments', 'date']));
    }


}
