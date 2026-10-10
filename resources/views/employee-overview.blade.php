@extends('layouts.app')
@section('title', 'Find Work in Canada | Swift Manpower Temps Agency')
@section('content')
<section class="swift-hero audience-hero">
<div class="auto-container hero-grid">
<div class="hero-copy">
<span class="eyebrow">For job seekers in Canada</span>
<h1>Your skills.<br>Your next opportunity.</h1>
<p>Looking for your next role? Explore current Canadian job openings and share your experience with our Calgary recruitment team. We help you understand the opportunities and the next steps.</p>
<div class="swift-actions">
<a class="swift-btn swift-btn-green" href="{{ route('job.openings') }}">Browse current jobs <span aria-hidden="true">↗</span>
</a>
<a class="swift-text-link" href="{{ route('apply.now') }}">Submit your resume <span aria-hidden="true">→</span>
</a>
</div>
</div>
<div class="hero-visual">
<img src="{{ asset('assets/images/resource/solutions-1.jpg') }}" alt="Candidate preparing for a new work opportunity" width="600" height="450" fetchpriority="high">
</div>
</div>
</section>
<section class="swift-section">
<div class="auto-container">
<div class="section-heading">
<div>
<span class="eyebrow">People-first recruitment</span>
<h2>A little support.<br>A clearer path forward.</h2>
</div>
<p>Find a role that fits your skills and availability, with practical guidance from people you can speak to.</p>
</div>
<div class="insights-grid">
<article class="service-info-card">
<span class="eyebrow">01</span>
<h3>Explore current openings</h3>
<p>Review live vacancies, where the work is located and what each role requires. Search by job title, city or province, and employment type.</p>
</article>
<article class="service-info-card">
<span class="eyebrow">02</span>
<h3>Introduce yourself</h3>
<p>Tell us about your skills, work experience and availability. Submit your resume so our team can learn more about what you’re looking for.</p>
</article>
<article class="service-info-card">
<span class="eyebrow">03</span>
<h3>Stay connected</h3>
<p>Our team reviews candidate information and follows up about relevant opportunities. Placement depends on current openings and employer requirements.</p>
</article>
</div>
</div>
</section>
<section class="swift-section swift-soft">
<div class="auto-container process-grid">
<div>
<span class="eyebrow">Getting started</span>
<h2>Make your next<br>move with confidence.</h2>
<p class="section-intro">Clear expectations and personal communication, from your first enquiry to your next step.</p>
<a class="swift-text-link" href="{{ route('contact') }}">Speak with our team <span aria-hidden="true">→</span>
</a>
</div>
<ol class="swift-steps">
<li>
<span>01</span>
<div>
<h3>Find a relevant vacancy</h3>
<p>Browse current openings and review the responsibilities, requirements and location.</p>
</div>
</li>
<li>
<span>02</span>
<div>
<h3>Send your application</h3>
<p>Share your contact details, work experience and resume. Include the job reference when applying for a specific role.</p>
</div>
</li>
<li>
<span>03</span>
<div>
<h3>Discuss the right fit</h3>
<p>Our team reviews your application and contacts you when there is a relevant opportunity to discuss.</p>
</div>
</li>
</ol>
</div>
</section>
<section class="swift-section">
<div class="auto-container process-grid">
<div>
<span class="eyebrow">Common questions</span>
<h2>Before you apply</h2>
<p class="section-intro">A few useful details to help you get started.</p>
<a href="{{ route('faq') }}" class="swift-text-link">More frequently asked questions <span aria-hidden="true">→</span>
</a>
</div>
<div>
<details class="swift-faq">
<summary>How do I apply for a job?</summary>
<p>Open a current job listing, review the requirements and choose Apply Now. Complete the application form and upload your resume as a PDF, DOC or DOCX file up to 1 MB.</p>
</details>
<details class="swift-faq">
<summary>Can I submit a resume if I don’t see a suitable opening?</summary>
<p>Yes. Use the application form to introduce yourself and describe the kind of work you’re looking for. For the job reference, enter General application if you are not applying to a specific vacancy.</p>
</details>
<details class="swift-faq">
<summary>Does applying guarantee a placement?</summary>
<p>Applications are reviewed against current employer needs, role requirements and candidate availability. Submitting your resume does not guarantee a placement.</p>
</details>
</div>
</div>
</section>
<section class="swift-section swift-soft">
<div class="auto-container">
<div class="swift-cta">
<div>
<span class="eyebrow">Take the next step</span>
<h2>Your next opportunity starts<br>with a conversation.</h2>
<p>Explore current openings or tell our team about the work you’re looking for.</p>
</div>
<a class="swift-btn swift-btn-green" href="{{ route('job.openings') }}">Browse current jobs <span aria-hidden="true">↗</span>
</a>
</div>
</div>
</section>
@endsection
