@extends('layout.admin')

@section('page_title')
    Create Prospective Exams
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title flex-wrap">
                        <h4> Prospective Exams </h4>
                        <div>
                            <a href="javascript:;" class="btn openTypeModal btn-primary">
                                <i class="la la-plus"></i>
                                Create Prospective Exam
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="table-responsive full-data">
                        <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                            id="example-student">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                    </th>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Created By</th>
                                    <th>Date</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td>
                                            <div class="checkbox me-0 align-self-center">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" class="form-check-input" id="check8"
                                                        required="">
                                                    <label class="custom-control-label" for="check8"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h4> {{$exam->subject->subject}} </h4>
                                        </td>
                                        <td>
                                            <div class="badge bg-primary ">
                                                {{$exam->grade->class}}
                                            </div>
                                        </td>
                                        <td> {{ $exam->user->name }} </td>
                                        <td> {{ date('j M, Y', strtotime($exam->created_at)) }} </td>

                                        <td class="text-end">
                                            <div class="d-flex justify-content-end ">
                                                <a href="/admin/prospective/question/{{$exam->id}}"  class="btn btn-info me-2 py-1 px-2 " title="Add exam questions" > <i class="la la-plus"> Questions</i>
                                                </a>
                                                <a href="javascript:;" class="btn  btn-danger py-1 px-2" title="Deactivate Exam" > <i class="la la-power-off"></i>  </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="12">
                                        <b class="text-danger">Note: </b>
                                        <span>
                                            Exams In red color are deactivated, They will not be displayed for students to
                                            answer
                                        </span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="typeModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mmt">Create Prospective Exam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/prospective/create-exam" class="row" method="post">@csrf
                        <div class="form-group col-md-6 ">
                            <label>Grade</label>
                            <select name="class_id" class="form-control">
                                <option selected disabled>Select Grade</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}"> {{ $class->class }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Subject</label>
                            <select name="subject_id" class="form-control">
                                <option selected disabled>Select subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"> {{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2 d-flex  justify-content-end ">
                            <button type="submit" class="btn btn-secondary ">Create Prospective Exam</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.openTypeModal').on('click', function() {
                $('#typeModal').modal('show');
            })
        })
    </script>
@endpush
