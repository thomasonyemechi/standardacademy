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
                                        <a class="dropdown-item" href="javascript:void(0);">Make Fee Payment</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit Basic Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <i class="la la-clock text-white" ></i>
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
                                                <i class="la la-calendar text-white" ></i>
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
                                <div class="" >
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
                                        <a class="dropdown-item openProfileEditModal " href="javascript:;">View Guardian Profile</a>
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


                    <div class="card dz-card">
                        <div class="card-header flex-wrap border-0" id="default-tab">
                            <h4 class="card-title">Default Tab</h4>
                            <ul class="nav nav-tabs dzm-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active " id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#DefaultTab" type="button" role="tab"
                                        aria-selected="true">Preview</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#DefaultTab-html" type="button" role="tab"
                                        aria-selected="false">HTML</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="card-body pt-0">
                                    <!-- Nav tabs -->
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
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#message"><i
                                                        class="la la-envelope me-2"></i> Message</a>
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
                                                                    <th></th>
                                                                    <th>₦ 0</th>
                                                                    <th>₦ 0</th>
                                                                    <th>₦ 0</th>
                                                                </tr>

                                                                <tr>
                                                                    <th colspan="3">Balance Brought Foward</th>
                                                                    <td>₦ 0</td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="3">Total Owing</th>
                                                                    <th>₦ 0</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="3">Amount Paid</th>
                                                                    <th>₦ 0</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="3">Expected Payments</th>
                                                                    <th>₦ 0</th>
                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile">
                                                <div class="pt-4">
                                                    <h4>This is profile title</h4>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin.
                                                        Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                        cliche tempor.
                                                    </p>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin.
                                                        Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                        cliche tempor.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact">
                                                <div class="pt-4">
                                                    <h4>This is contact title</h4>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia, there live the blind texts. Separated they
                                                        live in Bookmarksgrove.
                                                    </p>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia, there live the blind texts. Separated they
                                                        live in Bookmarksgrove.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="message">
                                                <div class="pt-4">
                                                    <h4>This is message title</h4>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin.
                                                        Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                        cliche tempor.
                                                    </p>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin.
                                                        Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                        cliche tempor.
                                                    </p>
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
                                        style="min-width: 845px" aria-describedby="example-payment_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="example-payment" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Payment Number: activate to sort column descending"
                                                    style="width: 287.383px;">Payment Number</th>
                                                <th class="sorting" tabindex="0" aria-controls="example-payment"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Date &amp;amp; Time: activate to sort column ascending"
                                                    style="width: 296.816px;">Date &amp; Time</th>
                                                <th class="sorting" tabindex="0" aria-controls="example-payment"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Amount: activate to sort column ascending"
                                                    style="width: 135.391px;">Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="example-payment"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 133.066px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="selected odd">
                                                <td class="sorting_1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="icon-box icon-box-sm bg-danger">
                                                            <svg width="26" height="16" viewBox="0 0 26 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M25.0004 1.33333C25.013 1.24043 25.013 1.14624 25.0004 1.05333C24.9888 0.975052 24.9664 0.898765 24.9337 0.826666C24.8985 0.761503 24.8584 0.699103 24.8137 0.64C24.763 0.555671 24.7001 0.479292 24.6271 0.413333L24.4671 0.32C24.3901 0.262609 24.3046 0.21762 24.2137 0.186666H23.9471C23.8658 0.107993 23.7709 0.0447434 23.6671 0H17.0004C16.6468 0 16.3076 0.140476 16.0576 0.390525C15.8075 0.640573 15.6671 0.979711 15.6671 1.33333C15.6671 1.68696 15.8075 2.02609 16.0576 2.27614C16.3076 2.52619 16.6468 2.66667 17.0004 2.66667H20.7737L15.4404 8.94667L9.68039 5.52C9.40757 5.35773 9.0858 5.29813 8.77296 5.3519C8.46011 5.40567 8.17671 5.56929 7.97373 5.81333L1.30706 13.8133C1.19479 13.9481 1.1102 14.1036 1.05815 14.2711C1.00609 14.4386 0.987577 14.6147 1.00368 14.7893C1.01978 14.9639 1.07017 15.1337 1.15198 15.2888C1.23378 15.4439 1.34538 15.5814 1.48039 15.6933C1.72028 15.8921 2.02219 16.0006 2.33373 16C2.52961 16.0003 2.72315 15.9575 2.9006 15.8745C3.07804 15.7915 3.23503 15.6705 3.36039 15.52L9.29373 8.4L14.9871 11.8133C15.2571 11.9735 15.575 12.0332 15.8848 11.982C16.1945 11.9308 16.4763 11.7719 16.6804 11.5333L22.3337 4.93333V8C22.3337 8.35362 22.4742 8.69276 22.7242 8.94281C22.9743 9.19286 23.3134 9.33333 23.6671 9.33333C24.0207 9.33333 24.3598 9.19286 24.6099 8.94281C24.8599 8.69276 25.0004 8.35362 25.0004 8V1.33333Z"
                                                                    fill="#FCFCFC"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 font-w600">#1234567810</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>3 March 2023, 13:45 PM</span>
                                                </td>
                                                <td>
                                                    <span class="doller font-w600"> $ 50,036</span>
                                                </td>
                                                <td class="pe-3">
                                                    <span class="text-danger font-w600">Canceled</span>
                                                </td>
                                            </tr>
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
                            <div class="card h-auto">
                                <div class="card-body">
                                    <h3 class="heading">Schedule Details</h3>
                                    <p class="mb-0">Thursday, 10th April , 2022</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6">
                            <div class="card h-auto schedule-card">
                                <div class="card-body">
                                    <h4 class="mb-0">Basic Algorithm</h4>
                                    <p>Algorithm</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <ul>
                                                <li class="mb-2">
                                                    <svg class="me-2" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 5.25H16.5V4.5C16.5 4.30109 16.421 4.11032 16.2803 3.96967C16.1397 3.82902 15.9489 3.75 15.75 3.75C15.5511 3.75 15.3603 3.82902 15.2197 3.96967C15.079 4.11032 15 4.30109 15 4.5V5.25H12.75V4.5C12.75 4.30109 12.671 4.11032 12.5303 3.96967C12.3897 3.82902 12.1989 3.75 12 3.75C11.8011 3.75 11.6103 3.82902 11.4697 3.96967C11.329 4.11032 11.25 4.30109 11.25 4.5V5.25H9V4.5C9 4.30109 8.92098 4.11032 8.78033 3.96967C8.63968 3.82902 8.44891 3.75 8.25 3.75C8.05109 3.75 7.86032 3.82902 7.71967 3.96967C7.57902 4.11032 7.5 4.30109 7.5 4.5V5.25H6C5.40326 5.25 4.83097 5.48705 4.40901 5.90901C3.98705 6.33097 3.75 6.90326 3.75 7.5V18C3.75 18.5967 3.98705 19.169 4.40901 19.591C4.83097 20.0129 5.40326 20.25 6 20.25H18C18.5967 20.25 19.169 20.0129 19.591 19.591C20.0129 19.169 20.25 18.5967 20.25 18V7.5C20.25 6.90326 20.0129 6.33097 19.591 5.90901C19.169 5.48705 18.5967 5.25 18 5.25ZM5.25 7.5C5.25 7.30109 5.32902 7.11032 5.46967 6.96967C5.61032 6.82902 5.80109 6.75 6 6.75H7.5V7.5C7.5 7.69891 7.57902 7.88968 7.71967 8.03033C7.86032 8.17098 8.05109 8.25 8.25 8.25C8.44891 8.25 8.63968 8.17098 8.78033 8.03033C8.92098 7.88968 9 7.69891 9 7.5V6.75H11.25V7.5C11.25 7.69891 11.329 7.88968 11.4697 8.03033C11.6103 8.17098 11.8011 8.25 12 8.25C12.1989 8.25 12.3897 8.17098 12.5303 8.03033C12.671 7.88968 12.75 7.69891 12.75 7.5V6.75H15V7.5C15 7.69891 15.079 7.88968 15.2197 8.03033C15.3603 8.17098 15.5511 8.25 15.75 8.25C15.9489 8.25 16.1397 8.17098 16.2803 8.03033C16.421 7.88968 16.5 7.69891 16.5 7.5V6.75H18C18.1989 6.75 18.3897 6.82902 18.5303 6.96967C18.671 7.11032 18.75 7.30109 18.75 7.5V9.75H5.25V7.5ZM18.75 18C18.75 18.1989 18.671 18.3897 18.5303 18.5303C18.3897 18.671 18.1989 18.75 18 18.75H6C5.80109 18.75 5.61032 18.671 5.46967 18.5303C5.32902 18.3897 5.25 18.1989 5.25 18V11.25H18.75V18Z"
                                                            fill="#FB7D5B"></path>
                                                    </svg>
                                                    March 20, 2022
                                                </li>
                                                <li>
                                                    <svg class="me-2 ms-1" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0V0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18V18Z"
                                                            fill="#FCC43E"></path>
                                                        <path
                                                            d="M13 9H11V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73478 4 9.48043 4.10536 9.29289 4.29289C9.10536 4.48043 9 4.73478 9 5V10C9 10.2652 9.10536 10.5196 9.29289 10.7071C9.48043 10.8946 9.73478 11 10 11H13C13.2652 11 13.5196 10.8946 13.7071 10.7071C13.8946 10.5196 14 10.2652 14 10C14 9.73478 13.8946 9.48043 13.7071 9.29289C13.5196 9.10536 13.2652 9 13 9Z"
                                                            fill="#FCC43E"></path>
                                                    </svg>
                                                    09.00 - 10.00 AM
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <img src="images/avatar/1.jpg" class="avatar avatar-lg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6">
                            <div class="card h-auto schedule-card-1">
                                <div class="card-body">
                                    <h4 class="mb-0">Basic Art</h4>
                                    <p>Art</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <ul>
                                                <li class="mb-2">
                                                    <svg class="me-2" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 5.25H16.5V4.5C16.5 4.30109 16.421 4.11032 16.2803 3.96967C16.1397 3.82902 15.9489 3.75 15.75 3.75C15.5511 3.75 15.3603 3.82902 15.2197 3.96967C15.079 4.11032 15 4.30109 15 4.5V5.25H12.75V4.5C12.75 4.30109 12.671 4.11032 12.5303 3.96967C12.3897 3.82902 12.1989 3.75 12 3.75C11.8011 3.75 11.6103 3.82902 11.4697 3.96967C11.329 4.11032 11.25 4.30109 11.25 4.5V5.25H9V4.5C9 4.30109 8.92098 4.11032 8.78033 3.96967C8.63968 3.82902 8.44891 3.75 8.25 3.75C8.05109 3.75 7.86032 3.82902 7.71967 3.96967C7.57902 4.11032 7.5 4.30109 7.5 4.5V5.25H6C5.40326 5.25 4.83097 5.48705 4.40901 5.90901C3.98705 6.33097 3.75 6.90326 3.75 7.5V18C3.75 18.5967 3.98705 19.169 4.40901 19.591C4.83097 20.0129 5.40326 20.25 6 20.25H18C18.5967 20.25 19.169 20.0129 19.591 19.591C20.0129 19.169 20.25 18.5967 20.25 18V7.5C20.25 6.90326 20.0129 6.33097 19.591 5.90901C19.169 5.48705 18.5967 5.25 18 5.25ZM5.25 7.5C5.25 7.30109 5.32902 7.11032 5.46967 6.96967C5.61032 6.82902 5.80109 6.75 6 6.75H7.5V7.5C7.5 7.69891 7.57902 7.88968 7.71967 8.03033C7.86032 8.17098 8.05109 8.25 8.25 8.25C8.44891 8.25 8.63968 8.17098 8.78033 8.03033C8.92098 7.88968 9 7.69891 9 7.5V6.75H11.25V7.5C11.25 7.69891 11.329 7.88968 11.4697 8.03033C11.6103 8.17098 11.8011 8.25 12 8.25C12.1989 8.25 12.3897 8.17098 12.5303 8.03033C12.671 7.88968 12.75 7.69891 12.75 7.5V6.75H15V7.5C15 7.69891 15.079 7.88968 15.2197 8.03033C15.3603 8.17098 15.5511 8.25 15.75 8.25C15.9489 8.25 16.1397 8.17098 16.2803 8.03033C16.421 7.88968 16.5 7.69891 16.5 7.5V6.75H18C18.1989 6.75 18.3897 6.82902 18.5303 6.96967C18.671 7.11032 18.75 7.30109 18.75 7.5V9.75H5.25V7.5ZM18.75 18C18.75 18.1989 18.671 18.3897 18.5303 18.5303C18.3897 18.671 18.1989 18.75 18 18.75H6C5.80109 18.75 5.61032 18.671 5.46967 18.5303C5.32902 18.3897 5.25 18.1989 5.25 18V11.25H18.75V18Z"
                                                            fill="#FB7D5B"></path>
                                                    </svg>
                                                    March 20, 2022
                                                </li>
                                                <li>
                                                    <svg class="me-2 ms-1" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0V0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18V18Z"
                                                            fill="#FCC43E"></path>
                                                        <path
                                                            d="M13 9H11V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73478 4 9.48043 4.10536 9.29289 4.29289C9.10536 4.48043 9 4.73478 9 5V10C9 10.2652 9.10536 10.5196 9.29289 10.7071C9.48043 10.8946 9.73478 11 10 11H13C13.2652 11 13.5196 10.8946 13.7071 10.7071C13.8946 10.5196 14 10.2652 14 10C14 9.73478 13.8946 9.48043 13.7071 9.29289C13.5196 9.10536 13.2652 9 13 9Z"
                                                            fill="#FCC43E"></path>
                                                    </svg>
                                                    09.00 - 10.00 AM
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <img src="images/avatar/2.jpg" class="avatar avatar-lg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6">
                            <div class="card h-auto schedule-card-2">
                                <div class="card-body">
                                    <h4 class="mb-0">HTML &amp; CSS Class</h4>
                                    <p>Programming</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <ul>
                                                <li class="mb-2">
                                                    <svg class="me-2" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 5.25H16.5V4.5C16.5 4.30109 16.421 4.11032 16.2803 3.96967C16.1397 3.82902 15.9489 3.75 15.75 3.75C15.5511 3.75 15.3603 3.82902 15.2197 3.96967C15.079 4.11032 15 4.30109 15 4.5V5.25H12.75V4.5C12.75 4.30109 12.671 4.11032 12.5303 3.96967C12.3897 3.82902 12.1989 3.75 12 3.75C11.8011 3.75 11.6103 3.82902 11.4697 3.96967C11.329 4.11032 11.25 4.30109 11.25 4.5V5.25H9V4.5C9 4.30109 8.92098 4.11032 8.78033 3.96967C8.63968 3.82902 8.44891 3.75 8.25 3.75C8.05109 3.75 7.86032 3.82902 7.71967 3.96967C7.57902 4.11032 7.5 4.30109 7.5 4.5V5.25H6C5.40326 5.25 4.83097 5.48705 4.40901 5.90901C3.98705 6.33097 3.75 6.90326 3.75 7.5V18C3.75 18.5967 3.98705 19.169 4.40901 19.591C4.83097 20.0129 5.40326 20.25 6 20.25H18C18.5967 20.25 19.169 20.0129 19.591 19.591C20.0129 19.169 20.25 18.5967 20.25 18V7.5C20.25 6.90326 20.0129 6.33097 19.591 5.90901C19.169 5.48705 18.5967 5.25 18 5.25ZM5.25 7.5C5.25 7.30109 5.32902 7.11032 5.46967 6.96967C5.61032 6.82902 5.80109 6.75 6 6.75H7.5V7.5C7.5 7.69891 7.57902 7.88968 7.71967 8.03033C7.86032 8.17098 8.05109 8.25 8.25 8.25C8.44891 8.25 8.63968 8.17098 8.78033 8.03033C8.92098 7.88968 9 7.69891 9 7.5V6.75H11.25V7.5C11.25 7.69891 11.329 7.88968 11.4697 8.03033C11.6103 8.17098 11.8011 8.25 12 8.25C12.1989 8.25 12.3897 8.17098 12.5303 8.03033C12.671 7.88968 12.75 7.69891 12.75 7.5V6.75H15V7.5C15 7.69891 15.079 7.88968 15.2197 8.03033C15.3603 8.17098 15.5511 8.25 15.75 8.25C15.9489 8.25 16.1397 8.17098 16.2803 8.03033C16.421 7.88968 16.5 7.69891 16.5 7.5V6.75H18C18.1989 6.75 18.3897 6.82902 18.5303 6.96967C18.671 7.11032 18.75 7.30109 18.75 7.5V9.75H5.25V7.5ZM18.75 18C18.75 18.1989 18.671 18.3897 18.5303 18.5303C18.3897 18.671 18.1989 18.75 18 18.75H6C5.80109 18.75 5.61032 18.671 5.46967 18.5303C5.32902 18.3897 5.25 18.1989 5.25 18V11.25H18.75V18Z"
                                                            fill="#FB7D5B"></path>
                                                    </svg>
                                                    March 20, 2022
                                                </li>
                                                <li>
                                                    <svg class="me-2 ms-1" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0V0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18V18Z"
                                                            fill="#FCC43E"></path>
                                                        <path
                                                            d="M13 9H11V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73478 4 9.48043 4.10536 9.29289 4.29289C9.10536 4.48043 9 4.73478 9 5V10C9 10.2652 9.10536 10.5196 9.29289 10.7071C9.48043 10.8946 9.73478 11 10 11H13C13.2652 11 13.5196 10.8946 13.7071 10.7071C13.8946 10.5196 14 10.2652 14 10C14 9.73478 13.8946 9.48043 13.7071 9.29289C13.5196 9.10536 13.2652 9 13 9Z"
                                                            fill="#FCC43E"></path>
                                                    </svg>
                                                    09.00 - 10.00 AM
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <img src="images/avatar/3.jpg" class="avatar avatar-lg" alt="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6">
                            <div class="card h-auto schedule-card-3">
                                <div class="card-body">
                                    <h4 class="mb-0">Simple Past Tense</h4>
                                    <p>English</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <ul>
                                                <li class="mb-2">
                                                    <svg class="me-2" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 5.25H16.5V4.5C16.5 4.30109 16.421 4.11032 16.2803 3.96967C16.1397 3.82902 15.9489 3.75 15.75 3.75C15.5511 3.75 15.3603 3.82902 15.2197 3.96967C15.079 4.11032 15 4.30109 15 4.5V5.25H12.75V4.5C12.75 4.30109 12.671 4.11032 12.5303 3.96967C12.3897 3.82902 12.1989 3.75 12 3.75C11.8011 3.75 11.6103 3.82902 11.4697 3.96967C11.329 4.11032 11.25 4.30109 11.25 4.5V5.25H9V4.5C9 4.30109 8.92098 4.11032 8.78033 3.96967C8.63968 3.82902 8.44891 3.75 8.25 3.75C8.05109 3.75 7.86032 3.82902 7.71967 3.96967C7.57902 4.11032 7.5 4.30109 7.5 4.5V5.25H6C5.40326 5.25 4.83097 5.48705 4.40901 5.90901C3.98705 6.33097 3.75 6.90326 3.75 7.5V18C3.75 18.5967 3.98705 19.169 4.40901 19.591C4.83097 20.0129 5.40326 20.25 6 20.25H18C18.5967 20.25 19.169 20.0129 19.591 19.591C20.0129 19.169 20.25 18.5967 20.25 18V7.5C20.25 6.90326 20.0129 6.33097 19.591 5.90901C19.169 5.48705 18.5967 5.25 18 5.25ZM5.25 7.5C5.25 7.30109 5.32902 7.11032 5.46967 6.96967C5.61032 6.82902 5.80109 6.75 6 6.75H7.5V7.5C7.5 7.69891 7.57902 7.88968 7.71967 8.03033C7.86032 8.17098 8.05109 8.25 8.25 8.25C8.44891 8.25 8.63968 8.17098 8.78033 8.03033C8.92098 7.88968 9 7.69891 9 7.5V6.75H11.25V7.5C11.25 7.69891 11.329 7.88968 11.4697 8.03033C11.6103 8.17098 11.8011 8.25 12 8.25C12.1989 8.25 12.3897 8.17098 12.5303 8.03033C12.671 7.88968 12.75 7.69891 12.75 7.5V6.75H15V7.5C15 7.69891 15.079 7.88968 15.2197 8.03033C15.3603 8.17098 15.5511 8.25 15.75 8.25C15.9489 8.25 16.1397 8.17098 16.2803 8.03033C16.421 7.88968 16.5 7.69891 16.5 7.5V6.75H18C18.1989 6.75 18.3897 6.82902 18.5303 6.96967C18.671 7.11032 18.75 7.30109 18.75 7.5V9.75H5.25V7.5ZM18.75 18C18.75 18.1989 18.671 18.3897 18.5303 18.5303C18.3897 18.671 18.1989 18.75 18 18.75H6C5.80109 18.75 5.61032 18.671 5.46967 18.5303C5.32902 18.3897 5.25 18.1989 5.25 18V11.25H18.75V18Z"
                                                            fill="#FB7D5B"></path>
                                                    </svg>
                                                    March 20, 2022
                                                </li>
                                                <li>
                                                    <svg class="me-2 ms-1" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0V0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18V18Z"
                                                            fill="#FCC43E"></path>
                                                        <path
                                                            d="M13 9H11V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73478 4 9.48043 4.10536 9.29289 4.29289C9.10536 4.48043 9 4.73478 9 5V10C9 10.2652 9.10536 10.5196 9.29289 10.7071C9.48043 10.8946 9.73478 11 10 11H13C13.2652 11 13.5196 10.8946 13.7071 10.7071C13.8946 10.5196 14 10.2652 14 10C14 9.73478 13.8946 9.48043 13.7071 9.29289C13.5196 9.10536 13.2652 9 13 9Z"
                                                            fill="#FCC43E"></path>
                                                    </svg>
                                                    09.00 - 10.00 AM
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <img src="images/avatar/4.jpg" class="avatar avatar-lg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <a href="javascript:void(0);" class="btn btn-primary btn-block light btn-rounded mb-5">View
                                More</a>
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
                                                    placeholder="2017-06-04" id="datepicker" value="{{ $student->dob }}" >
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
@endpush
