@extends('layouts.app')
@section('title', 'Staffing Agency in Calgary, Canada | Swift Manpower Temps')
@section('content')
<section class="swift-hero">
    <div class="auto-container hero-grid">
        <div class="hero-copy">
<span class="eyebrow">
<span class="status-dot">
</span> Calgary roots. Canadian opportunities.</span>
<h1>The right people.<br>The right <em>opportunity.</em>
</h1>
<p>Helping Canadian businesses build dependable teams and job seekers take their next step. Personal staffing support, from the first conversation to the right match.</p>
<div class="swift-actions">
<a class="swift-btn swift-btn-green" href="{{ route('place.job') }}">I’m looking to hire <span aria-hidden="true">↗</span>
</a>
<a class="swift-btn swift-btn-outline" href="{{ route('job.openings') }}">I’m looking for work <span aria-hidden="true">→</span>
</a>
</div>
<div class="hero-note">
<span aria-hidden="true">✓</span> Temporary staffing <span aria-hidden="true">·</span> Contract roles <span aria-hidden="true">·</span> Permanent recruitment</div>
</div>
        <div class="hero-visual">
<img src="{{ asset('assets/images/banner/banner-7.jpg') }}" alt="People working together in a professional workplace" width="700" height="650" fetchpriority="high">
<div class="hero-image-label">
<span class="status-dot">
</span> People are at the heart of what we do.</div>
<div class="hero-floating-card">
<span class="floating-icon" aria-hidden="true">↗</span>
<div>
<strong>Let’s find your next match.</strong>
<span>Real conversations. Practical support.</span>
</div>
</div>
</div>
    </div>
</section>
<div class="swift-trust-strip">
<div class="auto-container">
<span>A people-first staffing partner</span>
<span>Based in Calgary, Alberta</span>
<span>For employers &amp; job seekers</span>
</div>
</div>
<section class="swift-section">
<div class="auto-container">
<div class="section-heading">
<div>
<span class="eyebrow">Two paths. One dedicated team.</span>
<h2>Your next chapter<br>starts here.</h2>
</div>
<p>Whether you’re growing a team or finding your place in one, we make the next step clear.</p>
</div>
<div class="audience-grid">
<article class="audience-card employer-card">
<span class="card-kicker">01 / FOR EMPLOYERS</span>
<div class="card-icon" aria-hidden="true">↗</div>
<h3>Build the team<br>your business needs.</h3>
<p>Need coverage for a busy season, contract support or your next permanent hire? Tell us about your roles, location and timeline.</p>
<ul>
<li>Temporary and contract staffing</li>
<li>Candidate screening and matching</li>
<li>Recruitment for ongoing roles</li>
</ul>
<a class="swift-text-link" href="{{ route('employer.overview') }}">Explore employer services <span aria-hidden="true">→</span>
</a>
</article>
<article class="audience-card candidate-card">
<span class="card-kicker">02 / FOR JOB SEEKERS</span>
<div class="card-icon" aria-hidden="true">↗</div>
<h3>Find work that<br>moves you forward.</h3>
<p>Your skills, experience and availability matter. Explore current opportunities in Canada and let our team get to know you.</p>
<ul>
<li>Browse current job openings</li>
<li>Submit your resume and experience</li>
<li>Get support with your application</li>
</ul>
<a class="swift-text-link" href="{{ route('employee.overview') }}">Explore job seeker support <span aria-hidden="true">→</span>
</a>
</article>
</div>
</div>
</section>
<section class="swift-section swift-soft">
<div class="auto-container">
<div class="section-heading">
<div>
<span class="eyebrow">Work that fits your skills</span>
<h2>Find your next opportunity.</h2>
</div>
<a href="{{ route('job.openings') }}" class="swift-text-link">See all openings <span aria-hidden="true">↗</span>
</a>
</div>@include('partials.job-search')<div class="industry-links">
<span>Explore roles:</span>@foreach(['Warehouse', 'General Labour', 'Office Support', 'Customer Support'] as $industry)<a href="{{ route('jobs.search', ['q' => $industry]) }}">{{ $industry }} <span aria-hidden="true">↗</span>
</a>@endforeach</div>
<p class="search-note">Opportunities depend on current employer needs. View each posting for its location and requirements.</p>
</div>
</section>
<section class="swift-section">
<div class="auto-container process-grid">
<div>
<span class="eyebrow">Simple steps. Human support.</span>
<h2>A conversation today.<br>A new possibility tomorrow.</h2>
<p class="section-intro">Our Calgary team takes time to understand what you need, then helps you move forward with clear communication.</p>
<a href="{{ route('how.we.work') }}" class="swift-text-link">How we work <span aria-hidden="true">→</span>
</a>
</div>
<ol class="swift-steps">
<li>
<span>01</span>
<div>
<h3>Tell us what you’re looking for</h3>
<p>Share your hiring needs or your experience, interests and availability.</p>
</div>
</li>
<li>
<span>02</span>
<div>
<h3>We look for the right fit</h3>
<p>Our team reviews requirements and connects relevant candidates with employers.</p>
</div>
</li>
<li>
<span>03</span>
<div>
<h3>Take the next step together</h3>
<p>We coordinate communication and help you understand what comes next.</p>
</div>
</li>
</ol>
</div>
</section>
@include('partials.blog-section', ['blogPosts' => $featuredPosts])

<section class="swift-section">
<div class="auto-container">
<div class="swift-cta">
<div>
<span class="eyebrow">Local people. Personal service.</span>
<h2>Let’s make your<br>next move count.</h2>
<p>Visit our Calgary office or speak with our team about hiring and working in Canada.</p>
</div>
<div class="cta-actions">
<a class="swift-btn swift-btn-green" href="{{ route('contact') }}">Talk to our team <span aria-hidden="true">↗</span>
</a>
<a href="tel:+15878992598">587-899-2598</a>
<span>#201, 3501 29 St NE, Calgary, AB</span>
</div>
</div>
</div>
</section>
@endsection
