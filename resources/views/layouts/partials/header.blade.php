<a class="skip-link" href="#main-content">Skip to content</a>
<div class="site-topbar">
<div class="auto-container">
<span>Connecting people. Supporting Canadian businesses.</span>
<a href="tel:+15878992598">Talk to our Calgary team: 587-899-2598</a>
</div>
</div>
<header class="site-header">
    <div class="auto-container site-header-inner">
        <a class="site-logo" href="{{ route('home') }}" aria-label="Swift Manpower Temps Agency home">
<img src="{{ asset('assets/images/logo/swiftmta4.png') }}" alt="Swift Manpower Temps Agency Ltd" width="90" height="70">
<span>SWIFT MANPOWER<small>TEMPS AGENCY LTD</small>
</span>
</a>
        <nav class="site-nav" aria-label="Main navigation">
            <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
            <a href="{{ route('employer.overview') }}" @if(request()->routeIs('employer.overview', 'place.job', 'staffing.solutions')) aria-current="page" @endif>For employers</a>
            <a href="{{ route('employee.overview') }}" @if(request()->routeIs('employee.overview', 'apply.now')) aria-current="page" @endif>For job seekers</a>
            <a href="{{ route('job.openings') }}" @if(request()->routeIs('job.openings', 'job.details*', 'jobs.search')) aria-current="page" @endif>Find jobs</a>
            <a href="{{ route('about.company') }}" @if(request()->routeIs('about.*')) aria-current="page" @endif>About us</a>
            <a href="{{ route('blog.grid') }}" @if(request()->routeIs('blog.*')) aria-current="page" @endif>Blog</a>
            <a href="{{ route('contact') }}" @if(request()->routeIs('contact')) aria-current="page" @endif>Contact</a>
        </nav>
        <a href="{{ route('place.job') }}" class="swift-btn swift-btn-dark header-cta">Hire staff <span aria-hidden="true">↗</span>
</a>
        <details class="site-mobile-nav">
<summary aria-label="Open navigation">Menu <span aria-hidden="true">☰</span>
</summary>
<nav aria-label="Mobile navigation">
            <a href="{{ route('home') }}">Home</a>
<a href="{{ route('employer.overview') }}">For employers</a>
<a href="{{ route('employee.overview') }}">For job seekers</a>
<a href="{{ route('job.openings') }}">Find jobs</a>
<a href="{{ route('place.job') }}">Hire staff</a>
<a href="{{ route('about.company') }}">About us</a>
<a href="{{ route('blog.grid') }}">Blog</a>
<a href="{{ route('contact') }}">Contact</a>
<a href="{{ route('employee.sign-in') }}">Candidate sign in</a>
        </nav>
</details>
    </div>
</header>
