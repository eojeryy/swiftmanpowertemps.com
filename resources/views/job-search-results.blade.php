@extends('layouts.app')

@section('title', 'Job Search Results | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Job Search Results</h1>
                <p>Results for "{{ $searchTerm }}" across job openings, job categories, and companies hiring through Swift Manpower.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Job Search</li>
            </ul>
        </div>
    </div>
</section>

<section class="news-section alternet-2 sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <span class="top-title">Search Summary</span>
            <h2>{{ $jobs->count() }} matching role{{ $jobs->count() === 1 ? '' : 's' }}</h2>
            <p>Matches are pulled from job title, category, and company name in the live job openings table.</p>
        </div>

        @if ($matchingCategories->isNotEmpty() || $matchingCompanies->isNotEmpty())
            <div class="row clearfix mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="default-content">
                        <h3>Matching Categories</h3>
                        <p>{{ $matchingCategories->isNotEmpty() ? $matchingCategories->implode(', ') : 'No category matches found.' }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="default-content">
                        <h3>Companies Hiring</h3>
                        <p>{{ $matchingCompanies->isNotEmpty() ? $matchingCompanies->implode(', ') : 'No company matches found.' }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($jobs->isEmpty())
            <div class="sec-title centred">
                <span class="top-title">No Matches</span>
                <h2>No openings matched "{{ $searchTerm }}"</h2>
                <p>Try another job title, category like `Warehouse`, or company name.</p>
                <a href="{{ route('job.openings') }}" class="theme-btn-one">Browse All Openings</a>
            </div>
        @else
            <div class="row clearfix">
                @foreach ($jobs as $job)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="{{ route('job.details.show', $job) }}">
                                        <img src="{{ asset($job->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $job->title }}">
                                    </a>
                                    <span class="post-date">{{ $job->category }}</span>
                                </figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <div class="category"><i class="flaticon-note"></i><p>{{ $job->company_name }}</p></div>
                                        <h3><a href="{{ route('job.details.show', $job) }}">{{ $job->title }}</a></h3>
                                        <ul class="post-info clearfix">
                                            <li><i class="flaticon-placeholder"></i><a href="{{ route('job.details.show', $job) }}">{{ $job->location }}</a></li>
                                            <li><i class="flaticon-clock"></i><a href="{{ route('job.details.show', $job) }}">{{ $job->employment_type }}</a></li>
                                        </ul>
                                        <p>{{ $job->summary }}</p>
                                        <div class="mt-3">
                                            <a href="{{ route('job.details.show', $job) }}" class="theme-btn-two">View Job</a>
                                        </div>
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
@endsection
