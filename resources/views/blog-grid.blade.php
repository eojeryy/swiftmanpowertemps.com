@extends('layouts.app')
@section('title', 'Hiring & Career Blog in Canada | Swift Manpower Temps')
@section('content')
<section class="page-title">
    <div class="auto-container">
        <div class="title-box centred">
<span class="eyebrow">The Swift Manpower blog</span>
<h1>Hiring &amp; Career Insights in Canada</h1>
<p>Ideas for building dependable teams, preparing for your next role and understanding the recruitment process. From our Calgary team to Canadian employers and job seekers.</p>
</div>
        <nav aria-label="Breadcrumb">
<ol class="blog-breadcrumb">
<li>
<a href="{{ route('home') }}">Home</a>
</li>
<li aria-current="page">Blog</li>
</ol>
</nav>
    </div>
</section>
<section class="swift-section blog-hub" aria-labelledby="blog-latest-title">
    <div class="auto-container">
        <div class="section-heading">
<div>
<span class="eyebrow">Knowledge for your next step</span>
<h2 id="blog-latest-title">Latest from our team.</h2>
</div>
<p>Explore staffing, recruitment and career guidance. Turn what you learn into a clearer hiring brief or a stronger application.</p>
</div>
        @if($posts->isEmpty())
            <p class="blog-empty-message">New articles will appear here as they’re published. In the meantime, explore these practical starting points.</p>
            @include('partials.blog-resources')
        @else
            <div class="insights-grid">
                @foreach($posts as $article)@include('partials.blog-card', ['article' => $article])@endforeach
            </div>
            @if($posts->hasPages())
                <nav class="blog-pagination" aria-label="Blog pagination">
                    @if($posts->onFirstPage())<span aria-disabled="true">← Newer articles</span>@else<a href="{{ $posts->previousPageUrl() }}" rel="prev">← Newer articles</a>@endif
                    <span>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</span>
                    @if($posts->hasMorePages())<a href="{{ $posts->nextPageUrl() }}" rel="next">Older articles →</a>@else<span aria-disabled="true">Older articles →</span>@endif
                </nav>
            @endif
        @endif
    </div>
</section>
<section class="swift-section swift-soft">
    <div class="auto-container">
<div class="swift-cta">
<div>
<span class="eyebrow">Put your next step into action</span>
<h2>From insight to opportunity.</h2>
<p>Speak with our Calgary team about your staffing needs or explore current jobs in Canada.</p>
</div>
<div class="swift-actions">
<a class="swift-btn swift-btn-green" href="{{ route('place.job') }}">Hire staff <span aria-hidden="true">↗</span>
</a>
<a class="swift-btn swift-btn-outline" style="color:white" href="{{ route('job.openings') }}">Find jobs <span aria-hidden="true">→</span>
</a>
</div>
</div>
</div>
</section>
@endsection
