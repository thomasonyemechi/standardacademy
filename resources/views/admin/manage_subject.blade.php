@extends('layout.admin')

@section('page_title')
    School Subjects
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus-square"></i>
                                Add Subject
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="/admin/create-subject" method="post">@csrf
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" class="form-control"
                                        placeholder="Enter Subject name i.e Mathematics, Biology">
                                </div>
                                <div class="form-group mb-0 float-right">
                                    <button class="btn btn-secondary mt-2">Add Subject</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                Subject List
                            </h3>
                        </div>
                        <div class="card-body p-1">
                            <div class="table-responsive">
                                <table id="example1" class="table mb-0 table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="subject_list_body">
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->subject }}</td>
                                                <td><button class="btn btn-xs btn-primary editSubject"
                                                        data-data='{{ json_encode($subject) }}'><i
                                                            class="fas fa-edit"></i></button></td>
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
    </div>


    <div class="modal fade" id="editSubjectModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Subject (Subject)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>
                <div class="modal-body">
                    <form action="/admin/update-subject" method="post" id="editSubjectForm">@csrf
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control"
                                placeholder="Enter Subject name i.e Mathematics, Biology">
                            <input type="hidden" name="subject_id">
                        </div>
                        <div class="form-group mb-0 float-right">
                            <button class="btn btn-secondary mt-2">Update</button>
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
            $('body').on('click', '.editSubject', function() {
                data = $(this).data('data');
                modal = $('#editSubjectModal')
                modal.modal('show');
                $(modal).find('input[name="subject"]').val(data.subject);
                $(modal).find('input[name="subject_id"]').val(data.id);
                $(modal).find('.modal-title').html(`Edit Subject (${data.subject})`);
            })
        })
    </script>
@endpush
