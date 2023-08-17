@extends('layout.admin')
@php
    $edit = isset($_GET['edit']) ? $_GET['edit'] : 0;
@endphp
@section('page_title')
    @if ($edit)
        Add Exam Questions
    @else
        Edit Exam Questions
    @endif
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $edit ? 'Edit' : 'Add' }} Questions : {{ $exam->grade->class }},
                                {{ $exam->subject->subject }}
                                ({{ term_text($exam->term->term) . '/' . $exam->term->session->session }}) </h4>
                        </div>
                        <div class="card-body">
                            @if ($edit)
                                <form action="/admin/update-question" method="post">@csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <label>Question</label>
                                            <textarea name="question" id="editor1"> {!! $question->question !!} </textarea>
                                        </div>

                                        <div class="col-md-3 mt-3">
                                            <label>Option A</label>
                                            <textarea name="option_a" id="editor2"> {!! $question->a !!} </textarea>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label>Option B</label>
                                            <textarea name="option_b" id="editor3"> {!! $question->b !!} </textarea>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label>Option C</label>
                                            <textarea name="option_c" id="editor4"> {!! $question->c !!} </textarea>
                                        </div>

                                        <div class="col-md-3 mt-3">
                                            <label>Option D</label>
                                            <textarea name="option_d" id="editor5"> {!! $question->d !!} </textarea>
                                        </div>


                                        <hr class="mt-3">
                                        <div class="col-md-12 d-flex justify-content-end ">
                                            <div class="col-md-3 me-2 d-flex justify-content-between ">
                                                Correct Option:
                                                <select name="ca" class="form-control">
                                                    <option> {{ $question->ca }} </option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                </select>
                                                <input type="hidden" value="{{ $question->id }}" name="question_id">
                                            </div>
                                            <button class="btn btn-primary ">Update Question</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="/admin/add-question" method="post">@csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <label>Question</label>
                                            <textarea name="question" class="form-control" id="editor1"> {!! old('question') !!} </textarea>
                                        </div>

                                        <div class="col-md-3 mt-3">
                                            <label>Option A</label>
                                            <textarea name="option_a" id="editor2"> {!! old('option_a') !!} </textarea>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label>Option B</label>
                                            <textarea name="option_b" id="editor3"> {!! old('option_b') !!} </textarea>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label>Option C</label>
                                            <textarea name="option_c" id="editor4"> {!! old('option_c') !!} </textarea>
                                        </div>

                                        <div class="col-md-3 mt-3">
                                            <label>Option D</label>
                                            <textarea name="option_d" id="editor5"> {!! old('option_d') !!} </textarea>
                                        </div>


                                        <hr class="mt-3">
                                        <div class="col-md-12 d-flex justify-content-end ">
                                            <div class="col-md-3 me-2">
                                                <select name="ca" class="form-control">
                                                    <option selected disabled>Select Correct Option</option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                </select>
                                                <input type="hidden" value="{{ $exam->id }}" name="exam_id">
                                            </div>
                                            <button class="btn btn-primary ">Submit Question</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
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
                                        <th class="text-end">Action</th>
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
                                            <td>
                                                <div class="d-flex justify-content-end ">
                                                    <a href="?edit={{ $question->id }}" title="Edit Content"
                                                        class="btn btn-primary me-2 btn-sm px-2 py-1 "><i
                                                            class="la la-edit"></i>
                                                    </a>
                                                </div>
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


    <div class="modal fade" id="contentModal">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Note Content </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="note-body">

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor3'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor4'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor5'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(function() {
            $('.openContentModal').on('click', function() {
                var data = $(this).data('data')
                modal = $('#contentModal')
                modal.modal('show')
                modal.find('.note-body').html(` 
                    ${data.content}
                `)
                modal.find('.modal-title').html(` 
                   Content For Week ${data.week}
                `)
            })

            $('#checkAll').on('click', function() {
                var checked = $(this).is(":checked")
                console.log(checked);
                if(checked == true) {
                    $('.check-me').attr('checked', 'checked');
                }else {
                    $('.check-me').removeAttr('checked');
                }
            })
        })
    </script>
@endpush
