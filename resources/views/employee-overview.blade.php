@extends('layouts.app')

@section('title', 'Employee Overview | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Job Seekers Overview</h1>
                <p>Support for candidates looking for temporary, contract, and long-term work opportunities.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Job Seekers</li>
                <li>Overview</li>
            </ul>
        </div>
    </div>
</section>

<section class="solutions-problems sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Welcome to Swift Manpower Temps Agency Ltd</span>
            <h2>A Better Path to Work Opportunities</h2>
            <p>We help job seekers connect with employers who need dependable people across temporary, contract, and ongoing roles.</p>
        </div>
        <div class="carousel-box">
            <div class="two-column-carousel owl-carousel owl-theme owl-dot-style-two owl-nav-none">
                <div class="single-item">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('assets/images/resource/solutions-1.jpg') }}" alt="Candidate support"></figure>
                        <div class="lower-content">
                            <h3>Guidance to help you prepare for the right opportunities.</h3>
                        </div>
                        <div class="side-content">
                            <div class="content-box">
                                <span>01.</span>
                                <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-56.png') }}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <span>01.</span>
                                <a href="{{ route('apply.now') }}"><i class="flaticon-right-arrow-angle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('assets/images/resource/solutions-2.jpg') }}" alt="Work opportunities"></figure>
                        <div class="lower-content">
                            <h3>Access to roles that match your availability, skills, and goals.</h3>
                        </div>
                        <div class="side-content">
                            <div class="content-box">
                                <span>02.</span>
                                <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-57.png') }}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <span>02.</span>
                                <a href="{{ route('job.openings') }}"><i class="flaticon-right-arrow-angle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('assets/images/resource/solutions-1.jpg') }}" alt="Application support"></figure>
                        <div class="lower-content">
                            <h3>Application support that helps you move faster through the hiring process.</h3>
                        </div>
                        <div class="side-content">
                            <div class="content-box">
                                <span>03.</span>
                                <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-56.png') }}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <span>03.</span>
                                <a href="{{ route('apply.now') }}"><i class="flaticon-right-arrow-angle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('assets/images/resource/solutions-2.jpg') }}" alt="Staffing network"></figure>
                        <div class="lower-content">
                            <h3>Employer connections through a trusted staffing and recruitment network.</h3>
                        </div>
                        <div class="side-content">
                            <div class="content-box">
                                <span>04.</span>
                                <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-57.png') }}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <span>04.</span>
                                <a href="{{ route('contact') }}"><i class="flaticon-right-arrow-angle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="growth-style-two bg-color-2">
    <div class="image-column" style="background-image: url({{ asset('assets/images/background/growth-bg.jpg') }});"></div>
    <div class="auto-container">
        <div class="row align-items-center clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div id="content_block_1">
                    <div class="content-box">
                        <div class="sec-title">
                            <span class="top-title">Time to grow</span>
                            <h2>Let Us Help You Find the Right Role</h2>
                        </div>
                        <div class="inner-box">
                            <div class="text">
                                <p>Swift Manpower Temps Agency Ltd supports job seekers with practical recruitment help, clear communication, and access to current opportunities.</p>
                                <p>Whether you are looking for short-term work, contract assignments, or a long-term placement, we help you present your strengths and move through the process with confidence.</p>
                            </div>
                            <ul class="list clearfix">
                                <li>
                                    <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-66.png') }}" alt=""></figure>
                                    <h3>Understand Your Goals</h3>
                                </li>
                                <li>
                                    <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-67.png') }}" alt=""></figure>
                                    <h3>Match You to the Right Opportunity</h3>
                                </li>
                            </ul>
                            <div class="link"><a href="{{ route('job.openings') }}"><i class="flaticon-right-arrow"></i>Explore Job Openings</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                <div class="text">
                    <h2>Start your next move with a team that supports your application journey.</h2>
                    <p>From first contact to placement, we stay focused on helping candidates connect with roles that suit their experience and availability.</p>
                    <a href="{{ route('apply.now') }}" class="theme-btn-two">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="advantages-section">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-46.png') }});"></div>
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Benefits for Job Seekers</span>
            <h2>Why Candidates Work With Us</h2>
            <p>We focus on clear communication, practical support, and access to employers looking for dependable talent.</p>
        </div>
        <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-two">
            <div class="single-item">
                <div class="inner-box">
                    <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-44.png') }}" alt=""></figure>
                    <h3>Trusted Opportunities</h3>
                    <p>We connect candidates with employers who need reliable workers across multiple roles.</p>
                    <a href="{{ route('job.openings') }}"><i class="flaticon-right-arrow"></i>View Jobs</a>
                </div>
            </div>
            <div class="single-item">
                <div class="inner-box">
                    <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-45.png') }}" alt=""></figure>
                    <h3>Faster Applications</h3>
                    <p>Our process helps reduce delays and keeps you moving toward the next hiring step.</p>
                    <a href="{{ route('apply.now') }}"><i class="flaticon-right-arrow"></i>Apply Today</a>
                </div>
            </div>
            <div class="single-item">
                <div class="inner-box">
                    <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-46.png') }}" alt=""></figure>
                    <h3>Flexible Work Options</h3>
                    <p>Find temporary, contract, and other roles that align with your availability.</p>
                    <a href="{{ route('employee.overview') }}"><i class="flaticon-right-arrow"></i>Learn More</a>
                </div>
            </div>
            <div class="single-item">
                <div class="inner-box">
                    <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-47.png') }}" alt=""></figure>
                    <h3>Ongoing Support</h3>
                    <p>Our team stays available to answer questions and guide you through the process.</p>
                    <a href="{{ route('contact') }}"><i class="flaticon-right-arrow"></i>Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
