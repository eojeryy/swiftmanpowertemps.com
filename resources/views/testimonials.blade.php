@extends('layouts.app')

@section('title', 'Testimonials | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Testimonials</h1>
                <p>Feedback from employers and candidates who have worked with Swift Manpower Temps Agency Ltd.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Testimonials</li>
            </ul>
        </div>
    </div>
</section>

<section class="testimonial-style-three bg-color-2">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-34.png') }});"></div>
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">What People Say</span>
            <h2>Words From Employers and Candidates</h2>
        </div>
        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            <div class="testimonial-block-three">
                <div class="inner-box">
                    <figure class="quote-box"><img src="{{ asset('assets/images/icons/quote-3.png') }}" alt=""></figure>
                    <div class="author-box">
                        <figure class="author-thumb"><img src="{{ asset('assets/images/resource/testimonial-3.png') }}" alt=""></figure>
                        <h3>Employer Feedback</h3>
                        <span class="designation">Staffing Support</span>
                    </div>
                    <div class="text">
                        <p>Swift Manpower provided responsive support and helped us move faster when we needed dependable staffing help.</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-three">
                <div class="inner-box">
                    <figure class="quote-box"><img src="{{ asset('assets/images/icons/quote-3.png') }}" alt=""></figure>
                    <div class="author-box">
                        <figure class="author-thumb"><img src="{{ asset('assets/images/resource/testimonial-4.png') }}" alt=""></figure>
                        <h3>Candidate Feedback</h3>
                        <span class="designation">Job Placement</span>
                    </div>
                    <div class="text">
                        <p>The team stayed in touch, explained the process clearly, and helped me feel prepared for the opportunity.</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-three">
                <div class="inner-box">
                    <figure class="quote-box"><img src="{{ asset('assets/images/icons/quote-3.png') }}" alt=""></figure>
                    <div class="author-box">
                        <figure class="author-thumb"><img src="{{ asset('assets/images/resource/testimonial-5.png') }}" alt=""></figure>
                        <h3>Client Testimonial</h3>
                        <span class="designation">Recruitment Services</span>
                    </div>
                    <div class="text">
                        <p>We appreciated the communication, professionalism, and care Swift Manpower brought to the recruitment process.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
