@extends('layouts.app')

@section('title', 'Job Openings | Swift Manpower Temps Agency Ltd')

@section('content')
    @php($applicationName = 'Swift-Manpower-Temps-Agenc')

    <style>
        .single-job-post .job-inner .salary-box.application-box p {
            overflow-wrap: anywhere;
            word-break: break-word;
            line-height: 1.5;
            max-width: 100%;
        }
    </style>

    <section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box centred">
                    <h1>Job Openings</h1>
                    <p>Our Team Moves Faster, Keeping you Current on What's Hot</p>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Job Seekers</li>
                    <li>Job Openings</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="findjob-section">
        <div class="auto-container">
            <div class="sec-title centred">
                <span class="top-title">Recently Posted Jobs</span>
                <h2>Find Your Job You Deserve It</h2>
                <p>Long established fact that a reader will be distracted by the <br>readable content of a page.</p>
            </div>
            <div class="search-inner">
                <form action="{{ route('jobs.search') }}" method="get" class="search-form">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                            <div class="form-group">
                                <i class="flaticon-search"></i>
                                <input type="search" name="q" placeholder="Keyword (Title or Application)" value="{{ request('q') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                            <div class="form-group">
                                <i class="flaticon-place"></i>
                                <input type="search" name="location" placeholder="Location (City or State)" value="{{ request('location') }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                            <div class="form-group">
                                <i class="flaticon-folder"></i>
                                <div class="select-box">
                                    <select class="wide" name="work_status">
                                        <option data-display="Desired Work Status" value="">Desired Work Status</option>
                                        <option value="Full Time" @selected(request('work_status') === 'Full Time')>Full Time</option>
                                        <option value="Part Time" @selected(request('work_status') === 'Part Time')>Part Time</option>
                                        <option value="Contract" @selected(request('work_status') === 'Contract')>Contract</option>
                                        <option value="Temporary" @selected(request('work_status') === 'Temporary')>Temporary</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn-one">Search Jobs</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="post-jobs">
                @forelse ($jobs as $job)
                    <div class="single-job-post">
                        <div class="job-header clearfix">
                            <ul class="info pull-left">
                                <li><a href="{{ route('job.details.show', $job) }}">{{ $job->category }}</a></li>
                                <li>
                                    <i class="flaticon-clock"></i>
                                    Posted {{ optional($job->published_at)->diffForHumans() ?? $job->created_at->diffForHumans() }}
                                </li>
                            </ul>
                            <div class="number pull-right">
                                <p>Job ID: {{ str_pad((string) $job->id, 4, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                        <div class="job-inner clearfix">
                            <div class="job-title">
                                <figure class="company-logo">
                                    <img src="{{ asset($job->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $applicationName }}">
                                </figure>
                                <h3>{{ $job->title }}</h3>
                                <p><i class="flaticon-place"></i>{{ $job->location }}</p>
                            </div>
                            <div class="salary-box application-box">
                                <span>Application</span>
                                <p>{{ $applicationName }}</p>
                            </div>
                            <div class="experience-box">
                                <span>Work Type</span>
                                <p>{{ $job->employment_type }}</p>
                            </div>
                            <div class="apply-btn">
                                <a href="{{ route('job.details.show', $job) }}">View Job</a>
                            </div>
                        </div>
                        <div class="text" style="padding: 0 30px 28px;">
                            <p>{{ \Illuminate\Support\Str::limit($job->summary, 165) }}</p>
                            @if (! empty($job->schedule))
                                <p><strong>Schedule:</strong> {{ $job->schedule }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="sec-title centred">
                        <span class="top-title">No Active Openings</span>
                        <h2>No job listings are live right now</h2>
                        <p>Check back soon or use the contact section below to ask about upcoming roles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="hiring-section">
        <div class="image-layer">
            <figure class="image-1"><img src="{{ asset('assets/images/resource/hiring-1.png') }}" alt=""></figure>
            <figure class="image-2"><img src="{{ asset('assets/images/resource/hiring-2.png') }}" alt=""></figure>
        </div>
        <div class="outer-container clearfix">
            <div class="left-column pull-left clearfix">
                <div class="inner-box pull-right">
                    <div class="icon-box"><i class="flaticon-factory"></i></div>
                    <h2>Industries Hiring</h2>
                    <p>Find fault with a man who chooses to enjoy a pleasure that has no annoying consequences.</p>
                    <a href="{{ route('employer.overview') }}">Industries</a>
                </div>
            </div>
            <div class="right-column pull-right clearfix">
                <div class="inner-box pull-left">
                    <div class="icon-box"><i class="flaticon-working-man"></i></div>
                    <h2>Professions Hiring</h2>
                    <p>Chooses to enjoy a pleasure that has no annoying one who avoids a pain that produces.</p>
                    <a href="{{ route('employee.overview') }}">Professions</a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title centred">
                <span class="top-title">Get Touch With US</span>
                <h2>Send Your Message Us</h2>
            </div>
            <div class="form-inner">
                <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-42.png') }});"></div>
                <form action="{{ route('contact.submit') }}" method="post" class="default-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="name" placeholder="Your Name *" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email Address *" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="phone" placeholder="Phone *" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <div class="select-box">
                                <select class="wide" name="service" required>
                                    <option data-display="Hiring Employees" value="">Hiring Employees</option>
                                    <option value="Staffing">Staffing</option>
                                    <option value="Recruitment">Recruitment</option>
                                    <option value="Contract Hire">Contract Hire</option>
                                    <option value="Payrolling">Payrolling</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="text" name="location" placeholder="Location" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="message" placeholder="Message ..."></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                            <button type="submit" class="theme-btn-one">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
