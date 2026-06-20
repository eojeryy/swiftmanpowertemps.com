@extends('layouts.app')

@section('title', 'Job Details | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .job-detail-hero {
        overflow: hidden;
        padding: 210px 0 110px;
        position: relative;
    }

    .job-detail-hero::before {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.93), rgba(127, 29, 29, 0.84));
        content: "";
        inset: 0;
        position: absolute;
    }

    .job-detail-hero .pattern-layer {
        opacity: 0.16;
    }

    .job-detail-hero .content-box,
    .detail-hero-panel {
        position: relative;
        z-index: 1;
    }

    .job-detail-hero .title-box h1,
    .job-detail-hero .title-box p,
    .job-detail-hero .bread-crumb li,
    .job-detail-hero .bread-crumb li a {
        color: #fff;
    }

    .job-detail-hero .title-box h1 {
        font-size: 64px;
        line-height: 1.04;
        margin-bottom: 18px;
    }

    .job-detail-hero .title-box p {
        font-size: 18px;
        margin: 0 auto;
        max-width: 700px;
    }

    .detail-hero-panel {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 28px;
        margin-top: 46px;
        padding: 28px;
    }

    .detail-hero-grid {
        align-items: center;
        display: grid;
        gap: 22px;
        grid-template-columns: 1.4fr 1fr;
    }

    .detail-badges,
    .detail-quick-list,
    .summary-list,
    .candidate-list,
    .apply-points {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .detail-badges li,
    .apply-points li {
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 999px;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.04em;
        padding: 10px 16px;
        text-transform: uppercase;
    }

    .detail-hero-copy h3,
    .detail-hero-copy p,
    .detail-metric strong,
    .detail-metric span {
        color: #fff;
    }

    .detail-hero-copy h3 {
        font-size: 26px;
        margin: 16px 0 10px;
    }

    .detail-hero-copy p {
        margin-bottom: 0;
        opacity: 0.88;
    }

    .detail-quick-list li {
        align-items: center;
        color: #fff;
        display: inline-flex;
        font-size: 14px;
        font-weight: 700;
        gap: 8px;
    }

    .detail-quick-list i {
        color: #fecaca;
    }

    .detail-metrics {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .detail-metric {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 18px 20px;
    }

    .detail-metric strong {
        display: block;
        font-size: 24px;
        line-height: 1.1;
        margin-bottom: 8px;
    }

    .detail-metric span {
        display: block;
        font-size: 14px;
        opacity: 0.84;
    }

    .job-detail-page {
        background: linear-gradient(180deg, #fff8f6 0%, #ffffff 18%);
        padding: 110px 0;
    }

    .detail-layout {
        display: grid;
        gap: 28px;
        grid-template-columns: minmax(0, 1.45fr) minmax(320px, 0.85fr);
    }

    .detail-card,
    .summary-card,
    .contact-card,
    .cta-card {
        background: #fff;
        border: 1px solid #f1e2dc;
        border-radius: 28px;
        box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
    }

    .detail-card {
        overflow: hidden;
    }

    .detail-cover {
        min-height: 330px;
        position: relative;
    }

    .detail-cover img {
        height: 100%;
        object-fit: cover;
        width: 100%;
    }

    .detail-cover::after {
        background: linear-gradient(180deg, rgba(15, 23, 42, 0.06), rgba(15, 23, 42, 0.68));
        content: "";
        inset: 0;
        position: absolute;
    }

    .detail-cover-tag {
        background: #ffffff;
        border-radius: 999px;
        color: #b42318;
        font-size: 12px;
        font-weight: 800;
        left: 24px;
        letter-spacing: 0.08em;
        padding: 10px 14px;
        position: absolute;
        text-transform: uppercase;
        top: 24px;
        z-index: 1;
    }

    .detail-body {
        padding: 34px;
    }

    .detail-body .sec-title {
        margin-bottom: 24px;
    }

    .detail-body .sec-title h2 {
        font-size: 42px;
        line-height: 1.06;
        margin-bottom: 10px;
    }

    .detail-body .text p {
        color: #5d6676;
        line-height: 1.9;
    }

    .detail-section + .detail-section {
        border-top: 1px solid #f1e4de;
        margin-top: 30px;
        padding-top: 30px;
    }

    .detail-section h3 {
        font-size: 26px;
        margin-bottom: 16px;
    }

    .detail-points {
        display: grid;
        gap: 14px;
        margin: 0;
        padding: 0;
    }

    .detail-points li {
        align-items: flex-start;
        color: #415064;
        display: grid;
        gap: 12px;
        grid-template-columns: 22px 1fr;
        list-style: none;
        line-height: 1.75;
    }

    .detail-points li i {
        color: #d73925;
        font-size: 14px;
        margin-top: 7px;
    }

    .detail-apply-box {
        background: #fff4ef;
        border-radius: 24px;
        margin-top: 18px;
        padding: 22px;
    }

    .detail-apply-box p {
        color: #5d6676;
        margin-bottom: 18px;
    }

    .detail-apply-actions {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }

    .summary-stack {
        display: grid;
        gap: 22px;
    }

    .summary-card,
    .contact-card,
    .cta-card {
        padding: 26px;
    }

    .summary-card h3,
    .contact-card h3,
    .cta-card h3 {
        font-size: 24px;
        margin-bottom: 18px;
    }

    .summary-list {
        display: grid;
        gap: 14px;
    }

    .summary-list li {
        align-items: center;
        background: #fff8f5;
        border-radius: 20px;
        color: #334155;
        display: flex;
        justify-content: space-between;
        padding: 16px 18px;
    }

    .summary-list li span {
        color: #64748b;
        font-weight: 700;
    }

    .summary-list li strong {
        color: #0f172a;
        font-size: 15px;
        text-align: right;
    }

    .candidate-list {
        display: grid;
        gap: 14px;
    }

    .candidate-list li {
        align-items: flex-start;
        display: grid;
        gap: 12px;
        grid-template-columns: 22px 1fr;
        line-height: 1.7;
    }

    .candidate-list li i {
        color: #d73925;
        margin-top: 5px;
    }

    .contact-card p,
    .cta-card p {
        color: #64748b;
        line-height: 1.8;
    }

    .contact-links {
        display: grid;
        gap: 12px;
        margin-top: 16px;
    }

    .contact-links a {
        align-items: center;
        background: #fff8f5;
        border-radius: 18px;
        color: #0f172a;
        display: inline-flex;
        font-weight: 700;
        gap: 10px;
        padding: 14px 16px;
    }

    .contact-links a i {
        color: #d73925;
    }

    .cta-card {
        background: linear-gradient(145deg, #0f172a, #1e293b);
        border-color: transparent;
        overflow: hidden;
        position: relative;
    }

    .cta-card::before {
        background: radial-gradient(circle at top right, rgba(239, 68, 68, 0.38), transparent 38%);
        content: "";
        inset: 0;
        position: absolute;
    }

    .cta-card > * {
        position: relative;
        z-index: 1;
    }

    .cta-card h3,
    .cta-card p {
        color: #fff;
    }

    .cta-card p {
        opacity: 0.82;
    }

    .cta-card .theme-btn-two {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.24);
        color: #fff;
    }

    @media (max-width: 1199px) {
        .detail-layout,
        .detail-hero-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 991px) {
        .job-detail-hero {
            padding: 170px 0 90px;
        }

        .job-detail-hero .title-box h1 {
            font-size: 48px;
        }
    }

    @media (max-width: 767px) {
        .job-detail-hero {
            padding: 150px 0 80px;
        }

        .job-detail-hero .title-box h1 {
            font-size: 38px;
        }

        .detail-hero-panel,
        .detail-body,
        .summary-card,
        .contact-card,
        .cta-card {
            padding: 22px;
        }

        .detail-metrics {
            grid-template-columns: 1fr;
        }

        .detail-body .sec-title h2 {
            font-size: 32px;
        }

        .detail-apply-actions {
            align-items: stretch;
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<section class="page-title job-detail-hero" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>{{ $job->title }} Opportunity</h1>
                <p>Review the role expectations, workplace fit, and application steps for one of our current job openings in {{ $job->location }}.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Job Seekers</li>
                <li>Job Details</li>
            </ul>
        </div>

        <div class="detail-hero-panel">
            <div class="detail-hero-grid">
                <div class="detail-hero-copy">
                    <ul class="detail-badges">
                        <li>{{ $job->category }}</li>
                        <li>{{ $job->employment_type }}</li>
                        <li>{{ $job->location }}</li>
                    </ul>
                    <h3>Built for dependable candidates who want hands-on work and clear next steps.</h3>
                    <p>{{ $job->summary }}</p>
                    <ul class="detail-quick-list">
                        <li><i class="flaticon-placeholder"></i>{{ $job->location }}</li>
                        <li><i class="flaticon-clock"></i>{{ $job->schedule ?: $job->employment_type }}</li>
                    </ul>
                </div>
                <div class="detail-metrics">
                    <div class="detail-metric">
                        <strong>{{ count($job->responsibilities ?? []) }}</strong>
                        <span>core responsibility areas</span>
                    </div>
                    <div class="detail-metric">
                        <strong>24h</strong>
                        <span>target review turnaround</span>
                    </div>
                    <div class="detail-metric">
                        <strong>2</strong>
                        <span>direct support phone numbers</span>
                    </div>
                    <div class="detail-metric">
                        <strong>{{ count($job->requirements ?? []) }}</strong>
                        <span>simple application path</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="job-detail-page">
    <div class="auto-container">
        <div class="detail-layout">
            <div class="detail-card">
                <div class="detail-cover">
                    <img src="{{ asset($job->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $job->title }} role">
                    <span class="detail-cover-tag">Featured Position</span>
                </div>
                <div class="detail-body">
                    <div class="text">
                        <div class="sec-title">
                            <span class="top-title">{{ $job->category }} Opportunity</span>
                            <h2>{{ $job->title }}</h2>
                        </div>
                        <p>{{ $job->description }}</p>
                        <p>This opening is currently being hired for by {{ $job->company_name }} through Swift Manpower Temps Agency Ltd.</p>
                    </div>

                    <div class="detail-section">
                        <h3>Role Responsibilities</h3>
                        <ul class="detail-points">
                            @foreach ($job->responsibilities ?? [] as $responsibility)
                                <li><i class="flaticon-check"></i><span>{{ $responsibility }}</span></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="detail-section">
                        <h3>Candidate Requirements</h3>
                        <ul class="detail-points">
                            @foreach ($job->requirements ?? [] as $requirement)
                                <li><i class="flaticon-check"></i><span>{{ $requirement }}</span></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="detail-section">
                        <h3>How to Apply</h3>
                        <div class="detail-apply-box">
                            <p>Submit your details through our application page and include your contact information, work experience, and resume reference. Our team will review your profile and contact you about this role or closely matched opportunities.</p>
                            <ul class="apply-points">
                                <li>Simple form</li>
                                <li>Fast review</li>
                                <li>Direct follow-up</li>
                            </ul>
                            <div class="detail-apply-actions">
                                <a href="{{ route('apply.now') }}" class="theme-btn-one">Apply Now</a>
                                <a href="{{ route('job.openings') }}" class="theme-btn-two">Back to Openings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-stack">
                <div class="summary-card">
                    <h3>Job Summary</h3>
                    <ul class="summary-list">
                        <li><span>Location</span><strong>{{ $job->location }}</strong></li>
                        <li><span>Type</span><strong>{{ $job->employment_type }}</strong></li>
                        <li><span>Schedule</span><strong>{{ $job->schedule ?: 'Flexible based on employer needs' }}</strong></li>
                        <li><span>Company</span><strong>{{ $job->company_name }}</strong></li>
                    </ul>
                </div>

                <div class="summary-card">
                    <h3>Ideal Candidate Fit</h3>
                    <ul class="candidate-list">
                        @foreach (collect($job->tags)->take(3) as $tag)
                            <li><i class="flaticon-check"></i><span>{{ $tag }}</span></li>
                        @endforeach
                    </ul>
                </div>

                <div class="contact-card">
                    <h3>Need Help?</h3>
                    <p>Reach out if you want support with this opening or need help finding another role that better fits your experience.</p>
                    <div class="contact-links">
                        <a href="tel:4388712598"><i class="flaticon-phone-call"></i>438-871-2598</a>
                        <a href="tel:5878992598"><i class="flaticon-phone-call"></i>587-899-2598</a>
                        <a href="mailto:swiftmanpowertemps@gmail.com"><i class="flaticon-email"></i>swiftmanpowertemps@gmail.com</a>
                    </div>
                </div>

                <div class="cta-card">
                    <h3>Want a quicker route into the process?</h3>
                    <p>If you are ready to move now, complete the application and our team can review your details for this role and other relevant openings.</p>
                    <a href="{{ route('contact') }}" class="theme-btn-two">Contact Our Team</a>
                </div>

                @if ($relatedJobs->isNotEmpty())
                    <div class="summary-card">
                        <h3>More Openings</h3>
                        <ul class="candidate-list">
                            @foreach ($relatedJobs as $relatedJob)
                                <li><i class="flaticon-right-arrow"></i><span><a href="{{ route('job.details.show', $relatedJob) }}">{{ $relatedJob->title }}</a></span></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
