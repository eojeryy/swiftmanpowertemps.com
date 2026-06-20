@extends('layouts.app')

@section('title', 'FAQ | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Frequently Asked Questions</h1>
                <p>Quick answers for job seekers and employers working with Swift Manpower Temps Agency Ltd.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>FAQ</li>
            </ul>
        </div>
    </div>
</section>

<section class="faq-section bg-color-2">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-title">Common Questions</span>
            <h2>How We Support Employers and Candidates</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="content_block_3">
                    <div class="accordion-box">
                        <div class="accordion block active-block">
                            <div class="acc-btn active">
                                <div class="icon-outer"></div>
                                How do I apply for available opportunities?
                            </div>
                            <div class="acc-content current">
                                <div class="text">
                                    <p>Contact our team by phone or email and share your experience, availability, and the type of work you are looking for. We will guide you through the next steps.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"></div>
                                What information should employers provide?
                            </div>
                            <div class="acc-content">
                                <div class="text">
                                    <p>Employers should provide job requirements, expected start date, shift details, and any preferred experience or certifications for the role.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"></div>
                                Do you support temporary and long-term staffing?
                            </div>
                            <div class="acc-content">
                                <div class="text">
                                    <p>Yes. We support temporary staffing, contract staffing, and longer-term placement needs depending on the employer’s requirements.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="content_block_3">
                    <div class="accordion-box">
                        <div class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"></div>
                                How can I contact your office directly?
                            </div>
                            <div class="acc-content">
                                <div class="text">
                                    <p>You can reach us at <a href="tel:+14388712598">438-871-2598</a>, <a href="tel:+15878992598">587-899-2598</a>, or by email at <a href="mailto:swiftmanpowertemps@gmail.com">swiftmanpowertemps@gmail.com</a>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"></div>
                                Where is your office located?
                            </div>
                            <div class="acc-content">
                                <div class="text">
                                    <p>Our office is located at #201 3501 29st NE Calgary, AB.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"></div>
                                What are your office hours?
                            </div>
                            <div class="acc-content">
                                <div class="text">
                                    <p>Our office hours are Monday to Friday, 8am to 5pm.</p>
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
