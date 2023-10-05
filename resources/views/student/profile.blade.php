@extends('layout.student')

@section('page_title')
    Student Profile
@endsection
@section('page_content')
    @php
        $setup = App\Models\ResultSetup::first();
    @endphp
    <style>
        .hide-print {
            display: none;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-9">
                    <div class="card h-auto">
                        <div class="card-header p-0">
                            <div class="user-bg w-100">
                                <div class="user-svg">
                                    <svg width="264" height="109" viewBox="0 0 264 109" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.0107422" y="0.6521" width="263.592" height="275.13" rx="20"
                                            fill="#FCC43E"></rect>
                                    </svg>
                                </div>
                                <div class="user-svg-1">
                                    <svg width="264" height="59" viewBox="0 0 264 59" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect y="0.564056" width="263.592" height="275.13" rx="20" fill="#FB7D5B">
                                        </rect>
                                    </svg>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="user">
                                    <div class="user-media">
                                        <img src="{{ asset($student->photo) }}" alt="" class="avatar avatar-xxl">
                                    </div>
                                    <div>
                                        <h2 class="mb-0">
                                            {{ $student->surname . ' ' . $student->firstname . ' ' . $student->othername }}
                                        </h2>
                                        <p class="text-primary font-w600 fs-4"> {{ $student->grade->class }}
                                            <sup>{{ $student->arm->arm }}</sup>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <i class="la la-clock text-white"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <span>Date Of Birth:</span>
                                            <h5 class="mb-0"> {{ $student->dob }} </h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">

                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <i class="la la-calendar text-white"></i>
                                            </a>

                                        </li>
                                        <li><span>Date Added:</span>
                                            <h5 class="mb-0">{{ $student->created_at }}</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h5>Guardian Details</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{ asset('assets/images/profile.svg') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <span>Guardian name:</span>
                                            <h5 class="mb-0"> {{ $student->parent->guardian_name }} </h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">

                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{ asset('assets/images/svg/location.svg') }}" alt="">
                                            </a>

                                        </li>
                                        <li><span>Address:</span>
                                            <h5 class="mb-0">{{ $student->parent->guardian_address }}</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{ asset('assets/images/svg/phone.svg') }}" alt="">
                                            </a>
                                        </li>
                                        <li><span>Phone:</span>
                                            <h5 class="mb-0">{{ $student->parent->guardian_phone }}</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{ asset('assets/images/svg/email.svg') }}" alt="">
                                            </a>

                                        </li>
                                        <li><span>Email:</span>
                                            <h5 class="mb-0">{{ $student->parent->guardian_email }}</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card dz-card p-0">
                        <div class="tab-content p-0" id="myTabContent">
                            <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="card-body pt-0">
                                    <div class="default-tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home"><i
                                                        class="la la-home me-2"></i> School Fee Details</a>
                                            </li>
                                            @if ($setup->parent_view == 1)
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#profile"><i
                                                            class="la la-user me-2"></i>Results and Transcript </a>
                                                </li>
                                            @endif

                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#contact"><i
                                                        class="la la-phone me-2"></i> Class Assignment</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                                <div class="pt-4">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Fee</th>
                                                                    <th>Amount</th>
                                                                    <th>Discount</th>
                                                                    <th>Total</th>
                                                                </tr>

                                                                @php
                                                                    $tot = 0;
                                                                @endphp
                                                                @foreach ($fees as $fe)
                                                                    <tr>
                                                                        @php
                                                                            $tot += $fe->total;
                                                                        @endphp
                                                                        <th>{{ $fe->fee_cat->fee }}</th>
                                                                        <th>{{ money_format($fe->amount) }}</th>
                                                                        <th>{{ money_format($fe->discount) }}</th>
                                                                        <th>{{ money_format(abs($fe->total)) }}</th>
                                                                    </tr>
                                                                @endforeach

                                                                @if ($brought_forward[0] > 0)
                                                                    <tr>
                                                                        <th colspan="3">Balance Brought Foward</th>
                                                                        <td> {{ money_format($brought_forward[0]) }} </td>
                                                                    </tr>
                                                                @endif

                                                                <tr>
                                                                    <th colspan="3">Total Fee</th>
                                                                    <th>{{ money_format(abs($tot)) }}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="3">Amount Paid</th>
                                                                    <th>{{ money_format($brought_forward[1]) }}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="3">Expected Payments</th>
                                                                    <th>{{ money_format(abs($tot) - $brought_forward[1]) }}
                                                                    </th>
                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($setup->parent_view == 1)
                                                <div class="tab-pane fade" id="profile">
                                                    <div class="pt-4">
                                                        <h4 class="text-center text-secondary ">Current Term Result</h4>

                                                        <div class="table-resposive" id="result-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="tab-pane fade" id="contact">
                                                <div class="pt-4">
                                                    <div class="col-xl-12 wow fadeInUp">
                                                        <div class="table-responsive full-data">
                                                            <table
                                                                class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer"
                                                                id="example-student">
                                                                <thead>
                                                                    <tr>

                                                                        <th>Subject</th>
                                                                        <th>Assignment</th>
                                                                        <th>updated</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($assignments as $ass)
                                                                        <tr>
                                                                            <td><span
                                                                                    class="text-primary font-w600">{{ $ass->subject->subject }}
                                                                                </span>
                                                                            </td>
                                                                            <td style="white-space: initial;">
                                                                                {!! $ass->assignment !!}
                                                                            </td>
                                                                            <td>{{ date('j M, Y', strtotime($ass->updated_at)) }}
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
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card h-auto">
                        <div class="card-header border-0 p-3">
                            <h4 class="heading mb-0">Payment History</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive basic-tbl">
                                <div id="example-payment_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example-payment" class="display dataTable no-footer"
                                        style="min-width: 100%" aria-describedby="example-payment_info">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date &amp; Time</th>
                                                <th>Amount</th>
                                                <th>By</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $pay)
                                                <tr class="selected odd">
                                                    <td class="sorting_1">

                                                        <div>
                                                            <h6 class="mb-0 font-w600">#{{ $pay->id }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span> {{ date('j M, Y H:i:s ', strtotime($pay->created_at)) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="doller font-w600">{{ money_format($pay->total) }}</span>
                                                    </td>
                                                    <td>
                                                        <span> {{ $pay->user->name }} </span>
                                                    </td>
                                                    <td class="pe-3">
                                                        <span class="text-success font-w600">Completed</span>
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
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card schedule-card-2">
                                <div class="card-body">
                                    <h6 class="mb-0 text-muted">Grade Teacher</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        @if ($grade->teacher)
                                            <div>
                                                <ul>
                                                    <li class="fs-4 fw-bold text-primary">
                                                        <i class="la la-user "> </i> {{ $grade->teacher->name }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <img src="{{ asset($grade->teacher->photo) }}" class="avatar avatar-lg"
                                                    alt="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/results.js') }}"></script>
    <script>
        function checkResult() {
            result_id = `{{ $result_id }}`

            $.ajax({
                method: 'get',
                url: `/api/viewer/result/${result_id}`
            }).done(function(res) {
                console.log(res);
                $('#result-body').html(ResultTemplate(res.data, ''))
            }).fail(function(res) {
                console.log(res);
            })
        }

        checkResult();
    </script>
@endpush
