@extends('layout.admin')

@section('page_title')
    Staff Details
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xl-9">
            <div class="card h-auto">
                <div class="card-header p-0">
                    <div class="user-bg w-100">
                        <div class="user-svg">
                            <svg width="264" height="109" viewBox="0 0 264 109" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="8.01074" y="8.6521" width="247.592" height="259.13" rx="123.796"
                                    stroke="#FCC43E" stroke-width="16"></rect>
                            </svg>
                        </div>
                        <div class="user-svg-1">
                            <svg width="264" height="59" viewBox="0 0 264 59" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="8" y="8.56406" width="247.592" height="259.13" rx="123.796"
                                    stroke="#FB7D5B" stroke-width="16"></rect>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="user">
                            <div class="user-media">
                                <img src="{{ asset($staff->photo) }}" alt="" class="avatar avatar-xxl">
                            </div>
                            <div>
                                <h2 class="mb-0">{{ $staff->name }}</h2>
                                <p class="text-primary font-w600">{{ $staff->role }}</p>
                            </div>
                        </div>
                        <div class="dropdown custom-dropdown">
                            <div class="btn sharp tp-btn " data-bs-toggle="dropdown">
                                <svg width="24" height="6" viewBox="0 0 24 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z"
                                        fill="#A098AE"></path>
                                </svg>
                            </div>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0);">Chnage Role</a>
                                <a class="dropdown-item" href="javascript:void(0);">Deactivate Staff</a>
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
                                    <span>Date Of Birth:</span>
                                    <h5 class="mb-0">{{ date('j M, Y', strtotime($staff->dob)) }}</h5>
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
                                    <h5 class="mb-0">{{ $staff->address }}</h5>
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
                                    <h5 class="mb-0">{{ $staff->phone }}</h5>
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
                                    <h5 class="mb-0">{{ $staff->email }}</h5>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="'col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="teacher-deatails">
                            <h3 class="heading">About</h3>
                            <p></p>
                            <h3 class="heading">Education:</h3>
                            <ul>
                                <li class="dots">
                                    <h4 class="mb-1">{{ $staff->institution }}</h4>
                                    <h6>{{ $staff->degree }}, {{ $staff->city }}</h6>
                                    <span>{{ $staff->start_date }} - {{ $staff->end_date }}</span>
                                </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="row">
                <div class="col-xl-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="heading">Last Profile Update</h3>
                            <p class="mb-0"> {{ date('D, j F, Y', strtotime($staff->created_at)) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-6">
                    @php
                        $status = $staff->status;
                        $bg = $status == 1 ? 'bg-success' : 'bg-danger';
                        $title = $status == 1 ? 'Active Profile' : 'In-active Profile';
                        $message =
                            $status == 1
                                ? 'User can login and perform all tasks and functions assgined '
                                : 'User cannot login and assgined tasks cannot be carried out';
                    @endphp
                    <div class="card  {{ $bg }} ">
                        <div class="card-body ">
                            <h3 class="heading text-white">Profile Status
                                <br>
                                <small class="heading fs-6">{{ $title }}</small>
                            </h3>
                            <p class="mb-0 text-white">{{ $message }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-6">
                    <div class="card schedule-card-1">
                        <div class="card-body">
                            <h4 class="mb-0">Assigned Class</h4>
                            <p>Grade V</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <ul>
                                        <li>
                                            <i class="la la-user"></i>
                                            20 Students
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-6">
                    <div class="card schedule-card-2">
                        <div class="card-body">
                            <h4 class="mb-0">Payment History</h4>
                            <p>{{ date('F') }} Payments</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <ul>
                                        <li class="mb-2 text-success">
                                            <i class="la la-arrow-right" ></i>
                                            #20,000 | Salary Paymment
                                        </li>
                                        <li class="text-danger" >
                                            <i class="la la-arrow-left" ></i>
                                            #5,000 | Advance Request
                                        </li>
                                    </ul>
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
@endpush
