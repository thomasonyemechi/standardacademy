@extends('layout.admin')
@php
    $edit = isset($_GET['edit']) ? $_GET['edit'] : 0;
    $ct = old('assignment') ? old('assignment') : session('assignment');
@endphp
@section('page_title')
    @if ($edit)
        Edit Class Assignment
    @else
        Add Class Assignment
    @endif
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $edit ? 'Edit '.$assignment->grade->class.', '.$assignment->subject->subject : 'Create' }} Assignment </h4>
                        </div>
                        <div class="card-body">
                            @if ($edit)
                                <form action="/admin/update-assignment" method="post">@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Grade</label>
                                                <select name="class_id" class="form-control" readonly>
                                                    <option value="{{ $class->id }}">{{ $class->class }}</option>
                                                </select>
                                                <input type="hidden" name="assignment_id" value="{{$assignment->id}}"  >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Subject</label>
                                                <select name="subject_id" class="form-control">
                                                    <option selected disabled>Select Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option {{($assignment->subject_id == $subject->id) ? 'selected' : '' }}  value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label>Assignment Content</label>
                                            <textarea name="assignment" id="ckeditor"> {!! $assignment->assignment !!} </textarea>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-md-12 d-flex justify-content-end ">
                                            <button class="btn btn-primary ">Update Assignment</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="/admin/create-assignment" method="post">@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Grade</label>
                                                <select name="class_id" class="form-control" readonly>
                                                    <option value="{{ $class->id }}">{{ $class->class }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Subject</label>
                                                <select name="subject_id" class="form-control">
                                                    <option selected disabled>Select Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label>Assignment Content</label>
                                            <textarea name="assignment" id="ckeditor"> {!! $ct !!} </textarea>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-md-12 d-flex justify-content-end ">
                                            <button class="btn btn-primary ">Save Assignment</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>



                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s"
                        style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                        <div class="table-responsive full-data">
                            <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                                id="example-student">
                                <thead>
                                    <tr>

                                        <th>Subject</th>
                                        <th>Class</th>
                                        <th>Created</th>
                                        <th>By</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $ass)
                                        <tr>
                                            <td><span class="text-primary font-w600">{{ $ass->subject->subject }}
                                                </span></td>
                                            <td>
                                                <div class="date">{{ $ass->grade->class }}</div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">
                                                    {{ date('j M, Y | h:i:s a', strtotime($ass->created_at)) }} </h6>
                                            </td>

                                            <td>{{ $ass->user->name }}
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-end ">
                                                    <a href="?edit={{ $ass->id }}" title="Edit assignment"
                                                        class="btn btn-primary me-2 btn-sm px-2 py-1 "><i
                                                            class="la la-edit"></i>
                                                    </a>
                                                    <a href="javascript:;" title="View assignment"
                                                        class="btn me-2 openContentModal btn-info btn-sm px-2 py-1 "
                                                        data-data="{{ json_encode($ass) }}"><i class="la la-eye"></i> </a>
                                                    <a href="/admin/delete-assignment/{{ $ass->id }}"
                                                        title="Delete assignment"
                                                        onclick="return confirm('Are you sure you wan to delete this assignment')"
                                                        class="btn me-2 btn-danger btn-sm px-2 py-1 "><i
                                                            class="la la-trash"></i> </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end" >
                            {{ $assignments->links('pagination::bootstrap-4') }}
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
                    <h5 class="modal-title">Assignment Content </h5>
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
    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function() {
            $('.openContentModal').on('click', function() {
                var data = $(this).data('data')
                modal = $('#contentModal')
                modal.modal('show')
                modal.find('.note-body').html(` 
                    ${data.assignment}
                `)
                modal.find('.modal-title').html(` 
                   ${data.grade.class} ${data.subject.subject}, Assignment 
                `)
            })
        })
    </script>
@endpush
