@extends('layout.student')
@php
    
    $student = Auth::guard('student')->user();
    $test = App\Models\TestSetting::with(['exam'])
        ->where(['class_id' => $student->class_id, 'status' => 1])
        ->first();

    $summary = App\Models\CbtResultSummary::find($result_summary_id);
    $time_left = ($test->time * 60) - abs($summary->start_time - time());
    
    
    $questions = App\Models\Question::where(['exam_id' => $test->exam_id])
        ->orderby('id', 'ASC')
        ->get(['id', 'question_number']);
    
    $firstqn = $array = \App\Models\Question::where('exam_id', $test->exam_id)
        ->orderby('question_number', 'ASC')
        ->first();
    
    $ques = isset($_GET['question_number']) ? $_GET['question_number'] : $firstqn->id;
    
    $array = \App\Models\Question::where('exam_id', $test->exam_id)
        ->orderby('id', 'ASC')
        ->get(['id', 'question_number']);
    
    foreach ($array as $k) {
        $arr[] = $k->question_number;
    }
    
    $absnum = array_search($ques, $arr);
    
    $myans = \App\Models\CbtResult::where(['result_summary_id' => $result_summary_id, 'question_id' => $ques])->first()->my_option ?? '';
    
@endphp
@section('page_title')
    {{ $student->surname }} {{ $student->firstname }}
@endsection


@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-8 offset-2">



                    <div class="card">
                        <div class="card-header p-2  d-flex justify-content-between ">
                            <div>
                                <h4 class="card-title"> {{ $test->exam->subject->subject }} {{ $test->exam->type->type }}</h4>
                            </div>
                            <div class="d-flex justify-space-between ">
                                <h4 class="card-title mt-2 me-2" id="timmer"></h4>
                                <button class="btn btn-sm p-1 btn-danger"> Submit Exam </button>
                            </div>
                        </div>
                        <div class="card-body ">

                            <?php $question = \App\Models\Question::where(['exam_id' => $test->exam_id, 'question_number' => $ques])->first(); ?>
                            <form action="/student/save-answer" method="POST">@csrf
                                <b>Question {{ $ques }}</b>
                                <span style="float: left" class=""> </span>
                                <p>{!! $question->question !!}</p>


                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <input type="hidden" name="question_number" value="{{ $ques }}">
                                <input type="hidden" name="test_id" value="{{ $test->id }}">
                                <input type="hidden" name="exam_id" value="{{ $test->exam_id }}">
                                <input type="hidden" name="result_summary_id" value="{{ $result_summary_id }}">



                                <label style="width: 100%; font-weight: normal;" class="m-0">
                                    <span style="float: left">
                                        <input type="radio" value="A" name="custom" class="me-2 mt-1"
                                            {{ check_ans($myans, 'A') }}>
                                    </span>
                                    {!! $question->a !!}
                                </label>


                                <label style="width: 100%; font-weight: normal;" class="m-0">
                                    <span style="float: left">
                                        <input type="radio" name="custom" value="B" class="me-2 mt-1"
                                            {{ check_ans($myans, 'B') }}>
                                    </span>
                                    {!! $question->b !!}
                                </label>


                                <label style="width: 100%; font-weight: normal;" class="m-0">
                                    <span style="float: left"> <input type="radio" value="C" name="custom"
                                            class="me-2 mt-1" {{ check_ans($myans, 'C') }}>
                                    </span>
                                    {!! $question->c !!}
                                </label>

                                <label style="width: 100%; font-weight: normal;" class="m-0">
                                    <span style="float: left"> <input type="radio" value="D" name="custom"
                                            class="me-2 mt-1" {{ check_ans('a', 'D') }}></span>
                                    {!! $question->d !!}
                                </label>


                                @php
                                    $c = \App\Models\Question::where('exam_id', $test->exam_id)
                                        ->where('question_number', '<', $ques)
                                        ->first(['question_number', 'id']);

                                    

                                    $next = \App\Models\Question::where('exam_id', $test->exam_id)
                                        ->where('question_number', '>', $ques)
                                        ->first(['question_number', 'id']);
                                @endphp

                                <button type="submit" name="previous" {{ ($c) ? '' : 'dsiabled' }} value="{{$c->question_number ?? 1 }}"
                                    class="btn btn-primary float-left mt-2">Previous</button>
                                <button type="submit" name="next" value="{{$next->question_number ?? 1 }}"
                                    class="btn btn-primary float-right mt-2"> Next</button>
                                <br>
                                <br><br>
                                <hr>
                            </form>

                            <nav>
                                <ul class="pagination">
                                    @foreach ($array as $a)
                                    @php
                                        $check = \App\Models\CbtResult::where(['result_summary_id' =>  $result_summary_id, 'question_id' => $a->id])->first();
                                    @endphp
                                        <a href="?question_number={{$a->question_number}}">
                                            <li class="page-item active " aria-current="page" ><span
                                                    class="page-link  {{ ($check->my_option ?? '') ? 'bg-success' : 'bg-danger' }}  {{ ($ques == $a->question_number) ? 'bg-primary' : '' }}  ">{{ $a->question_number }}</span></li>
                                        </a>
                                    @endforeach
                                </ul>
                            </nav>


                            <div>
                                <h5>
                                    {{ term_text($test->exam->term->term) }}
                                    {{ $test->exam->term->session->session }}</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        $(function() {

            // let examTime = ;
            display = $('#timmer');
            let timer = '{{$time_left}}',
                minutes, seconds;

            setInterval(function() {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);


                minutes = minutes < 10 ? "" + minutes : minutes;
                seconds = seconds < 10 ? "" + seconds : seconds;



                time = --timer;

                if (time > 0) {
                    display.html(`${minutes} min : ${seconds} sec`)
                } else {
                    display.html(`Time Up`)
                }
          
                if (time <= 0) {
                    $.ajax({
                        method: 'post', 
                        url: '/api/end-exam',
                        data: {
                            result_summary_id: '{{$result_summary_id}}'
                        }
                    }).done(function(res) {
                        console.log(res);
                        location.href="/student/"
                    }).fail(function(res) {
                        console.log(res);
                    })
                }
            }, 1000);

        })
    </script>
@endpush
