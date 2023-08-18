@extends('layout.admin')

@section('page_title')
    Upload Class Result
@endsection

@section('page_content')
    <div class="row">
        <div class="col-lg-12">

            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-danger openStartResultModal ">Start Result</button>
            </div>


            <div class="card card-secondary">
                <div class="card-header border-0 p-3">
                    <h4 class="haeding mb-0 fee_list_card "> <i class="fa fa-list-alt" aria-hidden="true"></i> Class Result</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>CA 1(10) </th>
                                        <th>CA 2(10) </th>
                                        <th>CA 3(20) </th>
                                        <th>Exam(60)</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editFeeModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Start Class Result </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">@csrf
                        <div class=" form-group">
                            <label>Grade</label>
                            <input type="text" name="fee" class="form-control" value="{{ $class->class }}"  readonly >
                        </div>

                        <div class="mt-2 form-group">
                            <label>Fee Description</label>
                            <textarea name="description" class="form-control" col="2" placeholder="Describe fee category"></textarea>
                        </div>

                        <div class=" mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">Start Result</button>
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
            $('.openStartResultModal').on('click', function() {
                $('#resultModal').modal('show')
            })
        })
    </script>

@endpush
