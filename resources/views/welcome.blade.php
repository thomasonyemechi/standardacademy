@extends('layout.guest')
@section('page_title')
    Standard academy - Home
@endsection
@section('page_content')
    <section class="slider-section">
        <div class="home-slides owl-carousel owl-theme">
            <div class="home-single-slide" data-background="{{ asset('main/assets/img/bg/slide1.jpg') }}">
                <div class="home-single-slide-overlay"></div>
                <div class="home-single-slide-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="home-single-slide-dec">
                                    <h4>Small class sizes</h4>
                                    <h2>Mindful Curriculum</h2>
                                    <p>we provide three teachers per section<br>to take class.</p>
                                    <div class="home-single-slide-button mt-4">
                                        <a href="#" class="slide-btn-one mb-lg-0 mb-md-0 mb-2">Learn More <i
                                                class="icofont-long-arrow-right"></i></a>
                                        <a href="#" class="slide-btn-two">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-single-slide" data-background="{{ asset('main/assets/img/bg/slide2.jpg') }}">
                <div class="home-single-slide-overlay"></div>
                <div class="home-single-slide-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="home-single-slide-dec">
                                    <h4>Send message to parents</h4>
                                    <h2>Message Notification</h2>
                                    <p>notify parents by studied subjects and details<br>on daily basis.</p>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="habout" class="welcome-section-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12 mb-lg-0 mb-lg-0 mb-5">
                    <div class="about-wel-des">
                        <h2 class="">Welcome to {{ env('APP_NAME') }}</h2>
                        <p>
                            We offer exceptionally high standards of early childhood education for children between the ages
                            of
                            1<sup>1</sup><small>/</small><sub>2</sub> to 5 years, to adequately prepare them for primary
                            education programs,
                            strting from age 5 to 11 years
                        </p>
                        <p>
                            A child's experiences during early years have a major impact on what he or she becomes in life.
                            we give every child a
                            platform to exploit their innate ability, since they all deserve the best possible start in life

                            we also offer qualitative secondary school education and we are recordin tremedous success with
                            our students,

                            we are out to give our love, support and guadiance to evry child in our care
                        </p>

                        <p>
                            Our goals and determination are to help bring out the genius in each child and raise them to
                            becoming leaders who will proffer
                            solutions to globak issues and help make out communities better, excellent educational services
                            to humanity define our family spirit. We seek to be the private
                            school parents will always know as teh very best for their children.
                        </p>
                        <p class="my-4 wow fadeInUp">
                            <b>we congratulate and welcome you on this voyage of success; welcome to the home of
                                scholars!</b>
                        </p>

                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="about-wel-img-sec img-overlay">
                        <div class="img-wrap">
                            <img class="img-fluid" src="{{ asset('main/assets/img/bg/home-about-img.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="habout" class="welcome-section-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="about-wel-img-sec img-overlay">
                        <div class="img-wrap">
                            <img class="img-fluid" src="{{ asset('main/assets/img/bg/home-about-img.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12 mb-lg-0 mb-lg-0 mb-5">
                    <div class="about-wel-des">
                        <h2 class="">Our Programme (Curriculum)</h2>
                        <p>
                            Standard Academy employs the Nigeria - British curriculum on the core areas of English,
                            Mathematics and Science.
                            The running of a unfied curriculum provides the school with an external benchmark to inform the
                            teaching
                            of children between 5 to 11 years. It gives the school an international curriculum to work with
                            allowing easy measurement of
                            learner's progress overtime and also details structured reporting to parents and gives the
                            assurance of a qualitative and global curriculum
                            and gives the pupils the confidence to write and pass any national and international
                            examinations. The board based curriculum
                            combined with the montesori, EYTFS and IPS system for the children betwen 15 months and 5 years
                            gives the assurance of a qualitative and
                            global curriculum and gives the pupils the confidence to write and read excellently before
                            entering the primary section.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="services" class="section-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12 mx-auto text-center">
                    <div class="section-title">
                        <h6 class="theme-color"></h6>
                        <h2>What Sets {{ env('APP_NAME') }} Apart? </h2>
                        <p>
                            Discover the {{ env('APP_NAME') }} difference for yourself. Join us on this remarkable journey
                            of learning,
                            growth, and transformation that prepares students to make a positive impact on the world
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                    <div class="single-service-item shadow bg-white">
                        <div class="icon-holder mb-3">
                            <div class="service-item-icon-bg">
                                <i class="icofont-read-book"></i>
                            </div>
                        </div>
                        <div class="service-item-text-holder">
                            <h4>Holistic Excellence</h4>
                            <p>
                                Our approach blends academic rigor with character
                                development and creative expression. This ensures that our students are equipped with the
                                skills and values necessary to succeed in an ever-evolving world.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End single service item -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                    <div class="single-service-item shadow bg-white">
                        <div class="icon-holder mb-3">
                            <div class="service-item-icon-bg">
                                <i class="icofont-teacher"></i>
                            </div>
                        </div>
                        <div class="service-item-text-holder">
                            <h4>Passionate Educators</h4>
                            <p>Our dedicated faculty members are more than teachers – they are mentors, guides, and role
                                models. With their
                                unwavering commitment to fostering a love for learning,
                                they inspire our students to reach for the stars and achieve their full potential.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center mb-lg-0 mb-md-0">
                    <div class="single-service-item shadow bg-white">
                        <div class="icon-holder mb-3">
                            <div class="service-item-icon-bg">
                                <i class="icofont-certificate-alt-1"></i>
                            </div>
                        </div>
                        <div class="service-item-text-holder">
                            <h4>Innovative Learning</h4>
                            <p>
                                {{ env('APP_NAME') }} is at the forefront of educational innovation. we create an immersive
                                and dynamic
                                learning environment that keeps students engaged, curious, and excited about their
                                educational journey.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial" class="section-padding overlay section-back-image"
        data-background="main/assets/img/bg/faq-bg.jpg">
        <div class="auto-container">
            <div class="row ml-lg-4 ml-md-4 ml-0 mr-lg-4 mr-md-4 mr-0">
                <div class="col-lg-12 col-md-12 col-12 mt-lg-0 mt-4">
                    <div class="section-title white-title section-title-left">
                        <h2>Frequently Asked Question</h2>
                    </div>
                    <div class="panel-group faq-home-accor" id="accordion">

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12 mt-lg-0 mt-4">
                                <div class="panel panel-default mb-3">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                href="#panel1">What is the mission of {{ env('APP_NAME') }} ? <i
                                                    class=" text-white icofont icofont-minus"></i></a>
                                        </h5>
                                    </div>
                                    <div id="panel1" class="panel-collapse collapse show">
                                        <div class="panel-body text-white">
                                            <p>
                                                Our mission is to provide a holistic and exceptional educational experience
                                                that empowers
                                                students to become confident, compassionate,
                                                and competent individuals who are prepared to excel in a dynamic world.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default mb-3">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                href="#panel2">What grades/levels does {{ env('APP_NAME') }} offer? <i
                                                    class=" text-white icofont icofont-plus"></i></a>
                                        </h5>
                                    </div>
                                    <div id="panel2" class="panel-collapse collapse">
                                        <div class="panel-body text-white">
                                            <p>
                                                We offer education from Kindergarten to Primary Level
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                href="#panel3">What extracurricular activities are available for
                                                students?<i class=" text-white icofont icofont-plus"></i></a>
                                        </h5>
                                    </div>
                                    <div id="panel3" class="panel-collapse collapse">
                                        <div class="panel-body text-white">
                                            <p>
                                                We offer a wide range of extracurricular activities, including sports, arts,
                                                clubs, music, drama, and more.
                                                These activities provide students with opportunities to explore their
                                                interests,
                                                develop new skills, and engage with their peers.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12 col-12 mt-lg-0 mt-4">
                                <div class="panel panel-default mb-3">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                href="#panel4">What is the curriculum at {{ env('APP_NAME') }} like? <i
                                                    class=" text-white icofont icofont-minus"></i></a>
                                        </h5>
                                    </div>
                                    <div id="panel4" class="panel-collapse collapse">
                                        <div class="panel-body text-white">
                                            <p>
                                                Our curriculum is designed to provide a well-rounded education that focuses
                                                on core
                                                subjects such as language arts, mathematics, science, and social studies. We
                                                also emphasize the
                                                development of essential skills like critical thinking, creativity, and
                                                communication.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default mb-3">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                href="#panel5"> How can parents get involved in their child's education at
                                                {{ env('APP_NAME') }}? <i
                                                    class=" text-white icofont icofont-plus"></i></a>
                                        </h5>
                                    </div>
                                    <div id="panel5" class="panel-collapse collapse">
                                        <div class="panel-body text-white">
                                            <p>
                                                Parents are encouraged to play an active role in their child's education.
                                                We organize regular parent-teacher meetings, workshops, and events that
                                                provide opportunities for
                                                parents to engage with teachers and understand their child's progress.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                href="#panel6"> How does {{ env('APP_NAME') }} ensure the safety of its
                                                students?<i class=" text-white icofont icofont-plus"></i></a>
                                        </h5>
                                    </div>
                                    <div id="panel6" class="panel-collapse collapse">
                                        <div class="panel-body text-white">
                                            <p>
                                                The safety of our students is our top priority. We have stringent
                                                security measures in place, including controlled access to the campus,
                                                staff trained in emergency protocols, and supervision during all school
                                                activities.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog" class="section-padding bg-gray">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12 mx-auto text-center">
                    <div class="section-title">
                        <h6 class="theme-color">Sometime we want to share</h6>
                        <h2>Our News & Events</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <div class="blog-slides owl-carousel owl-theme">
                        @foreach (\App\Models\BlogPost::orderby('id', 'desc')->limit(5)->get() as $post)
                            <div class="blog-home-single">
                                <div class="blog-home-image">
                                    <img class="img-fluid blog-img object-cover " src="{{ asset($post->image) }} " alt="" />
                                    <div class="blog-home-post-date">
                                        <i class="icofont-clock-time"></i>
                                        <span> {{date('M j, Y',  strtotime($post->created_at))}} </span>
                                    </div>
                                </div>
                                <div class="blog-home-des-wrap">
                                    <div class="blog-home-des-right">
                                        <div class="blog-home-content">
                                            <h4 class="two-lines" ><a href="/news/{{$post->slug}}"> {{$post->title}} </a></h4>
                                            {{-- <p class="four-lines" > {!!$post->body!!} </p> --}}
                                        </div>
                                        <div class="blog-home-btn">
                                            <a href="/news/{{$post->slug}}"> Read More <i class="icofont-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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
                        <h2>Enrol your child now!</h2>
                        <p>Click button to fill the online admissions form and submit </p>
                    </div>
                </div>
                <div class="col-lg-5 mt-3">
                    <div class="hnewslettr-form d-flex  justify-content-center">
                        <a href="/admission" class="call-to-action-btn wow fadeInUp"
                            style="visibility: visible; animation-name: fadeInUp;">Enroll Now </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
