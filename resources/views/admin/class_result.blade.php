@extends('layout.admin')

@section('page_title')
    Upload Class Result
@endsection

@section('page_content')
    <div class="row">
        <div class="col-lg-12">



            <div class="card card-secondary">
                <div class="card-header border-0 p-3 flex-wrap ">
                    <h4 class="haeding mb-0 fee_list_card "> <i class="fa fa-list-alt" aria-hidden="true"></i> <span
                            class="t_text">View Class Result</span>
                    </h4>
                    <button class="btn btn-danger btn-sm openStartResultModal ">Select Subject </button>

                </div>

            </div>
            <div id="res_body">

            </div>

        </div>
    </div>

    <div class="modal fade" id="resultModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Result </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="class_form" class="row" method="get">@csrf
                        <div class="col-md-12 form-group">
                            <label>Grade</label>
                            <select name="class_id" class="form-control" id="clases">
                                <option value="{{ $class->id }}">{{ $class->class }}</option>
                            </select>
                        </div>

                        <div class=" mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">View Result</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('admin.inc.update_remark')
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/results.js') }}"></script>

    <script>
        $(function() {
            $('.openStartResultModal').on('click', function() {
                $('#resultModal').modal('show')
            })

            var class_id = `{{ $class_id }}`;

            $('#class_form').on('submit', function(e) {
                e.preventDefault();
                class_id = $('#clases').val();
                location.href = `/admin/class-result/${class_id}`
            })


            function checkResult() {
                class_id = `{{ $class_id }}`
                if (class_id == 0) {
                    return;
                }
                $.ajax({
                    method: 'get',
                    url: `/api/class-result/${class_id}`
                }).done(function(res) {
                    console.log(res);
                    res_body = $('#res_body')
                    res_body.html('');
                    if (res.data.length == 0) {
                        alert('No result found in this class', 1);
                        return;
                    }
                    res.data.forEach(sum => {
                        res_body.append(ResultTemplate(sum, ''))
                    });

                    res_body.append(`
                        <a href="#"  class="mb-3 btn-lg float-right btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print All Reuslt</a>
                    `);
                }).fail(function(res) {
                    console.log(res);
                    parseError(res.responseJSON);
                })
            }

            checkResult();
        })
    </script>
@endpush
