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
                            class="t_text">Class Result</span>
                    </h4>
                    <button class="btn btn-danger btn-sm openStartResultModal ">Start Result</button>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Student</th>
                                        <th class="ca1">CA 1(10) </th>
                                        <th class="ca2">CA 2(10) </th>
                                        <th class="ca3">CA 3(20) </th>
                                        <th class="exam">Exam(60)</th>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
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
                    <h5 class="modal-title">Start Class Result </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/start-result-params" class="row" method="post">@csrf
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



    <script>
        $(function() {

            var class_id = `{{ $class_id }}`;
            var subject_id = `{{ $subject_id }}`;


            function littleAlert(msg, t = 0) {
                Toastify({
                    text: msg,
                    duration: 5000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #01ff01)",
                    },
                }).showToast();
            }




            function loadProgram() {
                body = $('#result_body');
                if (class_id == 0 || subject_id == 0) {
                    littleAlert('Pls select a class and subject to upload/edit result', 1);
                    return;
                }
                $.ajax({
                    method: 'get',
                    url: `/api/admin/load-result/${class_id}/${subject_id}`,
                    beforeSend: () => {
                        body.html(`
                        <tr>
                            <td colspan="12">
                                <div class="text-center">
                                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                    <i> Loading ... </i>
                                </div>
                            </td>
                        </tr>
                    `)
                    }
                }).done(function(res) {
                    $('.t_text').html(`${res.cap} Result`);
                    body = $('#result_body');
                    set = res.setup;
                    body.html(``);
                    if (!res.setup) {
                        body.html(`
                            <tr>
                                <td colspan="12"><div class="text-center"><b>Result Setup is not complete <br> Contact an admin to complete setup</b></div></td>
                            </tr>
                        `);
                        return;
                    }
                    $('#setup').val(JSON.stringify(set));
                    $('.ca1').html(`CA1 (${set.ca1})`);
                    $('.ca2').html(`CA2 (${set.ca2})`);
                    $('.ca3').html(`CA3 (${set.ca3})`);
                    $('.exam').html(`Exam (${set.exam})`);
                    littleAlert('You can now edit student result');
                    res.data.data.map((rsu, index) => {
                        body.append(`
                            <tr class="single">
                                <td>${index+1}</td>
                                <td>${rsu.student.surname} ${rsu.student.firstname}</td>
                                <td>
                                    <input type="hidden" name="id" value="${rsu.id}">
                                    <input type="number" name="ca1" class="form-control" value="${rsu.t1}" ${(set.ca1 == 0) ? 'disabled' : ''} style="width: 70px; height: 30px">
                                </td>
                                <td><input type="number" name="ca2" class="form-control" value="${rsu.t2}" ${(set.ca2 == 0) ? 'disabled' : ''} style="width: 70px; height: 30px"></td>
                                <td><input type="number" name="ca3" class="form-control" value="${rsu.t3}" ${(set.ca3 == 0) ? 'disabled' : ''}  style="width: 70px; height: 30px"></td>
                                <td><input type="number" name="exam" class="form-control" value="${rsu.exam}" ${(set.exam == 0) ? 'disabled' : ''} style="width: 70px; height: 30px"></td>
                                <td>${rsu.t1 + rsu.t2 + rsu.t3 + rsu.exam}</td>
                                <td><button class="btn btn-xs btn-success save_change float-right"><i class="fas fa-save"></i> Save</button></td>
                            </tr>
                        `)
                    })

                    body.append(`
                    <tr>
                        <td colspan="12">
                            <div class="d-flex justify-content-end " >
                                <button class="btn btn-success save_all float-right"><i class="fas fa-save"></i> Save all changes</button>
                            </div>
                        </td>
                    </tr>
                `)
                }).fail(function(res) {});
            }

            loadProgram();


            $('body').on('click', '.save_change', function() {
                btn = $(this);
                set = JSON.parse($('#setup').val());
                error = 0;
                parent = btn.parent();
                td_siblings = parent.siblings()
                //result id
                result_id = td_siblings[2].children[0].value

                ///ca1 fetch and check
                ca1 = parseInt(td_siblings[2].children[1].value);
                if (ca1 > set.ca1 || 0 > ca1) {
                    td_siblings[2].classList.add('bg-danger');
                    error++;
                } else {
                    td_siblings[2].classList.remove('bg-danger');
                }

                ///ca2
                ca2 = parseInt(td_siblings[3].children[0].value);
                if (ca2 > set.ca2 || 0 > ca2) {
                    td_siblings[3].classList.add('bg-danger');
                    error++;
                } else {
                    td_siblings[3].classList.remove('bg-danger');
                }

                /////ca3
                ca3 = parseInt(td_siblings[4].children[0].value);
                if (ca3 > set.ca3 || 0 > ca3) {
                    td_siblings[4].classList.add('bg-danger');
                    error++;
                } else {
                    td_siblings[4].classList.remove('bg-danger');
                }

                /////exam
                exam = parseInt(td_siblings[5].children[0].value);
                if (exam > set.exam || 0 > exam) {
                    td_siblings[5].classList.add('bg-danger');
                    error++;
                } else {
                    td_siblings[5].classList.remove('bg-danger');
                }

                total = ca1 + ca2 + ca3 + exam
                if (error > 0) {
                    littleAlert(`There are ${error} errors in the score inputed, pls check and try again`,
                        1);
                    return;
                }

                $.ajax({
                    method: 'post',
                    url: '/api/update-student-result',
                    data: {
                        result_id: result_id,
                        ca1: ca1,
                        ca2: ca2,
                        ca3: ca3,
                        exam: exam
                    },
                    beforeSend: () => {
                        btn.html(
                            `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <i>...</i>`
                        );
                        $('.save_change').attr('disabled', 'disabled');
                    }
                }).done(function(res) {
                    littleAlert(res.message);
                    $('.save_change').removeAttr('disabled');
                    btn.html(`<i class="fas fa-save"></i> Save`);
                    td_siblings[6].innerHTML = total;
                }).fail(function(res) {
                    littleAlert('An error occured while updating result');
                    btn.html(`<i class="fas fa-save"></i> Save`);
                    $('.save_change').removeAttr('disabled');
                    console.log(res);
                })
            })




            $('body').on('click', '.save_all', function() {

                set = JSON.parse($('#setup').val());
                error = 0;
                btn = $(this);


                trs = $('.single')
                data = [];
                total = [];
                trs.map(row => {
                    td_siblings = trs[row].children
                    //result id
                    result_id = td_siblings[2].children[0].value

                    ///ca1 fetch and check
                    ca1 = parseInt(td_siblings[2].children[1].value);
                    if (ca1 > set.ca1 || 0 > ca1) {
                        td_siblings[2].classList.add('bg-danger');
                        error++;
                    } else {
                        td_siblings[2].classList.remove('bg-danger');
                    }

                    ///ca2
                    ca2 = parseInt(td_siblings[3].children[0].value);
                    if (ca2 > set.ca2 || 0 > ca2) {
                        td_siblings[3].classList.add('bg-danger');
                        error++;
                    } else {
                        td_siblings[3].classList.remove('bg-danger');
                    }

                    /////ca3
                    ca3 = parseInt(td_siblings[4].children[0].value);
                    if (ca3 > set.ca3 || 0 > ca3) {
                        td_siblings[4].classList.add('bg-danger');
                        error++;
                    } else {
                        td_siblings[4].classList.remove('bg-danger');
                    }

                    /////exam
                    exam = parseInt(td_siblings[5].children[0].value);
                    if (exam > set.exam || 0 > exam) {
                        td_siblings[5].classList.add('bg-danger');
                        error++;
                    } else {
                        td_siblings[5].classList.remove('bg-danger');
                    }

                    arr = {
                        result_id: result_id,
                        ca1: ca1,
                        ca2: ca2,
                        ca3: ca3,
                        exam: exam
                    }
                    data.push(arr);
                    total.push(ca1 + ca2 + ca3 + exam);
                });

                if (error > 0) {
                    littleAlert(`There are ${error} errors in the score inputed, pls check and try again`,
                        1);
                    return;
                }

                $.ajax({
                    method: 'post',
                    url: '/api/update-all-student-result',
                    data: {
                        data: data
                    },
                    beforeSend: () => {
                        $('.save_change').attr('disabled', 'disabled');
                        btn.html(
                            `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <i>Processing...</i>`
                        )
                    }
                }).done(function(res) {
                    littleAlert(res.message);
                    $('.save_change').removeAttr('disabled');
                    btn.html('<i class="fas fa-save"></i> Save all changes');

                    trs.map(row => {
                        td_siblings = trs[row].children
                        td_siblings[6].innerHTML = total[row];
                    });

                }).fail(function(res) {
                    littleAlert('An error occured while updating student result')
                    btn.html('<i class="fas fa-save"></i> Save all changes');
                    $('.save_change').removeAttr('disabled');
                })
            })
        })
    </script>
@endpush
