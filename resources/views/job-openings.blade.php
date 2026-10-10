@extends('layouts.app')

@section('title', 'Job Openings | Swift Manpower Temps Agency Ltd')

@section('content')


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
                    <h1>Current Jobs in Canada</h1>
                    <p>Explore current opportunities and connect with our Calgary recruitment team.</p>
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
                <h2>Find work that fits your next step</h2>
                <p>Search by role, location and work type. Review each vacancy for the skills and experience required.</p>
            </div>
            @include('partials.job-search')
            <div style="height: 32px"></div>
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
                                    <img src="{{ asset($job->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $job->company_name }}">
                                </figure>
                                <h3><a href="{{ route('job.details.show', $job) }}">{{ $job->title }}</a></h3>
                                <p><i class="flaticon-place"></i>{{ $job->location }}</p>
                            </div>
                            <div class="salary-box application-box">
                                <span>Hiring company</span>
                                <p>{{ $job->company_name }}</p>
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

    <section class="swift-section swift-soft"><div class="auto-container"><div class="swift-cta"><div><span class="eyebrow">Your next step</span><h2>Can’t find the right role?</h2><p>Send us your resume and tell us about your skills and availability. Our team can discuss relevant opportunities as they arise.</p></div><a href="{{ route('apply.now') }}" class="swift-btn swift-btn-green">Submit your resume <span aria-hidden="true">↗</span></a></div></div></section>
@endsection
