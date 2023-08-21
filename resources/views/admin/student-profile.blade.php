@extends('layout.admin')

@section('page_title')
    Student Profile
@endsection
@section('page_content')
    <link href="{{ asset('assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

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
                                            <a class="fs-2 toggleClassModal  "> <i class="la la-edit"> </i> </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="dropdown custom-dropdown">
                                    <div class="btn sharp tp-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="6" viewBox="0 0 24 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z"
                                                fill="#A098AE"></path>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item openProfileEditModal " href="javascript:;">Edit Profile
                                            Info</a>
                                        <a class="dropdown-item openfeePaymentModal" href="javascript:void(0);">Make Fee
                                            Payment</a>
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
                                <div class="dropdown custom-dropdown">
                                    <div class="btn sharp tp-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="6" viewBox="0 0 24 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z"
                                                fill="#A098AE"></path>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item  " href="javascript:;">View Guardian
                                            Profile</a>
                                    </div>
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
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile"><i
                                                        class="la la-user me-2"></i>Results and Transcript </a>
                                            </li>
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
                                                                <tr>
                                                                    @php
                                                                        $tot = 0;
                                                                    @endphp
                                                                    @foreach ($fees as $fe)
                                                                        @php
                                                                            $tot += $fe->total;
                                                                        @endphp
                                                                        <th>{{ $fe->fee_cat->fee }}</th>
                                                                        <th>{{ money_format($fe->amount) }}</th>
                                                                        <th>{{ money_format($fe->discount) }}</th>
                                                                        <th>{{ money_format(abs($fe->total)) }}</th>
                                                                    @endforeach
                                                                </tr>
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
                                            <div class="tab-pane fade" id="profile">
                                                <div class="pt-4">
                                                    <h4 class="text-center text-secondary ">Current Term Result</h4>

                                                    <div class="table-resposive" id="result-body">

                                                    </div>
                                                </div>
                                            </div>
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
                                                                                    class="text-primary font-w600">{{$ass->subject->subject}}
                                                                                </span>
                                                                            </td>
                                                                            <td style="white-space: initial;">
                                                                                {!!$ass->assignment!!}
                                                                            </td>
                                                                            <td>{{ date('j M, Y',strtotime($ass->updated_at)) }}</td>


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
                            {{-- <div class="card h-auto">
                                <div class="card-body">
                                    <h3 class="heading">Schedule Details</h3>
                                    <p class="mb-0">Thursday, 10th April , 2022</p>
                                </div>
                            </div> --}}
                        </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- update class modal --}}

    <div class="modal fade" id="updateClassModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Student Class/Arm </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-student-class" method="post" class="row">@csrf
                        <div class="col-md-6 form-group">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <label>Class</label>
                            <select name="class_id" class="form-control select2bs4">
                                <option selected disabled>Select Class ...</option>
                                @foreach ($classes as $class)
                                    <option {{ $student->class_id == $class->id ? 'selected' : '' }}
                                        value="{{ $class->id }}">{{ $class->class }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Arm</label>
                            <select name="arm_id" class="form-control select2bs4" style="width: 100%;">
                                <option selected disabled>Select Arm</option>
                                @foreach ($arms as $arm)
                                    <option {{ $student->arm_id == $arm->id ? 'selected' : '' }}
                                        value="{{ $arm->id }}">{{ $arm->arm }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" class="btn btn-secondary mt-2 createClass float-right ">Update
                                Class</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="updateProfileModal">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update {{ $student->firstname }} Profile Infomation </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-student-profile" enctype="multipart/form-data" method="post">@csrf
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <label class="form-label text-primary">Photo<span class="required">*</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(images/no-img-avatar.png);">
                                        </div>
                                    </div>
                                    <div class="change-btn mt-2 mb-lg-0 mb-3">
                                        <input type='file' name="image" class="form-control d-none"
                                            id="imageUpload" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload" class="dlab-upload mb-0 btn btn-primary btn-sm">Choose
                                            File</label>
                                        <a href="javascript:void"
                                            class="btn btn-danger light remove-img ms-2 btn-sm">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label text-primary">First
                                                Name<span class="required">*</span></label>
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">

                                            <input type="text" name="firstname" class="form-control"
                                                placeholder="James" value="{{ $student->firstname }} ">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-primary">Date of Birth and Gender<span
                                                    class="required">*</span></label>
                                            <div class="d-flex">
                                                <input type="date" name="dob" class="form-control"
                                                    placeholder="2017-06-04" id="datepicker"
                                                    value="{{ $student->dob }}">
                                                <select name="gender" class="form-control w-50 ms-3" id="">
                                                    <option {{ $student->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option {{ $student->sex == 'Female' ? 'selected' : '' }}>Female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label text-primary">Registration Number<span
                                                    class="required">*</span></label>
                                            <input type="text" name="registration_number"
                                                value="{{ $student->registration_number }} " class="form-control">

                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label text-primary">Last
                                                Name<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="surname"
                                                placeholder="Wally" value="{{ $student->surname }} ">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-primary">Other Names
                                                <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="othername"
                                                value="{{ $student->othername }} ">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-primary">Parent<span
                                                    class="required">*</span></label>
                                            <select name="guardian_id" class="form-control" id="">
                                                <option selected disabled>Select Guardian</option>
                                                @foreach ($parents as $parent)
                                                    <option {{ $student->parent_id == $parent->id ? 'selected' : '' }}
                                                        value="{{ $parent->id }}">
                                                        {{ $parent->guardian_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Update Profile Information</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="feePaymentModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make Fee Payment </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/admin/make-payment" class="row">@csrf
                        <div class="col-md-6 form-group">
                            <label>Fee Category</label>

                            <select name="fee_cat" class="form-control">
                                <option disabled selected>Select Fee</option>
                                @foreach (\App\Models\FeeCategory::orderby('fee', 'asc')->get() as $fee)
                                    <option value="{{ $fee->id }}">{{ $fee->fee }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Amount</label>
                            <input type="number" name="amount" class="form-control"
                                placeholder="Enter Amount i.e 15750">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" class="btn btn-secondary float-right make_pay">Make Payment</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('admin.inc.update_remark')
@endsection


@push('scripts')
    <script>
        $(function() {
            $('.toggleClassModal').on('click', function() {
                $('#updateClassModal').modal('show');
            })

            $('.openProfileEditModal').on('click', function() {
                $('#updateProfileModal').modal('show')
            })

            $('.openfeePaymentModal').on('click', function() {
                $('#feePaymentModal').modal('show')
            })

        })
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        var pic = `{{ asset($student->photo) }}`;
        console.log(pic);
        $('.remove-img').on('click', function() {
            $('.avatar-preview, #imagePreview').removeAttr('style');
            $('#imagePreview').css('background-image', 'url(`{{ asset($student->photo) }}`)');
        });
    </script>

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
