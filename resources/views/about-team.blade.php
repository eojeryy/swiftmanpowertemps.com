@extends('layouts.app')
@section('title', 'Meet Our Calgary Recruitment Team | Swift Manpower Temps')
@section('content')
<section class="page-title">
    <div class="auto-container">
        <div class="title-box centred"><h1>Meet the People Behind Swift</h1><p>Personal service from a husband and wife team in Calgary, Alberta.</p></div>
    </div>
</section>
<section class="swift-section">
    <div class="auto-container process-grid">
        <div>
            <span class="eyebrow">Our owners &amp; directors</span>
            <h2>Fabian and Monica Ugwu</h2>
            <p class="section-intro">Swift Manpower Temps Agency Ltd was incorporated in December 2025 with two goals: dependable temporary staffing for local businesses and employers across Alberta, and consistent, safe work opportunities for people navigating their next step.</p>
            <p class="section-intro">We take time to understand employer needs and candidate experience, with careful screening and clear communication throughout the recruitment process.</p>
            <div class="swift-actions"><a class="swift-btn swift-btn-dark" href="{{ route('contact') }}">Connect with our team <span aria-hidden="true">↗</span></a><a class="swift-text-link" href="{{ route('about.company') }}">Our story <span aria-hidden="true">→</span></a></div>
        </div>
        <figure class="founder-photo"><img src="{{ asset('assets/images/background/co-founder2.jpeg') }}" alt="Fabian and Monica Ugwu, owners and directors of Swift Manpower Temps Agency Ltd" width="600" height="500"><figcaption>A personal approach to staffing and recruitment.</figcaption></figure>
    </div>
</section>
<section class="swift-section swift-soft">
    <div class="auto-container audience-grid">
        <article class="service-info-card"><span class="eyebrow">Speak with Fabian</span><h3>Let’s talk about your team.</h3><p>Share the roles, skills and coverage your business needs.</p><a class="swift-text-link" href="mailto:fabian@swiftmanpowertemps.com">Email Fabian <span aria-hidden="true">↗</span></a></article>
        <article class="service-info-card"><span class="eyebrow">Speak with Monica</span><h3>Tell us about your next step.</h3><p>Discuss your experience, availability and work interests.</p><a class="swift-text-link" href="mailto:monica@swiftmanpowertemps.com">Email Monica <span aria-hidden="true">↗</span></a></article>
    </div>
</section>
@endsection
