@extends('layouts.app')

@section('title', 'Contact | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    #content_block_6 .content-box .info-list li .inner p a,
    .locations-section .single-item .info-list li a {
        overflow-wrap: anywhere;
        word-break: break-word;
    }
    
    .locations-section .single-item .info-list li {
        min-width: 0;
    }
</style>
@endsection

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Contact Our Calgary Staffing Team</h1>
                <p>Reach out for staffing support, recruitment help, or job placement enquiries.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>

<section class="contactinfo-section contact-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                <div id="content_block_6">
                    <div class="content-box">
                        <div class="sec-title">
                            <span class="top-title">Contact Swift Manpower</span>
                            <h2>We Are Ready to Help</h2>
                            <p>Speak with our team about staffing needs, recruitment support, or the next opportunity that fits your skills.</p>
                        </div>
                        <ul class="info-list clearfix">
                            <li>
                                <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-39.png') }}" alt=""></figure>
                                <div class="inner">
                                    <h4>Location</h4>
                                    <p>#201 3501 29st NE Calgary, AB</p>
                                </div>
                            </li>
                            <li>
                                <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-40.png') }}" alt=""></figure>
                                <div class="inner">
                                    <h4>Call or Email</h4>
                                    <p>
                                        <a href="tel:+14388712598">438-871-2598</a><br>
                                        <a href="tel:+15878992598">587-899-2598</a><br>
                                        <a href="mailto:monica@swiftmanpowertemps.com">monica@swiftmanpowertemps.com</a><br>
                                        <a href="mailto:fabian@swiftmanpowertemps.com">fabian@swiftmanpowertemps.com</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <figure class="icon-box"><img src="{{ asset('assets/images/icons/icon-41.png') }}" alt=""></figure>
                                <div class="inner">
                                    <h4>Office Hours</h4>
                                    <p>Monday to Friday: 8am to 5pm</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                <div class="form-inner">
                    <h2>Tell Us How We Can Help</h2>
                    @if (session('status'))
                        <div class="alert alert-success mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('contact.submit') }}" id="contact-form" class="default-form">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label for="field-username">Full name *</label>
                                <input id="field-username" type="text" name="username" placeholder="Your Name *" value="{{ old('username') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label for="field-email">Email *</label>
                                <input id="field-email" type="email" name="email" placeholder="Email Address *" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="field-phone">Phone number *</label>
                                <input id="field-phone" type="text" name="phone" required placeholder="Phone *" value="{{ old('phone') }}">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <div class="select-box">
                                    <label for="field-interest">What can we help with?</label>
                                <select id="field-interest" class="wide ignore" name="interest">
                                        <option value="Hiring Employees" @selected(old('interest', 'Hiring Employees') === 'Hiring Employees') data-display="Hiring Employees">Hiring Employees</option>
                                        <option value="Job Placement" @selected(old('interest') === 'Job Placement')>Job Placement</option>
                                        <option value="Temporary Staffing" @selected(old('interest') === 'Temporary Staffing')>Temporary Staffing</option>
                                        <option value="General Enquiry" @selected(old('interest') === 'General Enquiry')>General Enquiry</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="field-subject">Subject *</label>
                                <input id="field-subject" type="text" name="subject" required placeholder="Subject" value="{{ old('subject') }}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="field-message">Additional details</label>
                                <textarea id="field-message" name="message" placeholder="Message ...">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                <button class="theme-btn-one" type="submit" name="submit-form">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="locations-section bg-color-2">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-50.png') }});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                <div class="single-item wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="upper-box">
                            <h3>Office Address</h3>
                            <p>#201 3501 29st NE Calgary, AB</p>
                        </div>
                        <ul class="info-list clearfix">
                            <li>
                                <i class="flaticon-email"></i>
                                <p>Email</p>
                                <a href="mailto:monica@swiftmanpowertemps.com">monica@swiftmanpowertemps.com</a><br>
                                <a href="mailto:fabian@swiftmanpowertemps.com">fabian@swiftmanpowertemps.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <p>Phone</p>
                                <a href="tel:+14388712598">438-871-2598</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                <div class="single-item wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="upper-box">
                            <h3>Recruitment Enquiries</h3>
                            <p>Contact our recruitment team for staffing requests, candidate support, and placement coordination.</p>
                        </div>
                        <ul class="info-list clearfix">
                            <li>
                                <i class="flaticon-email"></i>
                                <p>Email</p>
                                <a href="mailto:monica@swiftmanpowertemps.com">monica@swiftmanpowertemps.com</a><br>
                                <a href="mailto:fabian@swiftmanpowertemps.com">fabian@swiftmanpowertemps.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <p>Phone</p>
                                <a href="tel:+15878992598">587-899-2598</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                <div class="single-item wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="upper-box">
                            <h3>Business Hours</h3>
                            <p>We are available during the week and on Saturdays to respond to employer and job seeker enquiries.</p>
                        </div>
                        <ul class="info-list clearfix">
                            <li>
                                <i class="flaticon-email"></i>
                                <p>Email</p>
                                <a href="mailto:monica@swiftmanpowertemps.com">monica@swiftmanpowertemps.com</a><br>
                                <a href="mailto:fabian@swiftmanpowertemps.com">fabian@swiftmanpowertemps.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <p>Phone</p>
                                <a href="tel:+14388712598">438-871-2598</a> / <a href="tel:+15878992598">587-899-2598</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="swift-section swift-soft"><div class="auto-container"><div class="swift-cta"><div><span class="eyebrow">Let’s get started</span><h2>People for your business.<br>Opportunities for your future.</h2><p>Choose the next step that’s right for you.</p></div><div class="swift-actions"><a class="swift-btn swift-btn-green" href="{{ route('place.job') }}">Request staff <span aria-hidden="true">↗</span></a><a class="swift-btn swift-btn-outline" href="{{ route('job.openings') }}" style="color:white">Find work <span aria-hidden="true">→</span></a></div></div></div></section>
@endsection
