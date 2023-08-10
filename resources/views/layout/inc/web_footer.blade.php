<footer class="footer-section">
    <div id="top-footer" class="overlay-2 section-back-image-2" data-background="{{ asset('main/assets/img/bg/footer-bg.jpg') }}">
       <div class="auto-container">
          <div class="row">
             <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-5 mb-sm-5 mb-5">
                <div class="footer-widget-title col-12 p-0">
                   <div class="logo">
                      <a href="index.html">
                         <img class="img-fluid" src="{{ asset('main/assets/img/logo.png') }}" alt="">
                      </a>
                   </div>
                </div>
                <div class="footer-widget-inner">
                   <p>7684+72H, Estate Rd, 340110, Akure, Ondo</p>
                   <div class="img-menu float-lg-left float-none mt-3">
                      <div class="footer-social">
                         <ul>
                            <li><a class="social-fb" href="#"><i class="icofont-instagram"></i></a></li>
                            <li><a class="social-gp" href="#"><i class="icofont-facebook"></i></a></li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
  
             <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
                <div class="footer-widget-title col-12 p-0">
                   <h4>Useful Links</h4>
                </div>
                <div class="footer-widget-inner">
                   <ul>
                      <li><a href="#"><i class="icofont-circled-right"></i> About {{env('APP_NAME')}} </a></li>
                      <li><a href="#"><i class="icofont-circled-right"></i> News & Events</a></li>
                   </ul>
                </div>
             </div>
             <!-- end col -->
             <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-0">
  
                <div class="footer-widget-inner">
                   <div class="footer-contact-widget">
                      <div class="footer-contact-sin">
                         <div class="footer-contact-sin-left">
                            <i class="icofont-smart-phone"></i>
                         </div>
                         <div class="footer-contact-sin-right">
                            <p>{{ env('SCHOOL_PHONE') }}</p>
                         </div>
                      </div>
                      <div class="footer-contact-sin">
                         <div class="footer-contact-sin-left">
                            <i class="icofont-smart-phone"></i>
                         </div>
                         <div class="footer-contact-sin-right">
                            <p>{{ env('SCHOOL_PHONE') }}</p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!-- end col -->
          </div>
       </div>
    </div>
    <div id="bottom-footer" class="bg-gray">
       <div class="auto-container">
          <div class="row mb-lg-0 mb-md-4 mb-4">
             <div class="col-lg-6 col-md-12 col-12">
                <p class="copyright-text">Copyright © {{date('Y')}} <a href="#"></a> | All Rights Reserved</p>
             </div>
             <!-- end col -->
             <div class="col-lg-6 col-md-12 col-12">
                <div class="footer-menu">
                   <ul>
                      <li><a href="/">Home</a></li>
                      <li><a href="/about">About Us</a></li>
                      <li><a href="/contact">Contact Us</a></li>
                   </ul>
                </div>
             </div>
             <!-- end col -->
          </div>
       </div>
    </div>
 </footer>