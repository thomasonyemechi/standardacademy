@extends('layout.admin')

@section('page_title')
    Class Assignment
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title flex-wrap">
                        <div>
                            <h5>
                                @if ($grade)
                                    {{ $grade->class }} Assignments
                                @else
                                    Grade Assignments
                                @endif
                            </h5>
                        </div>
                        <div>
                            <form action="">
                                <select name="grade" onchange="submit()" class="form-control">
                                    <option selected disabled>Select Grade</option>
                                    @foreach ($classes as $grade)
                                        <option value="{{ $grade->id }}"> {{ $grade->class }} </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="table-responsive full-data">
                        <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                            id="example">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                    </th>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Term/Session</th>
                                    <th>Created By</th>
                                    <th>Date</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $bg = ['bg-secondary', 'bg-warning', 'bg-success', 'bg-primary', 'bg-danger'];
                                @endphp
                                @foreach ($assignments as $ass)
                                    @php
                                        $bg_c = $bg[rand(0, count($bg) - 1)];
                                    @endphp
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
                                            <h5> {{ $ass->subject->subject }} </h5>
                                        </td>

                                        <td>
                                            <div class="badge {{ $bg_c }} ">
                                                {{ $ass->grade->class }}
                                            </div>
                                        </td>


                                        <td>
                                            <span> {{ term_text($ass->term->term) }} / {{ $ass->term->session->session }}
                                            </span>
                                        </td>

                                  
                                 
                                        <td>{{ $ass->user->name }}</td>
                                        <td>{{ date('j M, Y', strtotime($ass->created_at)) }}</td>


                                        <td>

                                            <div class="d-flex justify-content-end text-bold ">
                                                <a href="javascript:;"  title="View Assignment Content" data-data="{{json_encode($ass)}}"  class="btn openContentModal me-2 btn-primary btn-sm py-1 px-2">
                                                    <i class="la la-eye"></i>
                                                </a>
                                            </div>

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
