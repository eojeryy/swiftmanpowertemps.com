@extends('layouts.app')

@section('title', 'Swift Manpower Temps Agency Ltd')

@section('content')
        @php
            $partnerThumbStyles = [
                'background: linear-gradient(135deg, #c53030, #7f1d1d);',
                'background: linear-gradient(135deg, #0f766e, #164e63);',
                'background: linear-gradient(135deg, #7c3aed, #312e81);',
                'background: linear-gradient(135deg, #ea580c, #9a3412);',
                'background: linear-gradient(135deg, #2563eb, #1e3a8a);',
                'background: linear-gradient(135deg, #059669, #14532d);',
            ];
        @endphp

        <style>
            .testimonial-style-three .author-thumb.partner-thumb {
                align-items: center;
                border-radius: 50%;
                color: #fff;
                display: inline-flex;
                font-size: 24px;
                font-weight: 800;
                height: 70px;
                justify-content: center;
                text-transform: uppercase;
                width: 70px;
            }

            .home-service-section {
                padding-top: 160px;
            }

            @media (max-width: 991px) {
                .home-service-section {
                    padding-top: 100px;
                }
            }
        </style>


        <!-- banner-section -->
        <section class="banner-section style-three">
            <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/banner/banner-7.jpg)"></div>
                    <div class="pattern-layer">
                        <div class="pattern-1" style="background-image: url(assets/images/shape/pattern-26.png);"></div>
                        <div class="pattern-2" style="background-image: url(assets/images/shape/pattern-27.png);"></div>
                        <div class="pattern-3" style="background-image: url(assets/images/shape/pattern-28.png);"></div>
                        <div class="pattern-4" style="background-image: url(assets/images/shape/pattern-29.png);"></div>
                        <div class="pattern-5" style="background-image: url(assets/images/shape/pattern-30.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-2 content-column">
                                <div class="content-box">
                                    <h1>Staffing support</h1>
                                    <h2>Reliable Workforce Partnerships</h2>
                                    <p>We help employers find dependable staff and connect job seekers <br />with practical opportunities that fit their skills.</p>
                                    <div class="btn-box">
                                        <a href="{{ route('about.company') }}" class="btn-one">Learn More</a>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/banner/banner-8.jpg)"></div>
                    <div class="pattern-layer">
                        <div class="pattern-1" style="background-image: url(assets/images/shape/pattern-26.png);"></div>
                        <div class="pattern-2" style="background-image: url(assets/images/shape/pattern-27.png);"></div>
                        <div class="pattern-3" style="background-image: url(assets/images/shape/pattern-28.png);"></div>
                        <div class="pattern-4" style="background-image: url(assets/images/shape/pattern-29.png);"></div>
                        <div class="pattern-5" style="background-image: url(assets/images/shape/pattern-30.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-2 content-column">
                                <div class="content-box">
                                    <h1>Right people</h1>
                                    <h2>Let Us Recruit for You</h2>
                                    <p>Swift Manpower Temps Agency Ltd supports fast hiring decisions <br />with responsive screening and candidate matching.</p>
                                    <div class="btn-box">
                                        <a href="{{ route('about.company') }}" class="btn-one">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/banner/banner-9.jpg)"></div>
                    <div class="pattern-layer">
                        <div class="pattern-1" style="background-image: url(assets/images/shape/pattern-26.png);"></div>
                        <div class="pattern-2" style="background-image: url(assets/images/shape/pattern-27.png);"></div>
                        <div class="pattern-3" style="background-image: url(assets/images/shape/pattern-28.png);"></div>
                        <div class="pattern-4" style="background-image: url(assets/images/shape/pattern-29.png);"></div>
                        <div class="pattern-5" style="background-image: url(assets/images/shape/pattern-30.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-2 content-column">
                                <div class="content-box">
                                    <h1>Your partner</h1>
                                    <h2>Placing People First</h2>
                                    <p>From temporary staffing to long-term placements, we work closely <br />with businesses and candidates every step of the way.</p>
                                    <div class="btn-box">
                                        <a href="{{ route('about.company') }}" class="btn-one">Learn More</a>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="social-box">
                <ul class="social-links">
                    <li>Follow :</li>
                    <li><a href="{{ route('home') }}">Fb</a></li>
                    <li><a href="{{ route('home') }}">Tw</a></li>
                    <li><a href="{{ route('home') }}">In</a></li>
                </ul>
            </div>
            <div class="mail-box"><a href="mailto:swiftmanpowertemps@gmail.com">swiftmanpowertemps@gmail.com</a></div>
        </section>
        <!-- banner-section end -->


        <!-- about-style-three -->
        <section class="about-style-three bg-color-2">
            <div class="image-layer" style="background-image: url(assets/images/background/about-bg-1.jpg);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-6 col-lg-12 col-sm-12 offset-xl-6 content-column">
                        <div id="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
                                    <span class="top-title">About Our Agency</span>
                                    <h2>Reliable and Cost Efficient Recruitment Agency</h2>
                                </div>
                                <div class="inner-box">
                                    <p>We provide practical staffing support for employers who need dependable workers and for job seekers looking for the right placement opportunities.</p>
                                    <ul class="list clearfix">
                                        <li>
                                            <figure class="icon-box"><img src="assets/images/icons/icon-42.png" alt=""></figure>
                                            <h3>Understand Your Hiring Needs</h3>
                                        </li>
                                        <li>
                                            <figure class="icon-box"><img src="assets/images/icons/icon-43.png" alt=""></figure>
                                            <h3>Match the Right Candidate</h3>
                                        </li>
                                    </ul>
                                    <div class="link"><a href="{{ route('about.company') }}" class="theme-btn-two">Learn More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-three end -->


        <!-- chooseus-section -->
        <section class="chooseus-section alternet-2">
            <div class="auto-container">
                <div class="title-inner clearfix">
                    <div class="sec-title pull-left">
                        <span class="top-title">Benefits of Swift Manpower Temps Agency Ltd</span>
                        <h2>Why Businesses Choose Us</h2>
                    </div>
                    <div class="text pull-right">
                        <p>We focus on responsive service, dependable screening, and staffing support that helps employers stay productive and candidates stay prepared.</p>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="icon-box"><img src="assets/images/icons/icon-44.png" alt=""></figure>
                                <h3><a href="{{ route('why.choose.us') }}">Dependable Screening</a></h3>
                                <p>We review candidates carefully so employers can hire with more confidence.</p>
                                <a href="{{ route('why.choose.us') }}"><i class="flaticon-right-arrow"></i>More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="icon-box"><img src="assets/images/icons/icon-45.png" alt=""></figure>
                                <h3><a href="{{ route('why.choose.us') }}">Faster Hiring Support</a></h3>
                                <p>Our process helps reduce delays and keeps recruitment moving efficiently.</p>
                                <a href="{{ route('why.choose.us') }}"><i class="flaticon-right-arrow"></i>More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="icon-box"><img src="assets/images/icons/icon-46.png" alt=""></figure>
                                <h3><a href="{{ route('why.choose.us') }}">Flexible Staffing Options</a></h3>
                                <p>We support temporary and long-term staffing needs without unnecessary complexity.</p>
                                <a href="{{ route('why.choose.us') }}"><i class="flaticon-right-arrow"></i>More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="icon-box"><img src="assets/images/icons/icon-47.png" alt=""></figure>
                                <h3><a href="{{ route('why.choose.us') }}">Strong Candidate Reach</a></h3>
                                <p>We connect with job seekers across roles and help place people where they fit best.</p>
                                <a href="{{ route('why.choose.us') }}"><i class="flaticon-right-arrow"></i>More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- chooseus-section end -->


        <!-- service-section -->
        <section class="service-section alternet-2 bg-color-1 home-service-section">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/pattern-32.png);"></div>
            <div class="auto-container">
                <div class="sec-title light centred">
                    <span class="top-title">Solutions We Provide</span>
                    <h2>Staffing Solutions That Work</h2>
                    <p>We provide flexible recruitment support for businesses and practical placement services <br />for candidates seeking the right opportunity.</p>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-1.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-4.png" alt=""></figure>
                                        <h4>Temporary</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Short-term staffing support for employers who need reliable workers quickly.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-2.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-5.png" alt=""></figure>
                                        <h4>Direct Hire</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Permanent recruitment support focused on matching qualified candidates to long-term roles.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-3.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-6.png" alt=""></figure>
                                        <h4>Contract</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Contract staffing options that help businesses stay flexible while building strong teams.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-1.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-4.png" alt=""></figure>
                                        <h4>Temporary</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Short-term staffing support for employers who need reliable workers quickly.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-2.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-5.png" alt=""></figure>
                                        <h4>Direct Hire</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Permanent recruitment support focused on matching qualified candidates to long-term roles.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-3.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-6.png" alt=""></figure>
                                        <h4>Contract</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Contract staffing options that help businesses stay flexible while building strong teams.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-1.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-4.png" alt=""></figure>
                                        <h4>Temporary</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Short-term staffing support for employers who need reliable workers quickly.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-2.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-5.png" alt=""></figure>
                                        <h4>Direct Hire</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Permanent recruitment support focused on matching qualified candidates to long-term roles.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/service/service-3.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <div class="inner">
                                        <figure class="icon-box"><img src="assets/images/icons/icon-6.png" alt=""></figure>
                                        <h4>Contract</h4>
                                    </div>
                                    <div class="link"><a href="{{ route('staffing.solutions') }}">More Details</a></div>
                                </div>
                                <div class="overlay-content">
                                    <p>Contract staffing options that help businesses stay flexible while building strong teams.</p>
                                    <a href="{{ route('staffing.solutions') }}"><i class="flaticon-right-arrow"></i>More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-section end -->


        <!-- recruitment-technology -->
        <section class="recruitment-technology">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <figure class="image-box js-tilt clearfix"><img src="assets/images/resource/recruitment-1.png" alt=""></figure>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div id="content_block_4">
                            <div class="content-box">
                                <div class="sec-title">
                                    <span class="top-title">Recruitment technologies</span>
                                    <h2>Recruitment Backed by Better Processes</h2>
                                    <p>We use organized screening, communication, and coordination tools to make hiring smoother for both employers and candidates.</p>
                                </div>
                                <div class="inner-box">
                                    <div class="single-item wow fadeInRight animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="inner">
                                            <figure class="icon-box"><img src="assets/images/icons/icon-7.png" alt=""></figure>
                                            <h3><span>01</span><a href="{{ route('recruitment.processes') }}">Candidate Sourcing<i class="flaticon-right-arrow"></i></a></h3>
                                            <p>We identify candidates who fit the role requirements and work expectations.</p>
                                        </div>
                                    </div>
                                    <div class="single-item wow fadeInRight animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <div class="inner">
                                            <figure class="icon-box"><img src="assets/images/icons/icon-8.png" alt=""></figure>
                                            <h3><span>02</span><a href="{{ route('recruitment.processes') }}">Coordinated Hiring<i class="flaticon-right-arrow"></i></a></h3>
                                            <p>Our team helps manage interviews, scheduling, and communication efficiently.</p>
                                        </div>
                                    </div>
                                    <div class="single-item wow fadeInRight animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                                        <div class="inner">
                                            <figure class="icon-box"><img src="assets/images/icons/icon-9.png" alt=""></figure>
                                            <h3><span>03</span><a href="{{ route('recruitment.processes') }}">Long-Term Support<i class="flaticon-right-arrow"></i></a></h3>
                                            <p>We stay involved to support stronger placements and better staffing outcomes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- recruitment-technology end -->


        <!-- process-style-two -->
        <section class="process-style-two">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="sec-title centred">
                        <span class="top-title">How We Work</span>
                        <h2>Our Plan & Working Style</h2>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="inner-box">
                                    <span>Step</span>
                                    <h2>01...</h2>
                                    <figure class="icon-box"><img src="assets/images/icons/icon-48.png" alt=""></figure>
                                    <h3><a href="{{ route('how.we.work') }}">Review Hiring Requirements</a></h3>
                                    <p>We start by understanding the role, timeline, and qualities needed for success.</p>
                                    <div class="link"><a href="{{ route('how.we.work') }}"><i class="flaticon-right-arrow"></i>More Details</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="inner-box">
                                    <span>Step</span>
                                    <h2>02...</h2>
                                    <figure class="icon-box"><img src="assets/images/icons/icon-49.png" alt=""></figure>
                                    <h3><a href="{{ route('how.we.work') }}">Screen and Shortlist Candidates</a></h3>
                                    <p>Qualified candidates are reviewed, screened, and prepared for employer consideration.</p>
                                    <div class="link"><a href="{{ route('how.we.work') }}"><i class="flaticon-right-arrow"></i>More Details</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="inner-box">
                                    <span>Step</span>
                                    <h2>03...</h2>
                                    <figure class="icon-box"><img src="assets/images/icons/icon-50.png" alt=""></figure>
                                    <h3><a href="{{ route('how.we.work') }}">Support Placement and Follow-Up</a></h3>
                                    <p>We help coordinate placement details and maintain communication after hiring.</p>
                                    <div class="link"><a href="{{ route('how.we.work') }}"><i class="flaticon-right-arrow"></i>More Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- process-style-two end -->


        <!-- pricing-section -->
        <section class="pricing-section">
            <div class="auto-container">
                <div class="sec-title">
                    <span class="top-title">Flexible Engagement Options</span>
                    <h2>Support Packages That Fit Your Hiring Needs</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-15">Starter</li>
                            <li class="tab-btn" data-tab="#tab-16">Expanded</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-15">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="assets/images/icons/icon-35.png" alt=""></figure>
                                                <h3>Temporary Staffing</h3>
                                                <span class="text">Best for short-term workforce support</span>
                                            </div>
                                            <ul class="list clearfix">
                                                <li>Candidate Sourcing</li>
                                                <li>Interview Coordination</li>
                                                <li>Candidate Tracking</li>
                                                <li>Placement Support</li>
                                            </ul>
                                            <h2><span class="symble">-</span><span class="text"> Request a Custom Quote</span></h2>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="assets/images/icons/icon-36.png" alt=""></figure>
                                                <h3>Contract</h3>
                                                <span class="text">Best for project-based staffing needs</span>
                                            </div>
                                            <ul class="list clearfix">
                                                <li>Candidate Matching</li>
                                                <li>Interview Coordination</li>
                                                <li>Screening Support</li>
                                                <li>Assessments</li>
                                            </ul>
                                            <h2><span class="symble">-</span><span class="text"> Request a Custom Quote</span></h2>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="assets/images/icons/icon-37.png" alt=""></figure>
                                                <h3>Direct Hire</h3>
                                                <span class="text">Best for long-term hiring goals</span>
                                            </div>
                                            <ul class="list clearfix">
                                                <li>Candidate Sourcing</li>
                                                <li>Interview Coordination</li>
                                                <li>Candidate Tracking</li>
                                                <li>Placement Support</li>
                                            </ul>
                                            <h2><span class="symble">-</span><span class="text"> Request a Custom Quote</span></h2>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-16">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="assets/images/icons/icon-35.png" alt=""></figure>
                                                <h3>Temporary Staffing</h3>
                                                <span class="text">For larger or ongoing staffing requests</span>
                                            </div>
                                            <ul class="list clearfix">
                                                <li>Candidate Sourcing</li>
                                                <li>Interview Coordination</li>
                                                <li>Candidate Tracking</li>
                                                <li>Placement Support</li>
                                            </ul>
                                            <h2><span class="symble">-</span><span class="text"> Custom Employer Plan</span></h2>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="assets/images/icons/icon-36.png" alt=""></figure>
                                                <h3>Contract</h3>
                                                <span class="text">For flexible contract workforce support</span>
                                            </div>
                                            <ul class="list clearfix">
                                                <li>Candidate Matching</li>
                                                <li>Interview Coordination</li>
                                                <li>Screening Support</li>
                                                <li>Assessments</li>
                                            </ul>
                                            <h2><span class="symble">-</span><span class="text"> Custom Employer Plan</span></h2>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-two">
                                        <div class="inner-box">
                                            <div class="pricing-header centred">
                                                <figure class="icon-box"><img src="assets/images/icons/icon-37.png" alt=""></figure>
                                                <h3>Direct Hire</h3>
                                                <span class="text">For broader permanent hiring support</span>
                                            </div>
                                            <ul class="list clearfix">
                                                <li>Candidate Sourcing</li>
                                                <li>Interview Coordination</li>
                                                <li>Candidate Tracking</li>
                                                <li>Placement Support</li>
                                            </ul>
                                            <h2><span class="symble">-</span><span class="text"> Custom Employer Plan</span></h2>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing-section end -->


        <!-- team-style-two -->
        <section class="team-style-two">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/pattern-33.png);"></div>
            <div class="auto-container">
                <div class="sec-title centred light">
                    <span class="top-title">Meet Our Team</span>
                    <h2>Team Behind Our Success</h2>
                </div>
                <div class="four-item-carousel  owl-carousel owl-theme owl-dot-style-one owl-nav-none">
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-4.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Operations Team</a></h3>
                                <span class="designation">Leadership</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-5.png" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Recruitment Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-6.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Operations Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-7.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Recruitment Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-4.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Operations Team</a></h3>
                                <span class="designation">Leadership</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-5.png" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Recruitment Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-6.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Operations Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-7.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Recruitment Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-4.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Operations Team</a></h3>
                                <span class="designation">Leadership</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-5.png" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Recruitment Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-6.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Operations Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/team/team-7.jpg" alt="">
                                <span class="singature">Swift Team</span>
                                <div class="share-box">
                                    <p><i class="fas fa-share-alt"></i>Share</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <h3><a href="{{ route('home') }}">Recruitment Team</a></h3>
                                <span class="designation">Staffing Specialist</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-style-two end -->


        <!-- project-style-two -->
        <section class="project-style-two">
            <div class="outer-container">
                <div class="four-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <div class="project-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <div class="pattern-layer">
                                    <div class="pattern-1" style="background-image: url(assets/images/shape/pattern-16.png);"></div>
                                    <div class="pattern-2" style="background-image: url(assets/images/shape/pattern-17.png);"></div>
                                </div>
                                <img src="assets/images/project/project-6.jpg" alt="">
                            </figure>
                            <div class="content-box">
                                <div class="text">
                                    <span>Staffing Partnership</span>
                                    <h3><a href="{{ route('about.company') }}">Supporting fast-moving hiring demands</a></h3>
                                </div>
                                <div class="view-btn"><a href="assets/images/project/project-6.jpg" class="lightbox-image" data-fancybox="gallery">+</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <div class="pattern-layer">
                                    <div class="pattern-1" style="background-image: url(assets/images/shape/pattern-16.png);"></div>
                                    <div class="pattern-2" style="background-image: url(assets/images/shape/pattern-17.png);"></div>
                                </div>
                                <img src="assets/images/project/project-7.jpg" alt="">
                            </figure>
                            <div class="content-box">
                                <div class="text">
                                    <span>Recruitment Support</span>
                                    <h3><a href="{{ route('about.company') }}">Matching qualified candidates to open roles</a></h3>
                                </div>
                                <div class="view-btn"><a href="assets/images/project/project-7.jpg" class="lightbox-image" data-fancybox="gallery">+</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <div class="pattern-layer">
                                    <div class="pattern-1" style="background-image: url(assets/images/shape/pattern-16.png);"></div>
                                    <div class="pattern-2" style="background-image: url(assets/images/shape/pattern-17.png);"></div>
                                </div>
                                <img src="assets/images/project/project-8.jpg" alt="">
                            </figure>
                            <div class="content-box">
                                <div class="text">
                                    <span>Employer Solutions</span>
                                    <h3><a href="{{ route('about.company') }}">Helping businesses stay staffed and productive</a></h3>
                                </div>
                                <div class="view-btn"><a href="assets/images/project/project-8.jpg" class="lightbox-image" data-fancybox="gallery">+</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <div class="pattern-layer">
                                    <div class="pattern-1" style="background-image: url(assets/images/shape/pattern-16.png);"></div>
                                    <div class="pattern-2" style="background-image: url(assets/images/shape/pattern-17.png);"></div>
                                </div>
                                <img src="assets/images/project/project-9.jpg" alt="">
                            </figure>
                            <div class="content-box">
                                <div class="text">
                                    <span>Candidate Placement</span>
                                    <h3><a href="{{ route('about.company') }}">Creating better opportunities for job seekers</a></h3>
                                </div>
                                <div class="view-btn"><a href="assets/images/project/project-9.jpg" class="lightbox-image" data-fancybox="gallery">+</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more-text centred"><p>Interested in working with us? <a href="{{ route('about.company') }}">Get in touch today</a></p></div>
            </div>
        </section>
        <!-- project-style-two end -->


        <!-- testimonial-style-three -->
        <section class="testimonial-style-three bg-color-2">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/pattern-34.png);"></div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <span class="top-title">Testimonials</span>
                    <h2>Words From Our Partners</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    @foreach ($partnerTestimonials as $partnerTestimonial)
                        @php
                            $contactInitials = collect([
                                $partnerTestimonial->contact_first_name,
                                $partnerTestimonial->contact_last_name,
                            ])
                                ->filter()
                                ->map(fn ($name) => strtoupper(substr($name, 0, 1)))
                                ->implode('');
                            $contactInitials = $contactInitials !== '' ? $contactInitials : 'EP';
                            $thumbStyle = $partnerThumbStyles[$loop->index % count($partnerThumbStyles)];
                        @endphp
                        <div class="testimonial-block-three">
                            <div class="inner-box">
                                <div class="border-shap" style="background-image: url(assets/images/shape/border-2.png);"></div>
                                <figure class="quote-box"><img src="assets/images/icons/quote-3.png" alt=""></figure>
                                <div class="author-box">
                                    <figure class="author-thumb partner-thumb" style="{{ $thumbStyle }}">{{ $contactInitials }}</figure>
                                    <h3>{{ $partnerTestimonial->company_name }}</h3>
                                    <span class="designation">
                                        {{ $partnerTestimonial->position_hiring_for ?: 'Employer Feedback' }}
                                        @if ($partnerTestimonial->industry)
                                            • {{ $partnerTestimonial->industry }}
                                        @endif
                                    </span>
                                </div>
                                <div class="text">
                                    <p>{{ \Illuminate\Support\Str::limit(trim($partnerTestimonial->message), 220) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- testimonial-style-three  end -->


        <!-- news-section -->
        <section class="news-section alternet-2">
            <div class="auto-container">
                <div class="sec-title">
                    <span class="top-title">News & Updates</span>
                    <h2>Featured News and Updates</h2>
                    <a href="{{ route('blog.grid') }}" class="link"><i class="flaticon-right-arrow"></i>View All Posts</a>
                </div>
                @if ($featuredPosts->isEmpty())
                    <div class="sec-title centred">
                        <span class="top-title">No Posts Yet</span>
                        <h2>The homepage blog feed is ready</h2>
                        <p>Publish blog posts from the super admin dashboard and they will appear here automatically.</p>
                    </div>
                @else
                    <div class="row clearfix">
                        @foreach ($featuredPosts as $post)
                            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                                <div class="news-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ route('blog.details.show', $post) }}">
                                                <img src="{{ asset($post->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $post->title }}">
                                            </a>
                                            <span class="post-date">{{ ($post->published_at ?? $post->created_at)->format('d') }}<br />{{ ($post->published_at ?? $post->created_at)->format('M') }}</span>
                                        </figure>
                                        <div class="lower-content">
                                            <div class="inner">
                                                <div class="category"><i class="flaticon-note"></i><p>{{ $post->category }}</p></div>
                                                <h3><a href="{{ route('blog.details.show', $post) }}">{{ $post->title }}</a></h3>
                                                <ul class="post-info clearfix">
                                                    <li><i class="far fa-user"></i><a href="{{ route('home') }}">Swift Manpower</a></li>
                                                    <li><i class="far fa-comment"></i><a href="{{ route('blog.details.show', $post) }}">Agency Insight</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        <!-- news-section end -->


        <!-- advice-section -->
        <section class="advice-section" style="background-image: url(assets/images/background/advice-1.jpg);">
            <div class="auto-container">
                <div class="content-inner clearfix">
                    <div class="text pull-left"><h2>Need staffing support for your business? <a href="{{ route('about.company') }}">Start here.</a></h2></div>
                    <ul class="social-links pull-right">
                        <li><a href="{{ route('home') }}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ route('home') }}"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ route('home') }}"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="{{ route('home') }}"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- advice-section end -->


@endsection
