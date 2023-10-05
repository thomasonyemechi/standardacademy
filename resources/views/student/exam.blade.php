@extends('layout.student')
@section('page_title')
    Start Exam
@endsection
@php
    
@endphp
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-6 offset-3">

                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="profile-photo">
                                    <img src=" {{ asset($student->photo) }} " width="100" class="img-fluid rounded-circle"
                                        alt="">
                                </div>
                                <h3 class="mt-4 mb-1"> {{$student->surname}} {{$student->firstname}} {{$student->othername}} </h3>
                                <p class="text-muted">{{$student->grade->class}} <sup>{{$student->arm->arm}}</sup> </p>
                                <h4 class="mt-4 mb-1">
                                     {{$test->exam->subject->subject}} {{$test->exam->type->type}}, {{term_text($test->exam->term->term)}} {{$test->exam->term->session->session}}

                                </h4>

                                <a class="btn btn-outline-primary btn-rounded mt-3 px-5"
                                    href="/student/proceed-toexam/{{$test->id}}">Start Exam  </a>
                            </div>
                        </div>

                        <div class="card-footer pt-0 pb-0 text-center">
                            <div class="row">
                                <div class="col-6 pt-3 pb-3 border-end">
                                    <h3 class="mb-1">{{ $test->questions }}</h3><span>Questions</span>
                                </div>
                                <div class="col-6 pt-3 pb-3 border-end">
                                    <h3 class="mb-1">{{ $test->time }}</h3><span>Minitues</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
