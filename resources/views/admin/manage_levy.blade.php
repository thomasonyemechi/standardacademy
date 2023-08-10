@extends('layout.admin')

@section('page_title')
    School Fee Management
@endsection
@php
    $fee_if = $fee_id;
    $class = $class_id;
    $page = 1;
@endphp
@section('page_content')
    <div class="row">
        <div class="col-lg-12">

            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-primary opencreateFeeModal me-2"> <i class="la la-plus"></i> Create Fee
                    Category</button>
                <button class="btn btn-info opensetFeeModal me-2"> <i class="la la-plus"></i> Set School Fee</button>
                <button class="btn btn-danger openviewFeeModal "> <i class="la la-plus"></i> Check Class Fee</button>
            </div>


            <div class="card card-secondary">
                <div class="card-header border-0 p-3">
                    <h4 class="haeding mb-0 fee_list_card "> <i class="fa fa-list-alt" aria-hidden="true"></i> Student Fee</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="record_table">


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="createFeeModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Fee Category </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/create-fee" method="post">@csrf
                        <div class=" form-group">
                            <label>Fee Title</label>
                            <input type="text" name="fee" class="form-control" placeholder="School Fee">
                        </div>

                        <div class="mt-2 form-group">
                            <label>Fee Description</label>
                            <textarea name="description" class="form-control" col="2" placeholder="Describe fee category"></textarea>
                        </div>

                        <div class=" mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">Create</button>
                        </div>

                    </form>

                    <div class="table-responsive mt-3">
                        <caption>Fee Categories</caption>
                        <div class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <th>Fee</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $fee)
                                        <tr>
                                            <td> {{ $fee->fee }} </td>
                                            <td>
                                                <p>
                                                    {{ $fee->description }}</p>
                                            </td>
                                            <td> <button class="btn btn-xs float-right btn-primary editFee"
                                                    data-data="{{ json_encode($fee) }}">
                                                    <i class="fas fa-edit "></i>
                                                </button>
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




    <div class="modal fade" id="editFeeModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Fee Category </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-fee" method="post">@csrf
                        <div class=" form-group">
                            <label>Fee Title</label>
                            <input type="text" name="fee" class="form-control" placeholder="School Fee">
                            <input type="hidden" name="fee_id">
                        </div>

                        <div class="mt-2 form-group">
                            <label>Fee Description</label>
                            <textarea name="description" class="form-control" col="2" placeholder="Describe fee category"></textarea>
                        </div>

                        <div class=" mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">Update Fee Category</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="setFeeModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set School Fee </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">@csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label>Grade</label>
                                    <select name="class_id" class="form-control">
                                        <option selected disabled>Select Grade</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label>Fee Category</label>
                                    <select name="fee_id" class="form-control">
                                        <option selected disabled>Select Fee Category</option>
                                        @foreach ($fees as $fee)
                                            <option value="{{ $fee->id }}">{{ $fee->fee }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=" form-group">
                                    <label>Fee Amount</label>
                                    <input type="number" name="amount" class="form-control"
                                        placeholder="Enter Amount">
                                </div>
                            </div>
                        </div>

                        <div class=" mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">Set Fee</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="viewFeeModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Grade Fee </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/view-fee" method="post">@csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label>Grade</label>
                                    <select name="class_id" class="form-control" required>
                                        <option selected disabled>Select Grade</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label>Fee Category</label>
                                    <select name="fee_id" class="form-control" required>
                                        <option selected disabled>Select Fee Category</option>
                                        @foreach ($fees as $fee)
                                            <option value="{{ $fee->id }}">{{ $fee->fee }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class=" mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">View School Fee</button>
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
            $('.opencreateFeeModal').on('click', function() {
                $('#createFeeModal').modal('show')
            })


            $('.opensetFeeModal').on('click', function() {
                $('#setFeeModal').modal('show')
            })



            $('.openviewFeeModal').on('click', function() {
                $('#viewFeeModal').modal('show')
            })



            $('body').on('click', '.editFee', function() {
                data = $(this).data('data');
                $('#createFeeModal').modal('hide')
                modal = $('#editFeeModal');
                console.log(data);
                modal.modal('show');
                $(modal).find('input[name="fee"]').val(data.fee)
                $(modal).find('textarea[name="description"]').html(data.description)
                $(modal).find('input[name="fee_id"]').val(data.id)

            })



        })
    </script>

    @if (session('action') == 'created_fee')
        <script>
            $(function() {
                $('#createFeeModal').modal('show')
            })
        </script>
    @endif





    <script>
        $(function() {

            c_fee = '{{ $fee_id ?? 0 }}'
            c_class = '{{ $class_id ?? 0 }}'
            api_url = `{{ env('API_URL') }}`

            console.log(c_fee, c_class);


            const moneyFormat = (num) => {
                var numb = new Intl.NumberFormat();
                return '₦ ' + numb.format(num);
            }

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



            function parseError(error) {
                error_text = '';
                if (!error) {
                    error_text = 'Error processing request, Pls try again';
                } else if (error.message) {
                    error_text = error.message;
                } else if (error.errors) {
                    errs = error.errors;
                    errs.forEach(err => {
                        error_text += err + '<br>'
                    });
                } else {
                    error_text = 'Error, Processing Request'
                }
                littleAlert(error_text, 1);
                return error_text;
            }




            function fetchSettedFee(fee, clas) {
                console.log(fee, clas);
                data = $.ajax({
                    method: 'get',
                    url: `${api_url}admin/fetch_fee/${fee}/${clas}`
                }).done(function(res) {
                    $('.fee_list_card').html(
                        `<i class="fa fa-list-alt" aria-hidden="true"></i>
                    <b>Record For ${res.data.class}, ${res.data.fee}, ${term_text(res.data.term)}  ${res.data.session} </b>`);

                    record = $('#record_table')
                    record.html(``);


                    t_amount = 0;
                    t_discount = 0;
                    if(res.data.records.length == 0) {
                        record.append(`
                            <tr class="single">
                                <td colspan="8" class="align-middle"><div class="alert alert-warning">No fee record found</div></td>
                            </tr>
                        `)
                        return;
                    }
                    res.data.records.map((pay, index) => {
                        t_discount += Math.abs(pay.discount)
                        t_amount += Math.abs(pay.amount)
                        record.append(`
                            <tr class="single">
                                <td class="align-middle">${index + 1}</td>
                                <td class="align-middle">${pay.student.surname + ' ' + pay.student.firstname}</td>
                                <td class="align-middle"> <input type="number" class="form-control" name="amount" value="${Math.abs(pay.amount)}" style="width: 100px; height: 30px">
                                    <input type="hidden" name="id" value="${pay.id}" >
                                </td>
                                <td class="align-middle"> <input type="number" class="form-control" name="discount" min="0" max="${Math.abs(pay.amount)}" value="${Math.abs(pay.discount)}" style="width: 100px; height: 30px" > </td>
                                <td class="align-middle"> <h5>${moneyFormat( Math.abs(pay.amount) - Math.abs(pay.discount)) }</h5> </td>
                                <td class="align-middle"> <button class="save_changes btn btn-success float-right btn-xs"><i class="fas fa-save"></i> Save</button> </td>
                            </tr>
                        `)
                    })

                    record.append(`
                        <tr>
                            <td colspan="2"></td>
                            <td><h5 class="total_amount">${moneyFormat(t_amount)}</h5></td>
                            <td><h5 class="total_discount">${moneyFormat(t_discount)}</h5></td>
                            <td ><h5 class="total">${moneyFormat(t_amount - t_discount)}</h5></td>
                            <td></td>
                        </tr>
                    `)

                    record.append(`
                        <tr>
                            <th colspan="12">
                                <div class="d-flex justify-content-end p-2" >
                                    <button class="save_all btn btn-success  float-right"><i class="fas fa-save"></i> Save All Changes</button>    
                                </div>    
                            </th>
                        </tr>
                    `);
                }).fail(function(res) {
                    console.log(res);
                })
            }

            fetchSettedFee(c_fee, c_class);


            // if(c_fee > 0 && c_class > 0) {
            //     fetchSettedFee(c_fee, c_class)
            // }


            $('body').on('click', '.save_all', function() {
                btn = $(this);
                trs = $('.single')
                data = [];
                t_amount = 0
                t_discount = 0
                trs.map(row => {
                    tr = trs[row].children;
                    td_amt = tr[2].children
                    discount = tr[3].children[0].value
                    amount = td_amt[0].value;
                    id = td_amt[1].value;
                    arr = {
                        id: id,
                        amount: amount,
                        discount: discount
                    }
                    data.push(arr)
                    t_amount += parseInt(amount)
                    t_discount += parseInt(discount)
                });

                $.ajax({
                    method: 'post',
                    url: api_url + 'api/update_school_fee_record',
                    data: {
                        payments: data
                    },
                    beforeSend: () => {
                        btn.html(
                            `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <i>Processing...</i>`
                        )
                    }
                }).done(function(res) {
                    littleAlert(res.message);
                    $('.total_amount').html(moneyFormat(t_amount))
                    $('.total_discount').html(moneyFormat(t_discount))
                    $('.total').html(`${moneyFormat(t_amount - t_discount)} `)


                    trs.map(row => {
                        tr = trs[row].children;
                        td_amt = tr[2].children
                        discount = tr[3].children[0].value
                        amount = td_amt[0].value;
                        tr[4].innerHTML = `<h5>${moneyFormat(amount - discount)}</h5>`
                    });

                    btn.html('<i class="fas fa-save"></i> Save All Changes');
                }).fail(function(res) {
                    parseError(res.responseJSON)
                    btn.html('<i class="fas fa-save"></i> Save All Changes');
                })

            })



            function calculateAmount() {
                amounts = $('input[name="amount"]');
                amount = 0
                discounts = $('input[name="discount"]');
                discount = 0
                amounts.map((index) => {
                    amt = amounts[index];
                    console.log('here', amt.value);
                    if (amt.value) {
                        amount += parseInt(amt.value)
                    }

                    // console.log(amount);
                });
                discounts.map((index) => {
                    dis = discounts[index]
                    discount += parseInt(dis.value);
                })

                $('.total_amount').html(moneyFormat(amount))
                $('.total_discount').html(moneyFormat(discount))
                $('.total').html(`${moneyFormat(amount - discount)} `)
                return [amount, discount];
            }



            $('body').on('click', '.save_changes', function() {
                btn = $(this);
                td = btn.parent();
                td_siblings = td.siblings()
                td_siblings_elements = td_siblings[2].children
                discount_node = td_siblings[3].children[0]
                amount_node = td_siblings_elements[0];
                id = td_siblings_elements[1].value;
                amount = amount_node.value
                discount = discount_node.value

                // if(discount > amount) { littleAlert('Discount cannot be greater than amount ...', 1); return }

                $.ajax({
                    method: 'post',
                    url: api_url + 'api/update_school_fee_per_record',
                    data: {
                        payment_id: id,
                        amount: amount,
                        discount: discount
                    },
                    beforeSend: () => {
                        btn.html(
                            `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <i>Processing...</i>`
                        )
                        $('.save_changes').attr('disabled', 'disabled');
                    }
                }).done(function(res) {
                    littleAlert(res.message);
                    t = td_siblings[4]
                    t.innerHTML = `<h5>${moneyFormat(amount - discount)}</h5>`


                    btn.html(`<i class="fas fa-save"></i> Save`)
                    $('.save_changes').removeAttr('disabled');
                    amts = calculateAmount();

                }).fail(function(res) {
                    parseError(res.responseJSON);
                    btn.html(`<i class="fas fa-save"></i> Save`)
                    $('.save_changes').removeAttr('disabled');

                })

            })

        })
    </script>

@endpush
