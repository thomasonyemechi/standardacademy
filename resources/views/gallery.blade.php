@extends('layout.guest')
@section('page_content')
    <div class="page-banner page-banner-overlay" data-background="{{ asset('main/assets/img/bg/banner-bg-2.jpg') }}"
        style="background-image: url({{ asset('main/assets/img/bg/banner-bg-2.jpg') }});">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="page-banner-content text-center">
                        <h2 class="page-banner-title">Image Gallery</h2>
                        <div class="page-banner-breadcrumb">
                            <p><a href="#">Home</a> Gallery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-banner-shape"></div>
    </div>


    <section id="galleryPage" class="section-padding">
        <div class="auto-container">
            <div class="row project-list" style="position: relative; height: 277.5px;">
 

                <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4"
                    style="position: absolute; left: 0px; top: 0px;">
                    <figure class="portfolio-sin-item">
                        <img class="img-fluid" src="{{ asset('main/assets/img/gallery/2.jpg') }}" alt="">
                        <figcaption>
                            <a href=""><h3>Portfolio Title</h3></a>
                        </figcaption>
                    </figure>
                </div>
      
            </div> 
        </div>
    </section>

    <section id="calltoactiontwo" class="callto-action-padding bg-theme">
        <div class="auto-container">
           <div class="row">
              <div class="col-lg-9 col-md-6 col-12 mb-lg-0 mb-4">
                 <div class="callto-action-left">
                    <h2>Online Admission is going On</h2>
                 </div>
              </div>
              <!-- end col -->
              <div class="col-lg-3 col-md-6 col-12 mt-3 text-lg-right text-md-right text-left">
                 <a href="/admission" class="call-to-action-btn-2 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Admission Now </a>
              </div>
              <!-- end col -->
           </div>
        </div>
     </section>
@endsection
