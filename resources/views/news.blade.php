@extends('layout.guest')
@section('page_content')
    <div class="page-banner page-banner-overlay" data-background="{{ asset('main/assets/img/bg/banner-bg.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="page-banner-content text-center">
                        <h2 class="page-banner-title">Latest Post</h2>
                        <div class="page-banner-breadcrumb">
                            <p><a href="#">Home</a> Blog </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-banner-shape"></div>
    </div>

    <section id="bloglist" class="section-padding">
        <div class="auto-container">
            <div class="row mb-lg-5 mb-0">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="single-blog-post wow fadeInUp">
                        <div class="single-blog-post-wrap">
                            <div class="single-blog-post-content">
                                <h4 class="single-blog-post-title">
                                    <a href="#">Designing Learner-Centered Classroom</a>
                                </h4>
                                <div class="single-blog-post-Info">
                                    <span><i class="icofont-calendar"></i>May 18, 2021</span>
                                </div>
                                <div class="single-blog-post-gallery">
                                    <div class="gallery-slides-wrapper owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="gallery-slides-inner">
                                                <figure>
                                                    <img class="img-fluid" src="{{ asset('main/assets/img/service/1.jpg') }}" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                    architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.
                                </p>
                                <a href="#" class="blog-read-more-btn">Read More</a>
                            </div>
                        </div>
                    </div>
  
                </div>
                <!-- end col -->

                <div class="col-lg-4 col-md-4 col-12 mt-lg-0 mt-md-0 mt-5 pl-lg-5 pl-md-5 pl-0">

                    <div class="sidebar-widget post_wid mb-5">
                        <div class="sidebar-widget-inner">
                            <div class="sidebar-widget-title">
                                <h5>Pinned Post</h5>
                            </div>
                            <div class="singleRecpost">
                                <img src="{{ asset('main/assets/img/blog/1.jpg') }}" alt="" class="img-fluid">
                                <h6 class="recTitle"><a href="#">Designing Learner-Centered Classroom</a></h6>
                                <p class="posted-on">3 DEC 2021</p>
                            </div>
                            <div class="singleRecpost">
                                <img src="{{ asset('main/assets/img/blog/2.jpg') }}" alt="" class="img-fluid">
                                <h6 class="recTitle"><a href="#">Building an environment for learning</a></h6>
                                <p class="posted-on">3 DEC 2021</p>
                            </div>
                            <div class="singleRecpost">
                                <img src="{{ asset('main/assets/img/blog/3.jpg') }}" alt="" class="img-fluid">
                                <h6 class="recTitle"><a href="#">Kids are enjoying their class</a></h6>
                                <p class="posted-on">3 DEC 2021</p>
                            </div>
                        </div>
                    </div>
                    <!-- end sidebar widget -->
                    <div class="sidebar-widget cat_wid service-links mb-5">
                        <div class="sidebar-widget-inner">
                            <ul>
                                <li><a href="/admission"><i class="icofont-circled-right"></i> Admission </a></li>
                                <li><a href="/gallery"><i class="icofont-circled-right"></i> Gallery </a></li>
                                <li><a href="/about"><i class="icofont-circled-right"></i> {{env('APP_NAME')}} </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end sidebar widget -->
                    <div class="sidebar-widget gal_wid mb-5">
                        <div class="sidebar-widget-inner">
                            <div class="sidebar-widget-title">
                                <h5>Photo Gallery</h5>
                            </div>
                            <div class="single-gallery-wrap">
                                <div class="single-gallery">
                                    <a href="#"><img class="img-fluid" src="{{ asset('main/assets/img/gallery/1.jpg') }}"
                                            alt=""></a>
                                    <a href="#" class="icon"><i class="icofont-link"></i></a>
                                </div>
                                <div class="single-gallery">
                                    <a href="#"><img class="img-fluid" src="{{ asset('main/assets/img/gallery/2.jpg') }}"
                                            alt=""></a>
                                    <a href="#" class="icon"><i class="icofont-link"></i></a>
                                </div>
                                <div class="single-gallery">
                                    <a href="#"><img class="img-fluid" src="{{ asset('main/assets/img/gallery/3.jpg') }}"
                                            alt=""></a>
                                    <a href="#" class="icon"><i class="icofont-link"></i></a>
                                </div>
                           
                            </div>
                        </div>
                    </div>
  
                </div>
            </div>
        </div>
    </section>

    <section id="hnewsletter" class="hnewslettr-padding bg-theme">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-7 col-12 mb-lg-0 mb-4">
                    <div class="hnewslettr-left">
                        <h2>Subscribe to our Newsletter</h2>
                        <p>Enter your email and we'll send you details about new courses and events.</p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-5 mt-3">
                    <div class="hnewslettr-form">
                        <form action="#" method="post">
                            <div class="form-group">
                                <span class="form-icon"><i class="icofont-envelope"></i></span>
                                <input name="semail" class="form-control" placeholder="Your Email Address"
                                    type="email">
                                <button type="submit" class="btn news-btn">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </section>
    <!-- START NEWSLETTER SECTION -->
@endsection
