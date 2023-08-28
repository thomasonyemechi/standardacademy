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
                                                        <h4>{{ $student->firstname . ' ' . $student->lastname }}</h4>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><span
                                                    class="text-primary font-w600">{{ $student->registration_number }}</span>
                                            </td>
                                            <td>
                                                {{ $student->sex }}
                                            </td>
                                            <td><span
                                                    class="doller font-w600">{{ date('j F, Y', strtotime($student->dob)) }}
                                                </span></td>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($notes as $note)
                                        <tr>
                                            <td>
                                                <h5> {{ $note->subject->subject }} </h5>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end text-bold ">
                                                    <a href="/admin/note-content/{{ $note->id }}" target="_blank"
                                                        title="View Note Content"
                                                        class="btn me-2 btn-primary btn-sm py-1 px-2">
                                                        <i class="la la-eye"></i>
                                                    </a>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($assignments as $ass)
                                        <tr>
                                            <td><h5>{{$ass->subject->subject}}</h5></td>
                                            <td>
                                                <div class="d-flex justify-content-end text-bold ">
                                                    <a href="#" target="_blank"
                                                        title="View Note Content"
                                                        class="btn me-2 btn-primary btn-sm py-1 px-2">
                                                        <i class="la la-eye"></i>
                                                    </a>
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

                                    <li>
                                        <i class="la la-user text-white "> </i>{{ $grade->teacher->date_of_birth }}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <img src="{{ asset($grade->teacher->photo) }}" class="avatar avatar-lg" alt="">
                            </div>
                        @else
                            <h4 class="fs-4 fw-bold text-primary">
                                <i class="la la-user "> </i> No Teacher Assigned
                            </h4>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between mt-2 ">
                        <a class="btn btn-primary btn-sm py-1 openassignTeacherModal" href="javascript:; "> Assign New
                            Teacher</a>
                        @if ($grade->teacher)
                            <a class="btn btn-info btm-sm py-1" href="/admin/staff/{{ $grade->teacher->id }}"> Teacher
                                Profile</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="assignTeacherModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Class Teacher </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="alert text-white bg-info">
                        Teacher will be in charge of posting notes and assign for class
                    </div>
                    <form method="post" action="/admin/assign-teacher" class="row">@csrf
                        <div class="col-md-12 form-group">
                            <label>Teacher</label>
                            <input type="hidden" name="class_id" value="{{ $grade->id }}">
                            <select name="user_id" class="form-control">
                                <option disabled selected>Select Class Teacher</option>
                                @foreach (\App\Models\User::orderby('name', 'asc')->get() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 mt-2 d-flex justify-content-end form-group">
                            <button type="submit" class="btn btn-secondary float-right ">Assign Teacher</button>
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
            $('.openassignTeacherModal').on('click', function() {
                $('#assignTeacherModal').modal('show');
            })
        })
    </script>
@endpush
