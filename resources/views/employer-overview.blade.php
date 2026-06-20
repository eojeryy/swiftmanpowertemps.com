@extends('layouts.app')

@section('title', 'Employer Overview | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Employer Overview</h1>
                <p>Flexible staffing support for employers who need dependable workers and responsive service.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Employers</li>
                <li>Overview</li>
            </ul>
        </div>
    </div>
</section>

<section class="about-style-two">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <span class="top-title">For Employers</span>
                            <h2>Staffing Support Built Around Your Hiring Needs</h2>
                        </div>
                        <div class="text">
                            <p>Swift Manpower Temps Agency Ltd works with employers who need temporary staffing, contract support, and dependable candidate placement.</p>
                            <p>Our team helps reduce hiring delays by coordinating screening, communication, and placement support from start to finish.</p>
                        </div>
                        <ul class="list clearfix">
                            <li>Temporary and contract staffing support</li>
                            <li>Candidate screening and shortlist coordination</li>
                            <li>Responsive communication throughout the process</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="image-box">
                        <figure class="image-1"><img src="{{ asset('assets/images/resource/about-2.jpg') }}" alt="Employer overview"></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
