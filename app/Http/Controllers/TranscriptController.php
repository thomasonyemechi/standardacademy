<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\ResultSetup;
use App\Models\ResultSummary;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Http\Request;

class TranscriptController extends Controller
{

    function classTermResult($class_id)
    {
        $term = $this->currentTerm() ;
        $data = [];

        $class_res = ResultSummary::where(['class_id' => $class_id, 'term_id' => $term->id])->get();

        foreach ($class_res as $sum) {
            $res = $this->ResultRes($term->id, $sum->student_id);
            $data[] = $res;
        }

        return response([
            'data' => $data
        ], 200);
    }

    
    function calculateSubAvr($term_id, $subject_id, $class_id, $ret='avr') {
        $res = Result::where(['term_id' => $term_id, 'subject_id' => $subject_id, 'class_id' => $class_id])->get(['id', 'student_id', 'total']);
        $score = 0; $c = 0;
        foreach($res as $r) {
            if($r->total > 0) {
                $c++;
                $score += $r->total;
            }
        }
        $val = ($score > 0) ? ($score/$c) : 0 ;
        return $val;
    }




    function Trans($result_id)
    {

        $sum = ResultSummary::find($result_id);

        $term_id = $sum->term_id;
        $student_id = $sum->student_id;

        $term = Term::find($term_id);
        $student = Student::find($student_id);
        $subjects = [];

        // @$sum = ResultSummary::where(['term_id' => $term->id, 'student_id' => $student->id])->first();
        if (!$sum) {
            return response(['message' => 'No result Found'], 404);
        }
        
        foreach ($sum->results as $res) {
            $prev = $this->previosuTermSubjectScoreCum($student->id, $res->subject_id, $term_id);
            $total = $this->calculateTotalScore($res->total, $prev);
            $gradings = $this->subjectGrade($total);
            $data = [
                'subject' => $res->subject->subject,
                't1' => $res->t1,
                't2' => $res->t2,
                't3' => $res->t3,
                'exam' => $res->exam,
                'term_total' => $res->total,
                'cla_avr' => $this->subject_classaverage($res->subject_id, $term_id, $sum->class_id),
                'min' => '',
                'max' => '',
                'prev' => $prev,
                'total' => $total,
                'grade' => $gradings->grade,
                'remark' => $gradings->remark,
            ];
            if ($res->total > 0) {
                $subjects[] = $data;
            }
        }

        $data = $student;
        $data['results'] = $subjects;
        $data['term'] = [
            'term' => $sum->term->term,
            'session' => $sum->term->session->session,
            'close' => date('j M, Y', strtotime($sum->term->close)),
            'resume' => date('j M, Y', strtotime($sum->term->resume)),
        ];
        $data['school'] = [
            'name' => env('SCHOOL_NAME') ,
            'address' => env('SCHOOL_ADDRESS') ,
            'phone' => env('SCHOOL_PHONE'),
        ];

        $data['others'] = [
            'class' => $sum->grade->class,
            'class_average' => '',
            'no_in_cla' => '',
            'result_id' => $sum->id,
            'principal_remark' => $sum->principal_remark,
            'teacher_remark' => $sum->teacher_remark,
        ];


        return response([
            'data' => $data
        ]);
    }



    function ResultRes($term_id, $student_id)
    {
        $term = Term::find($term_id);
        $student = Student::find($student_id); $subjects = []; $term_id =  $this->currentTerm()->id;

        @$sum = ResultSummary::where(['term_id' => $term->id, 'student_id' => $student->id])->first();
        if(!$sum) { return response(['message' => 'No result Found'], 404); }
        foreach($sum->results as $res) {
            $prev = $this->previosuTermSubjectScoreCum($student->id, $res->subject_id, $term_id);
            $total = $this->calculateTotalScore($res->total, $prev);
            $gradings = $this->subjectGrade($total);
            $data = [
                'subject' => $res->subject->subject,
                't1' => $res->t1,
                't2' => $res->t2,
                't3' => $res->t3,
                'exam' => $res->exam,
                'term_total' => $res->total,
                'cla_avr' => $this->subject_classaverage($res->subject_id, $term_id, $sum->class_id),
                'min' => '',
                'max' => '',
                'prev' => $prev,
                'total' => $total,
                'grade' => $gradings->grade,
                'remark' => $gradings->remark,
            ];
            if($res->total > 0) { $subjects[] = $data; }
        }

        $data = $student;
        $data['results'] = $subjects;
        $data['term'] = [
            'term' => $sum->term->term,
            'session' => $sum->term->session->session,
            'close' => date('j M, Y',strtotime($sum->term->close)),
            'resume' => date('j M, Y',strtotime($sum->term->resume)),
        ];
        $data['school'] = [
            'name' => env('SCHOOL_NAME') ,
            'address' => env('SCHOOL_ADDRESS') ,
            'phone' => env('SCHOOL_PHONE'),
        ];

        $data['others'] = [
            'class' => $sum->grade->class,
            'class_average' => '',
            'no_in_cla' => '',
            'result_id' => $sum->id,
            'principal_remark' => $sum->principal_remark,
            'teacher_remark' => $sum->teacher_remark,
        ];


        return $data;
    }


    
    function previosuTermSubjectScoreCum($student_id, $subject_id, $term_id){
        $term = Term::find($term_id); $scores = [];

        if($term->term == 1) {
            return 0;
        }
        $terms = Term::where('session_id', $term->session_id)->get(['id', 'term']);
        foreach($terms as $tm) {
            if($tm->term < $term->term) {
                $res = Result::where(['term_id' => $tm->id, 'student_id' => $student_id, 'subject_id' => $subject_id])->first(['id', 'total']);
                $scores[] = [
                    'term' => $tm->term,
                    'total' => $res->total ?? 0
                ];
            }
        }
        return $scores;
    }

    function calculateTotalScore($total, $prev)
    {
        if($prev == 0) { return $total; }
        $i=0; $score = 0;
        foreach($prev as $sc) {
            if($sc['total'] > 0) { $i++; }
            $score += $sc['total'];
        }
        $div = ($total > 0) ? $i+1 : $i ;
        $total = $score + $total;
        if($total == 0) { return 0; }
        $t = $total / $div;
        return $t;
    }


    function subjectGrade($score) {
        $rems = ResultSetup::first(['remarks']);
        $rems = json_decode($rems->remarks);
        foreach($rems as $rm) {
            $sc = $rm->score;
            if($score >= $sc){ return $rm; }
        }
    }

    function subject_classaverage($subject_id, $term_id, $class_id) {
        $term = Term::find($term_id);
        $terms = Term::where('session_id', $term->session_id)->get(['id', 'term']);
        $cum = 0; $c = 0;
        foreach($terms as $tm) {
            $cum_total = $this->calculateSubAvr($tm->id, $subject_id, $class_id);
            if($cum_total > 0) {
                $cum += $cum_total;
                $c++;
            }
        }

        return  ($cum > 0) ? $cum/$c : $cum;
    }

}
