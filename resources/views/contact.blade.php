@extends('layout.guest')
@section('page_title')
    Standard academy - Contact 
@endsection
@section('page_content')

<div class="page-banner page-banner-overlay" data-background="main/assets/img/bg/banner-bg.jpg">
    <div class="container h-100">
       <div class="row h-100">
          <div class="col-lg-12 my-auto">
             <div class="page-banner-content text-center">
                <h2 class="page-banner-title">Contact Us</h2>
                <div class="page-banner-breadcrumb">
                   <p><a href="#">Home</a> contact</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="page-banner-shape"></div>
 </div>

 <section id="contcat" class="section-padding">
    <div class="auto-container">
       <div class="row">
          <div class="col-lg-5 col-md-5 col-12 mb-lg-0 mb-md-0 mb-5">
            <div class="address-box-wrap bg-gray shadow-sm p-lg-5 p-md-3 p-3">
                <div class="address-box-sin mb-4">
                   <div class="address-box-icon">
                      <i class="icofont-location-pin"></i>
                   </div>
                   <div class="address-box-des">
                      <h4>Office Address</h4>
                      <p>7684+72H, Estate Rd, 340110, Akure, Ondo</p>
                   </div>
                </div>
                <div class="address-box-sin mb-4">
                   <div class="address-box-icon">
                      <i class="icofont-envelope-open"></i>
                   </div>
                   <div class="address-box-des">
                      <h4>Send Email</h4>
                      <p> {{env('SCHOOL_MAIL')}} <br> admin@standard.com</p>
                   </div>
                </div>
                <div class="address-box-sin mb-4">
                   <div class="address-box-icon">
                      <i class="icofont-fax"></i>
                   </div>
                   <div class="address-box-des">
                      <h4>Phone </h4>
                      <p>+123-456-0975 <br> +456-123-675</p>
                   </div>
                </div>
                <div class="address-box-sin">
                   <div class="address-box-icon">
                      <i class="icofont-eye"></i>
                   </div>
                   <div class="address-box-des">
                      <h4>Opening Time</h4>
                      <p>Mon - Sat: 9 AM - 5 PM </p>
                   </div>
                </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-12 pl-lg-5 pl-md-3 pl-0">
             <div class="contact-heading mb-5">
                <h2>Join With Us</h2>
             </div>
             <div class="contact-form-wrap">
                <form id="main-form" class="contact-form form" name="enq" method="POST" >
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <span class="form-icon"><i class="icofont-user"></i></span>
                            <input type="text" class="form-control" id="name" placeholder="John" required>
                            <label for="name">First Name*</label>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <span class="form-icon"><i class="icofont-envelope"></i></span>
                            <input type="email" class="form-control" id="email" placeholder="example@xyz.com" required>
                            <label for="email">Email*</label>
                         </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <span class="form-icon"><i class="icofont-ui-dial-phone"></i></span>
                            <input type="text" class="form-control" id="number" placeholder="xxx-xxx-xxxx" required>
                            <label for="number">Contact Number*</label>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <span class="form-icon"><i class="icofont-at"></i></span>
                            <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                            <label for="subject">Subject*</label>
                         </div>
                      </div>
                   </div>
                   <div class="form-group form-message">
                      <textarea class="form-control" id="message" rows="6" placeholder="Message"></textarea>
                      <label for="message">Message</label>
                   </div>
                   <div class="text-center wow fadeInUp">
                       <div class="actions">
                           <input value="SUBMIT MESSAGE" name="submit" id="submitButton" class="btn con-btn" title="Click here to submit your message!" type="submit">
                           <img src="main/assets/img/ajax-loader.gif" id="loader" style="display:none" alt="loading" width="16" height="16">
                       </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </section>

@endsection