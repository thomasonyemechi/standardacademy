@extends('layout.guest')
@section('page_content')
    <section id="singleteacher" class="section-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 offset-md-2 col-12 pl-lg-5 pl-md-3 pl-sm-2 pl-2">
                    <div class="single-teacher-details shadow">
                        <div class="section-title section-title-left mb-4">
                            <h2>Admissions {{ date('Y') - 1 }}/{{ date('Y') }}</h2>
                        </div>
                        <p>
                            We are open up our admissions process for the {{ date('Y') - 1 }}/{{ date('Y') }} academic
                            session {{ env('APP_NAME') }}.
                            Kudos to all our prospective parents for choosing {{ env('APP_NAME') }}.
                        </p>
                        <p class="mt-2" >
                            To apply to Waterspring International School you can <a href="javascripr:;">download</a> the admission form below or fill our online form.
                        </p>
                        <div class="row mt-4">
                            <div class="col">
                                <form class="faq-contact-form contact-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="firstName"
                                                    placeholder="John" required="">
                                                <label for="firstName">Student First Name*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="lastName"
                                                    placeholder="Doe" required="">
                                                <label for="lastName">Student Last Name*</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="faNamef"
                                                    placeholder="John" required="">
                                                <label for="faNamef">Father Name*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="moNamem"
                                                    placeholder="Doe" required="">
                                                <label for="moNamem">Mother Name*</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="bdate"
                                                    placeholder="Student Birth Date(DD/MM/YY)" required="">
                                                <label for="bdate">Birth Date*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="gneder"
                                                    placeholder="Male/Female" required="">
                                                <label for="gneder">Gender*</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="class"
                                                    placeholder="Level 1/Level 2" required="">
                                                <label for="class">Class*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Address" required="">
                                                <label for="address">Address*</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="example@xyz.com" required="">
                                                <label for="email">Email*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="contactNumber"
                                                    placeholder="xxx-xxx-xxxx" required="">
                                                <label for="contactNumber">Contact Number*</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-message">
                                        <textarea class="form-control" id="message" rows="6" placeholder="Write Something Here...."></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                    <div class="text-center wow fadeInUp"
                                        style="visibility: hidden; animation-name: none;">
                                        <button type="submit" class=" btn faq-btn">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           

            </div>
        </div>
    </section>
@endsection
