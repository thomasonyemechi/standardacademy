@extends('layout.student')
@php
    $student = Auth::guard('student')->user();
    $test = App\Models\TestSetting::with(['exam'])
        ->where(['class_id' => $student->class_id, 'status' => 1])
        ->first();
    
    $questions = App\Models\Question::where(['exam_id' => $test->exam_id])
        ->inRandomOrder()
        ->get();
    
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
                                <h4 class="card-title">Computer science </h4>
                            </div>
                            <div class="d-flex justify-space-between ">
                                <h4 class="card-title mt-2" id="timmer"></h4>
                                <button class="btn btn-sm p-1 btn-danger"> Submit Exam </button>
                            </div>
                        </div>
                        <div class="card-body ">
                            <form id="question_form">
                                <div class="question_box">


                                </div>

                                <button type="submit" name="previous"
                                    class="btn btn-primary float-left mt-2 previous  ">Previous</button>
                                <button type="submit" name="next" value="next"
                                    class="btn btn-primary float-right next mt-2"> Next</button>
                                <br>
                                <br><br>
                                <hr>

                                <div class="row ">
                                    <div class="col-lg-12 text-center ">
                                        <div class="">
                                            <nav>
                                                <ul class="pagination">
                                                    @php
                                                        $qn = 1;
                                                    @endphp
                                                    @foreach ($questions as $question)
                                                    @php
                                                        $i = $qn++
                                                    @endphp
                                                        <a href="javascript:;">
                                                            <li class="page-item active jumpToQuestion " aria-current="page"
                                                                data-qn="{{ $i }}"
                                                                data-data='{{ json_encode($question) }}'><span
                                                                    class="page-link">{{ $i }}</span></li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                            </nav>

                                        </div>
                                    </div>
                                    <div>
                                        <h5> {{ $test->exam->subject->subject }} {{ $test->exam->type->type }},
                                            {{ term_text($test->exam->term->term) }}
                                            {{ $test->exam->term->session->session }}</h5>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function setAnswer(qn, opt) {
            li = $(`li[data-qn=${qn}]`)
            li.attr('data-answer', opt);
            console.log(li, opt);
        }
    </script>
    <script>
        $(function() {

            form = $('#question_form')
            form.on('submit', function(e) {
                e.preventDefault()
            })


            function showQuestion() {


            }


            $('.previous').on('click', function() {

                ////save answer {


            })


            function checked(opt, my_option) {
                if (opt == my_option) {
                    return 'checked'
                }
            }



            $('body').on('click', '.jumpToQuestion', function() {
                data = $(this).data('data')
                qn = $(this).data('qn')
                my_option = $(this).data('answer');

                body = $('.question_box')

                console.log(data);

                body.html(`
                    <b>Question ${qn}</b>
                    <span style="float: left" class=""> </span>
                    <p>${ data.question }</p>


                    <label style="width: 100%; font-weight: normal;" class="m-0" onClick="setAnswer(qn,'a')" >
                        <span style="float: left"> <input type="radio" value="A" name="custom"
                                class="me-2" ${checked('A', my_option)} ></span>
                        ${ data.a }
                    </label>


                    <label style="width: 100%; font-weight: normal;" class="m-0" onClick="setAnswer('a')" >
                        <span style="float: left"> <input type="radio" name="custom" value="B"
                                class="me-2"></span>
                        ${ data.b }
                    </label>


                    <label style="width: 100%; font-weight: normal;" class="m-0">
                        <span style="float: left"> <input type="radio" value="C" name="custom"
                                class="me-2"></span>
                                ${ data.c }
                    </label>

                    <label style="width: 100%; font-weight: normal;" class="m-0">
                        <span style="float: left"> <input type="radio" value="D" name="custom"
                                class="me-2"></span>
                                ${ data.d }
                    </label>


                `)
            })






            // let examTime = ;
            display = $('#timmer');
            let timer = '{{ $test->time * 60 }}',
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
                if (time == 300) {
                    alert("You Have Five Minutes Left");
                }
                if (time <= 0) {
                    console.log('submit here');
                }
            }, 1000);

        })
    </script>
@endpush
