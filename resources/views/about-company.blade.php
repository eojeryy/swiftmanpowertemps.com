@extends('layouts.app')

@section('title', 'About Company | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>About Company</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About Company</li>
            </ul>
        </div>
    </div>
</section>

<section class="about-style-two">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div id="image_block_1">
                        <div class="image-box">
                            <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-14.png') }});"></div>
                            <figure class="image-1"><img src="{{ asset('assets/images/resource/about-2.jpg') }}" alt="About Swift Manpower Temps Agency Ltd"></figure>
                            <figure class="image-2 wow slideInLeft animated animated" data-wow-delay="00ms"><img src="{{ asset('assets/images/resource/briefcase-1.png') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div id="content_block_3">
                        <div class="content-box">
                            <div class="sec-title">
                                <span class="top-title">About Our Agency</span>
                                <h2>Welcome to Swift Manpower Temps Agency Ltd.</h2>
                            </div>
                            <div class="text">
                                <p>Welcome to Swift Manpower Temps Agency Ltd. Our names are Fabian and Monica Ugwu. We are owners/directors of the company as well as a husband and wife team.</p>
                                <p>We incorporated Swift Manpower Temps Agency Ltd. in mid December 2025, having two goals in mind. Our primary goal is to provide reliable temporary workers to local businesses and across Alberta. Secondly, but equally as important, we are hoping to provide our workers with consistent and safe employment while they work through transitions, and potentially leading to permanent placement.</p>
                                <p>Our screening and hiring process is very thorough as we intend to only provide the absolute best match to fulfill our clients' needs. Our workers are skilled in various ways, and upon searching our workers database summary, we are confident you will find exactly what your company needs.</p>
                                <p>We appreciate you taking the time to get to know us, and we look forward to serving your employee needs in the future.</p>
                            </div>
                            <div class="author-box">
                                <div class="author-text">
                                    <h3>Providing dependable staffing support for businesses and safe, consistent opportunities for workers.</h3>
                                </div>
                                <div class="author-info">
                                    <figure class="author-thumb"><img src="{{ asset('assets/images/background/co-founder1.jpeg') }}" alt="Fabian and Monica Ugwu"></figure>
                                    <h4>Fabian and Monica Ugwu</h4>
                                    <span class="designation">Owners / Directors</span>
                                    <figure class="signature"><img src="{{ asset('assets/images/icons/signature-1.png') }}" alt=""></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
