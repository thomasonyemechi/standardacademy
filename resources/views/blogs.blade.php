@extends('layout.guest')
@section('page_title')
    News - Standard academy
@endsection
@section('page_content')
    <div class="page-banner page-banner-overlay" data-background="assets/img/bg/banner-bg.jpg"
        style="background-image: url(&quot;assets/img/bg/banner-bg.jpg&quot;);">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="page-banner-content text-center">
                        <h2 class="page-banner-title">Latest News</h2>
                        <div class="page-banner-breadcrumb">
                            <p><a href="#">Home</a> News </p>
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
                    @foreach ($blogs as $blog)
                        <div class="single-blog-post wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="single-blog-post-wrap">
                                <div class="single-blog-post-icon">
                                    <i class="icofont-file-wmv"></i>
                                </div>
                                <div class="single-blog-post-content">
                                    <h4 class="single-blog-post-title">
                                        <a href="/news/{{ $blog->slug }}"> {{ $blog->title }} </a>
                                    </h4>
                                    <div class="single-blog-post-Info">
                                        <span><i
                                                class="icofont-calendar"></i>{{ date('M j, Y', strtotime($blog->created_at)) }}</span>
                                        <small>/</small>
                                        <span class="tzcategory"><i class="icofont-ui-tag"></i><a href="#"
                                                rel="category tag">{{ $blog->category }}</a></span>
                                    </div>
                                    <div class="single-blog-post-gallery">
                                        <div class="gallery-slides-wrapper owl-carousel owl-theme owl-loaded owl-drag">

                                            <div class="owl-stage-outer owl-height" style="height: 397px;">
                                                <div class="owl-stage"
                                                    style="transform: translate3d(-1788px, 0px, 0px); transition: all 0s ease 0s; width: 6556px;">
                                                    <div class="owl-item cloned" style="width: 596px;">
                                                        <div class="item">
                                                            <div class="gallery-slides-inner">
                                                                <figure>
                                                                    <img class="img-fluid"
                                                                        src=" {{ asset($blog->image) }} " alt="">
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="/news/{{ $blog->slug }}" class="blog-read-more-btn mt-2">Read More</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- blog pagination -->
                    <div class="row wow fadeInUp mt-5" style="visibility: hidden; animation-name: none;">
                        <div class="col-12">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <!-- end blog pagination -->
                </div>
                <!-- end col -->

                <div class="col-lg-4 col-md-4 col-12 mt-lg-0 mt-md-0 mt-5 pl-lg-5 pl-md-5 pl-0">

                </div>
                <!-- end col -->
            </div>
        </div>
    </section>
@endsection
