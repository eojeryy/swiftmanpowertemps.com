@extends('layouts.app')

@section('title', 'Meet Our Team | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Meet Our Team</h1>
                <p>Dedicated people supporting employers, candidates, and better staffing outcomes.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About</li>
                <li>Our Team</li>
            </ul>
        </div>
    </div>
</section>

<section class="team-style-three">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Leadership Team</span>
            <h2>Guiding Swift Manpower Forward</h2>
            <p>Our leadership team focuses on reliable service, responsive communication, and practical recruitment support for every placement.</p>
        </div>
        <div class="three-item-carousel owl-carousel owl-theme owl-dot-style-two owl-nav-none">
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="{{ asset('assets/images/team/team-8.jpg') }}" alt="Leadership team">
                        <span class="singature">Swift Team</span>
                    </figure>
                    <div class="lower-content">
                        <h3><a href="{{ route('home') }}">Leadership Team</a></h3>
                        <span class="designation">Agency Direction</span>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="{{ asset('assets/images/team/team-9.jpg') }}" alt="Recruitment operations">
                        <span class="singature">Swift Team</span>
                    </figure>
                    <div class="lower-content">
                        <h3><a href="{{ route('home') }}">Recruitment Operations</a></h3>
                        <span class="designation">Candidate Coordination</span>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="{{ asset('assets/images/team/team-10.jpg') }}" alt="Client support">
                        <span class="singature">Swift Team</span>
                    </figure>
                    <div class="lower-content">
                        <h3><a href="{{ route('home') }}">Client Support Team</a></h3>
                        <span class="designation">Employer Relations</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-style-four bg-color-2">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Our Team</span>
            <h2>People Behind Our Staffing Service</h2>
            <p>From candidate screening to placement follow-up, our team works together to support employers and job seekers with dependable service.</p>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-11.jpg') }}" alt="Staffing specialist">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Staffing Specialist</a></h3>
                            <span class="designation">Candidate Screening</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-12.jpg') }}" alt="Recruitment coordinator">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Recruitment Coordinator</a></h3>
                            <span class="designation">Interview Scheduling</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-13.jpg') }}" alt="Employer support">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Employer Support</a></h3>
                            <span class="designation">Client Communication</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-14.jpg') }}" alt="Placement support">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Placement Support</a></h3>
                            <span class="designation">Onboarding Assistance</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-15.jpg') }}" alt="Operations support">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Operations Support</a></h3>
                            <span class="designation">Workflow Coordination</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-16.jpg') }}" alt="Talent support">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Talent Support</a></h3>
                            <span class="designation">Candidate Relations</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-17.jpg') }}" alt="Client success">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Client Success</a></h3>
                            <span class="designation">Service Follow-Up</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/team/team-18.jpg') }}" alt="Recruitment team">
                            <span class="singature">Swift Team</span>
                        </figure>
                        <div class="lower-content">
                            <h3><a href="{{ route('home') }}">Recruitment Team</a></h3>
                            <span class="designation">Placement Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
