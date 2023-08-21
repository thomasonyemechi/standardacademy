
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        @yield('page_title')
                    </div>
                </div>
                <ul class="navbar-nav header-right">   
                      
                    <li class="nav-item">
                        <div class="dropdown header-profile2">
                            <a class="nav-link ms-0" href="javascript:void(0);" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="header-info2 d-flex align-items-center">
                                    <div class="d-flex align-items-center sidebar-info">

                                    </div>
                                    <img src="{{asset($user->photo) }}" alt="">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end pb-0" style="">
                                <div class="card mb-0">
                                    <div class="card-header p-3">
                                        <ul class="d-flex align-items-center">
                                            <li>
                                                <img src="{{asset($user->photo) }}" class="ms-0" alt="">
                                            </li>
                                            <li class="ms-2">
                                                <h4 class="mb-0">{{$user->name}} </h4>
                                                <span>{{$user->role}}</span>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="card-body p-3">
                                        <a href="/admin/staff/{{$user->id}}" class="dropdown-item ai-icon ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1"
                                                class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="var(--primary)" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <span class="ms-2">Profile </span>
                                        </a>

                                    </div>
                                    <div class="card-footer text-center p-3">
                                        <a href="/logout" class="dropdown-item ai-icon btn btn-primary light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="var(--primary)"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12">
                                                </line>
                                            </svg>
                                            <span class="ms-2 text-primary">Logout </span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</div>
