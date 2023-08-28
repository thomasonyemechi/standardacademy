@extends('layout.guest')
@section('page_content')
    <section id="singleteacher" class="section-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-10 offset-md-1 col-12 pl-lg-5 pl-md-3 pl-sm-2 pl-2">
                    <div class="single-teacher-details shadow">
                        <div class="section-title section-title-left mb-4">
                            <h2>Admissions {{ date('Y') - 1 }}/{{ date('Y') }}</h2>
                        </div>
                        <div class="" style="font-size: ">
                            <p>
                                Appication form can be obtained <a href="">here</a> or directly from the school
                                administrative office which provides additional
                                advantages of viewing the school first hand.
                            </p>
                            <br>
                            <p>
                                Children appliying to the toddler programme (15 months- 3 years ) must be 15 months old by
                                september 30th to be eligible. it is excepted
                                that after submitting an application, a visit will be scheduled for the parent in the
                                company of the child or children. During the visit,
                                there will be short interview with the head of school to get to know the family better and
                                also have the opportunity to visit the school's
                                montessori classroom with the child or children.

                            </p>
                            <br>
                            <p>
                                When applying to early childhood level (ages 2 1/2 - 5+ years)
                                the child must be at least 2 1/2 years of age by september 30th to be eligible.
                            </p>
                            <br>
                            <p>
                                If applting to the primary level, the child must be at least 5 yeasr of age by september
                                30th to be eligble for grade 1.
                                it is expected that when an appication form is submitted, a vist will be scheduled to the
                                school with the child. During the visit,
                                there will be short interviews with the head of school and the child will have to sit for a
                                written test - appropiate school readiness
                                assessment, to help in establishing the child's previous knowlegde and ascertain his or her
                                ability to fit into the class applied for
                                progress schoo may be requested. admission and placement into class is based soley on
                                perforance and age of the pupil.
                            </p>
                            <br>
                            <p>
                                Children are admitted mid-stream only if there are spaces in the class of interest
                            </p>
                            <br>
                            <p>
                                All Forms must be gilled and returned with 2 passport photographs a copy of the child's
                                health and immunization record,
                                birth certificate, and assesment record from previous school where necessary.
                                THe admission process highlighted above applies to all classes in our secondary school
                            </p>
                        </div>
                        {{--                        
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
                        </div> --}}
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
