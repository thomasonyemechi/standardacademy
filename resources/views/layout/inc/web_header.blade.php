<header class="main-header">

    <div class="logo-area py-0">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-3 col-12 mx-auto text-lg-left  ">
                    <div class="logo">
                        <a href="/">
                            <img class="img-fluid pt-3" src="{{ asset('main/assets/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-9 d-md-flex col-12 mb-md-2 	d-none d-md-block">
                    <div class="header-info-box">
                        <div class="header-info-icon">
                            <i class="icofont-envelope"></i>
                        </div>
                        <h5>Connect With Us</h5>
                        <p>{{ env('SCHOOL_MAIL') }}</p>
                    </div>
                    <div class="header-info-box">
                        <div class="header-info-icon">
                            <i class="icofont-headphone-alt-3"></i>
                        </div>
                        <h5>Call For Inquiry</h5>
                        <p class="text-sm">{{ env('SCHOOL_PHONE') }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="sticky-menu">
        <div class="mainmenu-area">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-12 d-lg-block">
                        <nav class="navbar navbar-expand-lg justify-content-left">
                            <ul class="navbar-nav">
                                <li><a class="nav-link" href="/">Home</a>
                                </li>
                                <li><a class="nav-link" href="/about">About Us</a></li>
                                <li class="dropdown"><a class="nav-link" href="javascript:;">Admission & Fee</a>
                                    <ul class="dropdown-menu">
                                       <li><a href="/admission">How To Apply</a></li>
                                       <li><a href="/school-fees">Fees</a></li>
                                    </ul>    
                                 </li>
                                 <li class="dropdown"><a class="nav-link" href="javascript:;">Media & Resources</a>
                                    <ul class="dropdown-menu">
                                       <li><a href="/gallery">Gallery </a></li>
                                       <li><a href="/guardian/login">Parent Login </a></li>
                                    </ul>    
                                 </li>
                                <li><a class="nav-link" href="/news">News</a>  </li>
                                <li><a href="/contact" class="nav-link">Contact</a></li>
                                <li class="dropdown"><a class="nav-link" href="javascript:;">Login</a>
                                    <ul class="dropdown-menu">
                                       <li><a href="/login">Staff Login </a></li>
                                       <li><a href="/student/login">Student Portal </a></li>
                                    </ul>    
                                 </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>


    
</header>
