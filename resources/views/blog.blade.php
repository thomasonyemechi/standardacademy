@extends('layout.guest')
@section('page_title')
    {{ $blog->title }} Standard academy
@endsection
@section('page_content')
    <div class="page-banner page-banner-overlay">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="page-banner-content text-center">
                        <h2 class="page-banner-title">{{ $blog->title }}</h2>
                        <div class="page-banner-breadcrumb">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-banner-shape"></div>
    </div>




    <section id="blogsingle" class="section-padding">
        <div class="auto-container">
            <div class="row mb-lg-5 mb-0">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="blog-single single-blog-post">
                        <div class="single-blog-post-wrap">
                            <div class="single-blog-post-icon">
                                <i class="icofont-photobucket"></i>
                            </div>
                            <div class="single-blog-post-content">
                                <h4 class="single-blog-post-title">
                                    <a href="#">{{ $blog->title }}</a>
                                </h4>
                                <div class="single-blog-post-Info">
                                    <span><i
                                            class="icofont-calendar"></i>{{ date('M j, Y', strtotime($blog->created_at)) }}</span>
                                    <small>/</small>
                                    <span class="tzcategory"><i class="icofont-ui-tag"></i><a href="#"
                                            rel="category tag">{{ $blog->category }}</a></span>
                                </div>
                                <div class="single-blog-post-img">
                                    <img class="img-fluid  object-cover " style="width: 100%"
                                        src="{{ asset($blog->image) }}" alt="">
                                </div>
                                <div class="blog-single-des mt-4">
                                    <h4 class="title">Post Overview</h4>
                                    <div style="width: 100%; overflow-x: hidden; ">
                                        {!! $blog->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4 col-md-4 col-12 mt-lg-0 mt-md-0 mt-5 pl-lg-5 pl-md-5 pl-0">
                    <div class="sidebar-widget post_wid mb-5">
                        <div class="sidebar-widget-inner">
                            <div class="sidebar-widget-title">
                                <h5>Recent Post</h5>
                            </div>
                            @foreach (\App\Models\BlogPost::orderby('id', 'desc')->limit(5)->get() as $post)
                                <div class="singleRecpost">
                                    <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
                                    <h6 class="recTitle"><a href="/news/{{ $post->slug }}">{{ $post->title }}</a></h6>
                                    <p class="posted-on">{{ date('M j, Y', strtotime($post->created_at)) }}</p>
                                </div>
                            @endforeach


                        </div>
                    </div>


                </div>
                <!-- end col -->
            </div>
        </div>
    </section>
@endsection
