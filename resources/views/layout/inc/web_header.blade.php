<header class="main-header">
    <!-- START TOP AREA -->
    <div class="top-area">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-lg-left text-center">
                    <div class="header-social">
                        <ul>
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-youtube"></i></a></li>
                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 text-lg-right text-center">
                    <div class="top-menu">
                        <ul>
                            <li><a href="#"><i class="icofont-location-pin"></i>7684+72H, Estate Rd, 340110,
                                    Akure, Ondo</a></li>
                            <li><a href="#"><i class="icofont-phone"></i> {{ env('SCHOOL_PHONE') }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
    <!-- END TOP AREA -->

    <!-- START LOGO AREA -->
    <div class="logo-area">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-3 col-12 mx-auto text-lg-left text-center pl-0 mb-lg-0 mb-4">
                    <div class="logo">
                        <a href="/">
                            <img class="img-fluid pt-3" src="{{ asset('main/assets/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-9 d-md-flex col-12">
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
                    <div class="header-info-box">
                        <div class="header-info-icon">
                            <i class="icofont-eye-open"></i>
                        </div>
                        <h5>Opening hours</h5>
                        <p>Mon - Fri : 08:00 - 16:00</p>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
    <!-- END LOGO AREA -->

    <!-- START NAVIGATION AREA -->
    <div class="sticky-menu">
        <div class="mainmenu-area">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-9 d-lg-block">
                        <nav class="navbar navbar-expand-lg justify-content-left">
                            <ul class="navbar-nav">
                                <li class="active"><a class="nav-link" href="/">Home</a>
                                </li>
                                <li><a class="nav-link" href="/about">About Us</a></li>
                                <li><a class="nav-link" href="#">Photo Gallery</a> </li>
                                <li><a class="nav-link" href="#">New and Event</a>  </li>
                                <li><a href="/contact" class="nav-link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
