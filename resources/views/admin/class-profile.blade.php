@extends('layout.admin')

@section('page_title')
    {{ $grade->class }} Profile
@endsection
@section('page_content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="d-flex align-items-center">
                                <li class="icon-box icon-box-lg bg-primary me-3">
                                    <i class="la la-users text-white"></i>
                                </li>
                                <li>
                                    <span>Students</span>
                                    <h3 class="my-1">{{ count($grade->students) }}</h3>
                                    <span><a href="/admin/add-student">+ New Student</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="d-flex align-items-center">
                                <li class="icon-box icon-box-lg bg-info me-3">
                                    <i class="la la-money-bill text-white"></i>
                                </li>
                                <li>
                                    <span>Fee Assigned</span>
                                    <h3 class="my-1">{{ money_format(abs($fees)) }}</h3>
                                    <span> <a href="">Check Grade Ledger</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="d-flex align-items-center">
                                <li class="icon-box icon-box-lg bg-danger me-3">
                                    <i class="la la-dollar-sign text-white"></i>
                                </li>
                                <li>
                                    <span>Grade Payments</span>
                                    <h3 class="my-1">{{ money_format($payments) }}</h3>
                                    <span><a href="">Payment History</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="d-flex align-items-center">
                                <li class="icon-box icon-box-lg bg-success me-3">
                                    <i class="la la-book text-white"></i>
                                </li>
                                <li>
                                    <span>Notes</span>
                                    <h3 class="my-1">754</h3>
                                    <span><a href="">view all notes</a> </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0 p-3">
                    <h4 class="heading mb-0">Grade Students</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive basic-tbl">
                        <div class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Gender</th>
                                        <th>Dob</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grade->students as $student)
                                        <tr class="selected odd">
                                            <td class="sorting_1">
                                                <a href="/admin/student/12">
                                                    <div class="trans-list">
                                                        <img src="{{ asset($student->photo) }}" alt=""
                                                            class="avatar avatar-sm me-3">
                                                        <h4>{{ $student->firstname.' '.$student->lastname }}</h4>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><span class="text-primary font-w600">{{ $student->registration_number }}</span></td>
                                            <td>
                                                {{$student->sex}}
                                            </td>
                                            <td><span class="doller font-w600">{{date('j F, Y',strtotime($student->dob))}} </span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0 p-3">
                    <h4 class="haeding mb-0">Class Notes</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive basic-tbl">
                        <div class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Topic</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <h5>$70,000</h5>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm badge-success light">completed</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-0 p-3">
                    <h4 class="haeding mb-0">Class Assignments</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" style="min-width: 100%">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Topic</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>English</td>
                                        <td>completed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card schedule-card-2">
                <div class="card-body">
                    <h6 class="mb-0 text-muted">Grade Teacher</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <ul>
                                <li class="fs-4 fw-bold text-primary">
                                    <i class="la la-user "> </i> Janet Jones
                                </li>

                                <li>
                                    <i class="la la-user text-white "> </i> 10 Aug 2023
                                </li>
                            </ul>
                        </div>
                        <div>
                            <img src="{{ asset('assets/images/avatar/3.jpg') }}" class="avatar avatar-lg" alt="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2 ">
                        <a class="btn btn-primary btn-sm py-1" href="javascript:; "> Assign New Teacher</a>
                        <a class="btn btn-danger btm-sm py-1" href="javascript:; "> Remove Teacher</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
@endpush
