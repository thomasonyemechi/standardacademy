@extends('layout.admin')
@section('page_title')
Question Bank
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Questions : {{ $exam->grade->class }},
                                {{ $exam->subject->subject }}
                                ({{ term_text($exam->term->term) . '/' . $exam->term->session->session }}) </h4>
                        </div>
                    </div>
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.5s"
                        style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                        <div class="table-responsive ">
                            <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="checkbox me-0 align-self-center">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="form-check-input" id="checkAll"
                                                        required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Question</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th title="Correct option">CA</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <th>
                                                <div class="checkbox me-0 align-self-center">
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="form-check-input check-me"
                                                            required="" value="{{$question->id}}" >
                                                        <label class="custom-control-label" for=""></label>
                                                    </div>
                                                </div>
                                            </th>
                                            <td style="white-space: initial;">
                                                {!! $question->question !!}
                                            </td>
                                            <td style="white-space: initial;"> {!! $question->a !!} </td>
                                            <td style="white-space: initial;"> {!! $question->b !!} </td>
                                            <td style="white-space: initial;"> {!! $question->c !!} </td>
                                            <td style="white-space: initial;"> {!! $question->d !!} </td>
                                            <td>
                                                <p> {{ $question->ca }}</p>
                                            </td>
                                            <td>
                                                <p>{{ date('j M, Y | h:i:s a', strtotime($question->created_at)) }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end ">
                            {{ $questions->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection