@extends('layouts.app')
@section('title', 'Hire Staff in Canada | Swift Manpower Temps Agency')
@section('content')
<section class="swift-hero audience-hero">
<div class="auto-container hero-grid">
<div class="hero-copy">
<span class="eyebrow">For Canadian employers</span>
<h1>Good people make<br>a stronger business.</h1>
<p>Staffing support built around your team, your timelines and your day-to-day needs. Partner with our Calgary recruitment team to find dependable people for your workplace.</p>
<div class="swift-actions">
<a class="swift-btn swift-btn-green" href="{{ route('place.job') }}">Request staff <span aria-hidden="true">↗</span>
</a>
<a class="swift-text-link" href="{{ route('staffing.solutions') }}">Explore staffing solutions <span aria-hidden="true">→</span>
</a>
</div>
</div>
<div class="hero-visual">
<img src="{{ asset('assets/images/resource/about-2.jpg') }}" alt="Professional team discussing workforce needs" width="600" height="450" fetchpriority="high">
</div>
</div>
</section>
<section class="swift-section">
<div class="auto-container">
<div class="section-heading">
<div>
<span class="eyebrow">People-first recruitment</span>
<h2>A staffing partner for<br>the way you work.</h2>
</div>
<p>From short-term coverage to ongoing recruitment, start with a conversation about your roles and the people you need.</p>
</div>
<div class="insights-grid">
<article class="service-info-card">
<span class="eyebrow">01</span>
<h3>Temporary staffing</h3>
<p>Keep operations moving through busy periods, staff absences and changing workloads. Share your schedule and coverage requirements with our team.</p>
</article>
<article class="service-info-card">
<span class="eyebrow">02</span>
<h3>Contract support</h3>
<p>Find candidates for a defined project or assignment. We consider role requirements, experience and availability when matching people to your needs.</p>
</article>
<article class="service-info-card">
<span class="eyebrow">03</span>
<h3>Permanent recruitment</h3>
<p>Build your team for the longer term with candidate screening and recruitment support focused on the skills your business needs.</p>
</article>
</div>
</div>
</section>
<section class="swift-section swift-soft">
<div class="auto-container process-grid">
<div>
<span class="eyebrow">Getting started</span>
<h2>Tell us about<br>your next hire.</h2>
<p class="section-intro">Clear expectations and personal communication, from your first enquiry to your next step.</p>
<a class="swift-text-link" href="{{ route('contact') }}">Speak with our team <span aria-hidden="true">→</span>
</a>
</div>
<ol class="swift-steps">
<li>
<span>01</span>
<div>
<h3>Share your requirements</h3>
<p>Tell us the job title, location, schedule, skills and number of people you need.</p>
</div>
</li>
<li>
<span>02</span>
<div>
<h3>Discuss suitable candidates</h3>
<p>Our team reviews your request and coordinates screening and candidate communication.</p>
</div>
</li>
<li>
<span>03</span>
<div>
<h3>Plan the next steps</h3>
<p>We work with you to confirm role expectations and support the placement process.</p>
</div>
</li>
</ol>
</div>
</section>
<section class="swift-section">
<div class="auto-container process-grid">
<div>
<span class="eyebrow">Common questions</span>
<h2>Before you start hiring</h2>
<p class="section-intro">A few useful details to help you get started.</p>
<a href="{{ route('faq') }}" class="swift-text-link">More frequently asked questions <span aria-hidden="true">→</span>
</a>
</div>
<div>
<details class="swift-faq">
<summary>What information should I include in a staffing request?</summary>
<p>Include your company details, job location, position, number of openings, required skills, schedule and expected start date. A clear brief helps us understand your hiring priorities.</p>
</details>
<details class="swift-faq">
<summary>Can I request temporary and ongoing staffing support?</summary>
<p>Yes. Share whether you need temporary coverage, contract support or recruitment for an ongoing role. Our team will discuss the options that fit your needs.</p>
</details>
<details class="swift-faq">
<summary>Where is your recruitment team based?</summary>
<p>Our office is in Calgary, Alberta, at #201, 3501 29 St NE. Contact us to discuss staffing support for your location in Canada.</p>
</details>
</div>
</div>
</section>
<section class="swift-section swift-soft">
<div class="auto-container">
<div class="swift-cta">
<div>
<span class="eyebrow">Take the next step</span>
<h2>Ready to build your team?</h2>
<p>Tell us what you need. We’ll help you work through the next steps.</p>
</div>
<a class="swift-btn swift-btn-green" href="{{ route('place.job') }}">Request staff <span aria-hidden="true">↗</span>
</a>
</div>
</div>
</section>
@endsection
