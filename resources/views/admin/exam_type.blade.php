@extends('layout.admin')

@section('page_title')
    Exam Type
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title flex-wrap">
                        <h4> Exam Types </h4>
                        <div>
                            <a href="javascript:;" class="btn openTypeModal btn-primary">
                                <i class="la la-plus"></i>
                                Create Exam Type
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
                                    <th>S/N</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Date</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
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
                                        <td> {{ $loop->iteration }} </td>
                                        <td>
                                            <h4>{{ $type->type }} </h4>
                                        </td>
                                        <td>
                                            <div class="badge bg-success ">
                                                Active
                                            </div>
                                        </td>
                                        <td> {{ $type->user->name }} </td>
                                        <td> {{ date('j M, Y', strtotime($type->created_at)) }} </td>

                                        <td class="text-end">
                                            <div class="d-flex justify-content-end ">
                                                <button  class="btn editType btn-primary me-2 py-1 px-2 " data-data="{{json_encode($type)}}" > <i class="la la-edit"></i>
                                                </button>
                                                <a href="javascript:;" class="btn btn-danger py-1 px-2 "> <i class="la la-trash"></i> </a>
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




    <div class="modal fade" id="typeModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mmt">Create Exam Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/create-exam-type" method="post">@csrf
                        <div class="form-group">
                            <label>Exam Type</label>
                            <input type="text" required name="type" class="form-control">
                        </div>
                        <div class="form-group mt-2 d-flex  justify-content-end ">
                            <button type="submit" class="btn btn-secondary ">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editTypeModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mmt">Edit Exam Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-exam-type" method="post">@csrf
                        <div class="form-group">
                            <label>Exam Type</label>
                            <input type="text" required name="type" class="form-control">
                            <input type="hidden" name="type_id">
                        </div>
                        <div class="form-group mt-2 d-flex  justify-content-end ">
                            <button type="submit" class="btn btn-secondary ">Update</button>
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


            $('body').on('click', '.editType', function() {
                data = $(this).data('data')
                modal = $('#editTypeModal')
                modal.find('input[name="type"]').val(data.type)
                modal.find('input[name="type_id"]').val(data.id)
                modal.modal('show');
            })
        })
    </script>
@endpush
