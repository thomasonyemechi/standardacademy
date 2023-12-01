@extends('layout.admin')

@section('page_title')
    Admin Dashboard
@endsection

@section('page_content')
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pb-xl-4 pb-sm-3 pb-0">
                    <div class="row">
                        <div class="col-xl-3 col-6">
                            <div class="content-box">
                                <div class="icon-box icon-box-xl std-data">
                                    <i class="la la-users text-white"></i>
                                </div>
                                <div class="chart-num">
                                    <p>Students</p>
                                    <h2 class="font-w700 mb-0">{{ \App\Models\Student::count() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6">
                            <div class="content-box">
                                <div class="teach-data icon-box icon-box-xl">
                                    <i class="la la-chalkboard-teacher text-white"></i>
                                </div>
                                <div class="chart-num">
                                    <p>Staffs</p>
                                    <h2 class="font-w700 mb-0">{{ $total_staff }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6">
                            <div class="content-box">
                                <div class="event-data icon-box icon-box-xl">
                                    <i class="la la-user text-white"></i>
                                </div>
                                <div class="chart-num">
                                    <p>Guardians</p>
                                    <h2 class="font-w700 mb-0">{{ \App\Models\Guardian::count() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6">
                            <div class="content-box">
                                <div class="food-data icon-box icon-box-xl bg-dark">
                                    <i class="la la-user text-white"></i>
                                </div>
                                <div class="chart-num">
                                    <p>Classes</p>
                                    <h2 class="font-w700 mb-0">{{ \App\Models\ClassCore::count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="widget-stat card bg-warning">
                    <div class="card-body p-3">
                        <div class="media">
                            <span class="me-3">
                                <i class="flaticon-381-heart"></i>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1 text-white">Total Fee</p>
                                <h3 class="text-white fs-2">{{ money_format($data['assigned_fee']) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="widget-stat card bg-success">
                    <div class="card-body p-3">
                        <div class="media">
                            <span class="me-3">
                                <i class="material-icons fs-1">paid</i>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1 text-white">Received Payment</p>
                                <h3 class="text-white fs-2">{{ money_format($data['reveived_payment']) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="widget-stat card bg-danger">
                    <div class="card-body p-3">
                        <div class="media">
                            <span class="me-3">
                                <i class="material-icons fs-1">book</i>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1 text-white">Class Notes</p>
                                <h3 class="text-white"> {{\App\Models\Note::count()}} </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

     

        </div>

        <div class="col-xl-7">
            <div class="card">
                <div class="card-header border-0 p-3 flex-wrap ">
                    <h4 class="heading mb-0">Recent Student</h4>
                    <a href="/admin/students">See all Students</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive basic-tbl">
                        <div id="example-1_wrapper" class="dataTables_wrapper no-footer">
                            <table id="example-1" class="display dataTable no-footer" style="min-width: 700px"
                                aria-describedby="example-1_info">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Class</th>
                                        <th>Added</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $stu)
                                        <tr class="selected odd">
                                            <td class="sorting_1">
                                                <div class="trans-list">
                                                    <img src="{{ asset($stu->photo) }}" alt=""
                                                        class="avatar avatar-sm me-3">
                                                    <h4> {{ $stu->surname }} {{ $stu->firstname }} </h4>
                                                </div>
                                            </td>
                                            <td><span class="text-primary font-w600">{{ $stu->sex }}</span></td>
                                            <td><span class="doller font-w600"> {{ $stu->grade->class }} </span></td>
                                            <td> <span
                                                    class="mb-0">{{ date('j M Y', strtotime($stu->created_at)) }}</span>
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

        <div class="col-xl-5">
            <div class="card">
                <div class="card-header border-0 p-3">
                    <h4 class="haeding mb-0">Staffs</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive basic-tbl">
                        <div id="example-payment_wrapper" class="dataTables_wrapper no-footer">
                            <table id="example-payment" class="display dataTable no-footer" style="min-width: 500px"
                                aria-describedby="example-payment_info">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Models\User::where('id', '>', '1')->limit(5)->get() as $staff)
                                        <tr class="selected odd">
                                            <td class="sorting_1">
                                                <div class="trans-list">
                                                    <img src="{{ asset($staff->photo) }}" alt=""
                                                        class="avatar avatar-sm me-3">
                                                    <h4> {{ $staff->name }} </h4>
                                                </div>
                                            </td>
                                            <td><span class="text-primary font-w600">{{ $staff->email }}</span></td>
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
@endsection


@push('scripts')
@endpush
