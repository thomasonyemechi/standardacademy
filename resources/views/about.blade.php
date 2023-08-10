@extends('layout.guest')
@section('page_content')
    <!-- START PAGEBREDCUMS -->
    <div class="page-banner page-banner-overlay" data-background="main/assets/img/bg/banner-about.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="page-banner-content text-center">
                        <h2 class="page-banner-title">About Us</h2>
                        <div class="page-banner-breadcrumb">
                            <p><a href="#">Home</a> About</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-banner-shape"></div>
    </div>

    <section id="pabout" class="about-wel-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 d-lg-flex col-12">
                    <div>
                        <img class="img-fluid" src="main/assets/img/bg/about-img.png" alt="" />
                    </div>
                    <div class="welcome-section-title">
                        <h6 class="theme-color">Welcome To Our School</h6>
                        <h2>About  {{env('APP_NAME')}} </h2>

                        <div style="">

                            <p>
                                In the heart of our community lies a haven of learning, laughter, and growth –
                                {{ env('APP_NAME') }}.
                                This institution stands as a beacon of education, where bright-eyed children embark on their
                                journey to
                                knowledge, discovery, and personal development.
                            </p>
                            <p>
                                At {{ env('APP_NAME') }}, education is not just about textbooks and exams; it's about
                                fostering a holistic
                                learning experience that empowers students to become confident, compassionate individuals.
                                The dedicated team of
                                educators understands that each child is unique, and their teaching methods reflect this
                                understanding.
                            </p>
                            <p>
                                Walk through the vibrant hallways of {{ env('APP_NAME') }}, and you'll witness classrooms
                                that are more than just
                                spaces of instruction – they're centers of curiosity. Interactive displays, colorful
                                artwork, and an array of
                                learning materials adorn the walls, creating an environment that sparks interest and
                                engagement. The teachers,
                                passionate and caring, go beyond the role of instructors; they become mentors, guiding
                                students through the maze
                                of knowledge with patience and enthusiasm.
                            </p>
                            <p>
                                Parents are not just spectators in this educational journey; they are valued partners.
                                {{ env('APP_NAME') }}
                                fosters an open line of communication between parents, teachers, and students. Regular
                                parent-teacher meetings,
                                workshops, and events provide opportunities for meaningful interactions that contribute to
                                the overall growth
                                of each child.
                            </p>
                            <p>
                                As {{ env('APP_NAME') }} continues to nurture young minds, it stands as a testament to the
                                power of education
                                in shaping individuals and communities. Beyond the academic accolades, it's a place where
                                friendships are forged,
                                passions are discovered, and dreams take flight. With a blend of innovation, compassion, and
                                dedication,
                                {{ env('APP_NAME') }} paves the way for a generation of thinkers, doers, and leaders.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="counter" class="counter-padding overlay section-back-image"
        data-background="main/assets/img/bg/counter-bg.jpg">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12 mx-lg-auto mx-md-auto mx-0">
                    <div class="counter-info">
                        <div class="counter-icon">
                            <i class="icofont-history"></i>
                        </div>
                        <div class="counter-des">
                            <h2><span>Doing the right thing, </span> <br> at the right time</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="col-lg-8 col-md-8 col-12 mx-lg-auto mx-md-auto mx-0 text-lg-left text-md-left text-center">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                            <div class="single-counter-item">
                                <h4 class="timer">20</h4>
                                <p>Quality Teachers</p>
                            </div>
                        </div>
                        <!-- End single counter item -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                            <div class="single-counter-item">
                                <h4 class="timer">200</h4>
                                <p>Enrolled Students</p>
                            </div>
                        </div>
                        <!-- End single counter item -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-4">
                            <div class="single-counter-item">
                                <h4 class="timer">50</h4>
                                <p>Satisfied Parents</p>
                            </div>
                        </div>
      
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicetab" class="section-padding ">
        <div class="auto-container">
            <div class="service-tab">
                <div class="row">
                    <div class="col-lg-12 col-12 mb-lg-0 mb-md-4 mb-4">
                        <ul id="tabsJustified" class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#" data-target="#two" data-toggle="tab" class="nav-link active">
                                    <i class="icofont-paper"></i>
                                    <span>Our Vision</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-target="#three" data-toggle="tab" class="nav-link ">
                                    <i class="icofont-bus-alt-2"></i>
                                    <span>Our Mission</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 p-0 m-0 col-xs-12">
                        <div id="tabsJustifiedContent" class="tab-content p-0 m-0">
                            <div id="two" class="tab-pane animated fadeInUp p-0 m-0 show active">
                                <div class="auto-container p-0 m-0">
                                    <div class="row p-0 m-0">
                                        <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-5 text-lg-right text-left">
                                            <div class="service-tab-left">
                                                <h4>Our Vision</h4>
                                                <p>
                                                    Our vision at {{ env('APP_NAME') }} is to be a beacon of educational
                                                    excellence, known for our
                                                    holistic approach to education and the positive impact we have on our
                                                    students, families, and
                                                    society. We envision a future where our graduates are confident,
                                                    compassionate, and
                                                    responsible individuals who contribute positively to their communities.
                                                    By creating a
                                                    dynamic and inclusive learning environment, we aspire to be a catalyst
                                                    for the development of
                                                    critical thinkers, lifelong learners, and leaders who embrace diversity
                                                    and embody our core
                                                    values.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 pl-lg-5 pl-0">
                                            <div class="ab-img-col">
                                                <figure>
                                                    <img class="img-fluid" src="main/assets/img/service/2.jpg"
                                                        alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="three" class="tab-pane animated fadeInUp">
                                <div class="auto-container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-5 text-lg-right text-left">
                                            <div class="service-tab-left">
                                                <h4>Our Mission</h4>
                                                <p>
                                                    At {{ env('APP_NAME') }}, our mission is to create a nurturing and
                                                    inspiring learning
                                                    environment where each child's potential is recognized and developed to
                                                    the fullest. We are committed to fostering
                                                    academic excellence, nurturing character development, and instilling a
                                                    lifelong love for learning. Through innovative teaching
                                                    methods, meaningful experiences, and strong community partnerships, we
                                                    aim to empower our students with the knowledge,
                                                    skills, and values they need to succeed in an ever-changing world.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 pl-lg-5 pl-0">
                                            <div class="ab-img-col">
                                                <figure>
                                                    <img class="img-fluid" src="main/assets/img/service/3.jpg"
                                                        alt="">
                                                </figure>
                                            </div>
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

    <section id="calltoaction" class="about-promo bg-theme">
        <div class="auto-container">
            <div class="row">
                <div class="col-10 mx-auto">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-4">
                            <div class="about-promo-box-img">
                                <img class="img-fluid" src="main/assets/img/bg/promo-img.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 text-center">
                            <div class="about-promo-box-des">
                                <h4>Become A Part Of Our Family!</h4>
                                <p>Click button to fill the online admissions form and submit</p>
                                <a href="/admission" class="call-to-action-btn wow fadeInUp"
                                    style="visibility: visible; animation-name: fadeInUp;">Enroll Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
