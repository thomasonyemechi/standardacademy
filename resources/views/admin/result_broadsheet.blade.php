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
                            class="t_text">Broad Sheet</span>
                    </h4>
                    <button class="btn btn-danger btn-sm openStartResultModal ">Select Subject </button>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper no-footer">
                            <table class="display table-bordered dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <td colspan="2"></td>
                                        <th colspan="5" class="text-center"> 1<sup>st</sup> Term </th>
                                        <th colspan="5" class="text-center">2<sup>nd</sup> Term</th>
                                        <th colspan="5" class="text-center">3<sup>rd</sup> Term</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th class="ca1">CA1</th>
                                        <th class="ca2">CA2</th>
                                        <th class="ca3">CA3</th>
                                        <th class="exam">Exam</th>
                                        <th>Total</th>

                                        <th class="ca1">CA1</th>
                                        <th class="ca2">CA2</th>
                                        <th class="ca3">CA3</th>
                                        <th class="exam">Exam</th>
                                        <th>Total</th>

                                        <th class="ca1">CA1</th>
                                        <th class="ca2">CA2</th>
                                        <th class="ca3">CA3</th>
                                        <th class="exam">Exam</th>
                                        <th>Total</th>
                                        <th>£f</th>

                                    </tr>

                                </thead>
                                <tbody id="result_body">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="resultModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View BroadSheet </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/view-broad-sheet" class="row" method="post">@csrf
                        <div class="col-md-6 form-group">
                            <label>Grade</label>
                            <select name="class_id" class="form-control" id="">
                                @if (auth()->user()->role == 'administrator')
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class }}</option>
                                    @endforeach
                                @else
                                    <option value="{{ $class->id }}">{{ $class->class }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Subject</label>
                            <select name="subject_id" class="form-control" id="">
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="setup">
                        </div>

                        <div class=" mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">View</button>
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

            var class_id = `{{ $class_id }}`;
            var subject_id = `{{ $subject_id }}`;


            function checkRes(res) {
                obj = res;
                if (res == null) {
                    obj = {
                        t1: 0,
                        t2: 0,
                        t3: 0,
                        exam: 0,
                        total: 0
                    }
                }
                return obj;
            }

            function loadProgram() {
                if (class_id == 0 || subject_id == 0) {
                    return;
                }
                body = $('#result_body');
                $.ajax({
                    method: 'get',
                    url: `/api/broad/${class_id}/${subject_id}`,
                    beforeSend: () => {
                        body.html(`
                            <tr>
                                <td colspan="20">
                                    <div class="text-center">
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <i> Loading ... </i>
                                    </div>
                                </td>
                            </tr>
                        `)
                    }
                }).done(function(res) {
                    console.log(res);
                    $('.t_text').html(`${res.cap} Broad Sheet`);
                    body = $('#result_body');
                    set = res.setup;
                    body.html(``);
                    res.data.map((stu, index) => {
                        first = checkRes(stu.first);
                        second = checkRes(stu.second);
                        third = checkRes(stu.third);
                        total = first.total + second.total + third.total;
                        divisor = ((first.total > 0) ? 1 : 0) + ((second.total > 0) ? 1 : 0) + ((
                            third.total > 0) ? 1 : 0);
                        ef = parseInt(total) / parseInt(divisor);
                        if (isNaN(ef)) {
                            ef = 0;
                        }
                        body.append(`
                            <tr class="single">
                                <td>${index+1}</td>
                                <td>${stu.surname} ${stu.firstname}</td>
                                <td>${first.t1}</td>
                                <td>${first.t2}</td>
                                <td>${first.t3}</td>
                                <td>${first.exam}</td>
                                <td>${first.total}</td>

                                <td>${second.t1}</td>
                                <td>${second.t2}</td>
                                <td>${second.t3}</td>
                                <td>${second.exam}</td>
                                <td>${second.total}</td>

                                <td>${third.t1}</td>
                                <td>${third.t2}</td>
                                <td>${third.t3}</td>
                                <td>${third.exam}</td>
                                <td>${third.total}</td>

                                <td>${ef}</td>

                            </tr>
                        `)
                    })

                }).fail(function(res) {
                    console.log(res);
                });
            }
            loadProgram();


        })
    </script>
@endpush
