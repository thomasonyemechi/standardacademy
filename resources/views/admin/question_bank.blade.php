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
                        <div class="card-header  flex-wrap ">
                            <h4 class="card-title"> Questions : </h4>
                            <form method="post"  action="/admin/view-exam-bank">@csrf
                                <div class="d-flex justify-content-between  ">
                                    <select name="term" id="" class="form-control p-2 mr-2">
                                        @foreach ($terms as $term)
                                            <option value="{{ $term->id }}"> {{ term_text($term->term) }}
                                                {{ $term->session->session }} </option>
                                        @endforeach
                                    </select>
                                    <select name="grade" class="form-control p-2 mr-2" id="">
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->class }}</option>
                                        @endforeach
                                    </select>

                                    <div class="mt-2" >
                                        <button class="btn btn-info p-2" > View </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <div class="table-responsive ">
                            <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer">
                                <thead>
                                    <tr>
                               
                                        <th>Subject</th>
                                        <th>Class</th>
                                        <th>Total Question</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $exam)
                                        <tr>
                                        
                                            <td style="white-space: initial;">
                                                {{ $exam->subject->subject }}
                                            </td>
                                            <td> {{ $exam->grade->class }} </td>
                                            <td> {{ $exam->questions_count }} </td>

                                            <td>
                                                <p>{{ date('j M, Y | h:i:s a', strtotime($exam->created_at)) }}</p>
                                            </td>
                                            <td>
                                                <a href="/admin/bank-question/{{$exam->id}}" class="btn btn-sm p-2 btn-primary" >View Question </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                if (checked == true) {
                    $('.check-me').attr('checked', 'checked');
                } else {
                    $('.check-me').removeAttr('checked');
                }
            })
        })
    </script>
@endpush
